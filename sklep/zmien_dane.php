<?php

require_once "connect.php";

print_r($_POST);
session_start();

$sql = "UPDATE sklep.użytkownicy SET imie = '{$_POST['imie']}', nazwisko = '{$_POST['nazwisko']}', nr_tel = '{$_POST['nrTel']}', ulica = '{$_POST['ulica']}', nr_domu = '{$_POST['nrDomu']}}', nr_mieszkania = '{$_POST['nrMieszkania']}', email = '{$_POST['email']}', miasto = '{$_POST['miasto']}', wojewodztwo = '{$_POST['wojewodztwo']}', kod_pocztowy = '{$_POST['poczta']}' WHERE id = '{$_POST['id']}'";
$stmt = $db->prepare($sql);
$stmt->execute();

$_SESSION['imie'] = $_POST['imie'];
$_SESSION['nazwisko'] = $_POST['nazwisko'];

header("Location: panel_uzytkownika.php");