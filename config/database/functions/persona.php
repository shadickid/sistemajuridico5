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
            `id_sexo`, 
            `id_persona`) 
            VALUES ('$nombre', '$apellido', '$fecnac', '$sex', '$id_persona');";
    $s = $connect->prepare($sql);

    $s->execute();
    $id_persona_fisica = $connect->insert_id;
    $s->close();
    return $id_persona_fisica;
}


function modificarPersonaFisicaEmpleado($nombre, $apellido, $fecnac, $sexo, $id)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`persona_fisica` SET 
    `persona_nombre` = '$nombre', 
    `persona_apellido` = '$apellido',
    `persona_fec_nac` = '$fecnac', 
    `id_sexo` = '$sexo' 
     WHERE (`id_persona_fisica` = '$id');";
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
function agregarPersonaJuridica($razonSocial, $nroIngresoBruto, $cc, $fechadeconstitucion, $idpersona)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "INSERT INTO `sistemajuridico`.`persona_juridica` (
        `id_persona`, 
        `fecha_de_constitucion`, 
        `id_contrato_constitutivo`, 
        `numero_de_ing_bruto`, 
        `razon_social`)
         VALUES ('$idpersona', '$fechadeconstitucion', '$cc', '$nroIngresoBruto', '$razonSocial');";
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