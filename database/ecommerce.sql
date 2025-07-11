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


-- Insert product_thumnails
INSERT INTO product_thumbnails (product_id, thumbnail_url, display_order) VALUES
-- Clothing
(1, './images/Clothing 1.avif', 0),
(1, './images/Clothing1_1.avif', 1),
(1, './images/Clothing1_2.avif', 2),
(1, './images/Clothing1_3.avif', 3),
(2, './images/Clothing 2.avif', 0),
(2, './images/Clothing2_1.avif', 1),
(2, './images/Clothing2_2.avif', 2),
(2, './images/Clothing2_3.avif', 3),
(3, './images/Clothing 3.avif', 0),
(3, './images/Clothing3_1.avif', 1),
(3, './images/Clothing3_2.avif', 2),
(4, './images/Clothing 4.avif', 0),
(4, './images/Clothing4_1.avif', 1),
(4, './images/Clothing4_2.avif', 2),
(5, './images/Clothing 5.jpg', 0),
(5, './images/Clothing5_1.jpg', 1),
(5, './images/Clothing5_2.jpg', 2),
(5, './images/Clothing5_3.jpg', 3),
(6, './images/Clothing 6.webp', 0),
(6, './images/Clothing6_1.jpg', 1),
(6, './images/Clothing6_2.jpg', 2),
(6, './images/Clothing6_3.jpg', 3),
(7, './images/Clothing 7.jpg', 0),
(7, './images/Clothing7_1.jpg', 1),
(7, './images/Clothing7_2.jpg', 2),
(7, './images/Clothing7_3.jpg', 3),
(8, './images/Clothing 8.jpg', 0),
(8, './images/Clothing8_1.jpg', 1),
(8, './images/Clothing8_2.jpg', 2),
(8, './images/Clothing8_3.jpg', 3),
-- Drinks
(17, './images/Energy 1.jpg', 0),
(17, './images/Energy1_1.jpg', 1),
(17, './images/Energy1_2.jpg', 2),
(18, './images/Energy 2.jpg', 0),
(18, './images/Energy2_1.jpg', 1),
(18, './images/Energy2_2.jpg', 2),
(18, './images/Energy2_3.jpg', 3),
(19, './images/Energy 3.webp', 0),
(19, './images/Energy3_1.jpg', 1),
(19, './images/Energy3_2.jpg', 2),
(19, './images/Energy3_3.jpg', 3),
(20, './images/Energy 4.jpg', 0),
(20, './images/Energy4_1.png', 1),
(20, './images/Energy4_2.png', 2),
(20, './images/Energy4_3.png', 3),
(21, './images/Energy 5.jpg', 0),
(21, './images/Energy5_1.jpg', 1),
(21, './images/Energy5_2.jpg', 2),
(21, './images/Energy5_3.jpg', 3),
(22, './images/Energy 6.jpg', 0),
(22, './images/Energy6_1.jpg', 1),
(22, './images/Energy6_2.jpg', 2),
(22, './images/Energy6_3.jpg', 3),
(23, './images/Energy 7.jpg', 0),
(23, './images/Energy7_1.jpg', 1),
(23, './images/Energy7_2.jpg', 2),
(23, './images/Energy7_3.jpg', 3),
(24, './images/Energy 8.webp', 0),
(24, './images/Energy8_1.jpg', 1),
(24, './images/Energy8_2.jpg', 2),
(24, './images/Energy8_3.jpg', 3),
-- Cosmetics
(25, './images/Skincare1_1.webp', 0),
(25, './images/Skincare1_2.webp', 1),
(25, './images/Skincare1_3.jpg', 2),
(25, './images/Skincare1_4.webp', 3),
(26, './images/Skincare2_1.webp', 0),
(26, './images/Skincare2_2.webp', 1),
(26, './images/Skincare2_3.jpg', 2),
(26, './images/Skincare2_4.webp', 3),
(27, './images/Skincare3_1.webp', 0),
(27, './images/Skincare3_2.webp', 1),
(27, './images/Skincare3_3.jpg', 2),
(27, './images/Skincare3_4.webp', 3),
(28, './images/Skincare4_1.webp', 0),
(28, './images/Skincare4_2.webp', 1),
(28, './images/Skincare4_3.webp', 2),
(28, './images/Skincare4_4.webp', 3),
(29, './images/Skincare 5.avif', 0),
(29, './images/Skincare5_1.avif', 1),
(29, './images/Skincare5_2.avif', 2),
(29, './images/Skincare5_3.avif', 3),
(30, './images/Skincare 6.avif', 0),
(30, './images/Skincare6_1.avif', 1),
(30, './images/Skincare6_2.avif', 2),
(30, './images/Skincare6_3.avif', 3),
(31, './images/Skincare 7.avif', 0),
(31, './images/Skincare7_1.avif', 1),
(31, './images/Skincare7_2.avif', 2),
(31, './images/Skincare7_3.avif', 3),
(32, './images/Skincare 8.avif', 0),
(32, './images/Skincare8_1.avif', 1),
(32, './images/Skincare8_2.avif', 2),
(32, './images/Skincare8_3.avif', 3),
-- Shoes
(33, './images/Shoes1_1.avif', 0),
(33, './images/Shoes1_2.avif', 1),
(33, './images/Shoes1_3.avif', 2),
(33, './images/Shoes1_4.avif', 3),
(34, './images/Shoes2_1.avif', 0),
(34, './images/Shoes2_2.avif', 1),
(34, './images/Shoes2_3.avif', 2),
(34, './images/Shoes2_4.avif', 3),
(35, './images/Shoes3_1.avif', 0),
(35, './images/Shoes3_2.avif', 1),
(35, './images/Shoes3_3.avif', 2),
(35, './images/Shoes3_4.avif', 3),
(36, './images/Shoes4_1.avif', 0),
(36, './images/Shoes4_2.avif', 1),
(36, './images/Shoes4_3.avif', 2),
(36, './images/Shoes4_4.avif', 3),
(37, './images/Shoes 5.avif', 0),
(37, './images/Shoes5_1.avif', 1),
(37, './images/Shoes5_2.avif', 2),
(37, './images/Shoes5_3.avif', 3),
(38, './images/Shoes 6.avif', 0),
(38, './images/Shoes6_1.avif', 1),
(38, './images/Shoes6_2.avif', 2),
(38, './images/Shoes6_3.avif', 3),
(39, './images/Shoes 7.avif', 0),
(39, './images/Shoes7_1.avif', 1),
(39, './images/Shoes7_2.avif', 2),
(39, './images/Shoes7_3.avif', 3),
(40, './images/Shoes 8.avif', 0),
(40, './images/Shoes8_1.avif', 1),
(40, './images/Shoes8_2.avif', 2),
(40, './images/Shoes8_3.avif', 3),
-- Soap
(41, './images/Sabo 1.avif', 0),
(41, './images/Sabo1_1.avif', 1),
(42, './images/Sabo 2.avif', 0),
(42, './images/Sabo2_1.avif', 1),
(43, './images/Sabo 3.avif', 0),
(43, './images/Sabo3_1.avif', 1),
(44, './images/Sabo 2.avif', 0),
(44, './images/Sabo2_1.avif...', 1),
(45, './images/Sabo 1.avif', 0),
(45, './images/Sabo1_1.avif', 1),
(46, './images/Sabo 6.avif', 0),
(46, './images/Sabo6_1.avif', 1),
(47, './images/Sabo 7.avif', 0),
(47, './images/Sabo7_1.avif', 1),
(48, './images/Sabo 8.avif', 0),
(48, './images/Sabo8_1.avif', 1),
-- Books
(49, './images/Book 1.jpg', 0),
(49, './images/Book1_1.jpg', 1),
(50, './images/Book 2.jpg', 0),
(50, './images/Book2_1.jpg', 1),
(51, './images/Book 3.jpg', 0),
(52, './images/Book 4.jpg', 0),
(52, './images/Book4_1.jpg', 1),
(53, './images/Book 1.jpg', 0),
(53, './images/Book1_1.jpg', 1),
(54, './images/Book 6.jpg', 0),
(54, './images/Book6_1.jpg', 1),
(54, './images/Book6_3.jpg', 2),
(54, './images/Book6_4.jpg', 3),
(55, './images/Book 7.webp', 0),
(56, './images/Book 8.webp', 0),
-- Computer
(57, './images/Computer 1.jpg', 0),
(57, './images/Computer1_1.jpg', 1),
(57, './images/Computer1_2.jpg', 2),
(57, './images/Computer1_3.jpg', 3),
(58, './images/Computer 2.jpg', 0),
(58, './images/Computer2_1.jpg', 1),
(58, './images/Computer2_2.jpg', 2),
(58, './images/Computer2_3.jpg', 3),
(59, './images/Computer 3.webp', 0),
(59, './images/Computer3_1.jpg', 1),
(59, './images/Computer3_2.jpg', 2),
(59, './images/Computer3_3.jpg', 3),
(60, './images/Computer 4.webp', 0),
(60, './images/Computer4_1.webp', 1),
(60, './images/Computer4_2.jpg', 2),
(60, './images/Computer4_3.jpg', 3),
(61, './images/Computer 5.jpg', 0),
(61, './images/Computer5_1.jpg', 1),
(61, './images/Computer5_2.jpg', 2),
(61, './images/Computer5_3.jpg', 3),
(62, './images/Computer 6.jpg', 0),
(62, './images/Computer6_1.jpg', 1),
(62, './images/Computer6_2.jpg', 2),
(62, './images/Computer6_3.jpg', 3),
(63, './images/Computer 7.jpg', 0),
(63, './images/Computer7_1.jpg', 1),
(63, './images/Computer7_2.jpg', 2),
(63, './images/Computer7_3.jpg', 3),
(64, './images/Computer 8.jpg', 0),
(64, './images/Computer8_1.jpg', 1),
(64, './images/Computer8_2.jpg', 2),
(64, './images/Computer8_3.jpg', 3),
-- Electronics
(65, './images/Electronic 1.jpg', 0),
(65, './images/Electronic1_1.jpg', 1),
(65, './images/Electronic1_2.jpg', 2),
(65, './images/Electronic1_3.jpg', 3),
(66, './images/Electronic 2.jpg', 0),
(66, './images/Electronic2_1.jpg', 1),
(66, './images/Electronic2_2.jpg', 2),
(66, './images/Electronic2_3.jpg', 3),
(67, './images/Electronic 3.jpg', 0),
(67, './images/Electronic3_1.jpg', 1),
(67, './images/Electronic3_2.jpg', 2),
(67, './images/Electronic3_3.jpg', 3),
(68, './images/Electronic 3.jpg', 0),
(68, './images/Electronic3_1.jpg', 1),
(68, './images/Electronic3_2.jpg', 2),
(68, './images/Electronic3_3.jpg', 3),
(69, './images/Electronic 5.webp', 0),
(69, './images/Electronic5_1.jpg', 1),
(69, './images/Electronic5_2.jpg', 2),
(69, './images/Electronic5_3.jpg', 3),
(70, './images/Electronic 6.jpg', 0),
(70, './images/Electronic6_1.jpg', 1),
(70, './images/Electronic6_2.jpg', 2),
(70, './images/Electronic6_3.jpg', 3),
(71, './images/Electronic 7.jpg', 0),
(71, './images/Electronic7_1.jpg', 1),
(71, './images/Electronic7_2.jpg', 2),
(71, './images/Electronic7_3.jpg', 3),
(72, './images/Electronic 8.jpg', 0),
(72, './images/Electronic8_1.jpg', 1),
(72, './images/Electronic8_2.jpg', 2),
(72, './images/Electronic8_3.jpg', 3);

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
('drink-5', 'Alani Nu VARIETY PACK', 20.70, './images/Energy 5.jpg', 'Sting', 'Alani Nu VARIETY PACK (CHERRY SLUSH, JUICY PEACH, ORANGE KISS), Low Calorie Energy Drinks, 100mg Caffeine, Biotin, B Vitamins, Zero Sugar, 10 Calories or Less, 8 Fl Oz Cans, 12 Pack', 3),
('drink-6', 'CELSIUS Sparkling Galaxy Vibe', 19.49, './images/Energy 6.jpg', 'Celsius', 'CELSIUS Sparkling Galaxy Vibe, Functional Essential Energy Drink 12 Fl Oz (Pack of 12)', 3),
('drink-7', 'RYSE Clear Protein Shake', 38.99, './images/Energy 7.jpg', 'RYSE', 'Freshly squeezed juice.', 3),
('drink-8', 'Slate Milk', 46.99, './images/Energy 8.webp', 'Slate Milk', 'Slate Milk - Ultra High Protein Shake - Chocolate - 42g Protein, 2g Sugar, 200 Calories, 4g Net Carbs - Lactose Free - No Added Sugar, No Seed Oils - Breakfast Boost, Post Workout - 15 fl oz, 12 Cans', 3);
-- Insert products for Cosmetics category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('cosmetic-1', 'Centella Ampoule Foam', 4.00, './images/Skincare 1.webp', 'Skin 1004', 'A pH 5 cleanser with Coconut-derived surfactants and Citric acid gently cleanses the skin without causing dryness or tightness.', 4),
('cosmetic-2', 'Centella Light Cleansing Oil', 5.50, './images/Skincare 2.webp', 'Skin 1004', 'Centella and 6 plant-derived oils gently dissolve makeup, sunscreen and excess sebum on the skin, leaving a refreshing, oil-free finish.', 4),
('cosmetic-3', 'Centella Soothing Cream', 7.50, './images/Skincare 3.webp', 'Skin 1004', 'A non sticky soothing gel with Centella, Trehalose, and Ceramide NP moisturizes the skin and repairs the skin barrier.', 4),
('cosmetic-4', 'Centella Watergel Sheet Ampoule Mask', 3.00, './images/Skincare 4.webp', 'Skin 1004', 'Vibrant eyeshadow palette.', 4),
('cosmetic-5', 'Heartleaf Quercetinol Pore Deep Cleansing Foam', 14.00, './images/Skincare 5.avif', 'Heartleaf', 'Anua Heartleaf Quercetinol Pore Deep Cleansing Foam infused with soothing ingredients and BHA that cleanses the skin and minimizes the appearance of pores.', 4),
('cosmetic-6', 'Slam Dunk Hydrating Moisturizer', 16.00, './images/Skincare 6.avif', 'Bubble', 'Bubble is Slam Dunk Hydrating Moisturizer is an everyday cream moisturizer that uses natural ingredients like aloe leaf juice and hoya lacosuna flower extract to deeply hydrate and restore essential nutrients, leaving you feeling nourished, calm, protected, and ready for anything.', 4),
('cosmetic-7', 'Deep Cleansing Oil Facial Cleanser', 16.00, './images/Skincare 7.avif', 'DHC', 'DHC Deep Cleansing Oil is the original Japanese oil cleanser that removes makeup and dissolves impurities, leaving your skin clean, soft and radiant.', 4),
('cosmetic-8', 'Natural Moisturizing Factors + Hyaluronic Acid Daily Moisturizer', 14.00, './images/Skincare 8.avif', 'The Ordinary', 'The Ordinary is Natural Moisturizing Factors + HA Daily Moisturizer is a surface hydration formula with hyaluronic acid, triglycerides, ceramides, and other components. This lightweight, non-greasy cream is great for those looking for a solution for signs of dehydration.', 4);

