CREATE TABLE IF NOT EXISTS `products` (
    `product_id` int(11) NOT NULL AUTO_INCREMENT,
    `product_name` varchar(100) NOT NULL,
    `product_description` varchar(255) NOT NULL,
    `product_image1` varchar(255) NOT NULL,
    `product_image2` varchar(255) NOT NULL,
    `product_image3` varchar(255) NOT NULL,
    `product_image4` varchar(255) NOT NULL,
    `product_price` decimal(6, 2) NOT NULL,
    `product_special_offer` integer(2) NOT NULL,
    `product_color` varchar(100) NOT NULL,
    `product_brand` varchar(100) NOT NULL,
    `product_category` varchar(100) NOT NULL,
    PRIMARY KEY(`product_id`)
)

CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `user_name` varchar(100) NOT NULL,
    `user_email` varchar(100) NOT NULL,
    `user_password` varchar(100) NOT NULL,
    PRIMARY KEY(`user_id`),
    UNIQUE KEY `UX_Constraint` (`user_email`)
)

CREATE TABLE IF NOT EXISTS cart (
    item_id int(11) NOT NULL AUTO_INCREMENT,
    user_id int(11),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    product_id int(11) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    product_quantity int(11) NOT NULL,
    product_name varchar(100) NOT NULL,
    product_image1 varchar(255) NOT NULL,
    product_price decimal(6, 2) NOT NULL,
    PRIMARY KEY(item_id)
);

CREATE TABLE IF NOT EXISTS orders (
    order_id varchar(255) NOT NULL,
    user_id int(11),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    order_date DATE NOT NULL,
    order_total decimal(11,2) NOT NULL,
    PRIMARY KEY(order_id)
);

