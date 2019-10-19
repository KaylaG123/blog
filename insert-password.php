<?php
include('db.php');

// connect debug
$mysqli = new mysqli($host, $username, $password);

// select debug
$mysqli->select_db('blog');

$email = 'kayla@something.ca';
$password = password_hash('111111', PASSWORD_BCRYPT);

$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

// run the query
$mysqli->query($sql);

 ?>
