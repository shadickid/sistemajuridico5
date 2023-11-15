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



function consultarSubTipo($idTipo = 0)
{
    global $connect;
    $sql = "SELECT  expediente_subtipo.id_expsubtipo,
                    subtipo_exp,id_exp_tipo_subtipo,
                    id_expediente_tipo from expediente_subtipo
            inner join expediente_tipo_subtipo on expediente_tipo_subtipo.id_expsubtipo=expediente_subtipo.id_expsubtipo
            where expediente_tipo_subtipo.id_expediente_tipo=$idTipo";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();
    return $records;
}
/* Expediente */

function listadoExpedienteFisico()
{
    global $connect;
    $sql = "SELECT  id_expediente,
                    persona_nombre,
                    persona_apellido,
                    expediente_nro,
                    expediente_nombre,
                    expediente_fecha_inicio,
                    expediente_tipo_nombre,
                    expesubt.subtipo_exp,
                    expediente_estado_nombre,
                    expediente_descripcon,
                    expediente_fecha_fin
            FROM persona persona
    inner join persona_fisica per_fisc on per_fisc.id_persona=persona.id_persona
    inner join expediente expe on expe.id_persona=persona.id_persona
    inner join expediente_tipo_subtipo exptipsub on exptipsub.id_exp_tipo_subtipo=expe.id_expediente_tipo_subtipo
    inner join expediente_tipo exptipo on exptipo.id_expediente_tipo=exptipsub.id_expediente_tipo
    inner join expediente_subtipo expesubt on expesubt.id_expsubtipo=exptipsub.id_expsubtipo
    inner join expediente_estado expestado on expestado.id_expediente_estado=expe.id_expediente_estado;";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();
    return $records;
}


function listadoExpedienteJ()
{
    global $connect;
    $sql = "SELECT  			id_expediente,
                                razon_social,
                                expediente_nro,
                                expediente_nombre,
                                expediente_fecha_inicio,
                                expediente_tipo_nombre,
                                expesubt.subtipo_exp,
                                expediente_estado_nombre,
                                expediente_descripcon,
                                expediente_fecha_fin
FROM persona persona
inner join persona_juridica pers_juridica on pers_juridica.id_persona=persona.id_persona
inner join expediente expe on expe.id_persona=persona.id_persona
inner join expediente_tipo_subtipo exptipsub on exptipsub.id_exp_tipo_subtipo=expe.id_expediente_tipo_subtipo
inner join expediente_tipo exptipo on exptipo.id_expediente_tipo=exptipsub.id_expediente_tipo
inner join expediente_subtipo expesubt on expesubt.id_expsubtipo=exptipsub.id_expsubtipo
inner join expediente_estado expestado on expestado.id_expediente_estado=expe.id_expediente_estado;";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();
    return $records;
}


function agregarExpediente($nroExpediente, $caratula, $fechaInicio, $fechaFin, $descripcion, $estado, $tipo, $persona)
{
    global $connect;
    $connect->begin_transaction();


    if ($fechaFin !== "") {
        $sql = "INSERT INTO `sistemajuridico`.`expediente` (
            `expediente_nro`, 
            `expediente_nombre`,
            `expediente_fecha_inicio`,
            `expediente_fecha_fin`,
            `expediente_descripcon`,
            `id_expediente_estado`, 
            `id_expediente_tipo_subtipo`,
            `id_persona`) 
            VALUES (
            '$nroExpediente', 
            '$caratula', 
            '$fechaInicio',
            '$fechaFin', 
            '$descripcion', 
            '$estado', 
            '$tipo', 
            $persona);";
    } else {
        $sql = "INSERT INTO `sistemajuridico`.`expediente` (
            `expediente_nro`, 
            `expediente_nombre`,
            `expediente_fecha_inicio`,
            `expediente_descripcon`,
            `id_expediente_estado`, 
            `id_expediente_tipo_subtipo`,
            `id_persona`) 
            VALUES (
            '$nroExpediente', 
            '$caratula', 
            '$fechaInicio',
            '$descripcion', 
            '$estado', 
            '$tipo', 
            $persona);";
    }
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $connect->commit();
        $s->close();
        return 1;
    } else {
        $connect->rollback();
        return 0;
    }
}
