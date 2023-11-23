<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/documento.php');
$tipodocumento = $_POST['tipoDocumento'];
$valordocumento = $_POST['documentoValor'];
$id_persona = $_POST['idPersona'];
$id_persona_fisica = $_POST['idPersonaFisica'];

$sql = "SELECT * FROM persona
        inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
        inner join documentoxpersona on persona.id_persona=documentoxpersona.id_persona
        where documentoxpersona.id_tipo_documento=$tipodocumento and persona.id_persona=$id_persona";
$verificar_datos_cliente = $connect->query($sql);

if ($verificar_datos_cliente->num_rows > 0) {
    header("location: modificarClienteF.php?idPersona=$id_persona&idPersonaFisica=$id_persona_fisica&vali=1#documentos");
} else {
    agregarEmpleadoDocumento($valordocumento, $id_persona, $tipodocumento);
    header("location: modificarClienteF.php?idPersona=$id_persona&idPersonaFisica=$id_persona_fisica&vali=5#documentos");

    //HACER VALIDACION DE DNI Y TIPO 

}