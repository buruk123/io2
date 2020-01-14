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
    <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        function editor(id) {
            CKEDITOR.replace(id);
        }
    </script>
</head>

<body>
<?php
session_start();
@$isLoggedIn = $_SESSION['isLoggedIn'];
require_once "connect.php";
?>
<?php require_once('topmenu.php') ?>

<?php
$sql = "SELECT * FROM użytkownicy WHERE id = {$_SESSION['id']}";
$stmt = $db->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();
$sql = "SELECT * FROM użytkownicy WHERE id = {$_SESSION['id']}";
$stmt = $db->prepare($sql);
$stmt->execute();
$dataa = $stmt->fetch();
?>
<div class="container content">
    <div class="row">
        <div class="col-md-3">
            <div class="btn-group-vertical btn-block">
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseOne" data-target="#collapseOne">Twoje dane
                </button>
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseTwo" data-target="#collapseTwo">Twoje zamówienia
                </button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="text-center form-text-custom">
                            <p>Twoje dane</p>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputEmail4">Imię</label>
                                        <input type="text" name="imie" class="form-control" id="imie"
                                               value="<?php echo $data['imie'] ?>" required="required"
                                            <?php if (isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Nazwisko</label>
                                        <input type="text" name="nazwisko" class="form-control" id="nazwisko"
                                               value="<?php echo $data['nazwisko'] ?>" required="required"
                                            <?php if (isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                               value="<?php echo $data['email'] ?>" required="required"
                                            <?php if (isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Numer telefonu</label>
                                        <input type="number" name="nrtel" class="form-control" id="nrTel"
                                               min="100000000"
                                               max="999999999" value="<?php echo $data['nr_tel'] ?>" required="required"
                                            <?php if (isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress2">Ulica</label>
                                        <input type="text" name="ulica" class="form-control" id="ulica"
                                               value="<?php echo $data['ulica'] ?>" required="required"
                                            <?php if(isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress2">Nr domu</label>
                                        <input type="number" name="nrDomu" class="form-control" id="nrDomu"
                                               value="<?php echo $data['nr_domu'] ?>" required="required"
                                            <?php if(isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress2">Nr mieszkania</label>
                                        <input type="number" name="nrMieszkania" class="form-control" id="nrMieszkania"
                                               value="<?php echo $data['nr_mieszkania']?>" required="required"
                                            <?php if(isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress2">Miasto</label>
                                        <input type="text" name="miasto" class="form-control" id="miasto"
                                               value="<?php echo $data['miasto'] ?>" required="required"
                                            <?php if(isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleFormControlSelect1">Województwo</label>
                                        <select class="form-control" name="wojewodztwo" id="wojewodztwo"
                                                required="required"
                                            <?php if(isset($_POST['isDisabled'])):
                                            ?>>
                                            <?php else: ?>
                                                disabled="disabled">
                                            <?php endif ?>
                                            <?php
                                            switch (strtolower($data['wojewodztwo'])) {
                                                case 'dolnośląskie':
                                                    echo '<option selected>dolnośląskie</option>';
                                                    break;
                                                case 'kujawsko-pomorskie':
                                                    echo '<option selected>kujawsko-pomorskie</option>';
                                                    break;
                                                case 'lubelskie':
                                                    echo '<option selected>lubelskie</option>';
                                                    break;
                                                case 'lubuskie':
                                                    echo '<option selected>lubuskie</option>';
                                                    break;
                                                case 'łódzkie':
                                                    echo '<option selected>łódzkie</option>';
                                                    break;
                                                case 'małopolskie':
                                                    echo '<option selected>małopolskie</option>';
                                                    break;
                                                case 'mazowieckie':
                                                    echo '<option selected>mazowieckie</option>';
                                                    break;
                                                case 'opolskie':
                                                    echo '<option selected>opolskie</option>';
                                                    break;
                                                case 'podkarpackie':
                                                    echo '<option selected>podkarpackie</option>';
                                                    break;
                                                case 'podlaskie':
                                                    echo '<option selected>podlaskie</option>';
                                                    break;
                                                case 'pomorskie':
                                                    echo '<option selected>pomorskie</option>';
                                                    break;
                                                case 'śląskie':
                                                    echo '<option selected>śląskie</option>';
                                                    break;
                                                case 'świętokrzyskie':
                                                    echo '<option selected>świętokrzyskie</option>';
                                                    break;
                                                case 'warmińsko-mazurskie':
                                                    echo '<option selected>warmińsko-mazurskie</option>';
                                                    break;
                                                case 'wielkopolskie':
                                                    echo '<option selected>wielkopolskie</option>';
                                                    break;
                                                case 'zachodniopomorskie':
                                                    echo '<option selected>zachodniopomorskie</option>';
                                                    break;

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress2">Poczta</label>
                                        <input type="text" name="kodPocztowy" class="form-control isDisabled"
                                               id="poczta"
                                               value="<?php echo $data['kod_pocztowy'] ?>" required="required"
                                            <?php if(isset($_POST['isDisabled'])):
                                            ?>>
                                        <?php else: ?>
                                            disabled="disabled">
                                        <?php endif ?>
                                    </div>
                                </div>
                                <?php if(isset($_POST['isDisabled'])):
                                    ?>
                            <form action="zmien_dane.php" method="post" id="edytuj"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                <input type="hidden" name="imie" id="setImie" value="">
                                <input type="hidden" name="nazwisko" id="setNazwisko" value="">
                                <input type="hidden" name="email" id="setEmail" value="">
                                <input type="hidden" name="nrTel" id="setNrTel" value="">
                                <input type="hidden" name="ulica" id="setUlica" value="">
                                <input type="hidden" name="nrDomu" id="setNrDomu" value="">
                                <input type="hidden" name="nrMieszkania" id="setNrMieszkania" value="">
                                <input type="hidden" name="miasto" id="setMiasto" value="">
                                <input type="hidden" name="wojewodztwo" id="setWojewodztwo" value="">
                                <input type="hidden" name="poczta" id="setPoczta" value="">
                                <button onclick="setValues()" type="submit" class="btn btn-warning">
                                    Zmień dane
                                </button>
                                <?php else: ?>
                            <form action="panel_uzytkownika.php" method="post" id="edytuj"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="isDisabled">
                                    <button type="submit" class="btn btn-warning">
                                        Edytuj
                                    </button>
                                <?php endif ?>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="text-center form-text-custom">
                            <p>Twoje zamówienia</p>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Nr zamówienia</th>
                                    <th scope="col">Data złożenia</th>
                                    <th scope="col">Rodzaj dostawy</th>
                                    <th scope="col">Rodzaj płatności</th>
                                    <th scope="col">Wartość</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql3 = "SELECT * FROM zamowienia WHERE id_uzytkownika = {$_SESSION['id']}";
                                $stmt3 = $db->prepare($sql3);
                                $stmt3->execute();
                                $id = 0;
                                while ($data3 = $stmt3->fetch()) {
                                    $sql = "SELECT * FROM zamowienia WHERE id = {$data3['id']}";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    $prodsIdsArr = array();
                                    while ($data = $stmt->fetch()) {
                                        array_push($prodsIdsArr, $data['id_prod']);
                                    }
                                    $prodsIds = implode(", ", $prodsIdsArr);
                                    $sql2 = "SELECT cena, czyPrzecena, ilePrzecena FROM produkty WHERE id IN (" . $prodsIds . ")";
                                    $stmt2 = $db->prepare($sql2);
                                    $stmt2->execute();
                                    $cenaProdArr = array();
                                    while ($data2 = $stmt2->fetch()) {
                                        if ($data2['czyPrzecena'] == 1) {
                                            $cenaPo = (int)$data2['cena'] - (int)$data2['ilePrzecena'];
                                        } else {
                                            $cenaPo = $data2['cena'];
                                        }
                                        array_push($cenaProdArr, $cenaPo);
                                    }
                                    $wartosc = 0;
                                    for ($i = 0; $i < count($cenaProdArr); $i++) {
                                        $wartosc += $cenaProdArr[$i];
                                    }
                                    echo '
                                        <tr>
                                        ';
                                    if ($id == $data3['id']) continue;
                                    echo '
                                            <th scope="row">' . $data3['id'] . '</th>
                                            <td>' . $data3['data'] . '</td>
                                            <td>' . $data3['rodzaj_dostawy'] . '</td>
                                            <td>' . $data3['rodzaj_platnosci'] . '</td>
                                            <td>' . $wartosc . '.00zł</td>
                                        </tr>
                                ';
                                    $id = $data3['id'];
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script>
    function getEmail(counter) {
        var email = document.getElementById(counter.toString()).innerText;
        document.getElementById("replyTo").innerText = email;
    }
</script>

<script>
    function setEmail() {
        var email = document.getElementById("replyTo").innerText;
        document.getElementById("replyToInputHidden").value = email;
    }
</script>

<script>
    function setValues() {
        //getValues
        var imie = document.getElementById("imie").value;
        var nazwisko = document.getElementById("nazwisko").value;
        var email = document.getElementById("email").value;
        var nrTel = document.getElementById("nrTel").value;
        var ulica = document.getElementById("ulica").value;
        var nrDomu = document.getElementById("nrDomu").value;
        var nrMieszkania = document.getElementById("nrMieszkania").value;
        var miasto = document.getElementById("miasto").value;
        var wojewodztwo = document.getElementById("wojewodztwo").value;
        var poczta = document.getElementById("poczta").value;

        //setValues
        document.getElementById("setImie").value = imie;
        document.getElementById("setNazwisko").value = nazwisko;
        document.getElementById("setEmail").value = email;
        document.getElementById("setNrTel").value = nrTel;
        document.getElementById("setUlica").value = ulica;
        document.getElementById("setNrDomu").value = nrDomu;
        document.getElementById("setNrMieszkania").value = nrMieszkania;
        document.getElementById("setMiasto").value = miasto;
        document.getElementById("setWojewodztwo").value = wojewodztwo;
        document.getElementById("setPoczta").value = poczta;
    }
</script>
</body>
</html>