<?php
require_once 'connect.php';

$pdo = new \PDO(DSN,USER,PASS);
$query = "CREATE TABLE IF NOT EXISTS story (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(255), content TEXT, author VARCHAR(100))";
$query.= "INSERT";

$statement = $pdo->exec($query);

var_dump($statement);