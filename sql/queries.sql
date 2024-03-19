CREATE DATABASE blog_php;

CREATE TABLE post(
    post_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    url_key VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NULL,
    content TEXT DEFAULT NULL,
    description VARCHAR(255) DEFAULT NULL,
    published_date DATETIME NOT NULL,
    PRIMARY KEY (post_id),
    UNIQUE KEY url_key (url_key)
)ENGINE=InnoDB;

INSERT INTO post (title, url_key, content, description, published_date) VALUES ('First post', 'hello-world','Contrary to popular 1','My 1 blog post','2020-12-05 12:00:00');
INSERT INTO post (title, url_key, content, description, published_date) VALUES ('Second post', 'second-hello-world','Contrary to popular 2','My 2 blog post','2021-01-11 11:00:00');
INSERT INTO post (title, url_key, content, description, published_date) VALUES ('Third post', 'third-hello-world','Contrary to popular 3','My 3 blog post','2019-10-04 10:00:00');

SELECT * FROM post;

UPDATE post SET image_path = 'public/images'

UPDATE post SET image_path = 'public/images/christmas.png' WHERE post_id = 6;
UPDATE post SET image_path = 'public/images/christmas.png' WHERE post_id = 5;

