<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\bd_functions.php');
$sexos = selectall('sexo');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\menu.php">Usuario</a>
    <span>/</span>
    <span>Listado de sexo</span>
</div>
<div class="dashboard">
    <h1>Sexo</h1>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\menu.php" class="volver-atras-button">Volver
        Atr&aacute;s</a>
    <section class="inicio">
        <div class="contenido">
            <div>
                <a href="alta.php" class="a-alta">Nuevo tipo sexo</a>
            </div>
            <span class="msj-success show">Se ha agregado correctamente</span>
            <span class="msj-error hidden">Se ha borrado correctamente</span>
            <span class="msj-modify hidden">Se ha modificado correctamente</span>

            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <?php foreach ($sexos as $regsex): ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $regsex['id_sexo'] ?>
                            </td>
                            <td>
                                <?php echo $regsex['nombre'] ?>
                            </td>
                            <td>
                                <a
                                    href="<?php echo BASE_URL ?>modules\sistema\gestion de usuario\sexo\modificar.php?idsexo=<?php echo $regsex['id_sexo'] ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a
                                    href="<?php echo BASE_URL ?>modules\sistema\gestion de usuario\sexo\borrar.php?idsexo=<?php echo $regsex['id_sexo'] ?>">
                                    <button class="darDeBajaButton">
                                        <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>