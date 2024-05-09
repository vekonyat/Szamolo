<?php
header('Content-Type: text/html; charset=BOM');
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="BOM">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sz�mol�g�p</title>
    </head>
    <body>
        <h2>Egyszer� sz�mol�g�p</h2>
        <form action="" method="post">
            <label for="szam1">1. sz�m:</label>
            <input type="text" id="szam1" name="szam1" required pattern="-?[0-9]+(\.[0-9]+)?"><br><br>

            <label for="szam2">2. sz�m:</label>
            <input type="text" id="szam2" name="szam2" required pattern="-?[0-9]+(\.[0-9]+)?"><br><br>

            <label for="muvelet">M�velet:</label>
            <select id="muvelet" name="muvelet">
                <option value="osszead">�sszead�s</option>
                <option value="kivon">Kivon�s</option>
                <option value="szoroz">Szorz�s</option>
                <option value="oszt">Oszt�s</option>
            </select><br><br>
            
            <button type="submit" name="szamol">Sz�mol</button>
        </form>

        <?php
        if (isset($_POST['szamol'])) {
            $szam1 = $_POST['szam1'];
            $szam2 = $_POST['szam2'];
            $muvelet = $_POST['muvelet'];

            if (!is_numeric($szam1) || !is_numeric($szam2)) {
                echo "K�rlek, sz�mot �rj be.";
            } else {
                switch ($muvelet) {
                    case "osszead":
                        $eredm�ny = $szam1 + $szam2;
                        echo "<h2>Eredm�ny:</h2>";
                        echo "<p>$szam1 + $szam2 = $eredm�ny</p>";
                        break;
                    case "kivon":
                        $eredm�ny = $szam1 - $szam2;
                        echo "<h2>Eredm�ny:</h2>";
                        echo "<p>$szam1 - $szam2 = $eredm�ny</p>";
                        break;
                    case "szoroz":
                        $eredm�ny = $szam1 * $szam2;
                        echo "<h2>Eredm�ny:</h2>";
                        echo "<p>$szam1 * $szam2 = $eredm�ny</p>";
                        break;
                    case "oszt":
                        if ($szam2 == 0) {
                            echo "Null�val nem tudok osztani.";
                        } else {
                            $eredm�ny = $szam1 / $szam2;
                            echo "<h2>Eredm�ny:</h2>";
                            echo "<p>$szam1 / $szam2 = $eredm�ny</p>";
                        }
                        break;
                    default:
                        echo "�rv�nytelen m�velet.";
                }
            }
        }
        ?>
    </body>
</html>
