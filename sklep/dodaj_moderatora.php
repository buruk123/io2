<?php

require_once "connect.php";

$id = $_POST['userId'];
$sql = "SELECT użytkownicy_login.email, użytkownicy_login.haslo FROM użytkownicy_login INNER JOIN użytkownicy ul on użytkownicy_login.email = ul.email WHERE ul.id = '$id'";
$stmt = $db->prepare($sql);
$query = $stmt->execute();

if($data = $stmt->fetch()) {
    $sql = "INSERT INTO moderatorzy_login VALUES ('{$data['email']}', '{$data['haslo']}')";
    $sql2 = "DELETE FROM użytkownicy_login WHERE email = '{$data['email']}'";
    $stmt = $db->prepare($sql);
    $stmt2 = $db->prepare($sql2);
    $db->beginTransaction();
    $stmt->execute();
    $stmt2->execute();
    $db->commit();
    header("refresh:5;url=panel_administratora.php");
    echo 'Pomyślnie dodano moderatora';
}
else {
    header("refresh:5;url=panel_administratora.php");
    echo 'Nie ma takiego użytkownika, bądź taki moderator już istnieje!';
}
