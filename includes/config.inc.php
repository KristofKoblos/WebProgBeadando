<?php 

    $header = array(
        'title' => 'Menhely'
    );

    $pages = array(
        '/' => array('file' => 'main', 'title' => 'Főoldal'),
        'kapcsolat' => array('file' => 'contact', 'title' => 'Kapcsolat'),
        'kepek' => array('file' => 'gallery', 'title' => 'Képek'),
        'uzenetek' => array('file' => 'messages', 'title' => 'Üzenetek'),
        'munkatarsak' => array('file' => 'staff', 'title' => 'Munkatársak'),
        'belepes' => array('file' => 'login', 'title' => 'Belépés'),
        'kilepes' => array('file' => 'logout', 'title' => 'Kilépés'),
        'regisztracio' => array('file' => 'registration', 'title' => 'Regisztráció')
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