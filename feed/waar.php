<?php 
require_once('../Includes/config.php');

$itemID = $_GET['itemID'];
$sql = "SELECT * FROM `feed` WHERE ID=" . $itemID;
$itemArray = mysqli_query($mysqli , $sql);
    while($row = $itemArray->fetch_assoc()){
        $likes = $row['waar'];
}
$likes += 1;


$sqlUpdate = "UPDATE `feed` SET `waar`='$likes' WHERE ID=" . $itemID;

if(mysqli_query($mysqli , $sqlUpdate)){
    
    header('Location:feed.php');

}else{
    echo "error";
}
?>