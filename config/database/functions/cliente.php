<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');


function datosClientesFisicos()
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * FROM persona
            inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
            inner join cliente on cliente.id_persona =persona.id_persona
            where cliente.estado=1;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function buscarClientePersona($idPersona)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * FROM persona
    inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
    inner join cliente on cliente.id_persona =persona.id_persona
    where cliente.estado=1 and persona.id_persona=$idPersona;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function datosClientesFisicosModificar($idPersona)
{
    global $connect;
    $connect->begin_transaction();


    $sql = "SELECT * FROM persona
            inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
            inner join cliente on cliente.id_persona =persona.id_persona
            where cliente.estado=1 and persona.id_persona=$idPersona;";
    $s = $connect->prepare($sql);
    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}

function bajaClientesFisicos($idCliente)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "UPDATE `sistemajuridico`.`cliente` SET 
    `cliente_fec_baja` = now(), `estado` = '0' WHERE (`id_cliente` = '$idCliente');";
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
function datosClientesJuridicos()
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * FROM persona
            inner join persona_juridica on persona_juridica.id_persona=persona.id_persona
            inner join cliente on cliente.id_persona =persona.id_persona
            where cliente.estado=1;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}

function datosClientesJuridicosModificar($idPersona)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * FROM persona
            inner join persona_juridica on persona_juridica.id_persona=persona.id_persona
            inner join cliente on cliente.id_persona =persona.id_persona
            inner join documentoxpersona on documentoxpersona.id_persona=persona.id_persona
            where cliente.estado=1 and persona.id_persona=$idPersona;";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}
function agregarCliente($idPersona)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "INSERT INTO `sistemajuridico`.`cliente` 
            (`cliente_fec_alta`, `estado`, `id_persona`) 
            VALUES (now(), '1', '$idPersona');";
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

function obtenerDatosClienteDocumentoFisico($idPersona)
{
    global $connect;
    $connect->begin_transaction();
    $sql = "SELECT * from persona
            inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
            inner join documentoxpersona on documentoxpersona.id_persona=persona.id_persona
            inner join documento on documento.id_tipo_documento=documentoxpersona.id_tipo_documento
            inner join cliente on cliente.id_persona=persona.id_persona
            where persona.id_persona=$idPersona";
    $s = $connect->prepare($sql);

    $s->execute();

    $records = $s->get_result()->fetch_all(MYSQLI_ASSOC);

    $s->close();
    return $records;
}