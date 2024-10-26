<?php

$host = "localhost";
$dbname = "hugly_sign_up_db";
$username = "root";
$password = "";

$mysqli = new mysqli( $host, $username, $password, $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;