<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');

$records = selectall('pais');
?>
<div>
    <h1>PAIS</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <a href="alta.php">Nuevo Pais</a>
        <table class="tablamodal">
            <tr>
                <th>ID Pais</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Borrar</th>

            </tr>
            <?php foreach ($records as $reg): ?>
                <tr>
                    <td>
                        <?php echo $reg['id_pais'] ?>
                    </td>
                    <td>
                        <?php echo $reg['nombre'] ?>
                    </td>
                    <td>
                        <a href="modificar.php?id_pais=<?php echo $reg['id_pais'] ?>"><i class="fi fi-rr-edit"></i></a>
                    </td>
                    <td>
                        <a href="eliminar.php?id_pais=<?php echo $reg['id_pais'] ?>"><i class="fi-rr-eraser"></i></a>
                    </td>

                </tr>
            <?php endforeach ?>
        </table>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>