<?php
$db_username 	= 'root';
$db_password 	= '';
$db_name 	= 'sistema_urse';
$db_host 	= 'localhost';

$con  = mysqli_connect('localhost','root','','sistema_urse');
if(mysqli_connect_errno())
{
    echo 'Database Connection Error';
}
?>