<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$tipodocumento = $_POST['tipodocumento'];
$valordocumento = $_POST['valordocumento'];
$idPersona = $_POST['idPersona'];


$sql = "SELECT * FROM persona
        inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
        inner join documentoxpersona on persona.id_persona=documentoxpersona.id_persona
        where documentoxpersona.id_tipo_documento=$tipodocumento and persona.id_persona=$idPersona";
$verificar_datos_cliente = $connect->query($sql);

if ($verificar_datos_cliente->num_rows > 0) {
    header("location: modificarClienteF.php?idPersona=$idPersona&vali=1#documentos");
} else {
    agregarEmpleadoDocumento($valordocumento, $idPersona, $tipodocumento);
    header("location: listado.php?vali=2");

    //HACER VALIDACION DE DNI Y TIPO 

}