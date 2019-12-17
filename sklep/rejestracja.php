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
<?php require_once('topmenu.php') ?>

<div class="container content">
    <h2 class="text-center">Rejestracja</h2>
    <form action="rejestracja_skrypt.php" method="post"
          enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputEmail4">Imie</label>
                <input type="text" name="imie" class="form-control" id="inputEmail4" placeholder="Tadeusz" required="required">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Nazwisko</label>
                <input type="text" name="nazwisko" class="form-control" id="inputEmail4" placeholder="Kowalski" required="required">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required="required">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Hasło</label>
                <input type="password" name="haslo" class="form-control" id="inputPassword4" placeholder="Password" required="required">
            </div>
            <div class="form-group col-md-2">
                <label for="inputAddress">Numer telefonu</label>
                <input type="number" name="nrtel" class="form-control" id="nrTel" min="100000000" max="999999999" placeholder="666 666 666" required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAddress2">Ulica</label>
                <input type="text" name="ulica" class="form-control" id="inputAddress2" placeholder="Warszawska" required="required">
            </div>
            <div class="form-group col-md-1">
                <label for="inputAddress2">Nr domu</label>
                <input type="number" name="nrDomu" class="form-control" id="inputAddress2" placeholder="1" required="required">
            </div>
            <div class="form-group col-md-1">
                <label for="inputAddress2">Mieszkania</label>
                <input type="number" name="nrMieszkania" class="form-control" id="inputAddress2" placeholder="1">
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress2">Miasto</label>
                <input type="text" name="miasto" class="form-control" id="inputAddress2" placeholder="Białystok" required="required">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlSelect1">Województwo</label>
                <select class="form-control" name="wojewodztwo" id="exampleFormControlSelect1" required="required">
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
                    <option>zachodniopomorskie</option>
                </select>
            </div>
            <div class="form-group col-md-1">
                <label for="inputAddress2">Poczta</label>
                <input type="text" name="kodPocztowy" class="form-control" id="kodPocztowy" placeholder="12-222" required="required">
            </div>
        </div>
        <button type="submit" class="btn btn-warning"><strong>Zarejestuj się</strong></button>
    </form>
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
    $("#nrTel").on("keyup", function() {
        if($(this).val().length >= 9) {
            $(this).val($(this).val().substr(0, 9));
        }
    });
</script>

</body>

</html>
