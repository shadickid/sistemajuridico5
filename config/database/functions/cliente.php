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