<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [
    'estado' => 1
];
$records = selectall('expediente_tipo', $conditional);
?>
<div>
    <h1> TIPO DE EXPEDIENTE</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <a href="alta.php" class="a-alta">Nuevo tipo de expediente</a>
        <table class="tablamodal">
            <tr>
                <th>ID tipo</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Borrar</th>

            </tr>
            <?php foreach ($records as $reg): ?>
            <tr>
                <td>
                    <?php echo $reg['id_expediente_tipo'] ?>
                </td>
                <td>
                    <?php echo $reg['expediente_tipo_nombre'] ?>
                </td>
                <td>
                    <a href="modificar.php?id_expediente_tipo=<?php echo $reg['id_expediente_tipo'] ?>">
                        <button class="editarButton">
                            <i class="fi fi-rr-edit"></i>
                        </button>
                    </a>
                </td>
                <td>
                    <a href="eliminar.php?id_expediente_tipo=<?php echo $reg['id_expediente_tipo'] ?>">
                        <button class="darDeBajaButton">
                            <i class="fi-rr-eraser"></i>
                        </button>
                    </a>
                </td>

            </tr>
            <?php endforeach ?>
        </table>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>