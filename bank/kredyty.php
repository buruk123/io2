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
?>
<?php require_once('topmenu.php') ?>
<div class="container">

    <h2 class="my-4">Kredyty</h2>

    <div class="accordion" id="accordionExample">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="text-center form-text-custom">
                            <p>Koncert pożyczeń</p>
                        </div>
                        <div>
                            Potrzebujesz szybkich pieniędzy na dowolny cel? Lepiej nie mogłeś trafić. Już teraz weź
                            pożyczkę - szybko, łatwo i tanio! RRSO 14%
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>Szybko - na decyzję czekasz mniej niż 5 minut</li>
                                <li>Łatwo - ustaw kwotę i raty</li>
                                <li>Minimalna kwota kredytu to 1 000 zł do nawet 160 000zł</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <div class="text-center form-text-custom">
                            <p>Kredyt mieszkaniowy</p>
                        </div>
                        <div>
                            Wszędzie dobrze ale w domu najlepiej. Marzą Ci się własne cztery kąty? Już dziś zrób
                            pierwszy krok do własnego M. RRSO 10%
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>Kwota od 40 000 PLN</li>
                                <li>Dofinansowanie nawet 90% wartości mieszkania</li>
                                <li>Możliwość jednorazowego <q>zawieszenia kredytu</q> na okres aż 36 miesięcy</li>
                                <li>Spłata do 35 lat</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div class="text-center form-text-custom">
                            <p>Połącz się</p>
                        </div>
                        <div>
                            Połącz zobowiązania z innych banków w jedną pożyczkę. Dopasuj wysokość raty do swoich
                            możliwości finansowych. RRSO 11%
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>Sam określasz wysokość i dzień płatności raty</li>
                                <li>Możesz skonsolidować aż do 7 kredytów z innych banków</li>
                                <li>Nie musisz dostarczać do banku żadnych dokumentów dotyczących konsolidowanych
                                    kredytów
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <div class="text-center form-text-custom">
                            <p>Studencki Kredyt</p>
                        </div>
                        <div>
                            Masz status studenta i brakuje Ci pieniędzy? Już teraz weź kredyt a spłacać zaczniesz
                            dopiero rok po zakończeniu studiów. RRSO 9%
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>Dowolność wyboru wysokości wypłacanych transz: 400 zł, 600 zł a nawet 1000 zł
                                    miesięcznie
                                </li>
                                <li>Część kosztów jest pokrywana ze środków budżetu państwa</li>
                                <li>Możliwość całkowitego umożenia dla najlepszych absolwentów uczelni</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body text-center mt-5" id="calculatorContainer">
                <h1 class="heading display-5 pb-3">Kalkulator kredytu</h1>
                <form id="loan-form">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Kwota</span>
                            </div>
                            <input type="number" id="amount" placeholder="np. 10000" class="form-control" name="1"
                                   value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rodzaj kredytu</span>
                            </div>
                            <select id="interest" class="form-control" name="nazwaKredytu">
                                <option value="0">Koncert pożyczeń</option>
                                <option value="1">Kredyt mieszkaniowy</option>
                                <option value="2">Połącz się</option>
                                <option value="3">Studencki Kredyt</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Ilość rat</span>
                            <input type="number" id="years" placeholder="np. 12" class="form-control" name="2"
                                   value="" min="12">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" id="submit" name="7" class="btn btn-dark btn-block">Oblicz</button>
                    </div>

                    <!-- Loader  -->
                    <div id="loading">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif"
                             alt="Loading Gif" style="height: 100px;" class="img-fluid">
                    </div>
                    <!-- Result  -->
                    <div id="results" class="pt-4">
                        <h5>Results:</h5>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Miesięcznie do zapłaty</span>
                                </div>
                                <input type="number" id="monthly-payment" class="form-control" name="3" value=""
                                       disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Suma do zapłaty</span>
                                </div>
                                <input type="number" id="total-payment" class="form-control" name="4" value="" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Odsetki</span>
                                </div>
                                <input type="number" id="total-interest" class="form-control" name="5" value=""
                                       disabled>
                            </div>
                        </div>
                    </div>
                </form>
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

<script>
    document.getElementById('submit').addEventListener('click', function (e) {
        e.preventDefault();
        // Hide results
        document.querySelector('#results').style.display = 'none';
        // Show loader
        document.querySelector('#loading').style.display = 'block';
        // Set timer
        setTimeout(calculateResults, 500);
    });

    const rrsoValuesForCredits = [0.14, 0.10, 0.11, 0.09];

    function calculateResults(e) {
        const amount = document.getElementById('amount');
        const selectedInterest = document.getElementById('interest');
        const months = document.getElementById('years');

        const selectedRRSOIndex = parseInt(selectedInterest.options[selectedInterest.selectedIndex].value);
        let min, max;
        switch (selectedRRSOIndex) {
            case 0: {
                min = 1000;
                max = 160000;
                break;
            }
            case 1: {
                min = 40000;
                max = 3500000;
                break;
            }
            case 2: {
                min = 20000;
                max = 1000000;
                break;
            }
            case 3: {
                min = 1000;
                max = 20000;
                break;
            }

        }

        const monthlyPayment = document.getElementById('monthly-payment');
        const totalPayment = document.getElementById('total-payment');

        const totalInterest = document.getElementById('total-interest');

        const principal = parseFloat(amount.value);

        if (selectedRRSOIndex === 0 && (principal < min || principal > max)) {
            showError(`Wybierz kwotę kredytu z przedziału ${min} PLN a ${max} PLN`);
            return;
        } else if (selectedRRSOIndex === 1 && (principal < min || principal > max)) {
            showError(`Wybierz kwotę kredytu z przedziału ${min} PLN a ${max} PLN`);
            return;
        } else if (selectedRRSOIndex === 2 && (principal < min || principal > max)) {
            showError(`Wybierz kwotę kredytu z przedziału ${min} PLN a ${max} PLN`);
            return;
        } else if (selectedRRSOIndex === 3 && (principal < min || principal > max)) {
            showError(`Wybierz kwotę kredytu z przedziału ${min} PLN a ${max} PLN`);
            return;
        }

        const selectedRRSOValue = rrsoValuesForCredits[selectedRRSOIndex];

        // Compute monthly payments
        const x = 1 + (selectedRRSOValue / 12);
        const monthly = ((principal * Math.pow(x, years.value) * (x - 1)) / (Math.pow(x, years.value) - 1));


        if (isFinite(monthly)) {
            monthlyPayment.value = monthly.toFixed(2);
            totalPayment.value = (monthly * months.value).toFixed(2);
            totalInterest.value = ((monthly * months.value) - principal).toFixed(2);
            document.querySelector('#results').style.display = 'block';
            document.querySelector('#loading').style.display = 'none';
        } else {
            showError('Wpisz wartości we wszystkie pola');
        }
    }

    // Show Error
    function showError(error) {
        // Hide results
        document.querySelector('#results').style.display = 'none';
        // Hide loader
        document.querySelector('#loading').style.display = 'none';
        // Create a div
        const errorDiv = document.createElement('div');
        // Get elements
        const card = document.getElementById('calculatorContainer');
        const heading = document.querySelector('.heading');
        // Add class
        errorDiv.className = 'alert alert-danger';
        // Create text node and append to div
        errorDiv.appendChild(document.createTextNode(error));
        // Insert error above heading
        card.insertBefore(errorDiv, heading);
        // Clear error after 3 seconds
        setTimeout(clearError, 3000);
    }

    // Clear error
    function clearError() {
        document.querySelector('.alert').remove();
    }
</script>
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