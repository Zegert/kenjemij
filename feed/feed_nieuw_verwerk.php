<?php
require ('../Includes/config.php');

$id = $_SESSION['ID'];
$titel = $_POST['titel'];
$beschrijving = $_POST['beschrijving'];

$sql = "INSERT INTO feed (ID , userID , titel , beschrijving) 
        VALUES (NULL, '$id' , '$titel', '$beschrijving')";

    
if (mysqli_query($mysqli , $sql)){
    echo "toegevoegd!";
    header("Location:feed.php");
}else{
    echo "error";
}
?>