<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/connect.php';
include ROOT_PATH . 'config\database\functions\persona.php';
include ROOT_PATH . 'config\database\functions\cliente.php';
include ROOT_PATH . 'config\database\functions\documento.php';

$razonSocial = $_POST['razonSocial'];
$tipodocumento = $_POST['tipodocumento'];
$documento = $_POST['cuit'];
$nroIngresoBruto = $_POST['nroIngresoBruto'];
$cc = $_POST['cc'];
$fechadeconstitucion = $_POST['fechadeconstitucion'];
$idPersona = $_POST['idPersona'];
$docuviejo = $_POST['docuviejo'];

// Verifica solo si el número de documento ha cambiado
if ($documento != $docuviejo) {
    $verificar_datos_cliente = verificarDocumentoJuridico($documento);
    foreach ($verificar_datos_cliente as $cliente) {
        $dnicliente = $cliente["detalle"];

    }

    // Si el nuevo número de documento ya existe, redirige con un mensaje de error
    if ($dnicliente == $documento) {
        header("location: modificarClienteJ.php?idPersona=$idPersona&vali=1");
        exit; // Termina la ejecución para evitar procesamiento adicional
    }
}
$datos = verificarDocumentoJuridico($docuviejo);
foreach ($datos as $clientes) {
    $id_persona_fisica = $clientes['id_persona_fisica'];
    $id_documentoxpersona = $clientes['id_documentoxpersona'];
}
// Continúa con el proceso de modificación
modificarPersonaJuridico($razonSocial, $documento, $nroIngresoBruto, $cc, $fechadeconstitucion, $id_persona_juridica);
modificarPersonaDocumento($documento, $idPersona, $tipodocumento, $id_documentoxpersona);
header("location: listado.php?vali=2");
exit; // Termina la ejecución después de redirigir
?>