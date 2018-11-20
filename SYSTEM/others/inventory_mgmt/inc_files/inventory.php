<?php
$hostname_directories = "localhost";
$database_directories = "inventory";
$username_directories = "root";
$password_directories = "mysql";
$directories = mysql_pconnect($hostname_directories, $username_directories, $password_directories) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_directories);
?>