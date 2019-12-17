<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-wiewiórka</title>
    <meta name="description" content="Projekt banku">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="sitestyle.css">
</head>

<body>
<?php require_once('topmenu.php') ?>

<div class="container">
    <h1 class="my-4">Formularz kontaktowy</h1>

    <form action="dodaj_wiadomosc.php" method="post" enctype="multipart/form-data">
        <div class="row row-custom">
            <div class="form-group form-text-custom col-md-6">
                <label for="inputFirstName">Imię</label>
                <?php if (isset($isLoggedIn)) : ?>
                    <input type="text" class="form-control" id="inputFirstName" name="imie"
                           value="<?php echo $_SESSION['imie'] ?>">
                <?php else : ?>
                    <input type="text" class="form-control" id="inputFirstName" name="imie" placeholder="np. Adam">
                <?php endif; ?>
            </div>
            <div class="form-group form-text-custom col-md-6">
                <label for="inputLastName">Nazwisko</label>
                <?php if (isset($isLoggedIn)) : ?>
                    <input type="text" class="form-control" id="inputLastName" name="nazwisko"
                           value="<?php echo $_SESSION['nazwisko'] ?>">
                <?php else : ?>
                    <input type="text" class="form-control" id="inputLastName" name="nazwisko"
                           placeholder="np. Kowalski">
                <?php endif; ?>
            </div>
        </div>

        <div class="form-row form-text-custom form-custom">
            <div class="form-group form-text-custom col-md-6">
                <label for="inputPhoneNr">Numer telefonu</label>
                <?php if(isset($isLoggedIn)): ?>
                <input type="text" class="form-control" id="inputPhoneNr" minlength="9" maxlength="9" name="nrTel"
                       value="<?php echo $_SESSION['nr_tel'] ?>">
                <?php else : ?>
                    <input type="text" class="form-control" id="inputPhoneNr" minlength="9" maxlength="9" name="nrTel"
                           placeholder="np. 666666666">
                <?php endif; ?>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">Email</label>
                <?php if(isset($isLoggedIn)) : ?>
                <input type="text" class="form-control" id="inputCity" name="email"
                       value="<?php echo $_SESSION['email'] ?>">
                <?php else : ?>
                    <input type="text" class="form-control" id="inputCity" name="email"
                           placeholder="np. a.kowalski@kowal.com">
                <?php endif; ?>
            </div>
        </div>
        <div class="row row-custom">
            <h5>Napisz wiadomość</h5>
            <textarea rows="6" style="width: 100%" name="wiadomosc"></textarea>
        </div>
        <div class="row row-custom">
            <div class="form-group text-center ml-auto mr-3">
                <button type="submit" class="btn btn-login btn-custom text-center" name="send">Wyślij</button>
            </div>
            <div class="form-group text-center mr-auto ml-3">
                <button type="reset" class="btn btn-login btn-custom text-center">Wyczyść</button>
            </div>
        </div>
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

</body>

</html>