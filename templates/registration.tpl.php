<?php
    if(isset($_POST['name']) && isset($_POST['psw']) && isset($_POST['psw2']) && isset($_POST['email']) && isset($_POST['veznev']) && isset($_POST['kernev'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;dbname=menhely_db', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Létezik már a felhasználói név?
            $sqlSelect = "select login from felhasznalok where login = :name";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':name' => $_POST['name']));
            if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $uzenet = "A felhasználói név már foglalt!";
                echo "<script type='text/javascript'>alert('$uzenet');</script>";
                $ujra = "true";
            }
            else {
                //Jelszó és ellenőrző jelszó egyezik-e?
                if(sha1($_POST['psw']) != sha1($_POST['psw2']))
                {
                    $uzenet = "A jelszó és az ellenőrző jelszó nem egyezik!";
                    echo "<script type='text/javascript'>alert('$uzenet');</script>";
                }
                else{
                    //Ha minden OK, regisztráljuk
                    $sqlInsert = "insert into felhasznalok(login, jelszo, veznev, kernev, email)
                                values(:name, :jelszo, :veznev, :kernev, :email)";
                    $stmt = $dbh->prepare($sqlInsert); 
                    $stmt->execute(array(':name' => $_POST['name'], ':jelszo' => sha1($_POST['psw']),
                                        ':veznev' => $_POST['veznev'], ':kernev' => $_POST['kernev'], ':email' => $_POST['email'])); 
                    if($count = $stmt->rowCount()) {
                        $uzenet = "A regisztrációja sikeres.";
                        echo "<script type='text/javascript'>alert('$uzenet');</script>";
                        $ujra = false;
                    }
                    else {
                        $uzenet = "A regisztráció nem sikerült.";
                        echo "<script type='text/javascript'>alert('$uzenet');</script>";
                        $ujra = true;
                    }
                }
            }
        }
        catch (PDOException $e) {
            //echo "Hiba: ".$e->getMessage();
            echo "<script type='text/javascript'>alert('Hiba: '.$e->getMessage());</script>";
        }      
    }

?>

<span class="form-alert">Minden mező kitöltése kötelező!</span>
<form method="post">
    <label for="name">Név:</label>
    <input type="text" name="name" placeholder="Név" required>
    <label for="psw">Jelszó:</label>
    <input type="password" name="psw" placeholder="Jelszó" required>
    <label for="psw2">Jelszó megint:</label>
    <input type="password" name="psw2" placeholder="Jelszó megint" required>
    <label for="veznev">Vezetékév:</label>
    <input type="text" name="veznev" placeholder="Vezetéknév" required>
    <label for="kernev">Keresztnév:</label>
    <input type="text" name="kernev" placeholder="Keresztnév" required>
    <label for="email">E-mail:</label>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="submit" value="Regisztráció">
</form>