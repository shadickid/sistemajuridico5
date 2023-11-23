<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_contxper = $_GET['id_contxper'];
$idPersonaFisica = $_GET['idPersonaFisica'];
$idPersona = $_GET['idPersona'];

borrarContactoEmpleado($id_contxper);
header("location: modificar.php?idPersonaFisica=$idPersonaFisica&idPersona=$idPersona&vali=3#contacto");