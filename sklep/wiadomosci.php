<?php

require_once ('connect.php');

session_start();

$idAdmina = $_SESSION['id_konta'];

$sql = "SELECT COUNT(*) FROM formularze WHERE id_admina = $idAdmina";
$stmt = $db->prepare($sql);
$stmt->execute();
$messageCount = $stmt->fetchColumn();

$sql = "SELECT COUNT(*) FROM oczekujace WHERE id_admina = $idAdmina";
$stmt = $db->prepare($sql);
$stmt->execute();
$waitCount = $stmt->fetchColumn();

$_SESSION['messageCount'] = $messageCount;
$_SESSION['waitCount'] = $waitCount;

if(isset($_POST['message'])) {

    $sqlSelect = "SELECT * FROM formularze WHERE id_admina = $idAdmina";

    $stmt = $db->prepare($sqlSelect);
    $stmt->execute();

    if($data = $stmt->fetch()) {
        $email = $data['email'];
        $nr_tel = $data['nr_tel'];
    }
    else {
        $email = $nr_tel = '';
    }

    $sqlDelete = "DELETE FROM formularze WHERE email = '$email' AND nr_tel = '$nr_tel'";
    $db->exec($sqlDelete);

    header('Location: admin.php');
}
