<?php
require_once('Includes/config.php');
if (!isset($_SESSION['ID'])) {
    header("Location: index.html");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profiel</title>
    <link rel="stylesheet" type="text/css" href="CSS/style_profiel.css">
</head>
<body>
<div class="topnav">
    <a href="feed/feed.php">Home</a>
    <a href="index.html" style="float:right">Inloggen</a>
</div>
<div class="profiel_template">
    <h3 class="profiel">Profiel:</h3>

    <div class="child">
        <?php
        $user_id = $_SESSION['ID'];
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE ID=" . $user_id);
        while ($row = mysqli_fetch_array($result))
        {
            //var_dump($row);
            echo "<td>Username: " . $row['userName'] . "</td><br>";
            echo "<td>About: " . $row['about'] . "</td><br>";
            echo "<td>Geboortedatum: " . $row['geboortedatum'] . "</td><br>";
            echo "<td>Punten: " . $row['punten'] . "</td><br>";
        }
        echo "<a href='profiel_aanpassen.php'>Aanpassen</a>";
        ?>
    </div>

</body>
</html>
