<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_persona = $_POST['idPersona'];
$id_persona_fisica = $_POST['idPersonaFisica'];
$tipocontacto = $_POST['tipoContacto'];
$valorcontacto = $_POST['contactoValor'];


agregarContactoEmpleado($id_persona, $valorcontacto, $tipocontacto);
header("location: modificarClienteF.php?idPersona=$id_persona&idPersonaFisica=$id_persona_fisica&vali=5#contacto");
