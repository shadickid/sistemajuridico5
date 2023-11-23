<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
include(ROOT_PATH . 'config\database\functions\documento.php');
include(ROOT_PATH . 'config\database\functions\domicilio.php');
include(ROOT_PATH . 'config\database\functions\contacto.php');
$tipopersona = $_POST['tipoPersona'];

if ($tipopersona == 1) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fec_nac = $_POST['fec_nac'];
    $sexo = $_POST['sexo'];
    $tipodocumento = $_POST['tipoDocumento'];
    $documento = $_POST['documentoValor'];
    $tipoContacto = $_POST['tipoContacto'];
    $contactoValor = $_POST['contactoValor'];
    $barrio = $_POST['barrio'];
    $tipoAtributo = $_POST['atributosSeleccionados'];
    $valorAtributo = $_POST['valoresIngresados'];
    $tipoDom = $_POST['tipoDom'];

    $sql = "SELECT * FROM persona
            INNER JOIN persona_fisica ON persona_fisica.id_persona = persona.id_persona
            INNER JOIN documentoxpersona ON persona.id_persona = documentoxpersona.id_persona
            WHERE documentoxpersona.detalle = $documento";

    $verificar_datos_cliente = $connect->query($sql);
    if ($verificar_datos_cliente->num_rows > 0) {
        header("location: formularioCliente.php?vali=1#documento");
    } else {
        $id_persona = agregarPersona($tipopersona);
        agregarCliente($id_persona);
        agregarEmpleadoDocumento($documento, $id_persona, $tipodocumento);
        agregarPersonaFisicaEmpleado($nombre, $apellido, $fec_nac, $sexo, $id_persona);
        agregarContactoEmpleado($id_persona, $contactoValor, $tipoContacto);


        if ($barrio !== null && !empty($barrio)) {
            $idDomicilio = agregarDomicilio($barrio);
            DomicilioPersonaTipoDom($idDomicilio, $tipoDom, $id_persona);
            DomicilioAtributo($idDomicilio, $tipoAtributo, $valorAtributo);
            header("location: listado.php?vali=1");
        } else {
            header("location: listado.php?vali=1");
        }
    }
} elseif ($tipopersona = 2) {
    $razonSocial = $_POST['razonSocial'];
    $nroIngresoBruto = $_POST['nroIngresoBruto'];
    $cc = $_POST['cc'];
    $fechadeconstitucion = $_POST['fechadeconstitucion'];
    $tipoContacto = $_POST['tipoContactoJ'];
    $contactoValor = $_POST['contactoValorJ'];
    $tipodocumento = $_POST['tipoDocumentoJ'];
    $documento = $_POST['documentoValorJ'];
    $barrio = $_POST['barrioJ'];
    $tipoAtributo = $_POST['atributosSeleccionadosJuridico'];
    $valorAtributo = $_POST['valoresIngresadosJuridico'];
    $tipoDom = $_POST['tipoDomJ'];

    $sql = "SELECT * FROM persona
        INNER JOIN persona_juridica ON persona_juridica.id_persona = persona.id_persona
        INNER JOIN documentoxpersona ON persona.id_persona = documentoxpersona.id_persona
        WHERE documentoxpersona.detalle = $documento";

    $verificar_datos_cliente = $connect->query($sql);

    if ($verificar_datos_cliente->num_rows > 0) {
        header("location: formularioCliente.php?vali=1#documentoJ");
    } else {
        $id_persona = agregarPersona($tipopersona);
        agregarCliente($id_persona);
        agregarEmpleadoDocumento($documento, $id_persona, $tipodocumento);
        agregarPersonaJuridica($razonSocial, $nroIngresoBruto, $cc, $fechadeconstitucion, $id_persona);
        agregarContactoEmpleado($id_persona, $contactoValor, $tipoContacto);

        if ($barrio !== null && !empty($barrio)) {
            $idDomicilio = agregarDomicilio($barrio);
            DomicilioPersonaTipoDom($idDomicilio, $tipoDom, $id_persona);
            DomicilioAtributo($idDomicilio, $tipoAtributo, $valorAtributo);
            header("location: listado.php?vali=1");
        } else {
            header("location: listado.php?vali=1");
        }
    }
}
