USE mac250db;

DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS froms;
DROP TABLE IF EXISTS posts;

CREATE TABLE users (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(50),
		password TEXT,
		created DATETIME,
		modified DATETIME
);

CREATE TABLE reviews (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		user_id INT UNSIGNED,
		title TEXT,
		body TEXT,
		rating INT UNSIGNED,
		media TEXT,
		created DATETIME,
		modified DATETIME
);

CREATE TABLE messages (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,	
		user_id INT UNSIGNED,
		from_id INT UNSIGNED,
		title TEXT,
		body TEXT,
		created DATETIME,
		modified DATETIME
);

CREATE TABLE comments (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		user_id INT UNSIGNED,
		review_id INT UNSIGNED,
		body TEXT,
		created DATETIME,
		modified DATETIME
);

CREATE TABLE froms (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(50),
		password TEXT,
		created DATETIME,
		modified DATETIME
);

CREATE TABLE posts (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT UNSIGNED,
	title VARCHAR(50),
	body TEXT,
	created DATETIME,
	modified DATETIME
);
		
SHOW TABLES;

DESCRIBE users;
DESCRIBE reviews;
DESCRIBE messages;
DESCRIBE froms;
DESCRIBE posts;

TRUNCATE posts;
TRUNCATE users;
TRUNCATE reviews;
TRUNCATE messages;
TRUNCATE froms;