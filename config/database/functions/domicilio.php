<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
/* Pais */
function agregarPais($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`pais` (`nombre`) VALUES ('$nombre');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarPais($nombre, $id_pais)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`pais` 
    SET `nombre` = '$nombre' 
    WHERE (`id_pais` = '$id_pais');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarPais($id_pais)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`pais` 
    WHERE (`id_pais` = '$id_pais');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

/* Provincia */

function agregarProvincia($nombre, $id_pais)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`provincia` (`id_pais`, `nombre`) 
    VALUES ('$id_pais', '$nombre');";

    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarProvincia($nombre, $id_pais, $id_provincia)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`provincia` 
    SET `id_pais` = '$id_pais', `nombre` = '$nombre' 
    WHERE (`id_provincia` = '$id_provincia');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarProvincia($id_provincia)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`provincia` 
    WHERE (`id_provincia` = '$id_provincia');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

/* Localidad */

function agregarLocalidad($nombre, $id_pais)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`localidad` (`id_provincia`, `nombre`) 
    VALUES ('$id_pais', '$nombre');";

    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarLocalidad($nombre, $id_provincia, $id_localidad)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`localidad` 
    SET `id_provincia` = '$id_provincia', `nombre` = '$nombre' 
    WHERE (`id_localidad` = '$id_localidad');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarLocalidad($id_localidad)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`localidad` 
    WHERE (`id_localidad` = '$id_localidad');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}
