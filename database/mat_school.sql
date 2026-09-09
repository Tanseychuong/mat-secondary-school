-- =========================================================
-- Mat Secondary School Website - Database Schema
-- =========================================================
-- Import this file into your MySQL server (e.g. via phpMyAdmin
-- or the `mysql` CLI) to create the database, tables, and
-- some initial sample data.
-- =========================================================

CREATE DATABASE IF NOT EXISTS mat_secondary_school
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE mat_secondary_school;

-- ---------------------------------------------------------
-- Table: news
-- Stores school news and events, displayed on news.php and
-- previewed on the homepage.
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS news (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    title      VARCHAR(255) NOT NULL,
    content    TEXT NOT NULL,
    event_date DATE NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------
-- Table: enquiries
-- Stores messages submitted through the contact form.
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS enquiries (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(150) NOT NULL,
    email      VARCHAR(150) NOT NULL,
    subject    VARCHAR(255) NOT NULL,
    message    TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------
-- Sample data: news
-- ---------------------------------------------------------
INSERT INTO news (title, content, event_date) VALUES
('Welcome Back to the New Term',
 'We are excited to welcome all students back for the new academic term. Classes begin promptly on Monday, and all students should ensure they have their full set of textbooks and materials ready.',
 CURDATE() - INTERVAL 2 DAY),
('Inter-House Sports Competition',
 'This year''s inter-house sports competition will be held at the school field. Students are encouraged to register with their house captains for track and field events.',
 CURDATE() + INTERVAL 10 DAY),
('Parent-Teacher Conference',
 'Parents and guardians are invited to attend the upcoming parent-teacher conference to discuss student progress. Please check with your child''s form teacher for the scheduled time slot.',
 CURDATE() + INTERVAL 20 DAY),
('Science Fair Announcement',
 'The annual science fair will showcase student projects from all academic departments. Students interested in participating should register with the Science Department by the end of the month.',
 CURDATE() + INTERVAL 30 DAY);

-- ---------------------------------------------------------
-- Sample data: enquiries
-- ---------------------------------------------------------
INSERT INTO enquiries (name, email, subject, message, created_at) VALUES
('Ama Owusu', 'ama.owusu@example.com', 'Admission Enquiry',
 'Good day, I would like to know the admission requirements for Form 1 for the next academic year. Thank you.',
 NOW() - INTERVAL 3 DAY),
('Kwame Mensah', 'kwame.mensah@example.com', 'School Fees',
 'Hello, could you please send me information on the school fees structure and payment deadlines?',
 NOW() - INTERVAL 1 DAY);
