<?php
require_once "connect.php";

$sql = "SELECT id FROM użytkownicy LEFT JOIN administratorzy_login al on użytkownicy.email = al.email WHERE użytkownicy.email = al.email ORDER BY RAND() LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute();
if($data = $stmt->fetch()) {
    $date = date('Y-m-d');
    $sql2 = "INSERT INTO sklep.wiadomosci VALUES (NULL, '{$data['id']}', '{$_POST['email']}',  '{$_POST['wiadomosc']}', '$date')";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute();
}

header("Location: kontakt.php");
