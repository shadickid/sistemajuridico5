<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$conditional = [
    'estado' => 1
];
$records = selectall('expediente_estado', $conditional);
?>
<div>
    <h1> ESTADO DE EXPEDIENTE</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <a href="alta.php">Nuevo estado de expediente</a>
        <table>
            <tr>
                <th>ID Documento</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Borrar</th>

            </tr>
            <?php foreach ($records as $reg) : ?>
            <tr>
                <td><?php echo $reg['id_expediente_estado'] ?></td>
                <td><?php echo $reg['expediente_estado_nombre'] ?></td>
                <td>
                    <a href="modificar.php?id_expediente_estado=<?php echo $reg['id_expediente_estado'] ?>"><i
                            class="fi fi-rr-edit"></i></a>
                </td>
                <td>
                    <a href="eliminar.php?id_expediente_estado=<?php echo $reg['id_expediente_estado'] ?>"><i
                            class="fi-rr-eraser"></i></a>
                </td>

            </tr>
            <?php endforeach ?>
        </table>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>