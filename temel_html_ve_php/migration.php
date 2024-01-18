<?php

$host = "localhost";
$dbname = "laravel";
$user = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statements = [
        'CREATE TABLE departments (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL
        );',
        'CREATE TABLE users( 
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(100) NOT NULL, 
            last_name VARCHAR(100) NOT NULL,
            address VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            email VARCHAR(255) NOT NULL,
            date_of_birth DATE NOT NULL,
            department_id INT UNSIGNED NOT NULL,
            FOREIGN KEY (department_id) REFERENCES departments(id)
        );',
        'CREATE INDEX idx_department_id
        ON users (department_id);'
    ];

    $insertDatas=[
        'departments'=>'
        INSERT INTO departments (name) 
        VALUES ("Finance"),("Human Resources"),("Marketing"),("Information Technology"),("Sales"),("Research"),("Customer");
        ',
        'users'=>'
         INSERT INTO users (first_name, last_name, address,phone,email,date_of_birth,department_id ) 
         VALUES 
        ("John", "Smith", "123 Main St", "(555) 123-4567", "john.smith@email.com", "1980-05-15", 1),
        ("Emily", "Johnson", "456 Oak St", "(555) 234-5678", "emily.johnson@email.com", "1992-09-22", 2),
        ("Michael", "Williams", "789 Pine St", "(555) 345-6789", "michael.williams@email.com", "1985-12-10", 3),
        ("Amanda", "Brown", "321 Elm St", "(555) 456-7890", "amanda.brown@email.com", "1988-07-18", 4),
        ("David", "Jones", "567 Maple St", "(555) 567-8901", "david.jones@email.com", "1990-03-25", 2),
        ("Sarah", "Miller", "135 Birch Ln", "(555) 678-9012", "sarah.miller@email.com", "1983-08-28", 5),
        ("Daniel", "Taylor", "876 Cedar St", "(555) 789-0123", "daniel.taylor@email.com", "1994-11-14", 6),
        ("Jessica", "Anderson", "543 Pine Ave", "(555) 890-1234", "jessica.anderson@email.com", "1987-04-30", 7),
        ("Brian", "White", "987 Oak Ave", "(555) 901-2345", "brian.white@email.com", "1996-06-08", 3),
        ("Megan", "Clark", "654 Elm Ave", "(555) 012-3456", "megan.clark@email.com", "1982-02-17", 2),
        ("Christopher", "Moore", "321 Maple Ave", "(555) 234-5678", "christopher.moore@email.com", "1998-09-03", 1),
        ("Laura", "Taylor", "789 Cedar Ave", "(555) 345-6789", "laura.taylor@email.com", "1991-12-22", 3),
        ("Kevin", "Davis", "456 Birch Ave", "(555) 456-7890", "kevin.davis@email.com", "1989-05-07", 7),
        ("Rachel", "Martin", "123 Pine Ln", "(555) 567-8901", "rachel.martin@email.com", "1995-07-11", 5),
        ("Jonathan", "Hill", "876 Elm Ln", "(555) 678-9012", "jonathan.hill@email.com", "1984-01-19", 4);
        '
    ];

    foreach ($statements as $statement) {
        $conn->exec($statement);
    }

    foreach ($insertDatas as $item) {
        $conn->exec($item);
    }



} catch (PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
    die();
}

$conn = null;
?>
