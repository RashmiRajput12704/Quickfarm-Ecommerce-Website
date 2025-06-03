<?php
$host="localhost:3306";
$user_name = "root";
$user_password = "";
$db_name = "shop_db";
try{
$conn = new PDO("mysql:host=$host;dbname=$db_name", $user_name, $user_password);

}
catch(Exception $e)
{
    echo"failed".$e->getmessage();

}
?>
