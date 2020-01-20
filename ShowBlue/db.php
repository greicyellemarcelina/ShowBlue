<?php
    $db = new PDO('mysql:host=localhost;dbname=show_blue', "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>