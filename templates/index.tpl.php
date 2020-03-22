<!DOCTYPE html>
<html>
    <head>
        <title><?= $header['title'] . ' | ' . $currentPage['title'] ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
        <link rel="icon" href="./favicon.ico" type="image/x-icon">
    </head>
    <body>
        <header>
            <div class="logo-bar">
                <img id="logo" src="assets/imgs/logo.png" alt="menhely.eu">
            </div>
            <nav class="menu">
                <span class="mobile-menu-icon"><i class="fas fa-bars"></i></span>
                <?php 

                    $result = '';

                    foreach($pages as $url => $page) {
                        if($currentPage == $page) {
                            $result .= '<a href="' . $url . '" class="active menu-link">' . $page['title'] . '</a>';
                        } else {
                            $result .= '<a href="' . $url . '" class="menu-link">' . $page['title'] . '</a>';
                        }
                    }
                    
                    echo $result;

                ?>
                <a href="http://menhely.eu" class="menu-link" target="_blank">Menhely.eu</a>
            </nav>
        </header>
        <div class="content">
            <?php 
            
                require_once($currentPage['file'] . '.tpl.php');

            ?>
        </div>
        <footer>
            <span>
            <?php 

                echo $footer['text'];

            ?>
            </span>
        </footer>
        <script src="https://kit.fontawesome.com/cd69c7f823.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="./assets/js/menu.js"></script>
        <script src="./assets/js/form-validation.js"></script>
    </body>
</html>