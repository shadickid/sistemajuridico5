<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/functions/expediente.php';
require_once ROOT_PATH . 'vendor/autoload.php';
use setasign\Fpdi\Fpdi;

include(ROOT_PATH . 'config\database\functions\movimiento.php');

// Obtén la información necesaria
$id_expediente = $_POST['id_expediente'];
$movimientos = consultarMovimientoExpediente($id_expediente);

// Inicializa FPDI
$pdf = new Fpdi();

// Itera sobre los movimientos y agrega cada PDF al nuevo documento
foreach ($movimientos as $regmov) {
    // Ruta al archivo PDF que deseas importar
    $filePath = $regmov['detalle_movimiento_ubicacion'];

    // Agrega una nueva página
    $pdf->AddPage();

    // Importa la página del PDF
    $pdf->setSourceFile($filePath);
    $tplId = $pdf->importPage(1);
    $pdf->useTemplate($tplId, 0, 0, 210);

    // (Opcional) Agrega un salto de página entre cada PDF
    $pdf->AddPage();
}

// Guarda el PDF combinado
$pdf->Output('expedientes.pdf', 'I');
