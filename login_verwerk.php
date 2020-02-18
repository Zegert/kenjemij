<?php
    require_once('./Includes/config.php');

        //password and usernamen get
        $username = $_POST['inputUsername'];
        $password = $_POST['inputPassword'];

        // Protection against injections
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($mysqli, $username);
        $password = mysqli_real_escape_string($mysqli, $password);
        // Query for db
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE userName = '$username'")
            or die("failed to query database.");
        // connection to db
        $row = mysqli_fetch_array($result);
        //Password check
        if(password_verify($password, $row['passWord'])) {
            echo "Login Success!";
            //Session started
            $_SESSION['ID'] = $row['ID'];
            var_dump($_SESSION['ID']);
            //Go to home page
            header("Location: ./feed/feed.php");
        } else {
            echo "Login failed. <br>";
            //link to go back if failed
            header("Location: index.html");
        }
    ?>
    