<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'config/database/functions/expediente.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
$id_perfil = $_GET['id_perfil'];
$conditional = [
    'id_perfil' => $id_perfil
];
$records = selectall('perfil', $conditional);
foreach ($records as $reg) :

?>
    <div class="breadcrumbs">
        <a href="<?php echo BASE_URL; ?>">INICIO</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">Usuario</a>
        <span>/</span>
        <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php">Listado de
            perfiles</a>
        <span>/</span>
        <span>Alta de nuevo perfil </span>
    </div>
    <div class="dashboard">
        <h1> Perfil</h1>
        <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php" class="volver-atras-button">Volver
            Atr&aacute;s</a>
        <section class="inicio">
            <div class="contenido">
                <div class="formulario-container">
                    <h2>Modificacion de perfil</h2>
                    <form action="procesarModificacion.php" method="POST">
                        <div>
                            <legend>
                                Nombre:
                                <input class="formulario-input" type="text" name="nombre" value="<?php echo $reg['descripcion'] ?>" autocomplete="off">
                                <input type="hidden" name="id_perfil" value="<?php echo $reg['id_perfil'] ?>">
                                <input class="formulario-submit" type="submit" value="Guardar">
                            </legend>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
<?php
endforeach;
include(ROOT_PATH . 'includes\footter.php');
?>