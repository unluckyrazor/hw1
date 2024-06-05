CREATE DATABASE sito;
USE sito;

CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT,
username varchar(255) UNIQUE NOT NULL,
password varchar(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE articles(
id INT AUTO_INCREMENT PRIMARY KEY,
article_title VARCHAR(255) NOT NULL UNIQUE ,
article_small VARCHAR(255),
article_author VARCHAR(255),
article_content TEXT,
article_custom_path VARCHAR(255),
article_date DATE

);
CREATE TABLE article_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT,
    image_path VARCHAR(255),
    FOREIGN KEY (article_id) REFERENCES articles(id)
);
				   
CREATE TABLE read_later (
    user_id INT NOT NULL,
    article_id INT NOT NULL,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, article_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE
) ENGINE = InnoDB;

INSERT INTO articles ( article_title, article_small, article_author, article_content, article_date) VALUES ( 'Altrimenti ci arrabbiamo',
'Negli ultimi anni i videogiochi difficili sono diventati mainstream', 'Alfio Rapisarda', 'le persone vogliono sentirsi forti', '2024-05-25');

INSERT INTO articles ( article_title, article_small, article_author, article_content, article_date) VALUES ( 'Kizaru sta bluffando?',
'Sappiamo che un giorno OnePiece finirà... forse', 'Simone Spasentino', 'prova di contasncoaenuto text', '2024-05-30');

INSERT INTO articles ( article_title, article_small, article_author, article_content, article_date) VALUES ( 'Storie dal Decennio Perduto',
'Come i videogiochi hanno raccontato la crisi psicologica di una nazione', 'Diego De Angelis', 'Baburu keiki (バブル景気) è una parola giapponese che significa bolla economica.
Nel corso degli anni ‘80 il Giappone aveva invaso i mercati con i dispositivi elettronici e le automobili: 
Mitsubishi, NEC, Sony e Fujitsu sono solo alcuni dei tanti marchi che si accaparrano una fetta del mercato.
Gli abitanti del primo mondo avevano nelle proprie case videoregistratori giapponesi, radioline giapponesi e 
automobili giapponesi. Presto sarebbe successo anche con le console e i videogiochi.', '2024-05-30');

INSERT INTO articles ( article_title, article_small, article_author, article_content, article_date) VALUES ( 'Bill Clinton ed Elden Ring',
'Come l''ex-Presidente ha salvato i videogiochi open-world', 'Fabio Catanese', 'bo il piu forte cmq', '2024-05-30');

INSERT INTO articles ( article_title, article_small, article_author, article_content, article_date) VALUES ( 'Wise stickman vs procrastination monkey',
'meglio un uovo oggi che una gallina domani', 'Simone Spasentino', 'tim urban e simpatico', '2024-05-30');

INSERT INTO articles ( article_title, article_small, article_author, article_content, article_date) VALUES ( 'Articoli in piu ',
'a che servono gli articoli?', 'Ennio Guelfo', 'tanto nessuno legge piu ormai', '2024-05-30');







INSERT INTO article_images (article_id, image_path) VALUES('2','imgs/mario.png') ;
INSERT INTO article_images (article_id, image_path) VALUES('4','imgs/bill.jpeg') ;
INSERT INTO article_images (article_id, image_path) VALUES('5','imgs/college.png') ;
INSERT INTO article_images (article_id, image_path) VALUES('1','imgs/rabbia.jpeg') ;
INSERT INTO article_images (article_id, image_path) VALUES('6','imgs/this_is_fine.jpeg') ;
INSERT INTO article_images (article_id, image_path) VALUES('3','imgs/jp.webp') ;




