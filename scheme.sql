DROP DATABASE IF EXISTS shop;
CREATE DATABASE shop;
USE shop;

CREATE TABLE products (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `Name` varchar(20),
    `Price` decimal,
    `Quality` ENUM ('Good','Average','Bad'),
    `Details` varchar(40),
    PRIMARY KEY (`id`)
);
INSERT INTO products (`Name`, `Price`, `Quality`, `Details`) VALUES 
    ('Iphone X', 1008, 'Good', 'This Phone is very good'),
    ('Samsung Galaxy S9', 950, 'Good', 'This Phone is very very good'),
    ('LG G4', 500, 'Average', 'This Phone is very mediocre'),
    ('Nokia 3310', 50, 'Bad', 'This Phone is very indestructible'),
    ('Sony Xperia arc', 200, 'Average', 'I ran out of Ideas :/');

CREATE TABLE orders (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `ProductId` int NOT NULL,
    `Name` varchar(20),
    `Price` decimal,
    `Quantity` int, 
    PRIMARY KEY (`id`)
    -- FOREIGN KEY (`ProductId`) REFERENCES products(`id`)
);
INSERT INTO orders (`ProductId`, `Name`, `Price`, `Quantity`) VALUES 
    (1, 'Jonas Jonaitis', 2000, 2),
    (2, 'Petras', 950, 1),
    (3, 'Antatnas', 2500, 5),
    (4, 'Ona', 100, 2),
    (5, 'Petras', 800, 4);
