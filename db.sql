CREATE TABLE categories (id int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY, category varchar(64));
CREATE TABLE questions (id int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY, question TEXT, category int);
CREATE TABLE comments (id int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY, comment TEXT, question int);


INSERT INTO categories (category) VALUES ("Calculus");
INSERT INTO categories (category) VALUES ("Physics");
INSERT INTO categories (category) VALUES ("Chemistry");