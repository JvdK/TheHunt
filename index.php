<?php
session_start();
error_reporting(E_ALL);

// Dit zijn de antwoorden, vul hier het goede antwoord in die je bij de multiple choice hebt neergezet
$questions = array(
    1 => 2,
    2 => 2,
    3 => 3,
    4 => 1
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
            if(isset($_GET['giveup'])) {
                $_SESSION['punten'] = $_SESSION['punten'] - 5;
                ?>
                <div style="height: 100%; width: 100%; background-color: darkred;">
                    <div class="result">
                        OPGEGEVEN
                    </div>
                </div>
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
                                <div>Geef op (-5)</div>
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
                                <div>Geef op (-5)</div>
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
                                <div>Geef op (-5)</div>
                            </div>
                        </div>
                        <?php
                        break;
                    case 4: ?>
                        <div>
                            <script>
                                $(document).ready( function() {
                                    setInterval(function(){
                                        $.ajax("detect/4.php")
                                        .done(function ( data ) {
                                            if(data == 'true') {
                                                window.location = "index.php?vraag=4&antwoord=1";
                                            }
                                            if(data == 'false') {
                                                window.location = "index.php?vraag=4&antwoord=0";
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
                                    Spring 10x
                                </div>
                            </div>
                            <div class="answers">
                                <br>
                                <br>
                                <br>
                                <br>
                                <div>Geef op (-5)</div>
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
            <div class="page">
                <br>
                <img style="max-width: 260px; max-height: 260px;" src="images/logo.png">
                <a href="index.php?vraag=1"></a><div class="menubutton">Start</div>
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