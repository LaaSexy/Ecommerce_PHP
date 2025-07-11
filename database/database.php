<?php
class EcommerceDB {
    private $host = 'localhost';
    private $dbname = 'ecommerce';
    private $username = "root";
    private $password = "";
    private $pdo;
    
    public function __construct($host = null, $dbname = null, $username = null, $password = null) {
        if ($host) $this->host = $host;
        if ($dbname) $this->dbname = $dbname;
        if ($username) $this->username = $username;
        if ($password) $this->password = $password;
        
        $this->connect();
    }

    private function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    // Get all categories
    public function getCategories() {
        $sql = "SELECT * FROM categories";    
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    // Get category by slug
    public function getCategoryBySlug($slug) {
        $sql = "SELECT * FROM categories WHERE slug = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }
    
    // Get all products
    public function getAllProducts() {
        $sql = "SELECT p.*, c.name as category_name, c.slug as category_slug 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                ORDER BY p.name";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    // Get products by category
    public function getProductsByCategory($category_slug) {
        $sql = "SELECT p.*, c.name as category_name, c.slug as category_slug 
                FROM products p 
                INNER JOIN categories c ON p.category_id = c.id 
                WHERE c.slug = ? 
                ORDER BY p.name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$category_slug]);
        return $stmt->fetchAll();
    }
    
    // Get single product by product_id
    public function getProduct($product_id) {
        $sql = "SELECT p.*, c.name as category_name, c.slug as category_slug 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetch();
    }
    
    // Get product options
    public function getProductOptions($product_id) {
        $sql = "SELECT po.option_value 
                FROM product_options po 
                INNER JOIN products p ON po.product_id = p.id 
                WHERE p.product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    
    // Get product thumbnails
    public function getProductThumbnails($product_id) {
        $sql = "SELECT pt.thumbnail_url 
                FROM product_thumbnails pt 
                INNER JOIN products p ON pt.product_id = p.id 
                WHERE p.product_id = ? 
                ORDER BY pt.display_order";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    
    // Get complete product data (with options and thumbnails) - similar to original array structure
    public function getCompleteProduct($product_id) {
        $product = $this->getProduct($product_id);
        if ($product) {
            $product['options'] = $this->getProductOptions($product_id);
            $product['thumbnails'] = $this->getProductThumbnails($product_id);
        }
        return $product;
    }
    
    // Get all products with complete data for a category
    public function getCompleteProductsByCategory($category_slug) {
        $products = $this->getProductsByCategory($category_slug);
        foreach ($products as &$product) {
            $product['options'] = $this->getProductOptions($product['product_id']);
            $product['thumbnails'] = $this->getProductThumbnails($product['product_id']);
        }
        return $products;
    }
    
    public function getCategoriesWithProducts() {
        $categories = $this->getCategories();
        $result = [];
        foreach ($categories as $category) {
            $products = $this->getCompleteProductsByCategory($category['slug']);
            
            $categoryData = [
                'name' => $category['name'],
                'id' => $category['slug'],
                'items' => []
            ];
            
            foreach ($products as $product) {
                $productData = [
                    'id' => $product['product_id'],
                    'name' => $product['name'],
                    'price' => '$' . number_format($product['price'], 2),
                    'image' => $product['image'],
                    'brand' => $product['brand'],
                    'description' => $product['description']
                ];
                
                if (!empty($product['options'])) {
                    $productData['options'] = $product['options'];
                }
                
                if (!empty($product['thumbnails'])) {
                    $productData['thumbnails'] = $product['thumbnails'];
                }
                
                $categoryData['items'][] = $productData;
            }
            
            $result[] = $categoryData;
        }
        return $result;
    }
    
    public function searchProducts($search_term) {
        $sql = "SELECT p.*, c.name as category_name, c.slug as category_slug 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.name LIKE ? OR p.description LIKE ? OR p.brand LIKE ?
                ORDER BY p.name";
        $search_param = '%' . $search_term . '%';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$search_param, $search_param, $search_param]);
        return $stmt->fetchAll();
    }
    
    // Add new product
    public function addProduct($data) {
        $sql = "INSERT INTO products (product_id, name, price, image, brand, description, category_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        $category_id = $data['category_id'];
        if (is_string($category_id)) {
            // If category_id is a slug, get the actual ID
            $category = $this->getCategoryBySlug($category_id);
            $category_id = $category ? $category['id'] : null;
        }
        
        $stmt->execute([
            $data['product_id'],
            $data['name'],
            $data['price'],
            $data['image'] ?? null,
            $data['brand'] ?? '',
            $data['description'] ?? '',
            $category_id
        ]);
        
        $product_db_id = $this->pdo->lastInsertId();
        
        // Add options if provided
        if (!empty($data['options'])) {
            $this->addProductOptions($product_db_id, $data['options']);
        }
        
        // Add thumbnails if provided
        if (!empty($data['thumbnails'])) {
            $this->addProductThumbnails($product_db_id, $data['thumbnails']);
        }
        
        return $product_db_id;
    }
    
    // Add product options
    private function addProductOptions($product_db_id, $options) {
        $sql = "INSERT INTO product_options (product_id, option_value) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        foreach ($options as $option) {
            $stmt->execute([$product_db_id, $option]);
        }
    }
    
    // Add product thumbnails
    private function addProductThumbnails($product_db_id, $thumbnails) {
        $sql = "INSERT INTO product_thumbnails (product_id, thumbnail_url, display_order) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        foreach ($thumbnails as $index => $thumbnail) {
            $stmt->execute([$product_db_id, $thumbnail, $index]);
        }
    }
    
    // Update product
    public function updateProduct($product_id, $data) {
        $sql = "UPDATE products SET name = ?, price = ?, image = ?, brand = ?, description = ? WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            $data['name'],
            $data['price'],
            $data['image'] ?? null,
            $data['brand'] ?? '',
            $data['description'] ?? '',
            $product_id
        ]);
    }
    
    // Delete product
    public function deleteProduct($product_id) {
        $sql = "DELETE FROM products WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$product_id]);
    }
    
    // Add new category
    public function addCategory($name, $slug = null) {
        if (!$slug) {
            $slug = strtolower(str_replace(' ', '-', $name));
        }
        
        $sql = "INSERT INTO categories (name, slug) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $slug]);
        
        return $this->pdo->lastInsertId();
    }

    // Delete category by ID or slug
     public function deleteCategory($category_id_or_slug) {
        // Try to get category by slug first
        $category = $this->getCategoryBySlug($category_id_or_slug);
        if ($category) {
            $category_id = $category['id'];
        } else {
            $category_id = $category_id_or_slug;
        }

        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$category_id]);
    }

     // Update category
    public function updateCategory($id, $name, $slug = null) {
        if (!$slug) {
            $slug = strtolower(str_replace(' ', '-', $name));
        }
        $sql = "UPDATE categories SET name = ?, slug = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $slug, $id]);
    }
}
        