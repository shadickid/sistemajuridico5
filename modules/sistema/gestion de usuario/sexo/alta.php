<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\menu.php">SISTEMA</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\menu.php">Usuario</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\sexo\listado.php">Listado de sexo</a>
    <span>/</span>
    <span>Alta de sexo</span>
</div>
<div class="dashboard">
    <h1> Sexo</h1>
    <a href="listado.php" class="volver-atras-button">Volver Atr&aacute;s</a>

    <section class="inicio">
        <div class="contenido">
            <div class="formulario-container">
                <h2>Alta de nuevo tipo de sexo</h2>
                <form id="form-sex" action="procesarAlta.php" method="POST">
                    <div>
                        <legend> Nombre:
                            <input class="formulario-input" type="text" name="nombre" id="nombre" autocomplete="off">
                            <button onclick="validar()" id="formulario-submit" class="formulario-submit" type="button"
                                value="Guardar">Guardar</button>
                        </legend>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>