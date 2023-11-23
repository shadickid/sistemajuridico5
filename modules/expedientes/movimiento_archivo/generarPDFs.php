<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/functions/expediente.php';
require_once ROOT_PATH . 'vendor/autoload.php';
use iio\libmergepdf\Merger;

include(ROOT_PATH . 'config\database\functions\movimiento.php');

// Obtén la información necesaria
$id_expediente = $_POST['id_expediente'];
$movimientos = consultarMovimientoExpediente($id_expediente);

// Inicializa el parser de PDF
$pdf = new Merger();

// Itera sobre los movimientos y agrega cada PDF al nuevo documento
foreach ($movimientos as $regmov) {
    // Ruta al archivo PDF que deseas importar
    $filePath = $regmov['detalle_movimiento_ubicacion'];

    // Agrega una nueva página
    $pdf->addFile($filePath);

}
$salida = $pdf->merge();

/*
Ahora la salida la mostramos directamente en la petición,
y enviamos unos encabezados para que el navegador
lo interprete
*/
# Este nombre se pondrá como título o nombre del documento
$outputFilePath = 'expedientes_combinados.pdf';

header("Content-type:application/pdf");
header("Content-disposition: inline; filename=$outputFilePath");
header("content-Transfer-Encoding:binary");
header("Accept-Ranges:bytes");
# Imprimir salida luego de encabezados
echo $salida;

