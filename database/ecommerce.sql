-- Create the database
CREATE DATABASE IF NOT EXISTS ecommerce CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ecommerce;


-- Create user database for login
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Insert users
INSERT INTO users (username, password, email) 
VALUES('0005422', 'Laasexy', 'tengchantola140@gmail.com');


-- Create categories table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create products table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id VARCHAR(50) NOT NULL UNIQUE,
    name TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(500),
    brand VARCHAR(255),
    description TEXT,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Create product_options table (for sizes, volumes, etc.)
CREATE TABLE product_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    option_value VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Create product_thumbnails table
CREATE TABLE product_thumbnails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    thumbnail_url VARCHAR(500) NOT NULL,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Insert categories
INSERT INTO categories (name, slug) VALUES
('សម្លៀកបំពាក់', 'clothing'),
('អាហារ', 'អាហារ'),
('ភេសជ្ជះ', 'ភេសជ្ជះ'),
('គ្រឿងសម្អាង', 'គ្រឿងសម្អាង'),
('ស្បែកជើង', 'ស្បែកជើង'),
('សាប៊ូ', 'សាប៊ូ'),
('សៀវភៅ', 'សៀវភៅ'),
('សម្ភារះ កុំព្យូទ័រ', 'សម្ភារះ_កុំព្យូទ័រ'),
('គ្រឿងអេឡិចត្រូនិច', 'គ្រឿងអេឡិចត្រូនិច');

-- Insert products for Clothing category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('clothing-1', 'Real Madrid 25/26 Home Authentic Jersey', 150.00, './images/Clothing 1.avif', 'Addidas', 'Promo codes will not apply to this product. If personalized, this item cannot be returned or exchanged and will require up to 5 business days for processing prior to being shipped.', 1),
('clothing-2', 'Trefoil Essentials Woven', 70.00, './images/Clothing 2.avif', 'Addidas', 'Elegant formal wear for special occasions.', 1),
('clothing-3', 'Adicolor Classics Beckenbauer Track Jacket', 80.00, './images/Clothing 3.avif', 'Addidas', 'High-performance sportswear.', 1),
('clothing-4', 'Zip-Off Cargo Pants', 120.00, './images/Clothing 4.avif', 'Addidas', 'Clothing will have description soon.', 1),
('clothing-5', 'Legendary Whitetails Journeyman Shirt Jacket, Flannel Lined Shacket for Men, Water-Resistant Coat Rugged Fall Clothing', 89.90, './images/Clothing 5.jpg', '', 'Stylish casual wear.', 1),
('clothing-6', 'TBMPOY Men is Bomber Jackets Lightweight Light Windbreaker Casual Business Dress Stylish Fall Spring Golf Work', 38.99, './images/Clothing 6.webp', '', 'Versatile casual outfit.', 1),
('clothing-7', 'iCreek Men is Rain Jacket Lightweight Waterproof Packable Rain Shell Jacket Raincoat with Hood Windbreaker for Cycling, Golf', 32.99, './images/Clothing 7.jpg', '', 'Casual wear for all seasons.', 1),
('clothing-8', 'ZENTHACE Girls Sherpa Lined Full Zip Up Plaid Flannel Shirt Fuzzy Hooded Flannel Jacket with Hand Pockets', 42.99, './images/Clothing 8.jpg', '', 'Durable casual clothing.', 1);

