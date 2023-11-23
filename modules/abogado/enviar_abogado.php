<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config\database\functions\persona.php');
include(ROOT_PATH . 'config\database\functions\contacto.php');
include(ROOT_PATH . 'config\database\functions\domicilio.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
include(ROOT_PATH . 'config\database\functions\documento.php');
include(ROOT_PATH . 'config\database\functions\especializacion.php');

$name = $_POST['nombre'];
$lastname = $_POST['apellido'];
$fec_nac = $_POST['fec_nac'];
$esp = $_POST['esp'];
$sex = $_POST['sexo'];
$tipoContacto = $_POST['tipoContacto'];
$contacto = $_POST['contactoValor'];
$tipoDocumento = $_POST['tipoDocumento'];
$documento = $_POST['documentoValor'];
$tipopersona = $_POST['tipopersona'];
$barrio = $_POST['barrio'];
$tipoAtributo = $_POST['atributosSeleccionados'];
$valorAtributo = $_POST['valoresIngresados'];
$tipoDom = $_POST['tipoDom'];

$sql = "SELECT * FROM persona
        inner join persona_fisica on persona_fisica.id_persona=persona.id_persona
        inner join documentoxpersona on persona.id_persona=documentoxpersona.id_persona
        where documentoxpersona.detalle=$documento";

$verificar_datos_cliente = $connect->query($sql);

if ($verificar_datos_cliente->num_rows > 0) {
    header("location: formulario_abogado.php?vali=1");
} else {
    $id_persona = agregarPersona($tipopersona);

    agregarContactoEmpleado($id_persona, $contacto, $tipoContacto);

    agregarEmpleadoDocumento($documento, $id_persona, $tipoDocumento);

    $idPersonaFisica = agregarPersonaFisicaEmpleado($name, $lastname, $fec_nac, $sex, $id_persona);
    $idtipoempleado = 1;
    $id_empleado = agregarEmpleado($idPersonaFisica, $idtipoempleado);
    agregarEspEmpleado($id_empleado, $esp);

    if ($barrio !== null && !empty($barrio)) {
        $idDomicilio = agregarDomicilio($barrio);
        DomicilioPersonaTipoDom($idDomicilio, $tipoDom, $id_persona);
        DomicilioAtributo($idDomicilio, $tipoAtributo, $valorAtributo);
        header("location:modal.php?id_empleado=$id_empleado");
    } else {
        header("location:modal.php?id_empleado=$id_empleado");
    }
}
?>