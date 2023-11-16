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



$verificar_datos_cliente = verificarDocumentoJuridico($documento);
foreach ($verificar_datos_cliente as $cliente) {
    $dnicliente = $cliente["detalle"];
    $id_persona_juridica = $cliente['id_persona_juridica'];
    $id_documentoxpersona = $cliente['id_documentoxpersona'];
    echo $dnicliente;
    echo "   adadsf";
    echo $id_documentoxpersona;
    echo "   adadsf";
    echo $id_documentoxpersona_juridica;
}
exit;

if ($dnicliente == $documento) {
    header("location: modificarClienteJ.php?idPersona=$idPersona&vali=1");
} else {
    modificarPersonaJuridico($razonSocial, $documento, $nroIngresoBruto, $cc, $fechadeconstitucion, $id_persona_juridica);
    modificarPersonaDocumento($documento, $idPersona, $tipodocumento, $id_documentoxpersona);
    //header("location: listado.php?vali=2");
}

?>