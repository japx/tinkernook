<?php

// create a database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'pdotest';

// Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $database;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// $status = 'admin';

// $sql = 'SELECT * FROM users WHERE status = :status';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['status' => $status]);
// $users = $stmt->fetchAll();

// foreach($users as $user){ 
//   echo $user['name'] . '<br>';
// }

$name = 'John Doe';
$email = 'test@test.com';
$status = 'admin';

$sql = 'INSERT INTO users(name, email, status) VALUES(:name, :email, :status)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name, 'email' => $email, 'status' => $status]);
echo 'User Added';


echo "this is a test";