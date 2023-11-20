<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php';
require_once ROOT_PATH . 'config/database/functions/expediente.php';
require_once ROOT_PATH . 'vendor/autoload.php'; // Asegúrate de que el autoloader de Composer está incluido
include(ROOT_PATH . 'config\database\functions\movimiento.php');

// Obtén la información necesaria
$id_expediente = $_POST['id_expediente'];
$movimientos = consultarMovimientoExpediente($id_expediente);

// Inicializa FPDI
use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();

// Itera sobre los movimientos y agrega cada PDF al nuevo documento
foreach ($movimientos as $regmov) {
    $pdf->addPage();
    $pdf->setSourceFile($regmov['detalle_movimiento_ubicacion']);
    $templateId = $pdf->importPage(1);
    $pdf->useTemplate($templateId, 10, 10, 200);
}

// Guarda el PDF combinado
$pdf->Output('expedientes.pdf', 'I');