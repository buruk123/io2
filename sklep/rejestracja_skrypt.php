<?php

require_once "connect.php";

print_r($_POST);

$sql = "INSERT INTO użytkownicy VALUES (NULL, '{$_POST['imie']}', '{$_POST['nazwisko']}', '{$_POST['nrtel']}', '{$_POST['ulica']}', '{$_POST['nrDomu']}', '{$_POST['nrMieszkania']}', '{$_POST['email']}', '{$_POST['miasto']}', '{$_POST['wojewodztwo']}', '{$_POST['kodPocztowy']}')";
$sql2 = "INSERT INTO użytkownicy_login VALUES ('{$_POST['email']}', '{$_POST['haslo']}')";
$stmt = $db->prepare($sql);
$stmt2 = $db->prepare($sql2);
if($stmt->execute()) {
    echo 'udalo sie';
}
else {
    echo 'nie udal sie';
}
if($stmt2->execute()) {
    echo 'drugi tez sie udal';
}
else {
    echo 'nie udal sie drugi tez';
}
//$stmt2->execute();