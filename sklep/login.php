<?php

require_once "connect.php";

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM użytkownicy LEFT JOIN administratorzy_login al on użytkownicy.email = al.email WHERE al.email = '$login' AND al.haslo = '$password'";
$stmt = $db->prepare($sql);
$query = $stmt->execute();

if ($data = $stmt->fetch()) {
    session_start();
    $_SESSION['id'] = $data['id'];
    $_SESSION['imie'] = $data['imie'];
    $_SESSION['nazwisko'] = $data['nazwisko'];
    $_SESSION['nr_tel'] = $data['nr_tel'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['isAdmin'] = true;
    $_SESSION['isMod'] = false;
    header('Location: index.php');
} else {

    $sql = "SELECT * FROM użytkownicy LEFT JOIN moderatorzy_login ml on użytkownicy.email = ml.email WHERE ml.email = '$login' AND ml.haslo = '$password'";
    $stmt = $db->prepare($sql);
    $query = $stmt->execute();

    if($data = $stmt->fetch()) {
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['imie'] = $data['imie'];
        $_SESSION['nazwisko'] = $data['nazwisko'];
        $_SESSION['nr_tel'] = $data['nr_tel'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['isAdmin'] = false;
        $_SESSION['isMod'] = true;
        header('Location: index.php');
    }
    else {
        $sql = "SELECT * FROM użytkownicy LEFT JOIN użytkownicy_login ul on użytkownicy.email = ul.email WHERE ul.email = '$login' AND ul.haslo = '$password'";
        $stmt = $db->prepare($sql);
        $query = $stmt->execute();

        if($data = $stmt->fetch()) {
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['imie'] = $data['imie'];
            $_SESSION['nazwisko'] = $data['nazwisko'];
            $_SESSION['nr_tel'] = $data['nr_tel'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['isAdmin'] = false;
            $_SESSION['isMod'] = false;
            header('Location: index.php');
        }
        else {
            header('Location: index.php');
//            $_SESSION['isLoggedIn'] = false;
        }
    }
}
