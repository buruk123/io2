<?php

require_once ('connect.php');

session_start();

$odbiorca = $_POST['nrRachunku'];
$nadawca = $_SESSION['nr_konta'];
$adres = $_POST['adres'];
$typPrzelewuQuery = $_POST['exampleRadios'];
if($typPrzelewuQuery == 'option1') $typPrzelewu = 'elixir';
elseif ($typPrzelewuQuery == 'option2') $typPrzelewu = 'expresselixir';
else $typPrzelewu = 'bluecash';
$kwota = $_POST['kwota'];
$tytul = $_POST['tytulPrzelewu'];

if($kwota > $_SESSION['srodki']) {
    $_SESSION['msg'] = "Niewystarczająca ilość środków";
    header('Location: user.php');
    return;
}


$sql = "INSERT INTO przelewy(nr_konta_odb, nr_konta_nad, adres, typ, kwota, tytul) VALUES (
        '$odbiorca', '$nadawca', '$adres', '$typPrzelewu', '$kwota', '$tytul'     
)";

$db->exec($sql);

$sql = "SELECT * FROM konta WHERE nr_konta = '$odbiorca'";
$stmt = $db->prepare($sql);
$stmt->execute();
if($data = $stmt->fetch()) {
    $srodkiOdb = $data['srodki'];
    $saldoOdb = $data['saldo'];
}
$noweSrodkiOdb = $srodkiOdb + $kwota;
$noweSaldoOdb = $saldoOdb + $kwota;

$sql = "SELECT * from konta WHERE nr_konta = '$nadawca'";
$stmt = $db->prepare($sql);
$stmt->execute();
if($data = $stmt->fetch()) {
    $srodkiNad = $data['srodki'];
    $saldoNad = $data['saldo'];
}
$noweSrodkiNad = $srodkiNad - $kwota;
$noweSaldoNad = $saldoNad - $kwota;

$db->exec("UPDATE konta SET srodki = $noweSrodkiNad, saldo = $noweSaldoNad WHERE nr_konta = '$nadawca'");
$db->exec("UPDATE konta SET srodki = $noweSrodkiOdb, saldo = $noweSaldoOdb WHERE nr_konta = '$odbiorca'");

$_SESSION['srodki'] = $noweSrodkiNad;
$_SESSION['saldo'] = $noweSaldoNad;

header('Location: user.php');
