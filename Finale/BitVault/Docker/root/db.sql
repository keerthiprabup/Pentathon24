-- Create a database
CREATE DATABASE IF NOT EXISTS api;

-- Create a user and grant privileges
CREATE USER 'user'@'localhost' IDENTIFIED BY 'user';
GRANT ALL PRIVILEGES ON api.* TO 'user'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'user'@'localhost' IDENTIFIED BY 'user' WITH GRANT OPTION;
FLUSH PRIVILEGES;

-- Create a table
USE api;
CREATE TABLE IF NOT EXISTS User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    invite_code VARCHAR(255) NOT NULL
);

-- Insert sample data
INSERT INTO User (email, invite_code) VALUES ('zues@yourmail.com', 'dlfd43lnw4nk4nkjl3k4jl3k4klkm34n3jl');
INSERT INTO User (email, invite_code) VALUES ('Hax_BitVault@yourmail.com', 'cc87e2770f312a9d8f340b23ba82c7c250fd47d70ca7b0f773c367d73d6379ea');
