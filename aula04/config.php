<?php

$dbname = "dao1_db";
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";

$pdo = new PDO("mysql:dbname=$dbname;host=", $dbuser, $dbpass);
?>