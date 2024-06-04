CREATE DATABASE sito;

USE sito;

CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT,
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE = InnoDB;
-- devo metere unique
INSERT INTO users (username, password) VALUES('utente0', 'test');

CREATE TABLE articles(
id INT AUTO_INCREMENT PRIMARY KEY,
article_title VARCHAR(255) NOT NULL UNIQUE ,
article_small VARCHAR(255),
article_author VARCHAR(255),
article_content TEXT,
article_path VARCHAR(255),
article_date DATE

-- tag platform e immagini altre tables pero tag e platform per ora non li implemento e autore

);
CREATE TABLE article_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT,
    image_path VARCHAR(255),
    FOREIGN KEY (article_id) REFERENCES articles(id)
);


INSERT INTO articles ( article_title, article_small, article_author, article_content, article_date) VALUES ( 'Altrimenti ci arrabbiamo',
'Negli ultimi anni i videogiochi difficili sono diventati mainstream', 'Alfio Rapisarda', 'prova di contenuto text', '2024-05-25');
INSERT INTO article_images (article_id, image_path) VALUES('8','imgs/rabbia.jpeg') ;



CREATE TABLE read_later (
    user_id INT NOT NULL,
    article_id INT NOT NULL,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, article_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE
) ENGINE = InnoDB;

SELECT * FROM read_later
