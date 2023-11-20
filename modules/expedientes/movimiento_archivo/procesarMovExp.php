<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
require_once(ROOT_PATH . 'config/database/connect.php');
require_once(ROOT_PATH . 'config\database\functions\expediente.php');

// $fechamov = $_POST['fechamov'];
$descripcion = $_POST['descripcion'];
$movimiento = $_POST['movimiento'];
$usuario = $_POST['usuario'];
$idExpediente = $_POST['idExpediente'];

$idExpedientexMovimientoxTipo = agregarExpedientexMovimientoxTipo($descripcion, $movimiento, $idExpediente, $usuario);
$directorio = 'carpeta_expedientes/' . $idExpediente;
$fecha_hora = date("Ymd_His");

if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}


foreach ($_FILES['archivo']['tmp_name'] as $key => $temp_name) {
    try {
        if ($_FILES['archivo']['name'][$key] && $_FILES['archivo']['error'][$key] == 0) {
            $extension = pathinfo($_FILES['archivo']['name'][$key], PATHINFO_EXTENSION);
            $newFileName = "$idExpediente" . "_$fecha_hora" . "_$key.$extension";
            $ruta = $directorio . "/" . $newFileName;
            if (move_uploaded_file($_FILES['archivo']['tmp_name'][$key], $ruta)) {
                $archivo_nombre = $newFileName;
                $archivo_extension = $extension;
                $archivo_ubicacion = $ruta;

                agregarDetalleMovimiento($archivo_nombre, $archivo_extension, $archivo_ubicacion, $idExpedientexMovimientoxTipo);
            }
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    }

}
header('location: nuevo_mov.php?id_expediente=' . $idExpediente . '&vali=1');