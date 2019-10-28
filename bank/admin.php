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

    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php require_once('wiadomosci.php') ?>
<?php require_once('connect.php') ?>
<?php require_once('topmenu.php') ?>
<div class="container container-custom">
    <div class="row">
        <div class="col-4">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                    <h4 class="card-title" style="color: red;">Panel</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a id="messages" onclick="Collapse(); Show1();" class="nav-link" href="#">Wiadomości</a>
                        </li>
                        <li class="nav-item">
                            <a id="accept" onclick="Collapse(); Show2();" class="nav-link" href="#">Akceptacja</a>
                        </li>
                        <li class="nav-item">
                            <a id="stats" onclick="Collapse(); Show3();" class="nav-link" href="#">Statystyki</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body">
                    <div id="hide1">
                        <h5>Oczekujących wiadomości: <b style="color: red;"><?php echo $_SESSION['messageCount'] ?></b>
                        </h5>
                        <h5>Oczekujących akceptacji: <b style="color: red;"><?php echo $_SESSION['waitCount'] ?></b>
                        </h5>
                    </div>
                    <div id="show1" style="display: none;">
                        <?php if ($_SESSION['messageCount'] == 0) : ?>
                            <h5 class="text-primary"><b>Brak wiadomości</b></h5>
                        <?php else : ?>
                            <?php
                            $idAdmina1 = $_SESSION['id_konta'];
                            $sql1 = "SELECT * from formularze WHERE id_admina = $idAdmina1";

                            foreach ($db->query($sql1) as $row1) {

                                ?>
                                <h5 class="text-primary">Wiadomość od: <b
                                            style="color: red;"><?php echo $row1['imie'] . ' ' . $row1['nazwisko'] ?></b>
                                </h5>
                                <h6><?php echo $row1['email'] ?></h6>
                                <h6><?php echo $row1['wiadomosc'] ?></h6>
                                <h6>Odpowiedz:</h6>
                                <form action="wiadomosci.php" method="post">
                                    <textarea rows="6" style="width: 100%;"></textarea>
                                    <div class="row row-custom">
                                        <div class="form-group text-center ml-auto mr-3">
                                            <button type="submit" class="btn btn-login btn-custom text-center"
                                                    name="message">Odpowiedz
                                            </button>
                                        </div>
                                        <div class="form-group text-center mr-auto ml-3">
                                            <button type="reset"
                                                    class="btn btn-login btn-custom text-center">Wyczyść
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="show2" style="display: none;">
                    <?php if ($_SESSION['waitCount'] == 0) : ?>
                        <h5 class="text-primary">Brak akceptacji do zaakceptowania</h5>
                    <?php else : ?>
                    <h5 class="text-primary">Oczekujące akceptacje</h5>
                    <?php
                    $idAdmina2 = $_SESSION['id_konta'];
                    $sql2 = "SELECT * FROM oczekujace WHERE id_admina = $idAdmina2";

                    foreach ($db->query($sql2) as $row2) {
                    $accID = $row2['id_rodz_konta'];
                    $cardID = $row2['id_rodz_karty'];
                    $accNameSql = "SELECT nazwa_konta FROM rodzaje_kont WHERE id_rodz_konta = $accID";
                    $cardNameSql = "SELECT nazwa_karty FROM rodzaje_kart WHERE id_rodz_karty = $cardID";
                    $stmt1 = $db->prepare($accNameSql);
                    $stmt1->execute();
                    $accName = $stmt1->fetch();

                    $stmt1 = $db->prepare($cardNameSql);
                    $stmt1->execute();
                    $cardName = $stmt1->fetch();

                    $idKonta = $row2['id_oczekujacego'];

                    ?>

                    <form action="acceptWaiting.php" method="post">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Imie: </b><br/><input type="text" name="imie" value="<?php echo $row2['imie'] ?>"
                                                             disabled></td>
                                <td colspan="2"><b>Nazwisko: </b><br/><input type="text" name="nazwisko"
                                                                             value="<?php echo $row2['nazwisko'] ?>"
                                                                             disabled></td>
                            </tr>
                            <tr>
                                <td><b>Nr tel: </b><br/><input type="number" name="nrTel"
                                                               value="<?php echo $row2['nr_tel'] ?>" disabled></td>
                                <td><b>Pesel: </b><br/><input type="number" name="pesel"
                                                              value="<?php echo $row2['pesel'] ?>" disabled></td>
                                <td><b>Email: </b><br/><input type="text" name="email"
                                                              value="<?php echo $row2['email'] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td><b>Ulica: </b><br/><input type="text" name="ulica"
                                                              value="<?php echo $row2['ulica'] ?>" disabled></td>
                                <td><b>Nr domu: </b><br/><input type="number" name="nrDomu"
                                                                value="<?php echo $row2['nr_domu'] ?>" disabled></td>
                                <?php if ($row2['nr_mieszkania'] != 0): ?>
                                    <td><b>Nr mieszkania: </b><br/><input type="number" name="nrMieszkania"
                                                                          value="<?php echo $row2['nr_mieszkania'] ?>"
                                                                          disabled></td>
                                <?php else : ?>
                                    <td><b>Nr mieszkania: </b><br/><input type="number" name="nrMieszkania"
                                        <?php $row2['nr_mieszkania'] = null; ?> disabled>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td><b>Miasto: </b><br/><input type="text" name="miasto"
                                                               value="<?php echo $row2['miasto'] ?>" disabled></td>
                                <td><b>Wojewodztwo: </b><br/><input type="text" name="wojewodztwo"
                                                                    value="<?php echo $row2['wojewodztwo'] ?>" disabled>
                                </td>
                                <td><b>Kod pocztowy: </b><br/><input type="text" name="kodPocztowy"
                                                                     value="<?php echo $row2['kod_pocztowy'] ?>"
                                                                     disabled></td>
                            </tr>
                            <tr>
                                <td><b>Nazwa konta: </b><br/><input type="text" name="nazwaKonta"
                                                                    value="<?php echo $accName['nazwa_konta'] ?>"
                                                                    disabled></td>
                                <td colspan="2"><b>Nazwa karty: </b><br/><input type="text" name="nazwaKarty"
                                                                                value="<?php echo $cardName['nazwa_karty'] ?>"
                                                                                disabled></td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id_oczekujacego" value="<?php echo $idKonta ?>">
                        <div class="form-group text-center ml-auto mr-3">
                            <input type="submit" class="btn btn-login btn-custom text-center" name="accept"
                                   value="Zaakceptuj">
                            <input type="submit" class="btn btn-login btn-custom text-center" name="decline"
                                   value="Odrzuć">
                        </div>

                        <?php } ?>
                        <?php endif; ?>
                    </form>
                </div>
                <div id="show3" style="display: none;">
                    <h5 class="text-primary">Statystyka nowych klientów</h5>
                    <div class="w-100">
                        <img src="resources/images/wykres.PNG" alt="wykres" style="width:100%">
                    </div>
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
            <a href="#"><img src="resources/images/facebook.png" alt="facebook"
                             style="width: 50px; height: 50px;"></a>
            <a href="#"><img src="resources/images/twitter.png" alt="twitter"
                             style="width: 50px; height: 50px;"></a>
            <a href="#"><img src="resources/images/instagram.png" alt="instagram"
                             style="width: 50px; height: 50px;"></a>
        </div>
        <p class="m-0 text-center text-white">Copyright &copy; Rafał Wawiórka</p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>

    function Collapse() {
        document.getElementById("hide1").style.display = "none";

        if (document.getElementById("accept").onclick == Show1()) {
            Show1();
        }
        if (document.getElementById("accept").onclick == Show2()) {
            Show2();
        }
        if (document.getElementById("accept").onclick == Show3()) {
            Show3();
        }
    }

    function Show1() {
        document.getElementById("show1").style.display = "block";
        document.getElementById("show2").style.display = "none";
        document.getElementById("show3").style.display = "none";
    }

    function Show2() {
        document.getElementById("show1").style.display = "none";
        document.getElementById("show2").style.display = "block";
        document.getElementById("show3").style.display = "none";
    }

    function Show3() {
        document.getElementById("show1").style.display = "none";
        document.getElementById("show2").style.display = "none";
        document.getElementById("show3").style.display = "block"
    }
</script>
</body>

</html>