<?php
//connect.php
$server = 'localhost';
$username   = 'test';
$password   = 'test';
$database   = 'main_help_db;
 
if(!mysql_connect($server, $username,  $password))
{
    exit('Error: could not establish database connection');
}
if(!mysql_select_db($database)
{
    exit('Error: could not select the database');
}
?>