CREATE TABLE users(
    id int NOT NULL,
    name varchar(255) NOT NULL,
    email varchar(255),
    passcord varchar(100),
    UNIQUE (id,email)
);
