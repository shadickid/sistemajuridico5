<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarPersona($tipoPersona)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`persona` (`tipo`) VALUES ('$tipoPersona');";
    $s = $connect->prepare($sql);

    $s->execute();
    $id_persona = $connect->insert_id;
    $s->close();
    return $id_persona;
}

function agregarPersonaFisicaEmpleado($nombre, $apellido, $fecnac, $sex, $id_persona)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`persona_fisica` 
            (`persona_nombre`, 
            `persona_apellido`, 
            `persona_fec_nac`, 
            `tipo_persona_fisica`, 
            `id_sexo`, 
            `id_persona`) 
            VALUES ('$nombre', '$apellido', '$fecnac', '1', '$sex', '$id_persona');";
    $s = $connect->prepare($sql);

    $s->execute();
    $id_persona_fisica = $connect->insert_id;
    $s->close();
    return $id_persona_fisica;
}

function agregarSexo($nombre)
{
    global $connect;
    $connect->begin_transaction();

    $sql = "INSERT INTO `sistemajuridico`.`sexo` (`nombre`) VALUES ('$nombre');";
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

function modificarSexo($idsexo, $nombre)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`sexo` SET `nombre` = '$nombre' WHERE (`id_sexo` = '$idsexo');";
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

function borrarSexo($idSexo)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "DELETE FROM `sistemajuridico`.`sexo` WHERE (`id_sexo` = '$idSexo');";
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
