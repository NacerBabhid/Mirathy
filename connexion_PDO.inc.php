<?php
function connectMyDB(){
    $host = 'localhost';
    $database = 'myirth';
    $username = 'root';
    $password = '';
    try {
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($dsn, $username, $password, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Handle any errors that occurred during the connection
        die("Connection failed: " . $e->getMessage());
    }
}
?>