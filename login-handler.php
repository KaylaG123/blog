<?php

// validation
if(empty($_POST['email']) || empty($_POST['password'])) {
    echo 'Please fill out the form';
    die;
}

// assign data to variables
$email = $_POST['email'];
$password = $_POST['password'];

// connect to db and select
$mysqli = new mysqli('localhost', 'root', 'root');
$mysqli->select_db('blog');

$sql = "SELECT * FROM users WHERE email= '$email' LIMIT 1";

$result = $mysqli->query($sql);

$row = $result->fetch_assoc();

if(password_verify($password, $row['password'])) {

    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $row['password'];

    header('Location: admin.php');
} else {
    header('Location: index.php?failed=1');
}

 ?>
