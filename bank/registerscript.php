<?php

require_once('connect.php');

    if (isset($_POST['register'])) {

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $nr_tel = $_POST['nr_tel'];
    $pesel = $_POST['pesel'];
    $ulica = $_POST['ulica'];
    $nr_domu = $_POST['nr_domu'];
    $nr_mieszkania = $_POST['nr_mieszkania'];
    $email = $_POST['email'];
    $miasto = $_POST['miasto'];
    $wojewodztwo = $_POST['wojewodztwo'];
    $kod_pocztowy = $_POST['kod_pocztowy'];
    $nazwa_konta = $_POST['konto'];
    $nazwa_karty = $_POST['karta'];

    $getAccIDQuery = "SELECT id_rodz_konta FROM rodzaje_kont WHERE nazwa_konta = '$nazwa_konta'";
    $stmt = $db->prepare($getAccIDQuery);
    $stmt->execute();

    if ($data = $stmt->fetch()) {
        $accID = $data['id_rodz_konta'];
    } else
        $accID = 'NULL';

    $getCardIDQuery = "SELECT id_rodz_karty FROM rodzaje_kart WHERE nazwa_karty = '$nazwa_karty'";
    $stmt = $db->prepare($getCardIDQuery);
    $stmt->execute();
    if ($data = $stmt->fetch()) {
        $cardID = $data['id_rodz_karty'];
    } else
        $cardID = 'NULL';

    $getAdminIDQuery = "SELECT id_pracownika FROM pracownicy ORDER BY RAND() LIMIT 1";
    $stmt = $db->prepare($getAdminIDQuery);
    $stmt->execute();
    if ($data = $stmt->fetch()) {
        $adminID = $data['id_pracownika'];
    } else
        $adminID = 'NULL';

    $addUserQuery = "INSERT INTO oczekujace VALUES ('', '$imie', '$nazwisko', '$nr_tel', '$pesel', '$ulica', $nr_domu, $nr_mieszkania, '$email', '$miasto', '$wojewodztwo', '$kod_pocztowy', $accID, $cardID, $adminID)";
    $check = $db->exec($addUserQuery);

    header('Location: index.php');

} else {
    echo 'Nie udalo sie :(';
}