CREATE TABLE IF NOT EXISTS order_items (
    order_id varchar(255) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    user_id int(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    product_id int(11) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    product_quantity int(11) NOT NULL,
    product_name varchar(100) NOT NULL,
    product_image1 varchar(255) NOT NULL,
    product_price decimal(6, 2) NOT NULL
);




CREATE TABLE IF NOT EXISTS 'products' (
    'product_id' int(11) NOT NULL AUTO_INCREMENT,
    'product_name' varchar(100) NOT NULL,
    'product_description' varchar(255) NOT NULL,
    'product_image1' varchar(255) NOT NULL,
    'product_image2' varchar(255) NOT NULL,
    'product_image3' varchar(255) NOT NULL,
    'product_image4' varchar(255) NOT NULL,
    'product_price' decimal(6, 2) NOT NULL,
    'product_special_offer' integer(2) NOT NULL,
    'product_color' varchar(100) NOT NULL,
    PRIMARY KEY('product_id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'orders' (
    'order_id' int(11) NOT NULL AUTO_INCREMENT,
    'order_cost' decimal(6, 2) NOT NULL,
    'order_status' varchar(255) NOT NULL DEFAULT "on_hold",
    'user_id' int(11) NOT NULL,
    'user_phone' int(11) NOT NULL,
    'user_city' varchar(255) NOT NULL,
    'user_address' varchar(255) NOT NULL,
    'order_date' DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY('order_id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'order_items' (
    'item_id' int(11) NOT NULL AUTO_INCREMENT,
    'order_id' int(11) NOT NULL,
    'product_id' int(11) NOT NULL,
    'product_name' varchar(100) NOT NULL,
    'product_image' varchar(255) NOT NULL,
    'user_id' int(11) NOT NULL,
    'order_date' DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY('item_id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS 'users' (
    'user_id' int(11) NOT NULL AUTO_INCREMENT,
    'user_name' varchar(100) NOT NULL,
    'user_email' varchar(100) NOT NULL,
    'user_password' varchar(100) NOT NULL,
    PRIMARY KEY('user_id'),
    UNIQUE KEY 'UX_Constraint' ('user_email')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE IF NOT EXISTS products (
    product_id int(11) NOT NULL AUTO_INCREMENT,
    product_name varchar(100) NOT NULL,
    product_description varchar(255) NOT NULL,
    product_image1 varchar(255) NOT NULL,
    product_image2 varchar(255) NOT NULL,
    product_image3 varchar(255) NOT NULL,
    product_image4 varchar(255) NOT NULL,
    product_price decimal(6, 2) NOT NULL,
    product_special_offer integer(2) NOT NULL,
    product_color varchar(100) NOT NULL,
    PRIMARY KEY(product_id)
)

CREATE TABLE IF NOT EXISTS orders (
    order_id int(11) NOT NULL AUTO_INCREMENT,
    order_cost decimal(6, 2) NOT NULL,
    order_status varchar(255) NOT NULL DEFAULT "on_hold",
    user_id int(11) NOT NULL,
    user_phone int(11) NOT NULL,
    user_city varchar(255) NOT NULL,
    user_address varchar(255) NOT NULL,
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(order_id)
)

CREATE TABLE IF NOT EXISTS order_items (
    item_id int(11) NOT NULL AUTO_INCREMENT,
    order_id int(11) NOT NULL,
    product_id int(11) NOT NULL,
    product_name varchar(100) NOT NULL,
    product_image varchar(255) NOT NULL,
    user_id int(11) NOT NULL,
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(item_id)
)

CREATE TABLE IF NOT EXISTS users (
    user_id int(11) NOT NULL AUTO_INCREMENT,
    user_name varchar(100) NOT NULL,
    user_email varchar(100) NOT NULL,
    user_password varchar(100) NOT NULL,
    PRIMARY KEY(user_id),
    UNIQUE KEY UX_Constraint (user_email)
)


INSERT INTO products(product_name, product_description, 
product_image1, product_image2, product_image3, product_image4, 
product_price, product_special_offer, product_color, product_brand, product_category)
VALUES('Puma shoes', 'Perfect shoes for casual outings',
'pumashoes.jpg', 'pumashoes2.jpg', 'pumashoes3.jpg', 'pumashoes4.jpg',
59.99, 15, 'white', 'puma', 'shoes');

INSERT INTO products(product_name, product_description, 
product_image1, product_image2, product_image3, product_image4, 
product_price, product_special_offer, product_color, product_brand, product_category)
VALUES('Nike shoes', 'Comfortable running shoes',
'nikeshoes.jpg', 'nikeshoes2.jpg', 'nikeshoes3.jpg', 'nikeshoes4.jpg',
87.99, 10, 'white', 'nike', 'shoes');

INSERT INTO products(product_name, product_description, 
product_image1, product_image2, product_image3, product_image4, 
product_price, product_special_offer, product_color, product_brand, product_category)
VALUES('Adidas shoes', 'Work out with these training shoes',
'adidasshoes.jpg', 'adidasshoes2.jpg', 'adidasshoes3.jpg', 'adidasshoes4.jpg',
74.99, 0, 'black', 'adidas', 'shoes');

INSERT INTO products(product_name, product_description, 
product_image1, product_image2, product_image3, product_image4, 
product_price, product_special_offer, product_color, product_brand, product_category)
VALUES('Puma turf sneakers', 'Never slip on turf with these turf sneakers',
'puma2shoes.jpg', 'puma2shoes2.jpg', 'puma2shoes3.jpg', 'puma2shoes4.jpg',
39.99, 0, 'red', 'puma', 'shoes');

INSERT INTO products(product_name, product_description, 
product_image1, product_image2, product_image3, product_image4, 
product_price, product_special_offer, product_color, product_brand, product_category)
VALUES('Nike basketball shoes', 'Fly high with these basketball shoes',
'nike2shoes.jpg', 'nike2shoes2.jpg', 'nike2shoes3.jpg', 'nike2shoes4.jpg',
169.99, 20, 'blue', 'nike', 'shoes');

INSERT INTO products(product_name, product_description, 
product_image1, product_image2, product_image3, product_image4, 
product_price, product_special_offer, product_color, product_brand, product_category)
VALUES("Adidas Men's Workout Shirt", 'Breathe easy in this shirt',
'adidas3shirt.jpg', 'adidas3hirt2.jpg', 'adidas3shirt3.jpg', 'adidas3shirt4.jpg',
31.29, 0, 'orange', 'adidas', 'shirts');

update products
set product_image2="adidas2shirt2.jpg"
where product_image1 = 'adidas2shirt.jpg';


INSERT INTO products(product_name, product_description, 
product_image1, product_image2, product_image3, product_image4, 
product_price, product_special_offer, product_color, product_brand, product_category)
VALUES("Adidas Joggers", 'Dress casual with these Adidas joggers',
'adidasshorts.jpg', 'adidasshorts2.jpg', 'adidasshorts3.jpg', 'adidasshorts4.jpg',
45.99, 0, 'black', 'adidas', 'shorts');