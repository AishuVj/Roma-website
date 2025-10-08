<?php
$server_name ='localhost';//where the current page is stored
$db_user_name ='cl11-iswarya';//username for phpmyadmin database
$db_password ='wbVVw/BK3';//password for phpmyadmin database
$db_name ='cl11-iswarya'; //name of database

$conn = mysqli_connect($server_name, $db_user_name, $db_password, $db_name); //query to connect to database, passing in previously declared details

// Check connection, if it is not working, print error message and terminate script
if (!$conn) {
    die("Connection failed:");
}

?>