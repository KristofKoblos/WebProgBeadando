<table class="messages">
  <tr>
    <th>Név</th>
    <th>Telefon</th>
    <th>E-mail</th>
    <th>Üzenet</th>
    <th>Dátum</th>
  </tr>
<?php
    try{
    // Kapcsolódás
       $dbh = new PDO('mysql:host=localhost;dbname=menhely_db', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
       $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }
    catch (PDOException $e) {
      echo "Hiba: ".$e->getMessage();
    }
      
      $query = "SELECT * from uzenetek ORDER BY datum DESC";
      $sth = $dbh->prepare($query);
      $sth->execute();
    while ($temp = $sth->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>" . $temp["nev"]. "</td><td>" . $temp["tel"]. "</td><td>" . $temp["email"]. "</td><td>" . $temp["uzenet"]. "</td><td>" . $temp["datum"]. "</td>";
      echo "</tr>";
    }
?>  
  <!--
  <tr>
    <td>Kis Pista</td>
    <td>+36 20 123 4567</td>
    <td>kispista@gmail.com</td>
    <td>Nagyon jó lett az oldal. Instant diplomát érdemel!!!!4</td>
  </tr>
  <tr>
    <td>Nagy Ferenc</td>
    <td>+36 70 234 5678</td>
    <td>nagyferenc@citromail.hu</td>
    <td>Szerintem is!</td>
  </tr>
  <tr>
    <td>Kovács András</td>
    <td>+36 30 322 7896</td>
    <td>kovacsandras@freemail.hu</td>
    <td>Nekem is kell egy ilyen oldal.</td>
  </tr>
  -->
</table>