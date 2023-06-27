<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarDocumento($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`documento` (`descripcion`) 
    VALUES ('$nombre');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarDocumento($nombre, $id_tipo_documento)
{
    global $connect;

    $sql = "UPDATE `sistemajuridico`.`documento` SET `descripcion` = '$nombre' WHERE 
    (`id_tipo_documento` = $id_tipo_documento);";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}


function borrarDocumento($id_tipo_documento)
{
    global $connect;

    $sql = "UPDATE `sistemajuridico`.`documento` SET `estado` = '0' WHERE (`id_tipo_documento` = '$id_tipo_documento');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}