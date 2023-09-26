<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarModulo($nombre)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "INSERT INTO `sistemajuridico`.`modulo` (`descripcion`) VALUES ('$nombre');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}
function modificarModulo($nombre, $id_modulo)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`modulo` SET `descripcion` = '$nombre' WHERE (`id_modulo` = '$id_modulo');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}
function borrarModulo($id_modulo)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`modulo` SET `estado_logico` = '0' WHERE (`id_modulo` = '$id_modulo');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
    } else {
        $connect->rollback();
        return 0;
    }
}

function consultarPerfilxModulo($id_perfil)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * from modulo m
            inner join perfilxmodulo pxm on pxm.id_modulo=m.id_modulo
            inner join perfil p on p.id_perfil=pxm.id_perfil
            where p.id_perfil=$id_perfil;";
    $s = $connect->prepare($sql);
    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
