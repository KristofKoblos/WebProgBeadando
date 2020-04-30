<?php 

    $header = array(
        'title' => 'Menhely'
    );

    $pages = array(
        '/' => array('file' => 'main', 'title' => 'Főoldal'),
        'kapcsolat' => array('file' => 'contact', 'title' => 'Kapcsolat'),
        'kepek' => array('file' => 'gallery', 'title' => 'Képek'),
        'belepes' => array('file' => 'login', 'title' => 'Belépés'),
        'uzenetek' => array('file' => 'messages', 'title' => 'Üzenetek'),
        'regisztracio' => array('file' => 'registration', 'title' => 'Regisztráció'),
        'munkatarsak' => array('file' => 'staff', 'title' => 'Munkatársak')
    );

    $errorPages = array(
        '404' => array('file' => 'errorPages/notFound', 'title' => 'Az oldal nem található!')
    );

    $footer = array(
        'text' => 'Menhely &copy; ' . date('Y')
    );

    $kepmappa = './assets/imgs/gallery/';
    $tipusok = array ('.jpg', '.png');
    $mediatipusok = array('image/jpeg', 'image/png');
    //$maxmeret = 500*1024;
?>