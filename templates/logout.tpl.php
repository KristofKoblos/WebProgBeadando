<?php
    session_unset();
    session_destroy();
    echo "<script type='text/javascript'>alert('Kijelentkezve!');</script>";
    header('Refresh:0, url=belepes');
?>