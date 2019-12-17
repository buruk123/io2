<?php

require_once "connect.php";

print_r($_POST['email']);

$sql = "DELETE FROM sklep.moderatorzy_login WHERE email = '{$_POST['email']}'";
$stmt = $db->prepare($sql);
$query = $stmt->execute();
header("Location: panel_administratora.php");
