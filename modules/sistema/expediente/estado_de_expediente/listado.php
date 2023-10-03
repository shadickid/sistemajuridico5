<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [
    'estado' => 1
];
$records = selectall('expediente_estado', $conditional);
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Expediente</a>
    <span>/</span>
    <span>Estado de expediente</span>
</div>
<div class="dashboard">
    <h1> ESTADO DE EXPEDIENTE</h1>
    <a href="<?php echo BASE_URL ?>modules\sistema\menu.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div>
                <a href="alta.php" class="a-alta">Nuevo estado de expediente</a>
            </div>
            <div class="msj-container" id="msj-container">
                <?php switch ($vali):
                    case 1: ?>
                        <span class="msj-success show">Se ha agregado correctamente</span>
                        <?php
                        break;
                    case 2: ?>
                        <span class="msj-modify show">Se ha modificado correctamente</span>
                        <?php
                        break;
                    case 3: ?>
                        <span class="msj-delete show">Se ha borrado un correctamente</span>
                        <?php
                        break;
                    case 4: ?>
                        <span class="msj-error show">Se ha producido un error correctamente</span>
                <?php endswitch ?>
            </div>
            <table class="tablamodal">
                <tr>
                    <th>ID Documento</th>
                    <th>Nombre</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </tr>
                <?php foreach ($records as $reg): ?>
                    <tr>
                        <td>
                            <?php echo $reg['id_expediente_estado'] ?>
                        </td>
                        <td>
                            <?php echo $reg['expediente_estado_nombre'] ?>
                        </td>
                        <td>
                            <a href="modificar.php?id_expediente_estado=<?php echo $reg['id_expediente_estado'] ?>">
                                <button class="editarButton">
                                    <i class="fi fi-rr-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="eliminar.php?id_expediente_estado=<?php echo $reg['id_expediente_estado'] ?>">
                                <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                </button>
                            </a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>