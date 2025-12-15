<?php
$dsn = "mysql:host=localhost;dbname=hospitaldb;charset=utf8mb4";
$dbusername = 'root';
$dbpassword = '';

try {

    $pdo = new PDO ($dsn, $dbusername, $dbpassword); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    # PDO stands for PHP Data object its way to connect to database  (  turn connection into an object )
    echo "Connected successfully";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}