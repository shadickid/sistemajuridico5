<?php
$host='localhost';
$user='root';
$pass='161101';
$db='sistemajuridico';

$connect = new mysqli($host, $user ,$pass,$db);
if ($connect->connect_error){
    die("Problemas con la conexi�n a la base de datos");
}


?>