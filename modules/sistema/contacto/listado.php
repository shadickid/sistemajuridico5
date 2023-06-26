<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/general.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');

$records = selectall('tipo_contacto');
?>
<div>
    <h1> Contacto</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <a href="alta.php">Nuevo tipo de contacto</a>
        <table>
            <tr>
                <th>ID Contacto</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Borrar</th>

            </tr>
            <?php foreach ($records as $reg) : ?>
                <tr>
                    <td><?php echo $reg['id_tipo_contacto'] ?></td>
                    <td><?php echo $reg['tipo_contacto_nombre'] ?></td>
                    <td>
                        <a href="modificar.php?id_tipo_contacto=<?php echo $reg['id_tipo_contacto'] ?>"><i class="fi fi-rr-edit"></i></a>
                    </td>
                    <td>
                        <a href="eliminar.php?id_tipo_contacto=<?php echo $reg['id_tipo_contacto'] ?>"><i class="fi-rr-eraser"></i></a>
                    </td>

                </tr>
            <?php endforeach ?>
        </table>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>