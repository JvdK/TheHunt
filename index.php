<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 14-12-2015
 * Time: 11:58
 */

error_reporting(E_ALL);
// Dit zijn de antwoorden, vul hier het goede antwoord in die je bij de multiple choice hebt neergezet
$questions = array(
    1 => 'A'
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
    <script src="js/point.js"></script>
    <script src="js/js.cookie.js"></script>
    <script src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <?php
    // Handel vragen af
    if(isset($_GET['vraag'])) {
        // Haal vraag ID uit link of zet anders op 1
        if(isset($_GET['vraagid'])) {
            $vraagid = $_GET['vraagid'];
        } else {
            $vraagid = 1;
        }
        // Controleer antwoord en geef feedback //
        if(isset($_GET['answer'])) {
            $result = check_answer($vraagid, $_GET['answer']);
            // Volgende vraag (statische volgorde)
            $next = $vraagid + 1;
            if($result) {
                // Geef punten //
                $_SESSION['points'] = $_SESSION['points'] + 5;
                ?>
                <img src="images/correct.png" usemap="#correct">
            <?php } else { ?>
                <img src="images/wrong.png" usemap="#wrong">
            <?php } ?>
            <script>
                setTimeout("location.href = 'index.php?vraag=<?php echo $next; ?>';",2500);
            </script>
            <?php
        } else {
            if(isset($_GET['giveup'])) {
                // TODO give up
            } else {
                // Hier kunnen alle vragen ingezet worden.
                switch ($vraagid) {
                    case 1: ?>
                        <img src="images/vraag1.png" usemap="#vraag1">
                        <map name="vraag1">
                            <area shape="rect" coords="0, 0, 200, 200" href="index.php?vraag=1&answer=A">
                            <area shape="rect" coords="50, 340, 350, 300" href="index.php?vraag=1&answer=B">
                        </map>
                        <?php
                        break;
                    case 2: ?>
                        <img src="images/vraag1.png" usemap="#vraag2">
                        <map name="vraag2">
                            <area shape="rect" coords="0, 0, 200, 200" href="vraag2.html">
                        </map>
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
            session_unset();
            session_destroy();

            session_start();
            $_SESSION['name'] = 'Team 1';
            $_SESSION['points'] = 0;
            ?>
            <img src="images/home.png" usemap="#home">
            <map name="home">
                <area shape="rect" coords="0, 0, 200, 200" href="index.php?vraag=1">
                <area shape="rect" coords="75, 471, 360, 537" />
                <area shape="rect" coords="75, 389, 360, 457" />
                <area shape="rect" coords="75, 309, 360, 375" />
                <area shape="rect" coords="75, 228, 360, 296" />
            </map>
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
                    default:
                        break;
                }
            }
        }
    }
    ?>
</body>
</html>