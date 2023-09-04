<?php
require_once('../../config/path.php');

include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');

?>
<div class="dashboard">
    <h1>Bienvenido al sistema</h1>

    <section class="inicio">
        <div class="contenido">
            <div> <img src="<?php echo BASE_URL; ?>assets/img/shaking-hands-3091906_1280.jpg" alt="Imagen de Bienvenida"
                    class="responsive-img" />
            </div>
            <div class="objetivos">
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
            </div>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>