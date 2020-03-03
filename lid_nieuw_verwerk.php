<?php
require ('Includes/config.php');
$username = $_POST['username'];
$password = $_POST['password'];


$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$datum = date("d-m-Y");


$sql = "INSERT INTO users(`ID`, `userName`, `passWord`, `about`, `geboortedatum`, `punten`) 
        VALUES ('NULL' , '$username' , '$password' , 'NULL' , '$datum' , 'NULL')";

    
if (mysqli_query($mysqli , $sql)){
    echo "toegevoegd!";
    header("Location:index.html");
}else{
    echo "error";
}
?>