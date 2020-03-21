<?php

    include('includes/config.inc.php');

    $url = $_SERVER['REQUEST_URI'];

    $explodedUrl = explode("/", $url);

    $currentPage = $explodedUrl[count($explodedUrl) - 1];

    if($currentPage != "") {
        if(isset($pages[$currentPage]) && file_exists("templates/" . $pages[$currentPage]['file'] . ".tpl.php")) {
            $currentPage = $pages[$currentPage];
        } else { 
            $currentPage = $errorPages['404'];
            header("HTTP/1.0 404 Not Found");
        }
    } else {
        $currentPage = $pages['/'];
    }

    include('templates/index.tpl.php'); 