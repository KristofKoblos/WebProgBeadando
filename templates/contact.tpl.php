<?php
if(isset($_POST['name']) && isset($_POST['message']) && isset($_POST['phone']) && isset($_POST['email'])) {
    try{
    // Kapcsolódás
       $dbh = new PDO('mysql:host=localhost;dbname=menhely_db', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
       $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

       $query = "INSERT INTO uzenetek (uzenet, nev, tel, email, datum) values(:uzenet, :nev, :tel, :email, CURRENT_DATE)";
       $sth = $dbh->prepare($query);
       $sth->execute(array(':uzenet' => $_POST['message'], ':nev' => $_POST['name'], ':tel' => $_POST['phone'], ':email' => $_POST['email']));
    }
    catch (PDOException $e) {
      echo "Hiba: ".$e->getMessage();
    }
}
?>

<span class="form-alert">Minden mező kitöltése kötelező!</span>
<form method="post" id="contact-form">
    <label for="name">Név:</label>
    <input type="text" name="name" placeholder="Név" reg="^(?!\s*$).+" required>
    <label for="phone">Telefon:</label>
    <input type="tel" name="phone" placeholder="+36(99)123-456" reg="[\+]36[\(]\d{1,2}[\)]\d{3}[\-]\d{3,4}" pattern="[\+]36[\(]\d{1,2}[\)]\d{3}[\-]\d{3,4}" required>
    <label for="email">E-mail:</label>
    <input type="email" name="email" placeholder="E-mail" reg="^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$" required>
    <label for="message">Üzenet (max 255 karakter):</label>
    <textarea name="message" placeholder="Üzenet... (max 255 karakter)" required></textarea>
    <input type="submit" value="Küldés">
</form>