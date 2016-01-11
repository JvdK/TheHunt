<?php
session_start();
error_reporting(E_ALL);

// Dit zijn de antwoorden, vul hier het goede antwoord in die je bij de multiple choice hebt neergezet
$questions = array(
    1 => 2,
    2 => 2,
    3 => 3,
    4 => 2,
    5 => 1,
    6 => 1,
    7 => 1,
    8 => 4,
    9 => 3,
    10 => 1,
    11 => 1,
    12 => 4,
    13 => 3,
    14 => 1,
    15 => 2,
    16 => 1,
    17 => 4,
    18 => 1,
    19 => 1,
    20 => 4,
    21 => 1

);

// Check het antwoord
function check_answer($vraagid, $answer) {
    global $questions;

    if(isset($questions[$vraagid])) {
        if($questions[$vraagid] == $answer) {
            $result = true;
        } else {
            $result = false;
        }
    } else {
        $result = false;
    }

    return $result;
}
?>
<html>
<head>
    <title>TheHunt</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0 minimal-ui" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/point.js"></script>
    <script src="js/js.cookie.js"></script>
    <script src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <?php
    if (!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    } else {
        $_SESSION['count']++;
    }

    // Handel vragen af
    if(isset($_GET['vraag'])) {
        // Haal vraag ID uit link of zet anders op 1
        if(isset($_GET['vraag'])) {
            $vraagid = $_GET['vraag'];
        } else {
            $vraagid = 1;
        }
        // Controleer antwoord en geef feedback //
        if(isset($_GET['antwoord'])) {
            $result = check_answer($vraagid, $_GET['antwoord']);
            // Volgende vraag (statische volgorde)
            $next = $vraagid + 1;
            if($result) {
                // Geef punten //
                $_SESSION['punten'] = $_SESSION['punten'] + 5;
                ?>
                <div style="height: 100%; width: 100%; background-color: darkgreen;">
                    <div class="result">
                        CORRECT
                    </div>
                </div>
            <?php } else { ?>
                <div style="height: 100%; width: 100%; background-color: darkred;">
                    <div class="result">
                        FOUT
                    </div>
                </div>
            <?php } ?>
            <script>
                setTimeout("location.href = 'index.php?vraag=<?php echo $next; ?>';",2500);
            </script>
            <?php
        } else {
            if(isset($_GET['opgegeven'])) {
                $_SESSION['punten'] = $_SESSION['punten'] - 5;
                $next = $vraagid + 1;
                ?>
                <div style="height: 100%; width: 100%; background-color: grey;">
                    <div class="result">
                        JAMMER
                    </div>
                </div>
                <script>
                    setTimeout("location.href = 'index.php?vraag=<?php echo $next; ?>';",2500);
                </script>
                <?php
            } else {
                // Hier kunnen alle vragen ingezet worden.
                switch ($vraagid) {
                    case 1: ?>
                        <div>
                            <div class="topbar">
                                <div class="back">
                                    <a href="index.php"><</a>
                                </div>
                                <div class="points">
                                    <?php echo $_SESSION['punten']; ?> Punten
                                </div>
                            </div>
                            <div class="question">
                                <div class="questionInner">
                                    <br>Wat is het grootste land?
                                </div>
                            </div>
                            <div class="answers">
                                <a href="index.php?vraag=1&antwoord=1"><div>Nederland</div></a>
                                <a href="index.php?vraag=1&antwoord=2"><div>Rusland</div></a>
                                <a href="index.php?vraag=1&antwoord=3"><div>China</div></a>
                                <a href="index.php?vraag=1&antwoord=4"><div>Amerika</div></a>
                                <br>
                                <a href="index.php?vraag=1&opgegeven"><div>Geef op (-5)</div></a>
                            </div>
                        </div>
                        <?php
                        break;
                    case 2: ?>
                        <div>
                            <div class="topbar">
                                <div class="back">
                                    <a href="index.php"><</a>
                                </div>
                                <div class="points">
                                    <?php echo $_SESSION['punten']; ?> Punten
                                </div>
                            </div>
                            <div class="question">
                                <div class="questionInner">
                                    <br>Bereken<br>3 x 7 x 6
                                </div>
                            </div>
                            <div class="answers">
                                <a href="index.php?vraag=2&antwoord=1"><div>121</div></a>
                                <a href="index.php?vraag=2&antwoord=2"><div>126</div></a>
                                <a href="index.php?vraag=2&antwoord=3"><div>147</div></a>
                                <a href="index.php?vraag=2&antwoord=4"><div>125</div></a>
                                <br>
                                <a href="index.php?vraag=2&opgegeven"><div>Geef op (-5)</div></a>
                            </div>
                        </div>
                        <?php
                        break;
                    case 3: ?>
                        <div>
                            <div class="topbar">
                                <div class="back">
                                    <a href="index.php"><</a>
                                </div>
                                <div class="points">
                                    <?php echo $_SESSION['punten']; ?> Punten
                                </div>
                            </div>
                            <div class="question">
                                <div class="questionInner">
                                    <div class="image">
                                        Hoe heet deze groente?<br>
                                        <img src="images/paprika.png">
                                    </div>
                                </div>
                            </div>
                            <div class="answers">
                                <a href="index.php?vraag=3&antwoord=1"><div>Komkommer</div></a>
                                <a href="index.php?vraag=3&antwoord=2"><div>Mango</div></a>
                                <a href="index.php?vraag=3&antwoord=3"><div>Paprika</div></a>
                                <a href="index.php?vraag=3&antwoord=4"><div>Tomaat</div></a>
                                <br>
                                <a href="index.php?vraag=3&opgegeven"><div>Geef op (-5)</div></a>
                            </div>
                        </div>
                        <?php
                        break;
    case 4: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Welk planeet is bekend voor zijn mooie ringen?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=4&antwoord=1"><div>Jupiter</div></a>
                <a href="index.php?vraag=4&antwoord=2"><div>Saturnus</div></a>
                <a href="index.php?vraag=4&antwoord=3"><div>Uranus</div></a>
                <a href="index.php?vraag=4&antwoord=4"><div>Neptunus</div></a>
                <br>
                <a href="index.php?vraag=4&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
        <?php
        break;
    case 5: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Welk planeet is het dichtst bij de zon?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=5&antwoord=1"><div>Mercurius</div></a>
                <a href="index.php?vraag=5&antwoord=2"><div>Venus</div></a>
                <a href="index.php?vraag=5&antwoord=3"><div>Aarde</div></a>
                <a href="index.php?vraag=5&antwoord=4"><div>Mars</div></a>
                <br>
                <a href="index.php?vraag=5&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;

    case 6: ?>
        <div>
            <script>
                $(document).ready( function() {
                    setInterval(function(){
                        $.ajax("detect/6.php")
                            .done(function ( data ) {
                                if(data == 'true') {
                                    window.location = "index.php?vraag=6&antwoord=1";
                                }
                                if(data == 'false') {
                                    window.location = "index.php?vraag=6&antwoord=0";
                                }
                            })
                            .fail(function () {
                                // alert("Something Happened");
                            })
                            .always(function ( data ) {
                                if(data) {
                                    console.log("Received: " + data);
                                } else {
                                    console.log("Waiting to complete...");
                                }
                            })
                    }, 1000);
                });
            </script>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>
                    <br>
                    Ga hier naar toe:
                </div>
            </div>
            <div class="answers">
                <br>
                <br>
                <br>
                <br>
                <a href="index.php?vraag=6&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
        <?php
        break;
    case 7: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Is de zon een ster of een planeet?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=7&antwoord=1"><div>Ster</div></a>
                <a href="index.php?vraag=7&antwoord=2"><div>Planet</div></a>
                <br>
                <a href="index.php?vraag=7&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 8: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Welke wetenschapper is bekend als uitvinder van de relativiteitstheorie?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=8&antwoord=1"><div>James Maxwell</div></a>
                <a href="index.php?vraag=8&antwoord=2"><div>Richard Feynman</div></a>
                <a href="index.php?vraag=8&antwoord=3"><div>Donald Duck</div></a>
                <a href="index.php?vraag=8&antwoord=4"><div>Albert Einstein</div></a>
                <br>
                <a href="index.php?vraag=8&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 9: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Wat produceren bijen?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=9&antwoord=1"><div>Vla</div></a>
                <a href="index.php?vraag=9&antwoord=2"><div>Brood</div></a>
                <a href="index.php?vraag=9&antwoord=3"><div>Honing</div></a>
                <a href="index.php?vraag=9&antwoord=4"><div>Jam</div></a>
                <br>
                <a href="index.php?vraag=9&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 10: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Waar of niet? McDonalds heeft in meer dan 100 landen een vestiging.<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=10&antwoord=1"><div>Waar</div></a>
                <a href="index.php?vraag=10&antwoord=2"><div>Niet waar</div></a>

                <br>
                <a href="index.php?vraag=10&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 11: ?>
        <div>
            <script>
                $(document).ready( function() {
                    setInterval(function(){
                        $.ajax("detect/11.php")
                            .done(function ( data ) {
                                if(data == 'true') {
                                    window.location = "index.php?vraag=11&antwoord=1";
                                }
                                if(data == 'false') {
                                    window.location = "index.php?vraag=11&antwoord=0";
                                }
                            })
                            .fail(function () {
                                // alert("Something Happened");
                            })
                            .always(function ( data ) {
                                if(data) {
                                    console.log("Received: " + data);
                                } else {
                                    console.log("Waiting to complete...");
                                }
                            })
                    }, 1000);
                });
            </script>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>
                    <br>
                    Ga hier naar toe:
                </div>
            </div>
            <div class="answers">
                <br>
                <br>
                <br>
                <br>
                <a href="index.php?vraag=11&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
        <?php
        break;
    case 12: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Wat is het volgende getal, na 7, dat alleen door 1 en zichzelf deelbaar is?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=12&antwoord=1"><div>8</div></a>
                <a href="index.php?vraag=12&antwoord=2"><div>9</div></a>
                <a href="index.php?vraag=12&antwoord=3"><div>10</div></a>
                <a href="index.php?vraag=12&antwoord=4"><div>11</div></a>
                <br>1
                <a href="index.php?vraag=12&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 13: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Hoe heet de hoofdstad van België?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=13&antwoord=1"><div>Aarschot</div></a>
                <a href="index.php?vraag=13&antwoord=2"><div>Antwerpen</div></a>
                <a href="index.php?vraag=13&antwoord=3"><div>Brussel</div></a>
                <a href="index.php?vraag=13&antwoord=4"><div>Brugge</div></a>
                <br>
                <a href="index.php?vraag=13&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 14: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <div class="image">
                        Herken je deze vlag?<br>
                        <img src="images/german-640.gif">
                    </div>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=14&antwoord=1"><div>Duitsland</div></a>
                <a href="index.php?vraag=14&antwoord=2"><div>België</div></a>
                <a href="index.php?vraag=14&antwoord=3"><div>Spanje</div></a>
                <a href="index.php?vraag=14&antwoord=4"><div>Denemarken</div></a>
                <br>
                <a href="index.php?vraag=14&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 15: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <div class="image">
                        Herken je deze vlag?<br>
                        <img src="images/300px-Flag_of_the_United_Kingdom.svg.png">
                    </div>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=15&antwoord=1"><div>Ierland</div></a>
                <a href="index.php?vraag=15&antwoord=2"><div>Groot Brittannië</div></a>
                <a href="index.php?vraag=15&antwoord=3"><div>Oostenrijk</div></a>
                <a href="index.php?vraag=15&antwoord=4"><div>Italië</div></a>
                <br>
                <a href="index.php?vraag=15&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
        <?php
        break;
    case 16: ?>
        <div>
            <script>
                $(document).ready( function() {
                    setInterval(function(){
                        $.ajax("detect/16.php")
                            .done(function ( data ) {
                                if(data == 'true') {
                                    window.location = "index.php?vraag=16&antwoord=1";
                                }
                                if(data == 'false') {
                                    window.location = "index.php?vraag=16&antwoord=0";
                                }
                            })
                            .fail(function () {
                                // alert("Something Happened");
                            })
                            .always(function ( data ) {
                                if(data) {
                                    console.log("Received: " + data);
                                } else {
                                    console.log("Waiting to complete...");
                                }
                            })
                    }, 1000);
                });
            </script>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>
                    <br>
                    Ga hier naar toe:
                </div>
            </div>
            <div class="answers">
                <br>
                <br>
                <br>
                <br>
                <a href="index.php?vraag=16&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
        <?php
        break;
    case 17: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>In welk land staan de grote Pyramides van Gizeh?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=17&antwoord=1"><div>Marokko</div></a>
                <a href="index.php?vraag=17&antwoord=2"><div>Pakistan</div></a>
                <a href="index.php?vraag=17&antwoord=3"><div>Jemen</div></a>
                <a href="index.php?vraag=17&antwoord=4"><div>Egypte</div></a>
                <br>
                <a href="index.php?vraag=17&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 18: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>In welk land vind je de steden Ankara en Istanbul?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=18&antwoord=1"><div>Turkije</div></a>
                <a href="index.php?vraag=18&antwoord=2"><div>Nederland</div></a>
                <a href="index.php?vraag=18&antwoord=3"><div>Syrië</div></a>
                <a href="index.php?vraag=18&antwoord=4"><div>Griekenland</div></a>
                <br>
                <a href="index.php?vraag=18&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 19: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Is 94745628492110 deelbaar door 2?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=19&antwoord=1"><div>Ja!</div></a>
                <a href="index.php?vraag=19&antwoord=2"><div>Nee!</div></a>
                <br>
                <a href="index.php?vraag=19&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 20: ?>
        <div>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>Hoe ver loop je in een marathon?<br>
                </div>
            </div>
            <div class="answers">
                <a href="index.php?vraag=20&antwoord=1"><div>11 km</div></a>
                <a href="index.php?vraag=20&antwoord=2"><div>22 km</div></a>
                <a href="index.php?vraag=20&antwoord=3"><div>33 km</div></a>
                <a href="index.php?vraag=20&antwoord=4"><div>44 km</div></a>
                <br>
                <a href="index.php?vraag=20&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;
    case 21: ?>
        <div>
            <script>
                $(document).ready( function() {
                    setInterval(function(){
                        $.ajax("detect/21.php")
                            .done(function ( data ) {
                                if(data == 'true') {
                                    window.location = "index.php?vraag=21&antwoord=1";
                                }
                                if(data == 'false') {
                                    window.location = "index.php?vraag=21&antwoord=0";
                                }
                            })
                            .fail(function () {
                                // alert("Something Happened");
                            })
                            .always(function ( data ) {
                                if(data) {
                                    console.log("Received: " + data);
                                } else {
                                    console.log("Waiting to complete...");
                                }
                            })
                    }, 1000);
                });
            </script>
            <div class="topbar">
                <div class="back">
                    <a href="index.php"><</a>
                </div>
                <div class="points">
                    <?php echo $_SESSION['punten']; ?> Punten
                </div>
            </div>
            <div class="question">
                <div class="questionInner">
                    <br>
                    <br>
                    Ga hier naar toe:
                </div>
            </div>
            <div class="answers">
                <br>
                <br>
                <br>
                <br>
                <a href="index.php?vraag=21&opgegeven"><div>Geef op (-5)</div></a>
            </div>
        </div>
    <?php
    break;

                    default:
                        break;
                }
            }
        }
    } else {
        if(!isset($_GET['vraag']) && !isset($_GET['page'])) {
            // Herstart sessie (new game) als men op home komt.
            $_SESSION['name'] = 'Team 1';
            $_SESSION['punten'] = 0;
            ?>
            <div class="page" style="text-align: center;">
                <br>
                <img style="max-width: 260px; max-height: 260px;" src="images/logo.png"><br>
                <a href="index.php?vraag=1"><div class="menubutton">Start</div></a>
            </div>
        <?php } else {
            // Andere statische pagina's
            if(isset($_GET['page'])) {
                switch($_GET['page']) {
                    case 'leaderboard': ?>
                        <img src="images/leaderboard.png" usemap="#leaderboard">
                        <map name="leaderboard">
                            <area shape="rect" coords="0, 0, 200, 200" href="index.php">
                        </map>
                        <?php
                        break;
                    case 'reset':
                        session_destroy();
                        session_unset();
                        ?>
                        <script>
                            setTimeout("location.href = 'index.php';",0);
                        </script>
                        <?php
                        break;
                    default:
                        break;
                }
            }
        }
    }
    ?>
</body>
</html>