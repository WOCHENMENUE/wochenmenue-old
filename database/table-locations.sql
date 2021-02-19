CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(255) NOT NULL,
    location_city VARCHAR(255) NOT NULL,
    location_url MEDIUMTEXT,
    location_description MEDIUMTEXT,
    created_at DATE
)  ENGINE=INNODB;