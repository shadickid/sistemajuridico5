<?php
include('../../config/database/connect.php');
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$fec_nac = $_POST['fec_nac'];
$esp = $_POST['esp'];
$sex = $_POST['sex'];
$tipoContacto = $_POST['tipoContacto'];
$contacto = $_POST['contacto'];
$tipoDocumento = $_POST['tipoDocumento'];
$documento = $_POST['Documento'];


/* inserta persona */
$sql = "INSERT INTO `sistemajuridico`.`persona` (`tipo`) VALUES ('1');";
$connect->query($sql);
/* se inserta documento con y se rescata el id de persona */
$lastidpersona = $connect->insert_id;
$sql = "INSERT INTO `sistemajuridico`.`documentoxpersona` (`detalle`, `id_persona`, `id_tipo_documento`) VALUES ('$documento', '$lastidpersona', '$tipoDocumento')";
$connect->query($sql);

$sql = "INSERT INTO `sistemajuridico`.`contactoxpersona` (`id_persona`, `contacto_detalle`, `id_tipo_contacto`)  VALUES ('$lastidpersona', '$contacto', '$tipoContacto');";
$connect->query($sql);

$sql = "INSERT INTO `sistemajuridico`.`persona_fisica` (`persona_nombre`, `persona_apellido`, `persona_fec_nac`, `tipo_persona_fisica`, `id_sexo`, `id_persona`) VALUES ('$name', '$lastname', '$fec_nac', '1', '$sex', '$lastidpersona');";
$connect->query($sql);

$lastidpersona = $connect->insert_id;
$fechadecarga = date('Y-m-d');
$sql = "INSERT INTO `sistemajuridico`.`abogado` (`id_persona_fisica`, `especialidad`, `abogado_fec_alta`, `estado`) VALUES ('$lastidpersona', '$esp', '$fechadecarga', '1');";
$connect->query($sql)
    ?>