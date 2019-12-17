<?php

require_once "connect.php";

$sql = "SELECT id FROM zamowienia ORDER BY id DESC LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute();
$maxID = 0;
if($data = $stmt->fetch()) {
    $maxID = $data['id'];
}
$maxID++;

$sql2 = "SELECT * FROM koszyk WHERE id_uzytkownika = '{$_POST['id']}'";
$stmt2 = $db->prepare($sql2);
$stmt2->execute();
$prodIDsArr = array();
while($data = $stmt2->fetch()) {
    array_push($prodIDsArr, $data['id_produktu']);
}

for($i = 0; $i <= count($prodIDsArr); $i++) {
    $date = date('Y-m-d');
    $sql3 = "INSERT INTO zamowienia VALUES ('$maxID', '$prodIDsArr[$i]', '{$_POST['id']}', '$date', '{$_POST['optradio']}', '{$_POST['optradio2']}')";
    unset($prodIDsArr[$i]);
    $stmt3 = $db->prepare($sql3);
    $stmt3->execute();
}

$sql = "DELETE FROM koszyk WHERE id_uzytkownika = '{$_POST['id']}'";
$stmt = $db->prepare($sql);
$stmt->execute();

header("Location: zakup.php");