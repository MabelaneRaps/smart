
<?php

$servername = "localhost";
$username ="root";
$password = "";
$database_name = "users";

//database connection
$conn = new mysqli($servername,$username,$password,$database_name);

//check connection
if ($conn -> connect_error) {
die("Connection Failed : " . $conn->connect_error);

}