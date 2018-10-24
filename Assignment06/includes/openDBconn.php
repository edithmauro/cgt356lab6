<?php
$servername = "localhost";
$username = "emauro";
$password = "Converse<3";
$dbname = "Goblins";


$conn = new mysqli($servername, $username, $password, $dbname); /*variable for connection: host, username, passowrd, database name, port, socket*/

if ($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

?>