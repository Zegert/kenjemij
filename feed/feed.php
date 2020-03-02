<?php
require_once('../Includes/config.php');
//var_dump($_SESSION['ID']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ken jij mij</title>
    <!-- Stylesheets hier -->
</head>
<body>
<<<<<<< Updated upstream
    <a href="feed_nieuw.php"><div><p>Voeg zelf een feit/leugen toe</p></div></a>
    <?php 
        $sql = "SELECT * FROM feed";
        $feedArray = mysqli_query($mysqli , $sql);
        echo "<div id='feed_container'>";
            while($row = $feedArray->fetch_assoc()){

                $itemID = $row['ID'];
                $id = $row['userID'];
                $sqlUN = "SELECT `userName` FROM `users` WHERE ID=" . $id;
                $UNArray = mysqli_query($mysqli , $sqlUN);
                while($rowUN = $UNArray->fetch_assoc()){
                    $username = $rowUN['userName'];
=======

<!--BEGIN NAVBAR-->
<div class="topnav">
    <a href="../profiel.php">Profiel</a>
    <a href="../uitlog.php" style="float:right">Uitloggen</a>
</div>

<a href="feed_nieuw.php" class="voeg_toe"><p class="voegToe_button">Voeg zelf een feit/leugen toe</p></a>

    <div class="profielcontainer_home">
        <h3>Uw gegevens</h3>
        <div class="profiel_gegevens">
            <?php

            if (!isset($_SESSION['ID'])) {
                header("Location: index.html");
            }

            $user_id = $_SESSION['ID'];

            $result = mysqli_query($mysqli, "SELECT * FROM users WHERE ID = $user_id");

            while ($row = mysqli_fetch_array($result))
            {
                echo "<td>" . $row['userName'] . "</td>";
            }

            if ($result == $row)
            {
                {
                    ?>

                    <?php
>>>>>>> Stashed changes
                }
                echo "<p>Gemaakt door: " . $username . "</p>";
                echo '<p>Titel: ' . $row['titel']; '</p>';
                echo '<p>Beschrijving: ' . $row['beschrijving']; '</p>';
                echo "<br><a href='waar.php?itemID=$itemID'>Waar(" . $row['waar'] .")</a> of <a href='nietwaar.php?itemID=$itemID'>Niet waar(". $row['nietwaar'] .")</a><br>";
                echo "<br>";

        }
        echo "</div>";
    ?>
</body>
</html>