<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/connect.php';
include ROOT_PATH . 'config\database\functions\persona.php';
include ROOT_PATH . 'config\database\functions\domicilio.php';
$idPersona = $_POST['idPersona'];
$barrio = $_POST['barrio'];
$tipoAtributo = $_POST['atributosSeleccionados'];
$valorAtributo = $_POST['valoresIngresados'];
$tipoDom = $_POST['tipoDom'];

if ($barrio != null) {
    $idDomicilio = agregarDomicilio($barrio);
    DomicilioPersonaTipoDom($idDomicilio, $tipoDom, $idPersona);
    DomicilioAtributo($idDomicilio, $tipoAtributo, $valorAtributo);
    header("location: listado.php?vali=2");

}