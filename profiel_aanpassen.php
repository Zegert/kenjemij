<html>
<head>
    <title>Profiel Updaten</title>
<!--    <link rel="stylesheet" type="text/css" href="./CSS/style_nav.css">-->
    <link rel="stylesheet" type="text/css" href="CSS/profiel_aanpassen.css">
</head>
<body>

<div class="topnav">
    <a href="feed/feed.php">Home</a>
    <a href="index.html" style="float:right">Inloggen</a>
</div>
    <?php
    require_once("./Includes/config.php");
    $id = $_SESSION['ID'];
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE ID = $id");
    $row = mysqli_fetch_array($result);
    ?>
    <form action="profiel_bewerk_verwerk.php" method="POST" class="profiel_bewerk">
        <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">

        <div class="profiel_gegevens">
        <label for="Datum">Gebruikersnaam: </label>
        <input type="text" name="Gebruikersnaam" value="<?php echo $row['userName']; ?>"><br><br>

        <label for="Verbruik">Over mij: </label>
        <input type="text" name="overMij" value="<?php echo $row['about']; ?>"><br><br>

        <label for="geboortedatum">Geboortedatum: </label>
        <input type="text" name="geboortedatum" value="<?php echo $row['geboortedatum']; ?>"><br><br>
        </div>

        <input type="submit" value="Update" name="submit">
    </form>
</body>
</html>