-- Insert products for Shoes category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('shoes-1', 'Air Jordan 1 Retro', 180.00, './images/Shoes 1.png', 'Nike', 'MJ\'s college years catapulted him to early stardom, and this reimagined AJ1 High nods back to his North Carolina roots. Distressed leather, classic color blocking and special packaging add a vintage feel—as if you\'ve been saving this pair since 1985.', 5),
('shoes-2', 'Air Jordan 1 Mid SE', 135.00, './images/Shoes 2.avif', 'Nike', 'This special edition AJ1 is almost too hot to handle. Genuine leather gives them a premium feel. A subtle metallic shine on the collar and Swoosh logo makes em pop. Are you ready to fire up your look?', 5),
('shoes-3', 'Jordan 12 Retro', 3.80, './images/Shoes 3.avif', 'Nike', 'Stylish casual sneakers.', 5),
('shoes-4', 'Jordan Spizike Low', 160.00, './images/Shoes 4.avif', 'Nike', 'The Spizike takes elements of five classic Jordans, combines them, and gives you one iconic sneaker. It is an homage to Spike Lee formally introducing Hollywood and hoops in a culture moment. You get a great looking pair of kicks with some history.', 5),
('shoes-5', 'Jordan Spizike Low', 165.00, './images/Shoes 5.avif', 'Nike', 'The Spizike takes elements of five classic Jordans, combines them, and gives you one iconic sneaker. It is an homage to Spike Lee formally introducing Hollywood and hoops in a culture moment. You get a great looking pair of kicks with some history.', 5),
('shoes-6', 'Air Jordan 1 Low Premium', 140.00, './images/Shoes 6.avif', 'Nike', 'Inspired by the original that debuted in 1985, the Air Jordan 1 Low Premium offers a clean, classic look that is familiar yet always fresh. With an iconic design that pairs perfectly with any fit, these kicks ensure you will always be on point.', 5),
('shoes-7', 'Nike Air Max 270', 112.97, './images/Shoes 7.avif', 'Nike', 'Nike is first lifestyle Air Max brings you style, comfort and big attitude in the Nike Air Max 270. The design draws inspiration from Air Max icons, showcasing Nike is greatest innovation with its large window and fresh array of colors.', 5),
('shoes-8', 'Nike Victori One', 29.97, './images/Shoes 8.avif', 'Nike', 'From the beach to the bleachers, the Victori One is a must-have slide for everyday activities. Subtle yet substantial updates like a wider strap and softer foam make lounging easy. Go ahead—enjoy endless comfort for your feet.', 5);

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
('computer-4', 'Dell 7010 Optiplex Tower', 849.00, './images/Computer 4.webp', 'Dell', 'Ergonomic wireless mouse.', 8),
('computer-5', '15.6 Inch Laptop', 209.00, './images/Computer 5.jpg', 'Dell', '15.6 Inch Laptop with Office 365, 4GB RAM, 128GB Storage Expandable 1TB, 5205U Processor, HD Display, Windows 11 Laptops Computer, Wi-Fi 5, BT4.2, Numpad, Type-C, for Business and Students.', 8),
('computer-6', 'Dell Optiplex 9020 Desktop Computer PC', 130.98, './images/Computer 6.jpg', 'Dell', 'Dell Optiplex 9020 Desktop Computer PC, Intel Quad-Core i5, 500GB HDD Storage, 8GB DDR3 RAM, Windows 10 Pro, DVD, WiFi, 20in Monitor, RGB Productivity Bundle (Renewed)', 8),
('computer-7', 'jumper Laptop', 1200.00, './images/Computer 7.jpg', 'jumper', 'jumper Laptop, 12GB RAM 640GB ROM, Office 365-1 Year 5305U Processor, 15.6 Inch Computer, FHD IPS Screen, 38Wh Battery, 2 Stereo Speakers, USB3.0 * 2, HDMI.', 8),
('computer-8', 'KAMRUI Mini PC Computer', 149.00, './images/Computer 8.jpg', 'KAMRUI', 'KAMRUI Mini PC Computer, Intel Processor N97 (up to 3.6 GHz), 16GB DDR4 RAM 256GB M.2 SSD, Mini Desktop Computer Support Dual 4K, WiFi, Bluetooth, Ethernet, HTPC for Business, Education, Home', 8);

