<!DOCTYPE html>
<html>

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
<?php require_once('topmenu.php') ?>

<div class="container container-custom">
    <form action="registerscript.php" method="post" class="check">
        <br/>
        <h2 class="text-center"><b style="color: darkred;">Zarejestruj się!</b></h2>
        <br/>
        <div class="row row-custom">
            <div class="form-group form-text-custom col-md-4">
                <label for="inputFirstName">Imię</label>
                <input type="text" class="form-control" id="inputFirstName" name="imie" placeholder="np. Adam" required>
            </div>
            <div class="form-group form-text-custom col-md-4">
                <label for="inputLastName">Nazwisko</label>
                <input type="text" class="form-control" id="inputLastName" name="nazwisko" placeholder="np. Kowalski"
                       required>
            </div>
            <div class="form-group form-text-custom col-md-4">
                <label for="inputPhoneNr">Numer telefonu</label>
                <input type="text" class="form-control" id="inputPhoneNr" name="nr_tel"
                       onkeypress="return isNumber(event)" minlength="9" maxlength="9" step="1"
                       placeholder="np. 746839281" title="Wpisz tylko liczby!" required>
            </div>
        </div>
        <div class="row row-custom">
            <div class="form-group form-text-custom form-custom col-md-4">
                <label for="inputPesel">Pesel</label>
                <input type="text" class="form-control" id="inputPesel" name="pesel" onkeypress="return isNumber(event)"
                       placeholder="np. 98230338958" step="1"
                       minlength="11"
                       maxlength="11" title="Wpisz tylko liczby!" required>
            </div>
            <div class="form-group form-text-custom form-custom col-md-4">
                <label for="inputAddress">Ulica</label>
                <input type="text" class="form-control" id="inputAddress" name="ulica" placeholder="np. Warszawska"
                       required>
            </div>
            <div class="form-group form-text-custom form-custom col-md-2">
                <label for="inputHouseNr">Nr domu</label>
                <input type="number" class="form-control" id="inputHouseNr" name="nr_domu"
                       onkeypress="return isNumber(event)" oninput="maxLengthCheck(this)" placeholder="np. 16" step="1"
                       min="1" max="99999" title="Wpisz tylko liczby!" required>
            </div>
            <div class="form-group form-text-custom form-custom col-md-2">
                <label for="inputFlatNr"> Nr mieszkania</label>
                <input type="number" class="form-control" id="inputFlatNr" name="nr_mieszkania"
                       onkeypress="return isNumber(event)" oninput="maxLengthCheck(this)" placeholder="np. 30" step="1"
                       min="1" max="9999" title="Wpisz tylko liczby!">
            </div>

        </div>
        <div class="form-row form-text-custom form-custom">
            <div class="form-group col-md-3">
                <label for="inputCity">Email</label>
                <input type="text" class="form-control" id="inputCity" name="email"
                       placeholder="np. a.kowalski@kowal.pl" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">Miasto</label>
                <input type="text" class="form-control" id="inputCity" name="miasto" placeholder="np. Białystok"
                       required>
            </div>
            <div class="form-group form-text-custom col-md-3">
                <label for="inputState">Województwo</label>
                <select id="inputState" class="form-control" name="wojewodztwo" required>
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
            <div class="form-group form-text-custom col-md-2">
                <label for="inputZip">Kod pocztowy</label>
                <input type="text" class="form-control" id="inputZip" name="kod_pocztowy" pattern="^[0-9]{2}-[0-9]{3}$"
                       title="Prawidłowy format to XX-XXX" minlength="6" maxlength="6" placeholder="np. 16-300" required>
            </div>
        </div>
        <div class="form-row form-text-custom form-custom">
            <div class="form-group form-text-custom col-md-6">
                <label for="inputState1">Wybór konta</label>
                <select id="inputState1" class="form-control" name="konto" required>
                    <option>Konto dla mlodych</option>
                    <option>Twoje konto</option>
                    <option>Konto Max walutowe</option>
                    <option>Konto Diamond</option>
                </select>
            </div>
            <div class="form-group form-text-custom col-md-6">
                <label for="inputState2">Wybór karty</label>
                <select id="inputState2" class="form-control" name="karta" required>
                    <option>GOLD VIP</option>
                    <option>Platinum</option>
                    <option>Silver</option>
                    <option>Codzienna</option>
                </select>
            </div>
        </div>
        <div class="row row-custom">
            <div class="form-group text-center ml-auto mr-3">
                <button type="submit" class="btn btn-login btn-custom text-center" name="register">Zarejestruj się!
                </button>
            </div>
            <div class="form-group text-center mr-auto ml-3">
                <button type="reset" class="btn btn-login btn-custom text-center">Wyczyść</button>
            </div>
        </div>
    </form>
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

<script type="text/javascript">

    function isNumber(event) {
        var keycode = event.keyCode;
        if (keycode >= 48 && keycode <= 57)
            return true;
        return false;
    }

    function maxLengthCheck(object) {
        if(object.value.length > object.max.length)
            object.value = object.value.slice(0, object.max.length);
    }
</script>

</body>

</html>