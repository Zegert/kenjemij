<?php
require 'Includes/config2.php';


if (!isset($_SESSION['ID'])) {
    header("Location: index.html");
}

$user_id = $_SESSION['ID'];

$result1 = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $user_id");
$result2 = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $user_id");
$result3 = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $user_id");

?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Profiel_KJM</title>
    <link rel="stylesheet" type="text/css" href="CSS/style_profiel.css">
</head>
<body>

<div class="topnav">
    <a href="feed/feed.php">Home</a>
    <a href="index.html" style="float:right">Inloggen</a>
</div>

<!--BEGIN PROFIEL-->
<div class="profiel_template">
    <h3 class="profiel">Profiel:</h3>

    <div class="child">
        <?php

        while ($row = mysqli_fetch_array($result1))
        {
            echo "<td>Username: " . $row['userName'] . "</td>";
        }
        ?>
    </div>

    <div class="child">
        <?php

        while ($row = mysqli_fetch_array($result2))
        {
            echo "<td>About: " . $row['about'] . "</td>";
        }
        ?>
    </div>

    <div class="child">
        <?php

        while ($row = mysqli_fetch_array($result3))
        {
            echo "<td>Geboortedatum: " . $row['geboortedatum'] . "</td>";
        }
        ?>
    </div>
</div>

</body>
</html>
