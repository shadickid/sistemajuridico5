<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
/* Pais */
function agregarPais($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`pais` (`nombre`) VALUES ('$nombre');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarPais($nombre, $id_pais)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`pais` 
    SET `nombre` = '$nombre' 
    WHERE (`id_pais` = '$id_pais');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarPais($id_pais)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`pais` 
    WHERE (`id_pais` = '$id_pais');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

/* Provincia */

function consultarProvinciaPais()
{
    global $connect;
    $sql = "SELECT pais.id_pais,pais.nombre as paisnombre, provincia.id_provincia, provincia.nombre as provincianombre  from pais 
            inner join provincia on pais.id_pais=provincia.id_pais";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}

function consultarLocalidadProvincia()
{
    global $connect;
    $sql = "SELECT  provincia.id_provincia,
                    provincia.nombre,
                    localidad.id_localidad,
                    localidad.nombre as nombrelocalidad from provincia
            inner join localidad on localidad.id_provincia=provincia.id_provincia;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}
function consultarBarrioLocalidad()
{
    global $connect;
    $sql = "SELECT localidad.id_localidad,localidad.nombre as nombrelocalidad,barrio.id_barrio,barrio.nombre as nombrebarrio from localidad
    inner join barrio on localidad.id_localidad=barrio.id_localidad";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();

    return $records;
}

function agregarProvincia($nombre, $id_pais)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`provincia` (`id_pais`, `nombre`) 
    VALUES ('$id_pais', '$nombre');";

    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarProvincia($nombre, $id_pais, $id_provincia)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`provincia` 
    SET `id_pais` = '$id_pais', `nombre` = '$nombre' 
    WHERE (`id_provincia` = '$id_provincia');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarProvincia($id_provincia)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`provincia` 
    WHERE (`id_provincia` = '$id_provincia');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

/* Localidad */

function agregarLocalidad($nombre, $id_pais)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`localidad` (`id_provincia`, `nombre`) 
    VALUES ('$id_pais', '$nombre');";

    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarLocalidad($nombre, $id_provincia, $id_localidad)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`localidad` 
    SET `id_provincia` = '$id_provincia', `nombre` = '$nombre' 
    WHERE (`id_localidad` = '$id_localidad');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarLocalidad($id_localidad)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`localidad` 
    WHERE (`id_localidad` = '$id_localidad');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

// Barrio

function agregarBarrio($id_localidad, $nombre)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "INSERT INTO `sistemajuridico`.`barrio` (`nombre`, `id_localidad`) VALUES ('$nombre', '$id_localidad');";
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

function modificarBarrio($nombre, $id_localidad, $id_barrio)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`barrio` SET `nombre` = '$nombre', `id_localidad` = '$id_localidad' WHERE (`id_barrio` = '$id_barrio');";
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


function borrarBarrio($id_barrio)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "DELETE FROM `sistemajuridico`.`barrio` WHERE (`id_barrio` = '$id_barrio');";
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


/* Tipo domicilio */

function agregarTipoDomicilio($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`tipo_dom` (`valor`) 
    VALUES ('$nombre');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarTipoDomicilio($nombre, $id_tipo_dom)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`tipo_dom` 
    SET `valor` = '$nombre' 
    WHERE (`id_tipo_dom` = '$id_tipo_dom');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarTipoDomicilio($id_tipo_dom)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`tipo_dom` 
    WHERE (`id_tipo_dom` = '$id_tipo_dom');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

/* Atributo domicilio */

function agregarAtributoDomicilio($nombre)
{
    global $connect;
    $sql = "INSERT INTO `sistemajuridico`.`atributo_domiclio` (`valor`)
     VALUES ('$nombre');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function modificarAtributoDomicilio($nombre, $id_atri_dom)
{
    global $connect;
    $sql = "UPDATE `sistemajuridico`.`atributo_domiclio` 
    SET `valor` = '$nombre' 
    WHERE (`id_atri_dom` = '$id_atri_dom');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}

function borrarAtributoDomicilio($id_atri_dom)
{
    global $connect;
    $sql = "DELETE FROM `sistemajuridico`.`atributo_domiclio` 
    WHERE (`id_atri_dom` = '$id_atri_dom');";
    $s = $connect->prepare($sql);

    $s->execute();
    $s->close();
}
