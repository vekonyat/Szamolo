<?php
header('Content-Type: text/html; charset=BOM');
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="BOM">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Számológép</title>
    </head>
    <body>
        <h2>Egyszerû számológép</h2>
        <form action="" method="post">
            <label for="szam1">1. szám:</label>
            <input type="text" id="szam1" name="szam1" required pattern="-?[0-9]+(\.[0-9]+)?"><br><br>

            <label for="szam2">2. szám:</label>
            <input type="text" id="szam2" name="szam2" required pattern="-?[0-9]+(\.[0-9]+)?"><br><br>

            <label for="muvelet">Mûvelet:</label>
            <select id="muvelet" name="muvelet">
                <option value="osszead">Összeadás</option>
                <option value="kivon">Kivonás</option>
                <option value="szoroz">Szorzás</option>
                <option value="oszt">Osztás</option>
            </select><br><br>
            
            <button type="submit" name="szamol">Számol</button>
        </form>

        <?php
        if (isset($_POST['szamol'])) {
            $szam1 = $_POST['szam1'];
            $szam2 = $_POST['szam2'];
            $muvelet = $_POST['muvelet'];

            if (!is_numeric($szam1) || !is_numeric($szam2)) {
                echo "Kérlek, számot írj be.";
            } else {
                switch ($muvelet) {
                    case "osszead":
                        $eredmény = $szam1 + $szam2;
                        echo "<h2>Eredmény:</h2>";
                        echo "<p>$szam1 + $szam2 = $eredmény</p>";
                        break;
                    case "kivon":
                        $eredmény = $szam1 - $szam2;
                        echo "<h2>Eredmény:</h2>";
                        echo "<p>$szam1 - $szam2 = $eredmény</p>";
                        break;
                    case "szoroz":
                        $eredmény = $szam1 * $szam2;
                        echo "<h2>Eredmény:</h2>";
                        echo "<p>$szam1 * $szam2 = $eredmény</p>";
                        break;
                    case "oszt":
                        if ($szam2 == 0) {
                            echo "Nullával nem tudok osztani.";
                        } else {
                            $eredmény = $szam1 / $szam2;
                            echo "<h2>Eredmény:</h2>";
                            echo "<p>$szam1 / $szam2 = $eredmény</p>";
                        }
                        break;
                    default:
                        echo "Érvénytelen mûvelet.";
                }
            }
        }
        ?>
    </body>
</html>
