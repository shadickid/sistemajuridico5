<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/contacto.php');
$id_persona = $_POST['id_persona'];
$tipocontacto = $_POST['tipocontacto'];
$valorcontacto = $_POST['valorcontacto'];

agregarContactoEmpleado($id_persona, $valorcontacto, $tipocontacto);
header("location: datos.php");