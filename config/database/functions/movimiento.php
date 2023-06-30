<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarMovimiento($nombre)
{

    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`movimiento_tipo_proceso` (`nombre`, `estado`) 
            VALUES ('$nombre', '1');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarMovimiento($nombre, $id_tipo_proceso)
{

    global $connect;
    $sql = "UPDATE `sistemajuridico`.`movimiento_tipo_proceso` SET 
          `nombre` = '$nombre' WHERE (`id_tipo_proceso` = '$id_tipo_proceso');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarMovimiento($id_tipo_proceso)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`movimiento_tipo_proceso` SET `estado` = '0' WHERE (`id_tipo_proceso` = '$id_tipo_proceso');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}