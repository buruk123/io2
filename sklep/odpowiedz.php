<?php

require_once "connect.php";

$sql = "DELETE FROM sklep.wiadomosci WHERE email = '{$_POST['email']}'";
$stmt = $db->prepare($sql);
$query = $stmt->execute();
header("Location: panel_administratora.php");