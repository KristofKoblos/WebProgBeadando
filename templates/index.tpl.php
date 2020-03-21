<!DOCTYPE html>
<html>
    <head>
        <title><?= $header['title'] . ' | ' . $currentPage['title'] ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>
    <body>
        <header>
            <nav>
                <?php 

                    $result = '';

                    foreach($pages as $url => $page) {
                        if($currentPage == $page) {
                            $result .= '<a href="' . $url . '" class="active">' . $page['title'] . '</a>';
                        } else {
                            $result .= '<a href="' . $url . '">' . $page['title'] . '</a>';
                        }
                    }
                    
                    echo $result;

                ?>
                <a href="http://menhely.eu" target="_blank">Menhely.eu</a>
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
    </body>
</html>