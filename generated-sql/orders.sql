
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- orders
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `delivery_address` VARCHAR(255) NOT NULL,
    `billing_address` VARCHAR(255) NOT NULL,
    `expected_delivery` DATE NOT NULL,
    `customer_id` INTEGER NOT NULL,
    `order_items` INTEGER NOT NULL,
    `is_delayed` INTEGER DEFAULT 0 NOT NULL,
    `status` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `orders_fi_b94313` (`customer_id`),
    CONSTRAINT `orders_fk_b94313`
        FOREIGN KEY (`customer_id`)
        REFERENCES `customers` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- customers
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(128) NOT NULL,
    `last_name` VARCHAR(128) NOT NULL,
    `email` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- items
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