-- Insert products for Food category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('food-1', 'cheesy roasted garlic & spinach', 14.90, './images/Food 1.jpg', 'The Pizza Company', 'Authentic local cuisine.', 2),
('food-2', 'Cutie Pizza', 4.99, './images/Food 2.png', 'The Pizza Company', 'Vegetable oil, chicken soup, pork bolognee sauce, pizza sauce, spaghetti', 2),
('food-3', 'Garden Salad with BBQ Grilled Chicken', 6.20, './images/Food 3.png', 'The Pizza Company', 'Chicken, corn, carrot, cherry tomato, cucumber, red cabbage, salad mix, quail egg, ទឹកជ្រលក់ស៊ីសា', 2),
('food-4', 'Bacon Sausage & Egg Salad', 3.80, './images/Food 4.png', 'The Pizza Company', 'Cos lettuce, red coral,​ baked, bacon, farmer sausage, quail eggs, crispy, cheese, fried onion, fried red onion, salad crème', 2),
('food-5', 'Burgershack Phnom Penh', 2.80, './images/Food 5.jpg', 'The Pizza Company', 'A no frills burger joint in the heart of the city of Phnom Penh. We provide you with full bellies, board games for days and banter you will enjoy. Meat, vegetarian and vegan options - something for everyone!', 2),
('food-6', '306 Wagyu Steakhouse', 4.80, './images/Food 6.jpg', 'The Pizza Company', '306 Wagyu Steakhouse Better you make in advance reservation for Dinner. Our prices are not suitable for everyone, Please check the menu before booking table If you want enjoy our food you must book a table for Dinner in advance ,you not book you may wait around 15 min 306 Wagyu Steakhouse has Earned an Outstanding reputation with guests consistently extolling the attentive service and the owner is personal engagement that', 2),
('food-7', 'Chez Tonton - Phnom Penh', 10.00, './images/Food 7.jpg', 'The Pizza company', 'Chez Tonton brings to Phnom Penh a modern taste of the South of France. The big choice of food specialties make this place a new attraction to the busy Riverside', 2),
('food-8', 'BBQ Pork Rib', 12.50, './images/Food 8.png', 'The Pizza Company', 'Port ribs, BBQ sauce, french fries, cos lettuce, red coral, corn kernels, cherry tomato, salad cream', 2);

-- Insert products for Drinks category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('drink-1', 'Sting Energy Drink', 0.70, './images/Energy 1.jpg', 'Sting', 'Refreshing local beverage.', 3),
('drink-2', 'PRIME HYDRATION Variety - ICE POP', 14.98, './images/Energy 2.jpg', 'Prime', 'Strawberry Banana, Lemonade, Sports Drinks, Electrolyte Enhanced for Ultimate Hydration, 250mg BCAAs, B Vitamins, Antioxidants, Low Sugar, 12 Fl Oz, 15 Pack', 3),
('drink-3', 'Bloom Nutrition Sparkling Energy Drink for Focus', 15.00, './images/Energy 3.webp', 'Jordan', 'Freshly squeezed juice.', 3),
('drink-4', 'GHOST Energy Drink - 12-Pack', 16.80, './images/Energy 4.jpg', 'Jordan', 'Aromatic tea blend.', 3),
('drink-5', 'Sting Energy Drink', 0.70, './images/Energy 1.jpg', 'Sting', 'Refreshing local beverage.', 3),
('drink-6', 'PRIME HYDRATION Variety - ICE POP', 14.98, './images/Energy 2.jpg', 'Prime', 'Strawberry Banana, Lemonade, Sports Drinks, Electrolyte Enhanced for Ultimate Hydration, 250mg BCAAs, B Vitamins, Antioxidants, Low Sugar, 12 Fl Oz, 15 Pack', 3),
('drink-7', 'Bloom Nutrition Sparkling Energy Drink for Focus', 15.00, './images/Energy 3.webp', 'Jordan', 'Freshly squeezed juice.', 3),
('drink-8', 'GHOST Energy Drink - 12-Pack', 16.80, './images/Energy 4.jpg', 'Jordan', 'Aromatic tea blend.', 3);

