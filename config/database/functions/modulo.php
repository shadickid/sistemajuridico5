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
