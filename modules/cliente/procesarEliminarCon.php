<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_contxper = $_GET['id_contxper'];
$id_persona = $_GET['idPersona'];
$id_persona_fisica = $_GET['idPersonaFisica'];

borrarContactoEmpleado($id_contxper);
header("location: modificarClienteF.php?idPersona=$id_persona&idPersonaFisica=$id_persona_fisica&vali=4#contacto");