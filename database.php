<?php

$host = '127.0.0.1';
$db   = 'imgur';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$link = mysqli_connect($host, $user, $pass, $db);

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


$salt = '6eUE%&UE%&Ue6ee56JUEe5&%f5zhhf5';

?>