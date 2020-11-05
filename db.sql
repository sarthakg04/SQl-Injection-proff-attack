CREATE TABLE users (
id             INT NOT NULL AUTO_INCREMENT,
firstname      VARCHAR(20) NOT NULL,  
lastname       VARCHAR(20) NOT NULL,
username       VARCHAR(20),
email          VARCHAR(30),
password       VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
);