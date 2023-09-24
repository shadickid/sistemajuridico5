<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarPerfil($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`perfil` (`activo`, `descripcion`) 
    VALUES ('1', '$nombre');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarPerfil($nombre, $id_perfil)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`perfil` 
    SET `descripcion` = '$nombre' WHERE (`id_perfil` = '$id_perfil');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarPerfil($id_perfil)
{
    global $connect;

    $sql = "UPDATE `sistemajuridico`.`perfil` 
    SET `activo` = '0' WHERE (`id_perfil` = '$id_perfil');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}
