<?php
require_once('../Includes/config.php');

$itemID = $_GET['itemID'];
$sessionID = $_SESSION['ID'];
$sql = "SELECT * FROM `feed` WHERE ID=" . $itemID;
$itemArray = mysqli_query($mysqli, $sql);
while ($row = $itemArray->fetch_assoc()) {
    $likes = $row['waar'];
    $antwoord = $row['antwoord'];
}
$dislikecheck = "SELECT * FROM `dislikes` WHERE ItemID=" . $itemID;
$dislikeArray = mysqli_query($mysqli, $dislikecheck);
while ($dislike = $dislikeArray->fetch_assoc()) {
    $disliker = $dislike['UserID'];
}
$likecheck = "SELECT * FROM `likes` WHERE ItemID=" . $itemID;
$likeArray = mysqli_query($mysqli, $likecheck);
while ($like = $likeArray->fetch_assoc()) {
    $liker = $like['UserID'];
}
if ($liker != $sessionID) {
    if ($disliker != $sessionID) {
        $likes += 1;
        $sqlUpdate = "UPDATE `feed` SET `waar`='$likes' WHERE ID=" . $itemID;
        $likeupdate = "INSERT INTO `likes`(LikeID, ItemID, UserID) VALUES (NULL , $itemID, $sessionID)";
        if (mysqli_query($mysqli, $sqlUpdate)) {
            if (mysqli_query($mysqli, $likeupdate)) {
                $puntenArray = "SELECT * FROM users WHERE ID=" . $sessionID;
                $puntenArray = mysqli_query($mysqli, $puntenArray);
                while ($puntenDB = $puntenArray->fetch_assoc()) {
                    $punten = $puntenDB['punten'];
                }
                if ($antwoord == 'waar') {
                    echo "Punten verdiend<br>";
                    $punten += 1;
                    $puntenUpdate = "UPDATE `users` SET punten='$punten' WHERE ID=" . $sessionID;
                    if (mysqli_query($mysqli, $puntenUpdate)) {
                        header('Location:feed.php');
                    }
                } else {
                    echo "Geen punten verdiend.";
                    header('Location:feed.php');
                }
            } else {
                echo "Fout in de check van uw antwoord";
                header('Location:feed.php');
            }
        } else {
            echo "Er is een fout opgetreden bij het toevoegen van uw antwoord.";
            header('Location:feed.php');
        }
    }
} else {
    header('Location:feed.php');
}