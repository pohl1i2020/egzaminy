<?php
$conn = mysqli_connect('localhost','root','','hodowla');
if (mysqli_connect_errno()) {

    exit;
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świniek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
    <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <nav>
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
        
    </nav>

    <aside>
        <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
        <?php
       
            $zapytanie2 = mysqli_query($conn, "SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON rasy_id = rasy.id WHERE rasy_id=1;");

            while ($row = mysqli_fetch_row($zapytanie2)) {
                echo "<h2>Rasa: $row[2]</h2>
                <p>Data urodzenia: $row[0]</p>
                <p> Oznaczenie miotu: $row[1] </p>
                ";

            }

        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
        $zapytanie3 = mysqli_query($conn, "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 1;");

        while ($row = mysqli_fetch_row($zapytanie3)) {
            echo "<h3> $row[0] - $row[1] zł </h3>
            <p>$row[2] </p>";

        }


        
        ?>

    </aside>
    <main>
        <h3>
        Poznaj wszystkie rasy świnek morskich
        </h3>
        <ol>
            <?php

                $zapytanie = mysqli_query($conn, "select rasy.rasa from rasy;");

                while ($row = mysqli_fetch_row($zapytanie)) {
                    echo "<li> $row[0] </li>";

                }

                mysqli_close($conn);
            ?>
        </ol>
    </main>
    <footer>
        <p>
            Stronę wykonał: 013245678900
        </p>

    </footer>
</body>
</html>