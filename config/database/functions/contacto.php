<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarContacto($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`tipo_contacto` (`tipo_contacto_nombre`, `estado`) 
    VALUES ('$nombre', '1');";


    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarContacto($nombre, $id_tipo_contacto)
{
    global $connect;

    $sql = "UPDATE `sistemajuridico`.`tipo_contacto` SET `tipo_contacto_nombre`
     = '$nombre' WHERE (`id_tipo_contacto` = $id_tipo_contacto);";

    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarContacto($id_tipo_contacto)
{
    global $connect;

    $sql = "UPDATE `sistemajuridico`.`tipo_contacto` SET `estado` = '0' WHERE (`id_tipo_contacto` = '$id_tipo_contacto');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}