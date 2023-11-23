<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$id_documentoxpersona = $_GET['id_documentoxpersona'];
$idPersona = $_GET['idPersona'];
$id_persona_fisica = $_GET['idPersonaFisica'];
borrarEmpleadoDocumento($id_documentoxpersona);
header("location: modificar.php?idPersona=$idPersona&idPersonaFisica=$id_persona_fisica&vali=4#documentos");