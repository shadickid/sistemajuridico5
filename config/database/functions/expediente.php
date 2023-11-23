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
    inner join expediente_tipo_subtipo exptipsub on exptipsub.id_exp_tipo_subtipo=expe.id_exp_tipo_subtipo
    inner join expediente_tipo exptipo on exptipo.id_expediente_tipo=exptipsub.id_expediente_tipo
    inner join expediente_subtipo expesubt on expesubt.id_expsubtipo=exptipsub.id_expsubtipo
    inner join expediente_estado expestado on expestado.id_expediente_estado=expe.id_expediente_estado
    where estado_logico=1;";
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
inner join expediente_tipo_subtipo exptipsub on exptipsub.id_exp_tipo_subtipo=expe.id_exp_tipo_subtipo
inner join expediente_tipo exptipo on exptipo.id_expediente_tipo=exptipsub.id_expediente_tipo
inner join expediente_subtipo expesubt on expesubt.id_expsubtipo=exptipsub.id_expsubtipo
inner join expediente_estado expestado on expestado.id_expediente_estado=expe.id_expediente_estado
where estado_logico=1";
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
            `id_persona`,
            `estado_logico`) 
            VALUES (
            '$nroExpediente', 
            '$caratula', 
            '$fechaInicio',
            '$fechaFin', 
            '$descripcion', 
            '$estado', 
            '$tipo', 
            $persona,
            1);";
    } else {
        $sql = "INSERT INTO `sistemajuridico`.`expediente` (
            `expediente_nro`, 
            `expediente_nombre`,
            `expediente_fecha_inicio`,
            `expediente_descripcon`,
            `id_expediente_estado`, 
            `id_exp_tipo_subtipo`,
            `id_persona`,
            `estado_logico`) 
            VALUES (
            '$nroExpediente', 
            '$caratula', 
            '$fechaInicio',
            '$descripcion', 
            '$estado', 
            '$tipo', 
            $persona,
            1);";
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
function modificarExpediente($nroExpediente, $caratula, $fechaInicio, $fechaFin, $descripcion, $estado, $tipo, $persona, $idExpediente)
{
    global $connect;
    $connect->begin_transaction();


    if ($fechaFin !== "") {
        $sql = "UPDATE `sistemajuridico`.`expediente` 
        SET `expediente_nro` = '$nroExpediente', 
        `expediente_nombre` = '$caratula', 
        `expediente_fecha_inicio` = '$fechaInicio', 
        `expediente_descripcon` = '$descripcion', 
        `id_expediente_estado` = '$estado', 
        `id_exp_tipo_subtipo` = '$tipo', 
        `expediente_fecha_fin`= '$fechaFin',
        `id_persona` = '$persona' WHERE 
        (`id_expediente` = '$idExpediente');";
    } else {
        $sql = "UPDATE `sistemajuridico`.`expediente` 
        SET `expediente_nro` = '$nroExpediente', 
        `expediente_nombre` = '$caratula', 
        `expediente_fecha_inicio` = '$fechaInicio', 
        `expediente_descripcon` = '$descripcion', 
        `id_expediente_estado` = '$estado', 
        `id_exp_tipo_subtipo` = '$tipo',
        `id_persona` = '$persona' WHERE 
        (`id_expediente` = '$idExpediente');";
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
function obtenerListadoExpediente($subTipo, $expTipo)
{
    global $connect;

    $connect->begin_transaction();
    $sql = "SELECT id_expediente,
                    persona_nombre,
                    persona_apellido,
                    expediente_nro,
                    expediente_nombre,
                    expediente_fecha_inicio,
                    expediente_tipo_nombre,
                    expesubt.subtipo_exp,
                    expediente_estado_nombre,
                    expediente_descripcon,
                    expediente_fecha_fin FROM persona persona
                    INNER JOIN persona_fisica per_fisc ON per_fisc.id_persona=persona.id_persona
                    INNER JOIN expediente expe ON expe.id_persona=persona.id_persona
                    INNER JOIN expediente_tipo_subtipo exptipsub ON exptipsub.id_exp_tipo_subtipo=expe.id_exp_tipo_subtipo
                    INNER JOIN expediente_tipo exptipo ON exptipo.id_expediente_tipo=exptipsub.id_expediente_tipo
                    INNER JOIN expediente_subtipo expesubt ON expesubt.id_expsubtipo=exptipsub.id_expsubtipo
                    INNER JOIN expediente_estado expestado ON expestado.id_expediente_estado=expe.id_expediente_estado
                    WHERE estado_logico=1";

    if ($expTipo == 50) {
        $s = $connect->prepare($sql);
        $s->execute();
        $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
        $s->close();
        return $records;
    } else {
        // Aquí puedes agregar lógica para filtrar por subtipo si es diferente de 0
        // Asumiendo que $subTipo contiene el valor seleccionado en el segundo select.
        if ($subTipo != 0) {
            $sql .= " AND expesubt.id_expsubtipo = ?";
            $s = $connect->prepare($sql);
            $s->bind_param("i", $subTipo); // "i" indica que $subTipo es un entero.
        } else {
            $s = $connect->prepare($sql);
        }

        $s->execute();
        $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
        $s->close();
        return $records;
    }
}
function obtenerListadoExpedienteJ($subTipo, $expTipo)
{
    global $connect;

    $connect->begin_transaction();
    $sql = "SELECT id_expediente,
                            razon_social,
                            expediente_nro,
                            expediente_nombre,
                            expediente_fecha_inicio,
                            expediente_tipo_nombre,
                            expesubt.subtipo_exp,
                            expediente_estado_nombre,
                            expediente_descripcon,
                            expediente_fecha_fin FROM persona persona
    INNER JOIN persona_juridica  ON persona_juridica.id_persona=persona.id_persona
    INNER JOIN expediente expe ON expe.id_persona=persona.id_persona
    INNER JOIN expediente_tipo_subtipo exptipsub ON exptipsub.id_exp_tipo_subtipo=expe.id_exp_tipo_subtipo
    INNER JOIN expediente_tipo exptipo ON exptipo.id_expediente_tipo=exptipsub.id_expediente_tipo
    INNER JOIN expediente_subtipo expesubt ON expesubt.id_expsubtipo=exptipsub.id_expsubtipo
    INNER JOIN expediente_estado expestado ON expestado.id_expediente_estado=expe.id_expediente_estado
    WHERE estado_logico=1";

    if ($expTipo == 50) {
        $s = $connect->prepare($sql);
        $s->execute();
        $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
        $s->close();
        return $records;
    } else {
        // Aquí puedes agregar lógica para filtrar por subtipo si es diferente de 0
        // Asumiendo que $subTipo contiene el valor seleccionado en el segundo select.
        if ($subTipo != 0) {
            $sql .= " AND expesubt.id_expsubtipo = ?";
            $s = $connect->prepare($sql);
            $s->bind_param("i", $subTipo); // "i" indica que $subTipo es un entero.
        } else {
            $s = $connect->prepare($sql);
        }

        $s->execute();
        $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
        $s->close();
        return $records;
    }
}

function obtenerListadoExpedientePorEstado($estado)
{
    global $connect;
    $connect->begin_transaction();

    $sql = "SELECT 
                id_expediente,
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
            FROM 
                persona 
                INNER JOIN persona_fisica per_fisc ON per_fisc.id_persona = persona.id_persona
                INNER JOIN expediente expe ON expe.id_persona = persona.id_persona
                INNER JOIN expediente_tipo_subtipo exptipsub ON exptipsub.id_exp_tipo_subtipo = expe.id_exp_tipo_subtipo
                INNER JOIN expediente_tipo exptipo ON exptipo.id_expediente_tipo = exptipsub.id_expediente_tipo
                INNER JOIN expediente_subtipo expesubt ON expesubt.id_expsubtipo = exptipsub.id_expsubtipo
                INNER JOIN expediente_estado expestado ON expestado.id_expediente_estado = expe.id_expediente_estado
            WHERE 
                estado_logico = 1";

    if ($estado != 50) {
        $sql .= " AND expe.id_expediente_estado = ?";
    }

    $s = $connect->prepare($sql);

    if ($estado != 50) {
        $s->bind_param("i", $estado);
    }

    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();

    return $records;
}


function obtenerExpedienteporId($id, $fechaInicio, $FechaFin)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT
    e.id_expediente,
    e.expediente_nro,
    e.expediente_nombre,
    e.expediente_fecha_inicio,
    e.expediente_descripcon,
    e.expediente_fecha_fin,
    e.id_expediente_estado,
    e.id_exp_tipo_subtipo,
    e.id_persona,
    movimiento_tipo_proceso.nombre,
    emt.id_expedientemovimientotipo,
    emt.id_tipo_proceso,
    emt.movimiento_fecha,
    emt.movimiento_descripcion,
    emt.id_usuario,
    dm.id_detalle_movimiento,
    dm.detalle_movimiento_archivo,
    dm.detalle_movimiento_extension,
    dm.detalle_movimiento_ubicacion,
    usuario_nombre
FROM
    expediente e
LEFT JOIN
    expedientexmovxtipo emt ON e.id_expediente = emt.id_expediente
LEFT JOIN
    detalle_movimiento dm ON emt.id_expedientemovimientotipo = dm.id_expedientemovimientotipo
LEFT JOIN
	movimiento_tipo_proceso on movimiento_tipo_proceso.id_tipo_proceso=emt.id_tipo_proceso
LEFT JOIN
	usuario on usuario.id_usuario=emt.id_usuario
WHERE
    e.id_expediente = $id
    and emt.movimiento_fecha    BETWEEN '$fechaInicio' AND '$FechaFin'";

    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}
function agregarExpedientexMovimientoxTipo($descripcion, $idProceso, $idExpediente, $idUsuario)
{
    global $connect;
    $connect->begin_transaction();

    $sql = "INSERT INTO `sistemajuridico`.`expedientexmovxtipo` 
    (`id_tipo_proceso`, 
    `id_expediente`, 
    `movimiento_fecha`, 
    `movimiento_descripcion`, 
    `id_usuario`) 
    VALUES ('$idProceso', '$idExpediente',now(), '$descripcion', '$idUsuario');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $idExpedientexMovimientoxTipo = $connect->insert_id;
        $s->close();
        $connect->commit();
        return $idExpedientexMovimientoxTipo;
    } else {
        $connect->rollback();
        return 0;
    }
}
function obtenerListadoExpedientePorEstadoJ($estado)
{
    global $connect;
    $connect->begin_transaction();

    $sql = "SELECT 
                id_expediente,
                razon_social,
                expediente_nro,
                expediente_nombre,
                expediente_fecha_inicio,
                expediente_tipo_nombre,
                expesubt.subtipo_exp,
                expediente_estado_nombre,
                expediente_descripcon,
                expediente_fecha_fin 
            FROM 
                persona 
                INNER JOIN persona_juridica  ON persona_juridica.id_persona = persona.id_persona
                INNER JOIN expediente expe ON expe.id_persona = persona.id_persona
                INNER JOIN expediente_tipo_subtipo exptipsub ON exptipsub.id_exp_tipo_subtipo = expe.id_exp_tipo_subtipo
                INNER JOIN expediente_tipo exptipo ON exptipo.id_expediente_tipo = exptipsub.id_expediente_tipo
                INNER JOIN expediente_subtipo expesubt ON expesubt.id_expsubtipo = exptipsub.id_expsubtipo
                INNER JOIN expediente_estado expestado ON expestado.id_expediente_estado = expe.id_expediente_estado
            WHERE 
                estado_logico = 1";

    if ($estado != 50) {
        $sql .= " AND expe.id_expediente_estado = ?";
    }

    $s = $connect->prepare($sql);

    if ($estado != 50) {
        $s->bind_param("i", $estado);
    }

    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();

    return $records;

}
function agregarDetalleMovimiento($detalle_movimiento_archivo, $detalle_movimiento_extension, $detalle_movimiento_ubicacion, $id_expedientemovimientotipo)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "INSERT INTO `sistemajuridico`.`detalle_movimiento` (
        `detalle_movimiento_archivo`, 
        `detalle_movimiento_extension`, 
        `detalle_movimiento_ubicacion`, 
        `id_expedientemovimientotipo`) 
    VALUES (
        '$detalle_movimiento_archivo',
        '$detalle_movimiento_extension', 
        '$detalle_movimiento_ubicacion', 
        '$id_expedientemovimientotipo');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
        return 1;
    } else {
        $connect->rollback();
        return 0;
    }
}

