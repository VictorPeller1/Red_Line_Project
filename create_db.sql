CREATE DATABASE yokami;
USE yokami;

CREATE TABLE category (
   id_category INT,
   category_name VARCHAR(100),
   PRIMARY KEY(id_category)
);

CREATE TABLE validation (
   id_validation INT,
   validation_state BOOLEAN DEFAULT false,
   validation_date  DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id_validation)
);

CREATE TABLE someone (
   id_someone INT AUTO_INCREMENT,
   someone_name VARCHAR(100),
   someone_email VARCHAR(100),
   someone_pwd VARCHAR(100),
   someone_date_creation_account DATETIME DEFAULT CURRENT_TIMESTAMP,
   someone_role VARCHAR(100),
   PRIMARY KEY(id_someone)
);

CREATE TABLE article (
   id_article INT AUTO_INCREMENT,
   article_title VARCHAR(100),
   article_content VARCHAR(500),
   article_date DATETIME DEFAULT CURRENT_TIMESTAMP,
   article_img VARCHAR(500),
   id_validation INT DEFAULT 1,
   id_category INT, 
   id_someone INT, 
   PRIMARY KEY(id_article),
   FOREIGN KEY(id_validation) REFERENCES validation(id_validation),
   FOREIGN KEY(id_category) REFERENCES category(id_category),
   FOREIGN KEY(id_someone) REFERENCES someone(id_someone)
);

CREATE TABLE link (
   id_link INT AUTO_INCREMENT,
   article_source VARCHAR(50),
   article_target VARCHAR(50),
   id_article INT NOT NULL,
   PRIMARY KEY(id_link),
   FOREIGN KEY(id_article) REFERENCES article(id_article)
);

CREATE TABLE feedback (
   id_feedback INT AUTO_INCREMENT,
   feedback_content VARCHAR(50),
   feedback_date_written DATETIME,
   feedback_name VARCHAR(50),
   id_someone INT NOT NULL,
   id_article INT NOT NULL,
   PRIMARY KEY(id_feedback),
   FOREIGN KEY(id_someone) REFERENCES someone(id_someone),
   FOREIGN KEY(id_article) REFERENCES article(id_article)
);

