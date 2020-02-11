<?php

echo "Versie 2.5.6 <br>";
echo "<a href='feed/feed_nieuw.php'>Nieuwe feed</a><br>";
echo "<a href='feed/feed.php'>feed</a>";

require_once('Includes/config.php');

if (!isset($_SESSION['ID'])) {
    header('Location: index.html');
}

//query for db
$result = mysqli_query($mysqli, "SELECT * FROM users")
    or die("failed to query database.");
// get info from db
$row = mysqli_num_rows($result);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['ID'];
        //var_dump($id);
        $username = $row['userName'];
        //var_dump($username);
        ?>
            <h3><?php echo $username; ?></h3>
                <?php
                        if ($id != $_SESSION['ID']) {
                            if (Friends::renderFriendShip($_SESSION['ID'], $id, 'isThereRequestPending') === 1) {
                                ?>
                        <button class="request_pending" disabled> Request Pending </button>
                    <?php
                                }
                            } else {
                                if (Friends::renderFriendShip($_SESSION['ID'], $id, 'isTHereFriendship') === 0) {
                                    ?>
                        <button class="friendbtn_unfriend" data-uid="<?php echo $id; ?>" data-type="unfriend">Unfriend</button>
                        <button class="friendbtn_add" data-uid='<?php echo $id; ?>' data-type="addfriend">Voeg toe als vriend</button>
                        <button class="request_pending_hidden" disabled>Request pending</button>
                <?php
                            }
                        }
                        ?>
<?php
    }
} else {
    echo "Er zijn geen gebruikers gevonden";
}

?>