function borrarExpediente($idExpediente)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`expediente` SET `estado_logico` = '0' WHERE (`id_expediente` = '$idExpediente');";
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
        return 1;
    } else {
        $connect->rollback();
        return 0;
    }
}

function obtenerListadoExpedienteModificar($id_expediente)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * FROM sistemajuridico.expediente where id_expediente=$id_expediente;";
    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();
    return $records;
}
function borrarDetalleMovimiento($idExpedientexMovimiento)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "DELETE FROM `sistemajuridico`.`expedientexmovxtipo` WHERE (`id_expedientemovimientotipo` = '$idExpedientexMovimiento');";
    $s = $connect->prepare($sql);
    $s = $connect->prepare($sql);
    if ($s) {
        $s->execute();
        $s->close();
        $connect->commit();
        return 1;
    } else {
        $connect->rollback();
        return 0;
    }
}

function obtenerDatosExpedientesParaGrafico()
{
    global $connect;

    $connect->begin_transaction();

    $sql = "SELECT
    y.year AS anio,
    m.month AS mes,
    m.name AS nombre_mes,
    COALESCE(COUNT(e.id_expediente), 0) AS cantidad_expedientes
FROM
    (SELECT 2022 AS year UNION SELECT 2023) y -- Genera los años deseados
    CROSS JOIN (SELECT 1 AS month, 'enero' AS name
                UNION SELECT 2, 'febrero'
                UNION SELECT 3, 'marzo'
                UNION SELECT 4, 'abril'
                UNION SELECT 5, 'mayo'
                UNION SELECT 6, 'junio'
                UNION SELECT 7, 'julio'
                UNION SELECT 8, 'agosto'
                UNION SELECT 9, 'septiembre'
                UNION SELECT 10, 'octubre'
                UNION SELECT 11, 'noviembre'
                UNION SELECT 12, 'diciembre') m 
    LEFT JOIN expediente e ON y.year = YEAR(e.expediente_fecha_inicio) AND m.month = MONTH(e.expediente_fecha_inicio)
GROUP BY
    y.year, m.month, m.name
ORDER BY
    y.year, m.month;";

    $s = $connect->prepare($sql);
    $s->execute();
    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);
    $s->close();


    $resultados2022 = array();
    $resultados2023 = array();

    foreach ($records as $record) {
        if ($record['anio'] == 2022) {
            $resultados2022[] = $record;
        } elseif ($record['anio'] == 2023) {
            $resultados2023[] = $record;
        }
    }

    return array('2022' => $resultados2022, '2023' => $resultados2023);
}