-- Insert products for Electronics category
INSERT INTO products (product_id, name, price, image, brand, description, category_id) VALUES
('electronic-1', 'Surge Protector Power Strip', 9.00, './images/Electronic 1.jpg', 'Samsung', 'Surge Protector Power Strip - HANYCONY 8 Outlets 4 USB (2 USB C) Charging Ports, Multi Plug Outlet Extender, 5Ft Braided Extension Cord, Flat Plug Wall...', 9),
('electronic-2', 'JBL Tune 510BT', 39.00, './images/Electronic 2.jpg', 'JBL', 'JBL Tune 510BT - Bluetooth headphones with up to 40 hours battery, microphone for call, foldable and comfortable, Android and iOs compatible (White)', 9),
('electronic-3', 'JBL Go 3 Eco', 29.00, './images/Electronic 3.jpg', 'JBL', 'JBL Go 3 Eco - Portable Mini Bluetooth Speaker, big audio and punchy bass, IP67 waterproof and dustproof, 5 hours of playtime, Made in part with recycled materials (Eco Blue)', 9),
('electronic-4', 'JBL Vibe Beam', 49.00, './images/Electronic 4.jpg', 'JBL', 'JBL Tune 510BT - Bluetooth headphones with up to 40 hours battery, microphone for call, foldable and comfortable, Android and iOs compatible (White)', 9),
('electronic-5', 'Canon EOS', 479.00, './images/Electronic 5.webp', 'Canon', 'Canon EOS Rebel T7 DSLR Camera with 18-55mm Lens | Built-in Wi-Fi | 24.1 MP CMOS Sensor | DIGIC 4+ Image Processor and Full HD Videos', 9),
('electronic-6', 'Replacement Carburetor', 19.99, './images/Electronic 6.jpg', '', 'Replacement Carburetor for Echo PB-580 PB-580T PB-580H Backpack Blower, Replace A021004331 WTA-35, with Air Filter, Fuel Lines, Gaskets, Spark Plug', 9),
('electronic-7', 'LISEN Retractable Car Charger', 16.00, './images/Electronic 7.jpg', 'LISEN', 'LISEN Retractable Car Charger, 69W USB C Car Accessories Adapter for iPhone 16 USB C Charger Fast Charging, Honda Civic Accessories, Travel Essentials Gifts for Women Men, for iPhone 16 15 14 13 12', 9),
('electronic-8', 'Car Phone Holder for Magsafe', 26.98, './images/Electronic 8.jpg', 'ANDERY', 'Car Phone Holder for Magsafe [78+LBS Strongest Suction & 2400gf Strongest Magnetic] 360° Adjustable Car Phone Mount, Phone Holders for Your Car for iPhone 16 Pro Max 15 14 13 12 Plus (Carbon Fiber)', 9);