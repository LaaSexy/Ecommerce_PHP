CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users (username, password, email) 
VALUES('0005422', 'Laasexy', 'tengchantola140@gmail.com');

CREATE TABLE categories (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
INSERT INTO categories (id, name) VALUES
('clothing', 'សម្លៀកបំពាក់'),
('អាហារ', 'អាហារ'),
('ភេសជ្ជះ', 'ភេសជ្ជះ'),
('គ្រឿងសម្អាង', 'គ្រឿងសម្អាង'),
('ស្បែកជើង', 'ស្បែកជើង'),
('សាប៊ូ', 'សាប៊ូ'),
('សៀវភៅ', 'សៀវភៅ'),
('សម្ភារះ_កុំព្យូទ័រ', 'សម្ភារះ កុំព្យូទ័រ'),
('គ្រឿងអេឡិចត្រូនិច', 'គ្រឿងអេឡិចត្រូនិច');

CREATE TABLE items (
    id VARCHAR(50) PRIMARY KEY,
    category_id VARCHAR(50),
    name VARCHAR(255) NOT NULL,
    price VARCHAR(50),
    image VARCHAR(255),
    brand VARCHAR(255),
    description TEXT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
INSERT INTO items (id, category_id, name, price, image, brand, description) VALUES
('clothing-1', 'clothing', 'Real Madrid 25/26 Home Authentic Jersey', '$150.00', './images/Clothing 1.avif', 'Addidas', 'Promo codes will not apply to this product. If personalized, this item cannot be returned or exchanged and will require up to 5 business days for processing prior to being shipped.');

CREATE TABLE item_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id VARCHAR(50),
    option_value VARCHAR(50),
    FOREIGN KEY (item_id) REFERENCES items(id)
);
INSERT INTO item_options (item_id, option_value) VALUES
('clothing-1', 'XS'),
('clothing-1', 'S'),
('clothing-1', 'M'),
('clothing-1', 'L'),
('clothing-1', 'XL'),
('clothing-1', '2XL'),
('clothing-1', '3XL');

CREATE TABLE item_thumbnails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id VARCHAR(50),
    thumbnail VARCHAR(255),
    FOREIGN KEY (item_id) REFERENCES items(id)
);
INSERT INTO item_thumbnails (item_id, thumbnail) VALUES
('clothing-1', './images/Clothing 1.avif'),
('clothing-1', './images/Clothing1_1.avif'),
('clothing-1', './images/Clothing1_2.avif'),
('clothing-1', './images/Clothing1_3.avif');

