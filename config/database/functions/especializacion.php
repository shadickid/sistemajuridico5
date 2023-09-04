<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarEspEmpleado($idEmpleado, $idEsp)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`empleadoxespecializacion` 
            (`id_empleado`, `id_especializacion`) 
            VALUES ('$idEmpleado', '$idEsp');";
    $s = $connect->prepare($sql);
    $s->execute();
    $s->close();
}