<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/connect.php';
include ROOT_PATH . 'config\database\functions\persona.php';
include ROOT_PATH . 'config\database\functions\cliente.php';
include ROOT_PATH . 'config\database\functions\documento.php';

$idPersona = $_POST['idPersona'];
$id_persona_fisica = $_POST['id_persona_fisica'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fec_nac = $_POST['fec_nac'];
$sexo = $_POST['sexo'];


if ($idPersona != null && $nombre != null && $apellido != null && $fec_nac != null && $sexo != null && $id_persona_fisica != null) {

    /*
    $tipodocumento = $_POST['tipodocumento'];
    $documento = $_POST['documento'];
    $docuviejo = $_POST['docuviejo'];

    if ($docuviejo != $documento) {
        $verificar_datos_cliente = verificarDocumento($documento);
        foreach ($verificar_datos_cliente as $cliente) {
            $dnicliente = $cliente["detalle"];
        }

        if ($dnicliente == $documento) {
            header("location: modificarClienteF.php?idPersona=$idPersona&vali=1");
            exit;
        }
    }
    */

    // $datos = verificarDocumento($docuviejo);
    // foreach ($datos as $clientes) {
    //     $id_persona_fisica = $clientes['id_persona_fisica'];
    //     $id_documentoxpersona = $clientes['id_documentoxpersona'];
    // }


    modificarPersonaFisicaEmpleado($nombre, $apellido, $fec_nac, $sexo, $id_persona_fisica);

    // borrarEmpleadoDocumento($id_documentoxpersona);
    // agregarEmpleadoDocumento($documento, $idPersona, $tipodocumento);

    header("location: listado.php?vali=2");
    exit;
} else {

    header("location: modificarClienteF.php?idPersona=$idPersona&vali=3#datos");
    exit;
}
?>