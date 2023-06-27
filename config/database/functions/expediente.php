<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

/* ESTADO EXPEDIENTE */
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
/* TIPO EXPEDIENTE */
function agregarTipoExpediente($nombre)
{
    global $connect;

    $sql = "INSERT INTO `sistemajuridico`.`expediente_tipo` (`expediente_tipo_nombre`, `estado`) 
    VALUES ('$nombre', '1');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}
function modificarTipoExpediente($nombre, $id_expediente_tipo)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`expediente_tipo` 
    SET `expediente_tipo_nombre` = '$nombre' WHERE (`id_expediente_tipo` = '$id_expediente_tipo');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarTipoExpediente($id_expediente_tipo)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`expediente_tipo` 
    SET `estado` = '0' WHERE (`id_expediente_tipo` = '$id_expediente_tipo');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}
/* SUB TIPO EXPEDIENTE */

function agregarSubTipoExpediente($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`expediente_subtipo` 
    (`subtipo_exp`, `estado`) VALUES ('$nombre', '1');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarSubTipoExpediente($nombre, $id_expsubtipo)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`expediente_subtipo` 
    SET `subtipo_exp` = '$nombre' WHERE (`id_expsubtipo` = '$id_expsubtipo');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarSubTipoExpediente($id_expsubtipo)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`expediente_subtipo` 
    SET `estado` = '0' WHERE (`id_expsubtipo` = '$id_expsubtipo');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}