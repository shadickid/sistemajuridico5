<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
$conditional = [
    'estado_logico' => 1
];
$modulos = selectall('modulo', $conditional);

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
    <span>/</span>
    <span>Modulo</span>
</div>
<div class="dashboard">
    <h1>Modulo</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php" class="volver-atras-button">Volver Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div>
                <a href="alta.php" class="a-alta">Nuevo modulo</a>
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
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Modulo</th>
                        <th>Ruta</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <?php foreach ($modulos as $regmodulos) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $regmodulos['id_modulo'] ?></td>
                        <td><?php echo $regmodulos['descripcion'] ?></td>
                        <td><?php echo $regmodulos['ruta'] ?></td>
                        <td><a href="modificar.php?id_modulo=<?php echo $regmodulos['id_modulo'] ?>">
                                <button class="editarButton">
                                    <i class="fi fi-rr-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td><a href="eliminar.php?id_modulo=<?php echo $regmodulos['id_modulo'] ?>">
                                <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>