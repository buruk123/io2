<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANK</title>
    <meta name="description" content="Projekt banku">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sitestyle.css">
</head>
<body>
<?php
session_start();
?>
<?php require_once('topmenu.php') ?>
<div class="container content">
    <?php
    require_once "connect.php";
    $sql = "SELECT * from sklep.produkty WHERE id = '{$_GET['id']}'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    if ($data = $stmt->fetch()) {
        $imageSizeArray = getimagesize(implode(glob($data['imgDir'] . '*.*')));
        $krotki_opis= explode(";", $data['krotki_opis']);
        echo '
        <div class="row">
            <div class="col-md-6">
                
                <img src="' . implode(glob($data['imgDir'] . '*.*')) . '" height="400" width="500">
            </div>
            <div class="col-md-6">
            <br>
                <h2>'.$data['marka'].' '. $data['model'].'</h2>
                <hr>';
        switch ($data['rodzaj']) {
            case 'LAPTOP':
                echo '
                <span class="text-muted">Procesor: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                <span class="text-muted">Pamięć: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                <span class="text-muted">Grafika: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                ';
                break;
            case 'KOMPUTER':
                echo '
                <span class="text-muted">Pamięć: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                <span class="text-muted">Grafika: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                <span class="text-muted">System: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                ';
                break;
            case 'TELEFON':
                echo '
                <span class="text-muted">Ekran: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                <span class="text-muted">System: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                <span class="text-muted">Pamięć: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                ';
                break;
            case 'PODZESPOŁY':
                switch($data['typ']) {
                    case 'DYSKI':
                        echo '
                            <span class="text-muted">Pojemność: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                            <span class="text-muted">Interfejs: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                            <span class="text-muted">Prędkości: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                         ';
                        break;
                    case 'GRAFIKA':
                        echo '
                            <span class="text-muted">Pamięć: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                            <span class="text-muted">Rodzaj pamięci: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                            <span class="text-muted">Złącza: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                        ';
                        break;
                    case 'PROCESORY':
                        echo '
                            <span class="text-muted">Seria: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                            <span class="text-muted">Taktowanie: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                            <span class="text-muted">Liczba rdzeni: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                        ';
                        break;
                }
            case 'PERYFERIA':
                switch($data['typ']) {
                    case 'MONITORY':
                        echo '
                            <span class="text-muted">Przekątna ekranu: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                            <span class="text-muted">Rozdzielczość: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                            <span class="text-muted">Matryca: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                        ';
                        break;
                    case 'MYSZKI':
                        echo '
                            <span class="text-muted">Rozdzielczość: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                            <span class="text-muted">Interfejs: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                            <span class="text-muted">Długość przewodu: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                        ';
                        break;
                    case 'KLAWIATURY':
                        echo '
                            <span class="text-muted">Typ: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                            <span class="text-muted">Podświetlenie: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                            <span class="text-muted">Interfejs: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                        ';
                        break;
                }
                break;
            case 'OPROGRAMOWANIE':
                echo '
                    <span class="text-muted">Architektura: </span><strong>'.$krotki_opis[0].'</strong><br><br>
                    <span class="text-muted">Licencja: </span><strong>'.$krotki_opis[1].'</strong><br><br>
                    <span class="text-muted">Wersja: </span><strong>'.$krotki_opis[2].'</strong><br><br>
                ';
                break;
        }
        echo '
            <form action="dodaj_koszyk.php" method="get" enctype="multipart/form-data">
            ';
        if($data['czyPrzecena'] == 1) {
            $cenaPo = (int)$data['cena'] - (int)$data['ilePrzecena'];
            echo '
            <h4><span class="text-muted">Cena: <span class="hot-shot-discount">'.$data['cena'].'.00zł           </span></span><strong>'.$cenaPo.'.00zł</strong><br><br></h4>';
        }
        else {
            $cenaPo = 0;
            echo '
            <h4><span class="text-muted">Cena: </span><strong>'.$data['cena'].'.00zł</strong><br><br></h4>';
        }

        echo '
                <div class="form-group col-md-3">
                    <label for="exampleFormControlSelect1">Ilość</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ilosc">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                </div>
                ';
        if(isset($_SESSION['isLoggedIn'])) {
            if($_SESSION['isLoggedIn']) {
                if($cenaPo != 0) {
                    echo '<input type="hidden" name="cenaPo" value="'.$cenaPo.'">';
                }
                echo '
                    <input type="hidden" name="id" value="'.$data['id'].'">
                    <button type="submit" class="btn btn-warning">Dodaj do koszyka</button>
                    </form>
                ';
            }
        }
        else {
                echo '
                    <h4>Zaloguj się, aby dodać produkt do koszyka</h4>
                    </form>';
        }
        echo '
            </div>
            
        </div>
    <hr>
        ' . $data['opis'] . '
    </div>
            
    ';
    }
    ?>
</div>
<?php require_once('footer.php') ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
