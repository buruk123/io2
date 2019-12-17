<?php

require_once "connect.php";
session_start();

$sql = "INSERT INTO sklep.artykuly VALUES(NULL, '{$_POST['myeditor11']}', '{$_SESSION['id']}')";
$stmt = $db->prepare($sql);
$query = $stmt->execute();
header("Location: panel_moderatora.php");