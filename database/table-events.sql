CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_title VARCHAR(255) NOT NULL,
    event_tags VARCHAR(255) COMMENT 'comma-separated; links to tags table',
    event_date DATE NOT NULL,
    event_time TIME NOT NULL,
    event_description TEXT,
    event_url MEDIUMTEXT,
    location_name VARCHAR(255) NOT NULL,
    location_city VARCHAR(255) NOT NULL,
    location_description MEDIUMTEXT,
    sender_name VARCHAR(255) NOT NULL,
    sender_mail MEDIUMTEXT NOT NULL,
    sender_comments MEDIUMTEXT,
    created_at DATE,
    due_date TIMESTAMP
)  ENGINE=INNODB;