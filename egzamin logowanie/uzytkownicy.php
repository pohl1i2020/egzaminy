<?php
 $conn = mysqli_connect('localhost','root','','portal');
 if (mysqli_connect_errno()) {
 exit;
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <h2>Nasze Osiedle</h2>
    </header>
    <aside>
        <?php
            $zapytanie = mysqli_query($conn, "SELECT count(dane.id) from dane;");


            while ($row = mysqli_fetch_row($zapytanie)) {
                echo "<h5>Liczba użytkowników portalu: $row[0] </h5>";      
            }
        ?>
    </aside>
    <section>
        <h3>
            Logowanie
        </h3>
        <form action="uzytkownicy.php" method="post">
            <label for="">login
                <br>
                <input type="text" name="login">
            <br>
            </label>
            <label for="">hasło
                <br>
                <input type="password" name="passwd" >
<br>
            </label>
            <button type="submit">Zaloguj</button>
        </form>
    </section>
    <main>
        <h3>Wizytówka</h3>
        <article>

            <?php
            if (isset($_POST['login']) && isset($_POST['passwd'])) {
                $login = $_POST['login'];
                $passwd = $_POST['passwd'];
                
                $zapytanie = mysqli_query($conn , "select uzytkownicy.haslo from uzytkownicy WHERE uzytkownicy.login = '$login';");

                $zapytanie2 = mysqli_query($conn, "select login from uzytkownicy;");

                    if ($zapytanie2) {
                        $loginZnaleziony = false;
    
                        while ($row = mysqli_fetch_row($zapytanie2)) {
                            if ($login == $row[0]) {
                                $loginZnaleziony = true;
                                break; // Zakończ pętlę, gdy znajdziesz dopasowanie
                            }
                        }
    
                        if ($loginZnaleziony) {
                            echo "Login istnieje w bazie danych.";
                            // Możesz tu dodać logikę weryfikacji hasła
                        } else {
                            echo "Nie ma takiego loginu w bazie danych.";
                        }
                    } 

            }


            ?>
        </article>
    </main>
    <footer>
        <p>
            Stronę wykonał: 00000000000
        </p>
    </footer>
    
</body>
</html>