CREATE SCHEMA `cart` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE cart;

CREATE TABLE `cart`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` NVARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `cart`.`categories` (`name`) VALUES ('Books');
INSERT INTO `cart`.`categories` (`name`) VALUES ('Movies');
INSERT INTO `cart`.`categories` (`name`) VALUES ('Software');
INSERT INTO `cart`.`categories` (`name`) VALUES ('Hardware');
INSERT INTO `cart`.`categories` (`name`) VALUES ('Toys');
INSERT INTO `cart`.`categories` (`name`) VALUES ('Clothing');

CREATE TABLE `cart`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `username` NVARCHAR(50) NOT NULL COMMENT '',
  `password` NVARCHAR(50) NOT NULL COMMENT '',
  `cash` DECIMAL(10,0) NOT NULL DEFAULT 100 COMMENT '',
  `is_admin` BIT(0) NOT NULL DEFAULT 0 COMMENT '',
  `is_editor` BIT(0) NOT NULL DEFAULT 0 COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `username_UNIQUE` (`username` ASC)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `cart`.`users` (`id`, `username`, `password`, `is_admin`, `is_editor`) VALUES
(1, 'courage', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0),
(2, 'canko', '437599f1ea3514f8969f161a6606ce18', 0, 0);

CREATE TABLE `cart`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` NVARCHAR(255) NOT NULL COMMENT '',
  `description` TEXT NOT NULL COMMENT '',
  `price` DECIMAL(10,0) NOT NULL COMMENT '',
  `quantity` INT NOT NULL COMMENT '',
  `user_id` INT NULL COMMENT '',
  `category_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('1', 'Gloves', 'Adidas Winter Gloves', '20', '15', '1', '6');
INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('2', 'Pod Igoto', 'Pod Igoto by Ivan Vazov', '7', '45', '1', '1');
INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('3', 'Transformers Toys', 'Transformers Original Toys', '40', '7', '1', '5');
INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('4', 'ACER 5741G', 'Laptop Acer 5741G As good as new', '699', '3', '1', '4');
INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('5', 'Lenovo M5400', 'Lenovo M5400 Laptop with a few cosmetic defects', '799', '2', '1', '4');
INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('6', 'Windows 10 Enterprise Edition', 'Licensed Windows 10 Enterprise', '500', '40', '1', '3');
INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('7', 'AutoCAD', 'AutoCAD with License', '300', '20', '1', '3');
INSERT INTO `cart`.`products` (`id`, `name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('8', 'The hills have eyes', 'The hills have eyes BluRay 720p', '15', '30', '1', '2');
INSERT INTO `cart`.`products` (`name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('Titanic', 'Titanic DVD', '5', '60', '1', '2');
INSERT INTO `cart`.`products` (`name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('Pride & Prejudice', 'Pride & Prejudice BluRay 1080p', '20', '300', '1', '2');
INSERT INTO `cart`.`products` (`name`, `description`, `price`, `quantity`, user_id, category_id) VALUES ('MacBookPro 13', 'MacBookPro 13inch Intel i5 NVIDIA 760GTX', '2400', '3', '1', '4'); 

CREATE TABLE `cart`.`products_categories` (
  `product_id` INT NOT NULL COMMENT '',
  `category_id` INT NOT NULL COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `cart`.`products_categories` (`product_id`, `category_id`) VALUES
(1, 6),
(2, 1),
(3, 5),
(4, 4),
(5, 4),
(6, 3),
(7, 3),
(8, 2),
(9, 2),
(10, 2),
(11, 4);

CREATE TABLE `cart`.`promotions` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` NVARCHAR(255) NOT NULL COMMENT '',
  `product_id` INT NOT NULL COMMENT '',
  `percentage` DOUBLE NOT NULL COMMENT '',
  `end_date` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `cart`.`promotions` (`id`, `name`, `product_id`, `percentage`, `end_date`) VALUES ('1', 'Windows 10 Promo', '6', '10', '2015-10-31');
INSERT INTO `cart`.`promotions` (`id`, `name`, `product_id`, `percentage`, `end_date`) VALUES ('2', 'ACER 5741G', '4', '5', '2015-10-12');
INSERT INTO `cart`.`promotions` (`id`, `name`, `product_id`, `percentage`, `end_date`) VALUES ('3', 'AutoCAD', '7', '20', '2015-10-22');
INSERT INTO `cart`.`promotions` (`id`, `name`, `product_id`, `percentage`, `end_date`) VALUES ('4', 'Lenovo M5400', '5', '25', '2015-10-05');

CREATE TABLE `cart`.`reviews` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `message` TEXT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `product_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `cart`.`reviews` (`id`, `message`, `user_id`, `product_id`) VALUES ('1', 'After the truly wretched Windows 8 and marginally less wretched Windows 8.1, Windows 10 comes as a breath of fresh air. Windows 10 is much more usable than Wndows 8 or 8.1 and proudly offers a bundle of new features, including improved security, a new browser, and the voice-activated intelligent assistant Cortana. You might even call Windows 10 the most revolutionary version of Windows ever, mainly because it will be continually upgraded as part of Microsoft\'s Windows as a service effort.', '1', '6');
INSERT INTO `cart`.`reviews` (`id`, `message`, `user_id`, `product_id`) VALUES ('2', 'Autodesk, the creators of the world\'s leading CAD software, continues to enhance the world of design software with products like AutoCAD. Autodesk is a leader in 3D design, engineering and of course entertainment software. They released their first edition of AutoCAD software back in 1982, and have since grown to be the leading designer of professional CAD software in the world. Like previous versions, this version of AutoCAD includes a plethora of added features and updates to many of the previous design tools.', '1', '7');
INSERT INTO `cart`.`reviews` (`id`, `message`, `user_id`, `product_id`) VALUES ('3', 'A seventeen-year-old aristocrat falls in love with a kind, but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', '2', '9');
INSERT INTO `cart`.`reviews` (`id`, `message`, `user_id`, `product_id`) VALUES ('4', 'Sparks fly when spirited Elizabeth Bennet meets single, rich, and proud Mr. Darcy. But Mr. Darcy reluctantly finds himself falling in love with a woman beneath his class. Can each overcome their own pride and prejudice?', '2', '10');