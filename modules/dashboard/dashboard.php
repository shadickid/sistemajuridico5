<?php
require_once('../../config/path.php');

include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');

?>
<div class="contenedor">
    <section class="inicio">
        <img src="<?php echo BASE_URL; ?>img/shaking-hands-3091906_1280.jpg" width="434px" height="360px" />
        <ul>
            <li>
                Objetivo 1
                <p class="esconder">
                    El sistema deberá registrar a las personas que no se hayan
                    registrado anteriormente.
                </p>
            </li>
            <li>
                Objetivo 2
                <p class="esconder">
                    El sistema deberá modificar a los expedientes que se hayan
                    registrados anteriormente.
                </p>
            </li>
            <li>
                Objetivo 3
                <p class="esconder">
                    El sistema deberá registrar expedientes que no se hayan registrado
                    anteriormente.
                </p>
            </li>
            <li>
                Objetivo 4
                <p class="esconder">
                    El sistema deberá mostrar una consulta de expedientes que se hayan
                    registrado anteriormente.
                </p>
            </li>
        </ul>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>