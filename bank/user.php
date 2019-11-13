<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANK</title>
    <meta name="description" content="Projekt banku">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="sitestyle.css">
</head>

<body>
<?php
session_start();
@$isLoggedIn = $_SESSION['isLoggedIn'];
$accSess = $_SESSION['nr_konta'];
$accStr = (string)$accSess;
$acc = substr($accStr, 0, 2) . ' ';
for ($i = 2; $i < strlen($accStr); $i += 4) {
    $acc .= substr($accStr, $i, 4) . ' ';
}

?>
<?php require_once('connect.php') ?>
<?php require_once('topmenu.php') ?>

<?php

if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    echo "<script> alert('$msg')</script>";
    unset($_SESSION['msg']);
}

?>


<div class="container container-custom">
    <div class="row">
        <div class="col-8">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                    <h4 class="card-title" style="color: red;">Produkty</h4>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-text"><?php echo $_SESSION['nazwa_konta'] ?></h5>
                            <h6 class="card-text"><?php echo $acc ?></h6>
                        </div>
                        <div class="col-6">
                            <nav class="navbar navbar-expand-lg float-right">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#">Historia<span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#przelew">Przelewy</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <h6>Dostępne środki:</h6>
                                    <h4><b><?php echo $_SESSION['srodki'] . " PLN" ?></b></h4>
                                </div>
                                <div class="col-4">
                                    <h6>Saldo:</h6>
                                    <h5><?php echo $_SESSION['saldo'] . " PLN" ?></h5>
                                </div>
                                <div class="col-4">
                                    <h6>Blokady kartowe:</h6>
                                    <h5><?php echo $_SESSION['blokada_kartowa'] . " PLN" ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                    <h5 class="card-title" style="color: red;"><b>HISTORIA</b></h5>
                    <div class="ml-3">
                        <?php
                        $accOwner = $_SESSION['nr_konta'];
                        $sql = "SELECT * FROM przelewy
                                    WHERE nr_konta_nad = '$accOwner' OR nr_konta_odb = '$accOwner' ORDER BY data DESC";

                        foreach ($db->query($sql) as $row) {
                            ?>
                            <p class="bg-light"><b><?php echo substr($row['data'], 0, 10) ?></b></p>
                            <?php if ($row['nr_konta_odb'] == $accOwner) : ?>
                                <b class="float-right"><?php echo $row['kwota'] . " PLN" ?></b>
                                <b class="float-left"><?php echo "Od nr konta " . $row['nr_konta_nad'] . "</br>" . "Tytułem: " . $row['tytul'] ?></b></br></br></br>
                            <?php else : ?>
                                <b class="float-right"><?php echo "-" . $row['kwota'] . " PLN" ?></b>
                                <b class="float-left"><?php echo "Do nr konta " . $row['nr_konta_odb'] . "</br>" . "Tytułem: " . $row['tytul'] ?></b></br></br></br>
                            <?php endif; ?>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="card" id="przelew" style="border-radius: 20px;">
                <div class="card-body">
                    <h5 class="card-title" style="color: red;"><b>PRZELEW</b></h5>
                    <form method="post" action="przelew.php">
                        <p>Z rachunku <u><?php echo $acc ?></u><b
                                    class="float-right"><?php echo $_SESSION['srodki'] . " PLN" ?></b></p>
                        <div class="form-group">
                            <label for="inputFirstName">Odbiorca</label>
                            <input type="text" class="form-control" id="inputFirstName" name="imie"
                                   placeholder="np. Adam">
                        </div>
                        <div class="form-group">
                            <label for="inputLastName">Na rachunek</label>
                            <input type="text" class="form-control" id="inputLastName" name="nrRachunku"
                                   placeholder="np. 61 1090 1014 0000 0712 1981 2874" maxlength="26" minlength="26" onkeypress="return isNumber(event)">
                        </div>
                        <div class="form-group">
                            <label for="inputPhoneNr">Adres (opcjonalnie)</label>
                            <textarea class="form-control" id="inputPhoneNr" name="adres" rows="3"></textarea>
                        </div>
                        <br/>

                        <div class="form-group">
                            <label for="exampleRadios1">Typ transferu</label><br/>

                            <input class="form-check-input ml-4" type="radio" name="exampleRadios" id="exampleRadios1"
                                   value="option1" checked>
                            <label class="form-check-label ml-5" for="exampleRadios1">
                                Elixir (najpóźniej u odbiorcy w następnym dniu roboczym)
                            </label>
                            <br/>
                            <input class="form-check-input ml-4" type="radio" name="exampleRadios" id="exampleRadios2"
                                   value="option2">
                            <label class="form-check-label ml-5" for="exampleRadios2">
                                Express Elixir (w kilka minut w banku odbiory - do 5 000 PLN)
                            </label>
                            <br/>
                            <input class="form-check-input ml-4" type="radio" name="exampleRadios" id="exampleRadios3"
                                   value="option3">
                            <label class="form-check-label ml-5" for="exampleRadios3">
                                Blue cash (w kilka minut w banku odbiorcy)
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Kwota</label>
                            <input type="text" class="form-control" id="inputAddress" name="kwota" placeholder="PLN" onkeypress="return isNumber(event)">
                        </div>
                        <div class="form-group">
                            <label for="inputTitle">Tytułem</label>
                            <textarea class="form-control" id="inputTitle" name="tytulPrzelewu" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputFlatNr">Data przelewu</label>
                            <input type="date" class="form-control" name="data" id="inputFlatNr">
                        </div>
                        <div class="row row-custom">
                            <div class="form-group text-center ml-auto mr-3">
                                <button type="submit" class="btn btn-login btn-custom text-center" name="przelew">Wyślij
                                    przelew
                                </button>
                            </div>
                            <div class="form-group text-center mr-auto ml-3">
                                <button type="reset" id="inputFlatNr1" onclick="myFunction();"
                                        class="btn btn-login btn-custom text-center">
                                    Wyczyść
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class="col-4">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                    <h5>Skrócona historia</h5>
                    <br/>
                    <?php

                    $accOwner = $_SESSION['nr_konta'];
                    $sql = "SELECT * FROM przelewy
                                    WHERE nr_konta_nad = '$accOwner' OR nr_konta_odb = '$accOwner' ORDER BY data DESC LIMIT 2";
                    foreach ($db->query($sql) as $row) {
                        ?>
                        <p class="bg-light"><b><?php echo substr($row['data'], 0, 10) ?></b></p>
                        <b class="float-left"><?php echo $row['tytul'] ?></b>
                        <?php if ($row['nr_konta_odb'] == $accOwner) : ?>
                            <b class="float-right"><?php echo $row['kwota'] . " PLN" ?></b></br></br>
                        <?php else : ?>
                            <b class="float-right"><?php echo "-" . $row['kwota'] . " PLN" ?></b></br></br>
                        <?php endif; ?>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-5 bg-dark ">
    <div class="container">
        <div class="float-left">
            <a href="#"><img src="resources/images/phone.png" alt="telefon" style="width: 50px; height: 50px;"></a>
            <b class="ml-2" style="color: red; font-size: 20px;">666-666-666</b>
        </div>
        <div class="float-right">
            <a href="#"><img src="resources/images/facebook.png" alt="facebook" style="width: 50px; height: 50px;"></a>
            <a href="#"><img src="resources/images/twitter.png" alt="twitter" style="width: 50px; height: 50px;"></a>
            <a href="#"><img src="resources/images/instagram.png" alt="instagram"
                             style="width: 50px; height: 50px;"></a>
        </div>
        <p class="m-0 text-center text-white">Copyright &copy; Rafał Wawiórka</p>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.0.3/smooth-scroll.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script>
    $(function () {
        var scroll = new SmoothScroll('a[href=#przelew]');
    });
</script>
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("inputFlatNr").setAttribute("min", today);
    document.getElementById("inputFlatNr").value = today;
</script>

<script type="text/javascript">

    function isNumber(event) {
        var keycode = event.keyCode;
        if (keycode >= 48 && keycode <= 57)
            return true;
        return false;
    }

</script>
</body>

</html>