-- Insert products for Cosmetics category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('cosmetic-1', 'Centella Ampoule Foam', 4.00, './images/Skincare 1.webp', 'Skin 1004', 'A pH 5 cleanser with Coconut-derived surfactants and Citric acid gently cleanses the skin without causing dryness or tightness.', 4),
('cosmetic-2', 'Centella Light Cleansing Oil', 5.50, './images/Skincare 2.webp', 'Skin 1004', 'Centella and 6 plant-derived oils gently dissolve makeup, sunscreen and excess sebum on the skin, leaving a refreshing, oil-free finish.', 4),
('cosmetic-3', 'Centella Soothing Cream', 7.50, './images/Skincare 3.webp', 'Skin 1004', 'A non sticky soothing gel with Centella, Trehalose, and Ceramide NP moisturizes the skin and repairs the skin barrier.', 4),
('cosmetic-4', 'Centella Watergel Sheet Ampoule Mask', 3.00, './images/Skincare 4.webp', 'Skin 1004', 'Vibrant eyeshadow palette.', 4);

-- Insert products for Shoes category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('shoes-1', 'Air Jordan 1 Retro', 180.00, './images/Shoes 1.png', 'Nike', 'MJ\'s college years catapulted him to early stardom, and this reimagined AJ1 High nods back to his North Carolina roots. Distressed leather, classic color blocking and special packaging add a vintage feel—as if you\'ve been saving this pair since 1985.', 5),
('shoes-2', 'Air Jordan 1 Mid SE', 135.00, './images/Shoes 2.avif', 'Nike', 'This special edition AJ1 is almost too hot to handle. Genuine leather gives them a premium feel. A subtle metallic shine on the collar and Swoosh logo makes em pop. Are you ready to fire up your look?', 5),
('shoes-3', 'Jordan 12 Retro', 3.80, './images/Shoes 3.avif', 'Nike', 'Stylish casual sneakers.', 5),
('shoes-4', 'Jordan Spizike Low', 160.00, './images/Shoes 4.avif', 'Nike', 'The Spizike takes elements of five classic Jordans, combines them, and gives you one iconic sneaker. It is an homage to Spike Lee formally introducing Hollywood and hoops in a culture moment. You get a great looking pair of kicks with some history.', 5);

-- Insert products for Soap category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('soap-1', 'CLEAR Men Cooling', 2.50, './images/Sabo 1.avif', 'Clear', 'CLEAR Men Cooling Itch Control Ant-dandruff Shampoo. Soothes & calms scalp for immediate relief from itch.', 6),
('soap-2', 'CLEAR Herbal Care', 2.50, './images/Sabo 2.avif', 'Clear', 'CLEAR Herbal Care Anti-dandruff Shampoo. Remove dandruff*, nourishes scalp and provide relief from itch.', 6),
('soap-3', 'CLEAR Extra Strength', 2.50, './images/Sabo 3.avif', 'Clear', 'CLEAR Extra Strength Anti-dandruff Shampoo. For scalps prone to severe dandruff*. Get non-stop protection against severe dandruff.', 6),
('soap-4', 'CLEAR Sakura Fresh', 2.50, './images/Sabo 4.avif', 'Clear', 'CLEAR Sakura Fresh Anti-dandruff Shampoo. For refreshing scalp and hair with long lasting Sakura Flower scent', 6),
('soap-5', 'CLEAR Men Deep Cleanse', 2.50, './images/Sabo 5.avif', 'Clear', 'CLEAR Men Deep Cleanse Anti-dandruff Shampoo. Deeply cleans and purifies scalp and hair affected by dirt, pollution and grease.', 6),
('soap-6', 'CLEAR Men Cool', 2.50, './images/Sabo 6.avif', 'Clear', 'CLEAR Men Cool Sport Menthol Anti-dandruff Shampoo. Provides intense cooling power, for freshness that lasts all day.', 6),
('soap-7', 'Relaxing Care Lavender', 2.50, './images/Sabo 7.avif', 'Dove', 'Soak in a warm bath with the relaxing scent of this mild foaming bath salt formula. Ease sore and tired muscles while leaving skin feeling soft and smooth.', 6),
('soap-8', 'Relaxing Care Lavender', 2.50, './images/Sabo 8.avif', 'Dove', 'Relaxing Care Lavender & Chamomile Bubble Bath. Indulge the skin and senses with the calming and comforting scents of lavender and chamomile.', 6);

