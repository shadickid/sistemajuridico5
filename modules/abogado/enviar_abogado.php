<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
include(ROOT_PATH . 'config\database\functions\contacto.php');
include(ROOT_PATH . 'config\database\functions\domicilio.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
include(ROOT_PATH . 'config\database\functions\documento.php');
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$fec_nac = $_POST['fec_nac'];
$esp = $_POST['esp'];
$sex = $_POST['sex'];
$tipoContacto = $_POST['tipoContacto'];
$contacto = $_POST['contacto'];
$tipoDocumento = $_POST['tipoDocumento'];
$documento = $_POST['Documento'];
$tipopersona = $_POST['tipopersona'];
$id_persona = agregarPersona($tipopersona);
agregarContactoEmpleado($id_persona, $contacto, $tipoContacto);
agregarEmpleadoDocumento($documento, $id_persona, $tipoDocumento);
$idPersonaFisica = agregarPersonaFisicaEmpleado($name, $lastname, $fec_nac, $sex, $id_persona);
$idtipoempleado = 1;
$id_empleado = agregarEmpleado($id_persona, $idtipoempleado);
$localizacion = BASE_URL . "modules/usuario/registro.php?id_empleado=" . $id_empleado;
header("location:$localizacion");