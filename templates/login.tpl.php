<?php
    session_start();
    if(isset($_POST['name']) && isset($_POST['psw'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;dbname=menhely_db', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Felhsználó keresése
            $sqlSelect = "select login, veznev, kernev from felhasznalok where login = :bejelentkezes and jelszo = sha1(:jelszo)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['name'], ':jelszo' => $_POST['psw']));
            if($row = $sth->fetch(PDO::FETCH_ASSOC))
            {
                $_SESSION['login'] = $row['login'];
                $_SESSION['veznev'] = $row['veznev'];
                $_SESSION['kernev'] = $row['kernev'];
            }

        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }
?>

<form method="post">
    <label for="name">Név:</label>
    <input type="text" name="name" placeholder="Név" required>
    <label for="psw">Jelszó:</label>
    <input type="password" name="psw" placeholder="Jelszó" required>
    <input type="submit" value="Belépés">
</form>