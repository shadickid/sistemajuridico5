<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');

function agregarMovimiento($nombre)
{

    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`movimiento_tipo_proceso` (`nombre`, `estado`) 
            VALUES ('$nombre', '1');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarMovimiento($nombre, $id_tipo_proceso)
{

    global $connect;
    $sql = "UPDATE `sistemajuridico`.`movimiento_tipo_proceso` SET 
          `nombre` = '$nombre' WHERE (`id_tipo_proceso` = '$id_tipo_proceso');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarMovimiento($id_tipo_proceso)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`movimiento_tipo_proceso` SET `estado` = '0' WHERE (`id_tipo_proceso` = '$id_tipo_proceso');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function consultarMovimientoExpediente($idExpediente)
{
    global $connect;
    $sql = "SELECT * from expediente
            inner join expedientexmovxtipo on expedientexmovxtipo.id_expediente=expediente.id_expediente
            inner join movimiento_tipo_proceso on movimiento_tipo_proceso.id_tipo_proceso=expedientexmovxtipo.id_tipo_proceso
            inner join detalle_movimiento on detalle_movimiento.id_expedientemovimientotipo=expedientexmovxtipo.id_expedientemovimientotipo
            inner join usuario on usuario.id_usuario=expedientexmovxtipo.id_usuario
            inner join empleado on empleado.id_empleado=usuario.id_empleado
            inner join persona_fisica on persona_fisica.id_persona_fisica=empleado.id_persona_fisica
            where expediente.id_expediente=$idExpediente";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}

function consultarMovimientoExpedienteDESC($idExpediente)
{
    global $connect;
    $sql = "SELECT * from expediente
            inner join expedientexmovxtipo on expedientexmovxtipo.id_expediente=expediente.id_expediente
            inner join movimiento_tipo_proceso on movimiento_tipo_proceso.id_tipo_proceso=expedientexmovxtipo.id_tipo_proceso
            inner join detalle_movimiento on detalle_movimiento.id_expedientemovimientotipo=expedientexmovxtipo.id_expedientemovimientotipo
            inner join usuario on usuario.id_usuario=expedientexmovxtipo.id_usuario
            inner join empleado on empleado.id_empleado=usuario.id_empleado
            inner join persona_fisica on persona_fisica.id_persona_fisica=empleado.id_persona_fisica
            where expediente.id_expediente=$idExpediente 
            order by movimiento_fecha DESC";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}

function consultarMovimientoExpedienteDESCMensaje($idExpediente)
{
    global $connect;
    $sql = "SELECT * from expediente
    inner join expedientexmovxtipo on expedientexmovxtipo.id_expediente=expediente.id_expediente
    inner join movimiento_tipo_proceso on movimiento_tipo_proceso.id_tipo_proceso=expedientexmovxtipo.id_tipo_proceso
    inner join detalle_movimiento on detalle_movimiento.id_expedientemovimientotipo=expedientexmovxtipo.id_expedientemovimientotipo
    inner join usuario on usuario.id_usuario=expedientexmovxtipo.id_usuario
    inner join empleado on empleado.id_empleado=usuario.id_empleado
    inner join persona_fisica on persona_fisica.id_persona_fisica=empleado.id_persona_fisica
    where expediente.id_expediente=$idExpediente
    order by movimiento_fecha DESC
    limit 1;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}