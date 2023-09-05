<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [
    'estado' => 1
];
$records = selectall('documento', $conditional);
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <span>Documento</span>
</div>
<div class="dashboard">
    <h1> Documento</h1>
    <a href="#" onclick="window.history.go(-1); return false;" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <a href="alta.php" class="a-alta">Nuevo tipo de documento</a>
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
                            <?php echo $reg['id_tipo_documento'] ?>
                        </td>
                        <td>
                            <?php echo $reg['descripcion'] ?>
                        </td>
                        <td>
                            <a href="modificar.php?id_tipo_documento=<?php echo $reg['id_tipo_documento'] ?>">
                                <button class="editarButton">
                                    <i class="fi fi-rr-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="eliminar.php?id_tipo_documento=<?php echo $reg['id_tipo_documento'] ?>">
                                <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                </button>
                            </a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </table>
            <?php if (isset($_GET['error'])): ?>
                <span class=''>
                    Error:No se cargo nada
                </span>
            <?php endif ?>
        </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>