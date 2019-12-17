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
    <div class="row">

        <table class="table table-full">
            <thead>
            <tr>
                <th scope="col">L.p</th>
                <th scope="col">Produkt</th>
                <th scope="col">Cena</th>
                <th scope="col">Ilość</th>
                <th scope="col">Razem</th>
            </tr>
            </thead>
            <?php
            require_once "connect.php";
            $sql = "SELECT * FROM sklep.koszyk LEFT JOIN produkty p on koszyk.id_produktu = p.id WHERE id_uzytkownika = '{$_SESSION['id']}'";
            $stmt = $db->prepare($sql);
            $query = $stmt->execute();
            $counter = 1;
            $doZaplaty = 0;
            while ($data = $stmt->fetch()) {
                $cenaNumber = (int)$data['cena'];
                $iloscNumber = (int)$data['ilosc'];
                if ($data['czyPrzecena'] = 1) {
                    $cenaPo = (int)$data['cena'] - (int)$data['ilePrzecena'];
                } else {
                    $cenaPo = $cenaNumber;
                }
                $razem = $cenaPo * $iloscNumber;
                $doZaplaty += $razem;
                echo
                    '
                            <tbody>
                                <tr>
                                  <th scope="row">' . $counter . '</th>
                                  <td>' . $data['marka'] . ' ' . $data['model'] . '</td>
                                  <td>' . $cenaPo . '.00zł</td>
                                  <td>' . $data['ilosc'] . '</td>
                                  <td>' . $razem . '.00zł</td>
                                  <form action="usun_z_koszyka.php" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="id" value="' . $data['id'] . '">
                                  <input type="hidden" name="ilosc" value="' . $data['ilosc'] . '">
                                  <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                                  </form>
                                </tr>
                            </tbody>
                    ';
                $counter++;
            }
            ?>
        </table>
    </div>
    <h5>Wartość zakupów: <?php echo $doZaplaty; ?>.00 zł</h5>
    <?php
    if ($doZaplaty === 0) {
        echo '<button class="btn btn-warning disabled">Dodaj do koszyka aby przejść dalej</button>';
    } else {
        $sql2 = "SELECT * FROM sklep.użytkownicy WHERE id = '{$_SESSION['id']}'";
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();
        $data2 = $stmt2->fetch();
        echo '<button class="btn btn-warning" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Przejdź do płatności</button>';
    }
    ?>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form action="kup_przedmiot.php" method="post" enctype="multipart/form-data">
                <h4>1. Wybierz sposób dostawy</h4>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" value="KURIER">Kurier
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" value="OSOBISTY">Odbiór osobisty
                    </label>
                </div>
                <h4>2. Wybierz sposób płatności</h4>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio2" value="BLIK">Blik
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio2" value="KARTA">Karta płatnicza
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio2" value="GOTOWKA">Płatność przy
                        odbiorze
                    </label>
                </div>
                <h3>3. Wpisz dane do wysyłki</h3>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Imie</label>
                        <input type="text" name="imie" class="form-control" id="inputEmail4"
                               value="<?php echo $data2['imie'] ?> " required="required">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Nazwisko</label>
                        <input type="text" name="nazwisko" class="form-control" id="inputEmail4"
                               value="<?php echo $data2['nazwisko'] ?>" required="required">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4"
                               value="<?php echo $data2['email'] ?>" required="required">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputAddress">Numer telefonu</label>
                        <input type="number" name="nrtel" class="form-control" id="nrTel" min="100000000"
                               max="999999999" value="<?php echo $data2['nr_tel'] ?>" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress2">Ulica</label>
                        <input type="text" name="ulica" class="form-control" id="inputAddress2"
                               value="<?php echo $data2['ulica'] ?>" required="required">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputAddress2">Nr domu</label>
                        <input type="number" name="nrDomu" class="form-control" id="inputAddress2"
                               value="<?php echo $data2['nr_domu'] ?>" required="required">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputAddress2">Mieszkania</label>
                        <input type="number" name="nrMieszkania" class="form-control" id="inputAddress2"
                               value="<?php echo $data2['nr_mieszkania'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress2">Miasto</label>
                        <input type="text" name="miasto" class="form-control" id="inputAddress2"
                               value="<?php echo $data2['miasto'] ?>" required="required">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlSelect1">Województwo</label>
                        <select class="form-control" name="wojewodztwo" id="exampleFormControlSelect1"
                                required="required">
                            <?php
                            switch (strtolower($data2['wojewodztwo'])) {
                                case 'dolnośląskie':
                                    echo '
                                        <option selected>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'kujawsko-pomorskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option selected>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'lubelskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option selected>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'łódzkie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option selected>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'małopolskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option selected>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'opolskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option selected>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'podkarpackie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option selected>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'podlaskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option selected>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'pomorskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option selected>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'śląskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option selected>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'świętokrzyskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option selected>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'warmińsko-mazurskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option selected>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'wielkopolskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option selected>wielkopolskie</option>
                                        <option>zachodniopomorskie</option>
                                    ';
                                    break;
                                    case 'zachodniopomorskie':
                                    echo '
                                        <option>dolnośląskie</option>
                                        <option>kujawsko-pomorskie</option>
                                        <option>lubelskie</option>
                                        <option>lubuskie</option>
                                        <option>łódzkie</option>
                                        <option>małopolskie</option>
                                        <option>mazowieckie</option>
                                        <option>opolskie</option>
                                        <option>podkarpackie</option>
                                        <option>podlaskie</option>
                                        <option>pomorskie</option>
                                        <option>śląskie</option>
                                        <option>świętokrzyskie</option>
                                        <option>warmińsko-mazurskie</option>
                                        <option>wielkopolskie</option>
                                        <option selected>zachodniopomorskie</option>
                                    ';
                                    break;
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputAddress2">Poczta</label>
                        <input type="text" name="kodPocztowy" class="form-control" id="kodPocztowy"
                               value="<?php echo $data2['kod_pocztowy'] ?>" required="required">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                <button type="submit" class="btn btn-warning">Kup Teraz</button>
            </form>
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
<script>
    $("#kodPocztowy").on("keyup", function (e) {
        if ($(this).val().length === 2) {
            $(this).val($(this).val() + '-');
        }
        if (e.keyCode === 8 && $(this).val().length === 3) {
            $(this).val($(this).val().substr(0, 1));
        }
        if ($(this).val().length >= 6) {
            $(this).val($(this).val().substr(0, 6));
        }
    });
    $("#nrTel").on("keyup", function () {
        if ($(this).val().length >= 9) {
            $(this).val($(this).val().substr(0, 9));
        }
    });
</script>
</body>
</html>