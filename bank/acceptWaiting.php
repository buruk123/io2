<?php
session_start();
require_once('connect.php');
if (isset($_POST['accept'])) {

    $idKonta = $_POST['id_oczekujacego'];
    $idAdmin = $_SESSION['id_konta'];
    $sqlWaiting = "SELECT * FROM oczekujace WHERE id_admina = $idAdmin AND id_oczekujacego = $idKonta";

    $stmt = $db->prepare($sqlWaiting);
    $stmt->execute();

    if ($data = $stmt->fetch()) {
        $imie = $data['imie'];
        $nazwisko = $data['nazwisko'];
        $nr_tel = $data['nr_tel'];
        $pesel = $data['pesel'];
        $ulica = $data['ulica'];
        $nr_domu = $data['nr_domu'];
        $nr_mieszkania = $data['nr_mieszkania'];
        $email = $data['email'];
        $miasto = $data['miasto'];
        $wojewodztwo = $data['wojewodztwo'];
        $kod_pocztowy = $data['kod_pocztowy'];
        $id_rodz_konta = $data['id_rodz_konta'];
        $id_rodz_karty = $data['id_rodz_karty'];

    } else {
        $imie = $nazwisko = $nr_tel = $pesel = $ulica = $nr_domu = $nr_mieszkania = $email = $miasto = $wojewodztwo = $kod_pocztowy = $id_rodz_karty = $id_rodz_konta = "NULL";
    }
    if(empty($nr_mieszkania)) $nr_mieszkania = "NULL";
    $sqlUsers = "INSERT INTO uzytkownicy VALUES ('', '$imie', '$nazwisko', '$nr_tel', '$pesel', '$ulica', $nr_domu, $nr_mieszkania, '$email', '$miasto', '$wojewodztwo', '$kod_pocztowy')";
    $debug = $db->exec($sqlUsers);

    $getUserID = "SELECT id_uzytkownika FROM uzytkownicy WHERE pesel = '$pesel'";
    $stmt1 = $db->prepare($getUserID);
    $debug2 = $stmt1->execute();

    if ($data1 = $stmt1->fetch()) {
        $userID = $data1['id_uzytkownika'];
    } else $userID = '';

    $password = "zxc";

    for($i = 1; $i <= 3; $i++) {
        $password .= $i;
    }

    $hash = hash('sha256', $password);

    $sqlAccUser = "INSERT INTO konto_uzytkownik VALUES ('', $userID, '$hash')";
    $debug5 = $db->exec($sqlAccUser);

    $getAccID = "SELECT id_konta FROM konto_uzytkownik WHERE id_uzytkownika = $userID";
    $stmt = $db->prepare($getAccID);
    $stmt->execute();

    if($data = $stmt->fetch()) {
        $userAccID = $data['id_konta'];
    }
    else $userAccID = 'NULL';

    $accNumber = '';

    for ($i = 0; $i < 26; $i++) {
        $accNumber .= rand(0, 9);
    }

    $sqlAcc = "INSERT INTO konta VALUES ($userAccID, $userID, $id_rodz_konta, $id_rodz_karty, 0, 0, 0, '$accNumber')";
    $debug3 = $db->exec($sqlAcc);

    $sqlDelete = "DELETE FROM oczekujace WHERE pesel = '$pesel'";
    $debug6 = $db->exec($sqlDelete);

    header('Location: admin.php');
}

