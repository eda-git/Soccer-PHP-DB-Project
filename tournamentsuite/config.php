<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'SERVER');
define('DB_USERNAME', 'USER');
define('DB_PASSWORD', 'PASSWORD');
define('DB_NAME', 'DBNAME');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect('SERVER', 'USERNAME', 'PASSWORD', 'DB', 'PORT');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>