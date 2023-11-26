<?php


$conn = new mysqli('localhost', 'root', '', 's-learning');

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

?>
