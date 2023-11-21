<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_contxper = $_GET['id_contxper'];
$id_persona = $_GET['idPersona'];
$id_persona_juridica = $_GET['idPersonaJuridica'];

borrarContactoEmpleado($id_contxper);
header("location: modificarClienteJ.php?idPersona=$id_persona&idPersonaJuridica=$id_persona_juridica&vali=4#contacto");