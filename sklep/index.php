<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-wiewiórka</title>
    <meta name="description" content="Projekt sklepu">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sitestyle.css">
</head>
<body>
<?php
session_start();
?>
<?php require_once('topmenu.php') ?>

<div class="container">
    <div class="row">
        <div class="col col-8">

            <?php
            require_once "connect.php";
            $sql = "SELECT id, marka, model, imgDir, cena FROM produkty ORDER BY id DESC LIMIT 9";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $isAddedToSite = array();
            for ($i = 0; $i < 9; $i++) {
                array_push($isAddedToSite, $data[$i]['id']);
            }
            $strMissing = implode(',', $isAddedToSite);
            $sql2 = "SELECT id FROM produkty WHERE czyPrzecena = 1";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $goracyStrzal = array();
            if ($data2 = $stmt2->fetch()) {
                array_push($goracyStrzal, $data2['id']);
            } else {
                $sql3 = "SELECT id FROM produkty WHERE id NOT IN (" . $strMissing . ") ORDER BY RAND() LIMIT 1";
                $stmt3 = $db->prepare($sql3);
                $stmt3->execute();
                if ($data3 = $stmt3->fetch()) {
                    array_push($goracyStrzal, $data3['id']);
                    $przecena = rand(50, (int)$data3['cena'] / 5);
                    $sql4 = "UPDATE produkty SET czyPrzecena = 1, ilePrzecena = ".$przecena." WHERE id = ".$data3['id']."";
                    $stmt4 = $db->prepare($sql4);
                    $stmt4->execute();
                }
            }
            for ($i = 0; $i <= 5; $i++) {
                if ($i == 0 || $i == 3) {
                    echo '<div class="row">
                    <div class="col">
                    <div class="row-custom-center">
                        <a href="produkt.php?id=' . $data[$i]['id'] . '"><img class="onhover" src="' . implode(glob($data[$i]['imgDir'] . '*.*')) . '"
                                        width="200" height="150"></a><br/>
                        <h4>' . $data[$i]['marka'] . ' ' . $data[$i]['model'] . '</h4>
                        <h5>' . $data[$i]['cena'] . '.00zł</h5>
                        <form action="produkt.php" method="get"
                  enctype="multipart/form-data">
                        <input type="hidden" name="id" value="' . $data[$i]['id'] . '">
                        <button type="submit" class="btn btn-warning">ZOBACZ WIĘCEJ</button>
                        </form>
                        </br>
                    </div>
                </div>';
                } elseif ($i == 2 || $i == 5) {
                    echo '<div class="col">
                    <div class="row-custom-center">
                        <a href="produkt.php?id=' . $data[$i]['id'] . '"><img class="onhover" src="' . implode(glob($data[$i]['imgDir'] . '*.*')) . '"
                                        width="200" height="150"></a><br/>
                        <h4>' . $data[$i]['marka'] . ' ' . $data[$i]['model'] . '</h4>
                        <h5>' . $data[$i]['cena'] . '.00zł</h5>
                        <form action="produkt.php" method="get" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="' . $data[$i]['id'] . '">
                        <button type="submit" class="btn btn-warning">ZOBACZ WIĘCEJ</button>
                        </form>
                        </br>
                    </div>
                </div>
                </div>';
                    if ($i == 2) {
                        echo '<hr>';
                    }
                } else {
                    echo '<div class="col">
                    <div class="row-custom-center">
                        <a href="produkt.php?id=' . $data[$i]['id'] . '"><img class="onhover" src="' . implode(glob($data[$i]['imgDir'] . '*.*')) . '"
                                        width="200" height="150"></a><br/>
                        <h4>' . $data[$i]['marka'] . ' ' . $data[$i]['model'] . '</h4>
                        <h5>' . $data[$i]['cena'] . '.00zł</h5>
                        <form action="produkt.php" method="get"
                  enctype="multipart/form-data">
                        <input type="hidden" name="id" value="' . $data[$i]['id'] . '">
                        <button type="submit" class="btn btn-warning">ZOBACZ WIĘCEJ</button>
                        </form>
                        </br>
                    </div>
                </div>';
                }
            }
            ?>
        </div>
        <div class="col col-4 border border-warning rounded">
            <h3 class="text-left font-weight-bold">Gorący strzał!</h3>
            <div class="text-center">
                <?php
                    $sql5 = "SELECT id, marka, model, imgDir, cena, ilePrzecena FROM sklep.produkty WHERE id = ".$goracyStrzal[0]."";
                    $stmt5 = $db->prepare($sql5);
                    $stmt5->execute();
                    if($data5 = $stmt5->fetch()) {
                        $cenaPo = (int)$data5['cena'] - (int)$data5['ilePrzecena'];
                        echo '
                            <a href=""><img src="' . implode(glob($data5['imgDir'] . '*.*')) . '" width="300" height="250"></a>
                            <h4>'.$data5['marka'].' '.$data5['model'].'</h4>
                            <h5 class="hot-shot-discount">'.$data5['cena'].'.00zł</h5>
                            <h2 class="hot-shot font-weight-bold">'.$cenaPo.'.00zł</h2>
                            <form action="produkt.php" method="get" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="'.$data5['id'].'">
                            <button class="btn btn-warning">Zobacz więcej</button>
                            </form>
                            <h5>Do nastepnego<br> <span style="color: red; font-weight: bold">GORĄCEGO STRZAŁU</span> pozostało</h5>
                            <div id="timer"></div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <?php
        for ($i = 6; $i < 9; $i++) {
            echo '
                <div class="col">
                        <a href="produkt.php?id=' . $data[$i]['id'] . '"><img class="onhover" src="' . implode(glob($data[$i]['imgDir'] . '*.*')) . '" width="200"
                                height="200"></a><br/>
                        <h5>' . $data[$i]['marka'] . ' ' . $data[$i]['model'] . '</h5>
                        <h5>' . $data[$i]['cena'] . '.00zł</h5>
                            <form action="produkt.php" method="get"
          enctype="multipart/form-data">
                        <input type="hidden" name="id" value="' . $data[$i]['id'] . '">
                        <button type="submit" class="btn btn-warning">ZOBACZ WIĘCEJ</button>
                        </form>
                        </br>
                    </div>
            ';
        }
        ?>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">

        <?php
        require_once "connect.php";

        $sql = "SELECT * FROM sklep.artykuly ORDER BY RAND() LIMIT 3";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($data = $stmt->fetch()) {
            $tresc = explode("\n", $data['tresc']);
            $tytul = str_replace("<h1>", "<h3>", $tresc[0]);
//            $tytul = str_replace("</h1>", "</h3>", $tresc[0]);

            echo '
                <div class="col-md-4 text-justify">
                ' . $tytul . '' . $tresc[2] . '
                <form action="artykuly.php" method="get" enctype="multipart/form-data">
                <input type="hidden" name="id" value="' . $data['id'] . '">
                <button type="submit" class="btn btn-warning">Czytaj dalej</button>
                </form>
                </div>';
        }
        ?>

    </div>
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
<script>
    var today = new Date();
    var countDownDate = new Date(today.getFullYear(), today.getMonth(), today.getDate(), "23", "59", "59").getTime();


    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("timer").style.fontSize = "40px";
        document.getElementById("timer").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "Oczekuj na nowy gorący strzał!";
        }
    }, 1000);
</script>

</body>

</html>