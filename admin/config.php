<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '213.171.200.90');
define('DB_USERNAME', 'TomJaycocks');
define('DB_PASSWORD', 'Jaycocks!1');
define('DB_NAME', 'takingastancedb');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
