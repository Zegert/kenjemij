<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Inloggegevens van en naar de database
$DB_hostname = "localhost";
$DB_username = "83504";
$DB_password = "zegert2001";
$DB_database = "kenjemij_2";

//de query om te connecten naar de database
$mysqli = mysqli_connect($DB_hostname, $DB_username, $DB_password, $DB_database);
//Fout afvanger, geeft weer als de connectie niet goed is
if (!$mysqli) {
    echo "Fout, geen connectie naar de database.";
}
// class Friends
// {
//     static public function renderFriendShip($user_one, $user_two, $type)
//     {
//         if (!empty($user_one) && !empty($user_two)) {
//             global $mysqli;
//             switch ($type) {
//                 case 'isThereRequestPending':
//                     $query = mysqli_query($mysqli, "SELECT * FROM friends WHERE user_one= ' . $user_one . ' AND user_two= ' . $user_two . ' 
//                     AND friendship_official='0' OR SELECT * FROM friends WHERE user_two=' . $user_two . ' AND user_one= ' . $user_one . ' 
//                     AND friendship_official='0'");
//                     $result = mysqli_num_rows($query);
//                     break;
//                 case 'isThereFriendship':
//                     $query = mysqli_query($mysqli, "SELECT * FROM friends WHERE user_one= ' . $user_one . ' AND user_two= ' . $user_two . '
//                      AND friendship_official='1' OR SELECT * FROM friends WHERE user_two= ' . $user_two . ' AND user_one= ' . $user_one . '
//                      AND friendship_official='1'");
//                     $result = mysqli_num_rows($query);
//                     break;
//             }
//         }
//     }
// }
?>