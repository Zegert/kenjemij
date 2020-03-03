<?php
require_once("./Includes/config.php");
if (isset($_POST['submit'])) {
    $id = $_POST['ID'];
    $username = $_POST['Gebruikersnaam'];
    $about = $_POST['overMij'];
    $geboortedatum = $_POST['geboortedatum'];

    $sql = "UPDATE `users` SET `ID`='$id',`userName`='$username', `about`='$about',`geboortedatum`= '$geboortedatum' WHERE ID=" . $id;
    if (mysqli_query($mysqli, $sql)) :  ?>
        <p>Geupdated!</p>
        <?php header("Location: ./feed/feed.php");?>
    <?php else : ?>
        <p>Error 500</p>
    <?php endif; ?>
<?php } ?>