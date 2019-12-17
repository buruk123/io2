<?php

require_once "connect.php";

print_r($_POST);
$typ = $_POST['typ'];
$typ_podzespolu = $_POST['typ_podzespolu'];
$typ_peryferii = $_POST['typ_peryferii'];

switch ($typ) {
    case 'LAPTOP':
        $krotki_opis = $_POST['procesor'] . ';' . $_POST['pamiec'] . ';' . $_POST['grafika'] . ';';
        $img_dir = 'resources/laptop/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
        $folder_dir = '\\resources\\laptop\\' . $_POST['marka'] . '\\' . $_POST['model'] . '\\';
        if (!file_exists(__DIR__ . $folder_dir)) {
            mkdir(__DIR__ . $folder_dir, 0777, true);
        }
        $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', NULL,'{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
        break;
    case 'KOMPUTER':
        $krotki_opis = $_POST['pamiec'] . ';' . $_POST['grafika'] . ';' . $_POST['system'] . ';';
        $img_dir = 'resources/komputer/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
        $folder_dir = '\\resources\\komputer\\' . $_POST['marka'] . '\\' . $_POST['model'];
        if (!file_exists(__DIR__ . $folder_dir)) {
            mkdir(__DIR__ . $folder_dir, 0777, true);
        }
        $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', NULL,'{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
        break;
    case 'TELEFON':
        $krotki_opis = $_POST['ekran'] . ';' . $_POST['system'] . ';' . $_POST['pamiec'] . ';';
        $img_dir = 'resources/telefon/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
        $folder_dir = '\\resources\\telefon\\' . $_POST['marka'] . '\\' . $_POST['model'];
        if (!file_exists(__DIR__ . $folder_dir)) {
            mkdir(__DIR__ . $folder_dir, 0777, true);
        }
        $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', NULL,'{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
        break;
    case 'PODZESPOŁY':
        switch ($typ_podzespolu) {
            case 'DYSKI':
                $krotki_opis = $_POST['pojemnosc'] . ';' . $_POST['interfejs'] . ';' . $_POST['predkosci'] . ';';
                $img_dir = 'resources/podzespoly/dyski/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
                $folder_dir = '\\resources\\podzespoly\\dyski\\' . $_POST['marka'] . '\\' . $_POST['model'];
                if (!file_exists(__DIR__ . $folder_dir)) {
                    mkdir(__DIR__ . $folder_dir, 0777, true);
                }
                $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', '$typ_podzespolu','{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";

                break;
            case 'GRAFIKA':
                $krotki_opis = $_POST['pamiec'] . ';' . $_POST['rodzaj_pamieci'] . ';' . $_POST['zlacza'] . ';';
                $img_dir = 'resources/podzespoly/grafika/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
                $folder_dir = '\\resources\\podzespoly\\grafika\\' . $_POST['marka'] . '\\' . $_POST['model'];
                if (!file_exists(__DIR__ . $folder_dir)) {
                    mkdir(__DIR__ . $folder_dir, 0777, true);
                }
                $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', '$typ_podzespolu','{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
                break;
            case 'PROCESORY':
                $krotki_opis = $_POST['seria'] . ';' . $_POST['taktowanie'] . ';' . $_POST['liczba_rdzeni'] . ';';
                $img_dir = 'resources/podzespoly/procesory/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
                $folder_dir = '\\resources\\podzespoly\\procesory\\' . $_POST['marka'] . '\\' . $_POST['model'];
                if (!file_exists(__DIR__ . $folder_dir)) {
                    mkdir(__DIR__ . $folder_dir, 0777, true);
                }
                $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', '$typ_podzespolu','{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
                break;
        }
        break;
    case 'PERYFERIA':
        switch ($typ_peryferii) {
            case 'MONITORY':
                $krotki_opis = $_POST['przekatna'] . ';' . $_POST['rozdzielczosc'] . ';' . $_POST['matryca'] . ';';
                $img_dir = 'resources/peryferia/monitory/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
                $folder_dir = '\\resources\\peryferia\\monitory\\' . $_POST['marka'] . '\\' . $_POST['model'];
                if (!file_exists(__DIR__ . $folder_dir)) {
                    mkdir(__DIR__ . $folder_dir, 0777, true);
                }
                $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', '$typ_peryferii','{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
                break;
            case 'MYSZKI':
                $krotki_opis = $_POST['rozdzielczosc'] . ';' . $_POST['interfejs'] . ';' . $_POST['dlugosc_przewodu'] . ';';
                $img_dir = 'resources/peryferia/myszki/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
                $folder_dir = '\\resources\\peryferia\\myszki\\' . $_POST['marka'] . '\\' . $_POST['model'];
                if (!file_exists(__DIR__ . $folder_dir)) {
                    mkdir(__DIR__ . $folder_dir, 0777, true);
                }
                $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', '$typ_peryferii','{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";

                break;
            case 'KLAWIATURY':
                $krotki_opis = $_POST['typ_klawiatury'] . ';' . $_POST['podswietlenie'] . ';' . $_POST['interfejs'] . ';';
                $img_dir = 'resources/peryferia/klawiatury/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
                $folder_dir = '\\resources\\peryferia\\klawiatury\\' . $_POST['marka'] . '\\' . $_POST['model'];
                if (!file_exists(__DIR__ . $folder_dir)) {
                    mkdir(__DIR__ . $folder_dir, 0777, true);
                }
                $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', '$typ_peryferii','{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
        }
        break;
    case 'OPROGRAMOWANIE':
        $krotki_opis = $_POST['architektura'] . ';' . $_POST['licencja'] . ';' . $_POST['wersja'] . ';';
        $img_dir = 'resources/oprogramowanie/' . $_POST['marka'] . '/' . $_POST['model'] . '/';
        $folder_dir = '\\resources\\oprogramowanie\\' . $_POST['marka'] . '\\' . $_POST['model'];
        if (!file_exists(__DIR__ . $folder_dir)) {
            mkdir(__DIR__ . $folder_dir, 0777, true);
        }
        $sql = "INSERT INTO sklep.produkty VALUES('', '{$_POST['typ']}', NULL,'{$_POST['marka']}', '{$_POST['model']}', '$krotki_opis', '{$_POST['myeditor']}', '{$_POST['cena']}',0, '','$img_dir')";
        break;
}


$stmt = $db->prepare($sql);
$query = $stmt->execute();

$target_dir = __DIR__ . $folder_dir.'\\';
    $target_file = $target_dir . basename($_FILES["photos"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photos"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photos"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
echo $imageFileType;
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "webp") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photos"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["photos"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

header('Location: panel_moderatora.php');