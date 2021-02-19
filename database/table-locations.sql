CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(255) NOT NULL,
    location_city VARCHAR(255) NOT NULL,
    location_url MEDIUMTEXT,
    location_description MEDIUMTEXT,
    location_contact_name VARCHAR(255),
    location_contact_mail MEDIUMTEXT,
    created_at DATE
)  ENGINE=INNODB;