<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db = 'blogcms';
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
