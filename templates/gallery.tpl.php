<<<<<<< HEAD
=======
<?php
    $uzenet = array();
    // Űrlap ellenőrzés:
    if (isset($_POST['feltoltes'])) {
        //print_r($_FILES);
        foreach($_FILES as $fajl) {
            if ($fajl['error'] == 4);   // Nem töltött fel fájlt
            elseif (!in_array($fajl['type'], $mediatipusok))
                $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
            elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                        or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                        /*or $fajl['size'] > $MAXMERET*/) 
                $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
            else {
                $vegsohely = $kepmappa.strtolower($fajl['name']);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajl['name'];
                else {
                    move_uploaded_file($fajl['tmp_name'], $vegsohely);
                    $uzenet[] = ' Ok: ' . $fajl['name'];
                }
            }
        }        
    }
?>

<?php
//Csak akkor látszik a feltöltés, ha be van jelentkezve felhasználó
if(isset($_SESSION['login']))
{
    echo '<form name="feltoltesform" method="post" enctype="multipart/form-data">
    <label>Kép feltöltése:
        <input type="file" name="kepfajl" required>
    </label>      
    <input type="submit" name="feltoltes" value="Feltöltés">
    </form>';
}

?>


<?php
    $kepek = array();
    $olvaso = opendir($kepmappa);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($kepmappa.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $tipusok)) {
                $kepek[$fajl] = filemtime($kepmappa.$fajl);
            }
        }
    }
    closedir($olvaso);
?>
>>>>>>> 93681e4d4944a3ce9a514ee5b8a703a053f8dc46
<section class="gallery">
<?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="gallery-img-frame">
            <a href="<?php echo $kepmappa.$fajl ?>">
                <img class="gallery-img" src="<?php echo $kepmappa.$fajl ?>">
            </a>
        </div>
    <?php
    }
    ?>
</section>

<!--
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
    <div class="gallery-img-frame">
        <img class="gallery-img" src="https://place-hold.it/300x300.jpg" alt="Kép">
    </div>
</section>
-->