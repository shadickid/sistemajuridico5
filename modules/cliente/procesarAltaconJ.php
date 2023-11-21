<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_persona = $_POST['idPersona'];
$id_persona_juridica = $_POST['idPersonaJuridica'];
$tipocontacto = $_POST['tipoContacto'];
$valorcontacto = $_POST['contactoValor'];


agregarContactoEmpleado($id_persona, $valorcontacto, $tipocontacto);
header("location: modificarClienteJ.php?idPersona=$id_persona&idPersonaJuridica=$id_persona_juridica&vali=5#contacto");
