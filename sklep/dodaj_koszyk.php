<?php

require_once "connect.php";
session_start();

$sql = "INSERT INTO sklep.koszyk VALUES ('{$_SESSION['id']}', '{$_GET['id']}', {$_GET['ilosc']})";
$stmt = $db->prepare($sql);
$stmt->execute();
header("Location: koszyk.php");