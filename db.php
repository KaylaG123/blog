<?php



// connect to db
$host = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'blog';

// new mysqli object / connect to debug
$mysqli = new mysqli($host, $username, $password);

// connect database
$mysqli->select_db($dbname);

// check for errors
if($mysqli->error) {
    echo $mysqli->error;
    die;
}

 ?>
