<?php

//header('Content-type: text/html; charset=utf-8');

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "bank";
$dsn = "mysql:host=$host;dbname=$db_name";
$db = new PDO($dsn, $db_user, $db_password);
$db->query("SET NAMES 'utf-8'");

