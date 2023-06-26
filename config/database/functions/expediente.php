<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarEstadoExpediente($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`expediente_estado` (`expediente_estado_nombre`, `estado`) 
    VALUES ('$nombre', '1');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarEstadoExpediente($nombre, $id_expediente_estado)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`expediente_estado` 
    SET `expediente_estado_nombre` = '$nombre' WHERE (`id_expediente_estado` = '$id_expediente_estado');";

    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarEstadoExpediente($id_expediente_estado)
{
    global $connect;

    $sql = "UPDATE `sistemajuridico`.`expediente_estado` 
    SET `estado` = '0' WHERE (`id_expediente_estado` = '$id_expediente_estado');";

    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}