CREATE DATABASE yokami;
USE yokami;

CREATE TABLE category (
   Id_category INT AUTO_INCREMENT,
   category_name VARCHAR(50),
   PRIMARY KEY(Id_category)
);

CREATE TABLE Validation (
   Id_Validation INT AUTO_INCREMENT,
   validation_state VARCHAR(50),
   validation_date VARCHAR(50),
   PRIMARY KEY(Id_Validation)
);

CREATE TABLE someone (
   Id_someone INT AUTO_INCREMENT,
   someone_name VARCHAR(50),
   someone_email VARCHAR(50),
   someone_pwd VARCHAR(50),
   someone_date_creation_account DATETIME DEFAULT CURRENT_TIMESTAMP,
   someone_role VARCHAR(50),
   PRIMARY KEY(Id_someone)
);

CREATE TABLE article (
   Id_article INT AUTO_INCREMENT,
   article_title VARCHAR(50),
   article_content VARCHAR(500),
   article_date DATE,
   article_img VARCHAR(200),
   Id_Validation INT NOT NULL,
   Id_category INT NOT NULL,
   Id_someone INT NOT NULL,
   PRIMARY KEY(Id_article),
   FOREIGN KEY(Id_Validation) REFERENCES Validation(Id_Validation),
   FOREIGN KEY(Id_category) REFERENCES category(Id_category),
   FOREIGN KEY(Id_someone) REFERENCES someone(Id_someone)
);

CREATE TABLE link (
   Id_link INT AUTO_INCREMENT,
   article_source VARCHAR(50),
   article_target VARCHAR(50),
   Id_article INT NOT NULL,
   PRIMARY KEY(Id_link),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article)
);

CREATE TABLE feedback (
   Id_feedback INT AUTO_INCREMENT,
   feedback_content VARCHAR(50),
   feedback_date_written DATETIME,
   feedback_name VARCHAR(50),
   Id_someone INT NOT NULL,
   Id_article INT NOT NULL,
   PRIMARY KEY(Id_feedback),
   FOREIGN KEY(Id_someone) REFERENCES someone(Id_someone),
   FOREIGN KEY(Id_article) REFERENCES article(Id_article)
);
