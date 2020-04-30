<?php
//include('config.inc.php');
    $uzenet = array();   

    if(isset($_SESSION))
    {
        document.getElementById("feltoltesform").style.visibility = "visible";
    }
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

<form name="feltoltesform" method="post" enctype="multipart/form-data" visibility="hidden">
    <label>Kép feltöltése:
        <input type="file" name="kepfajl" required>
    </label>      
    <input type="submit" name="feltoltes" value="Feltöltés">
</form>
    
<section class="gallery">
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