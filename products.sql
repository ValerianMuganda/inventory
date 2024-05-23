CREATE TABLE products(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    description VARCHAR(100)NOT NULL,
    user_id INT NOT NULL,
    UNIQUE(name),
    FOREIGN KEY (user_id) REFERENCES users(id);
    
)
