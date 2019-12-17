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
<?php
require_once "connect.php";
$sql = "SELECT * FROM sklep.produkty WHERE rodzaj = '{$_GET['rodzaj']}'";
$stmt = $db->prepare($sql);
$stmt->execute();

?>
<div class="container content">
    <h2 class="text-center">
        <?php
        switch ($_GET['rodzaj']) {
            case 'LAPTOP':
                echo 'LAPTOPY';
                break;
            case 'KOMPUTER':
                echo 'KOMPUTERY';
                break;
            case 'TELEFON':
                echo 'TELEFONY';
                break;
            case 'PODZESPOŁY':
                echo 'PODZESPOŁY KOMPUTEROWE';
                break;
            case 'PERYFERIA':
                echo 'URZĄDZENIA PERYFERYJNE';
                break;
            case 'OPROGRAMOWANIE':
                echo 'OPROGRAMOWANIE';
                break;
        }
        ?>

    </h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">L.p</th>
            <th scope="col">Produkt</th>
            <th scope="col">Cena</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;

                while($data = $stmt->fetch()) {
                    if($data['czyPrzecena'] == 1) {
                        $cenaPo = (int)$data['cena'] - (int)$data['ilePrzecena'];
                    }
                    else {
                        $cenaPo = $data['cena'];
                    }
                    echo '
                    <tr>
                      <th scope="row">' . $counter . '</th>
                      <td>' . $data['marka'] . ' ' . $data['model'] . '</td>
                      <td>' . $cenaPo . '.00zł</td>
                      <form action="produkt.php" method="get" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="' . $data['id'] . '">
                      <td><button type="submit" class="btn btn-warning">Zobacz więcej</button></td>
                      </form>
                    ';
                    $counter++;
                }
            ?>
        </tbody>
    </table>
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