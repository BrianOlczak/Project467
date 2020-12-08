DROP DATABASE z1808886;

CREATE DATABASE z1808886;

USE z1808886;

CREATE TABLE SalesAssociate (
	sales_id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	address VARCHAR(50),
	comm_per DECIMAL(5,2),
	username VARCHAR(50),
	password VARCHAR(50),
	primary key (sales_id)
);

CREATE TABLE PurchaseOrder (
	order_id INT NOT NULL AUTO_INCREMENT,
	customer_id INT NOT NULL,
	item VARCHAR(50) NOT NULL,
	order_amt DECIMAL(8,2) NOT NULL,
	discount DECIMAL(5,2),
	sales_id INT NOT NULL,
	comm_amt DECIMAL(8,2),
	is_approved BOOLEAN DEFAULT 0,
	secret_note VARCHAR(100),
	primary key (order_id)
);

INSERT INTO `salesassociate`(`name`, `address`, `comm_per`, `username`, `password`) VALUES ("Joe", "221 ABC Avenue", 12.0, "joe", "password12");