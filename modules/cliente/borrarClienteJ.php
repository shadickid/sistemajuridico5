<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
$idPersona = $_GET['idPersona'];

$records = buscarClientePersonaJ($idPersona);

foreach ($records as $record) {
    $idCliente = $record['id_cliente'];
}

bajaClientesFisicos($idCliente);
header("location: listado.php?vali=3");