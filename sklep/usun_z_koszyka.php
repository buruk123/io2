<?php

require_once "connect.php";

$sql = "DELETE FROM sklep.koszyk WHERE koszyk.id_produktu = '{$_POST['id']}' AND koszyk.ilosc = '{$_POST['ilosc']}'";
$stmt = $db->prepare($sql);
$stmt->execute();
header("Location: koszyk.php");