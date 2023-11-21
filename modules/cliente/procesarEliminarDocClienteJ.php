<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$id_documentoxpersona = $_GET['id_documentoxpersona'];
$idPersona = $_GET['idPersona'];
$id_persona_juridica = $_GET['idPersonaJuridica'];
borrarEmpleadoDocumento($id_documentoxpersona);
header("location: modificarClienteJ.php?idPersona=$idPersona&idPersonaJuridica=$id_persona_juridica&vali=4#documentos");