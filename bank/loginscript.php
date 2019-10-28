<?php

require_once "connect.php";

$login = $_POST['login'];
$password = $_POST['haslo'];

if (isset($_POST['admin']))
    $admin = $_POST['admin'];
else $admin = "off";

if (isset($login) && isset($password) && $login != "" && $password != "") {

    $hash = hash('sha256', $password);
    if ($admin === "off") {
        $sql = "SELECT * FROM konto_uzytkownik 
                LEFT JOIN konta k on k.id_uzytkownika = konto_uzytkownik.id_uzytkownika 
                LEFT JOIN rodzaje_kart rk on k.id_rodz_karty = rk.id_rodz_karty 
                LEFT JOIN rodzaje_kont r on k.id_rodz_konta = r.id_rodz_konta 
                LEFT JOIN uzytkownicy u on konto_uzytkownik.id_uzytkownika = u.id_uzytkownika
                LEFT JOIN przelewy p on k.nr_konta = p.nr_konta_nad
                WHERE konto_uzytkownik.id_uzytkownika = '$login' AND konto_uzytkownik.haslo = '$hash'";
        $db->query("SET NAMES 'utf-8'");
        $stmt = $db->prepare($sql);
        $query = $stmt->execute();

        if ($data = $stmt->fetch()) {
            session_start();
            $_SESSION['id_konta'] = $data['id_konta'];
            $_SESSION['id_uzytkownika'] = $data['id_uzytkownika'];
            $_SESSION['haslo'] = $data['haslo'];
            $_SESSION['id_rodz_konta'] = $data['id_rodz_konta'];
            $_SESSION['nazwa_konta'] = $data['nazwa_konta'];
            $_SESSION['id_rodz_karty'] = $data['id_rodz_karty'];
            $_SESSION['nazwa_karty'] = $data['nazwa_karty'];
            $_SESSION['srodki'] = $data['srodki'];
            $_SESSION['saldo'] = $data['saldo'];
            $_SESSION['blokada_kartowa'] = $data['blokada_kartowa'];
            $_SESSION['nr_konta'] = $data['nr_konta'];
            $_SESSION['aktualne_id'] = $login;
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['isAdmin'] = false;
            $_SESSION['imie'] = $data['imie'];
            $_SESSION['nazwisko'] = $data['nazwisko'];
            $_SESSION['data'] = $data['data'];
            $_SESSION['nr_tel'] = $data['nr_tel'];
            $_SESSION['email'] = $data['email'];
            header('Location: user.php');
        } else {
            header('Location: login.php');

        }
    } else {

        $hash = hash('sha256', $password);
        $sql = "SELECT * FROM konto_admin LEFT JOIN pracownicy p on konto_admin.id_pracownika = p.id_pracownika WHERE konto_admin.id_pracownika = '$login' AND haslo = '$hash'";
        $db->query("SET NAMES 'utf-8'");
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($data = $stmt->fetch()) {
            session_start();
            $_SESSION['id_konta'] = $data['id_konta'];
            $_SESSION['id_pracownika'] = $data['id_pracownika'];
            $_SESSION['haslo'] = $data['haslo'];
            $_SESSION['imie'] = $data['imie'];
            $_SESSION['nazwisko'] = $data['nazwisko'];
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['isAdmin'] = true;
            $_SESSION['aktualne_id'] = $login;
            $_SESSION['nr_tel'] = $data['nr_tel'];
            $_SESSION['email'] = $data['email'];
            header('Location: admin.php');
        } else {
            header('Location: login.php');

        }
    }
} else {
    header('Location: login.php');

}