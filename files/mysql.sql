DROP DATABASE codeigniterprep;
CREATE DATABASE codeigniterprep;
use codeigniterprep;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    phone VARCHAR(20),
    email VARCHAR(100),
    password VARCHAR(50)
);

INSERT INTO users values(null,'admin','admin','','admin@admin.com','admin');
INSERT INTO users values(null,'Rakoto','Koto','0332300433','koto@gmail.com','koto');