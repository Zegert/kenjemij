<?php
require_once('../Includes/config.php');
?>

<html>
    <head>
        <title>Nieuw item || Ken je mij</title>
    </head>
    <body>
        <form action="feed_nieuw_verwerk.php" method="POST">
            <input type="text" name="titel" required placeholder="Titel...">
            <input type="text" name="beschrijving" required placeholder="Beschrijving...">
            <input type="submit" value="verzenden">

        </form> 
    </body>
</html>