-- Insert products for Books category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('book-1', '១០០ គំនិតនៃភាពជោគជ័យ', 5.00, './images/Book 1.jpg', 'Book Store', 'Educational textbook for students.', 7),
('book-2', '១០០ គំនិតយកឈ្នះភាពក្រីក្រ', 7.50, './images/Book 2.jpg', 'Book Store', 'Engaging novel for leisure reading.', 7),
('book-3', '១០៨ ចក្ខុវិស័យ គួច ម៉េងលី', 8.50, './images/Book 3.jpg', 'Book Store', 'Engaging novel for leisure reading.', 7),
('book-4', '១០០ គំនិតនៃភាពជោគជ័យ', 7.50, './images/Book 4.jpg', 'Book Store', 'Engaging novel for leisure reading.', 7),
('book-5', '១០០រឿង ដែលគួរយល់ដឹងពីប្រទេសកម្ពុជា', 5.00, './images/Book 5.jpg', 'Book Store', 'Educational textbook for students.', 7),
('book-6', '១០នាទីក្លាយជាកំពូលអ្នកលក់', 3.00, './images/Book 6.jpg', 'Book Store', 'Engaging novel for leisure reading.', 7),
('book-7', '១៤វិធី ធ្វើឲ្យអាយុវែង', 2.00, './images/Book 7.webp', 'Book Store', 'Engaging novel for leisure reading.', 7),
('book-8', 'លុយពិត', 7.50, './images/Book 8.webp', 'Book Store', 'Engaging novel for leisure reading.', 7);

-- Insert products for Computer category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('computer-1', 'Small Portable Nylon Anti Static Brushes Electronics Computer Keyboard Laptop Cleaning Brush Kit', 25.00, './images/Computer 1.jpg', 'Logitech', 'Small Portable Nylon Anti Static Brushes Electronics Computer Keyboard Laptop Cleaning Brush Kit.', 8),
('computer-2', 'Logitech M185 Wireless Mouse', 45.00, './images/Computer 2.jpg', 'Logi', 'Ergonomic wireless mouse.', 8),
('computer-3', 'RK ROYAL KLUDGE S98 Mechanical Keyboard', 99.00, './images/Computer 3.webp', 'Logitech', 'Big Features on a Small Screen - Is there anything it can not display? Custom gif image, date. connection mode, WIN/MAC layout, battery status, etc.', 8),
('computer-4', 'Dell 7010 Optiplex Tower', 849.00, './images/Computer 4.webp', 'Dell', 'Ergonomic wireless mouse.', 8);

-- Insert products for Electronics category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('electronic-1', 'Surge Protector Power Strip', 9.00, './images/Electronic 1.jpg', 'Samsung', 'Surge Protector Power Strip - HANYCONY 8 Outlets 4 USB (2 USB C) Charging Ports, Multi Plug Outlet Extender, 5Ft Braided Extension Cord, Flat Plug Wall...', 9),
('electronic-2', 'JBL Tune 510BT', 39.00, './images/Electronic 2.jpg', 'JBL', 'JBL Tune 510BT - Bluetooth headphones with up to 40 hours battery, microphone for call, foldable and comfortable, Android and iOs compatible (White)', 9),
('electronic-3', 'JBL Go 3 Eco', 29.00, './images/Electronic 3.jpg', 'JBL', 'JBL Go 3 Eco - Portable Mini Bluetooth Speaker, big audio and punchy bass, IP67 waterproof and dustproof, 5 hours of playtime, Made in part with recycled materials (Eco Blue)', 9),
('electronic-4', 'JBL Vibe Beam', 49.00, './images/Electronic 4.jpg', 'JBL', 'JBL Tune 510BT - Bluetooth headphones with up to 40 hours battery, microphone for call, foldable and comfortable, Android and iOs compatible (White)', 9);