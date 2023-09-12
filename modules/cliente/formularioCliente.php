<?php

?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\cliente\listado.php">Cliente</a>
    <span>/</span>
    <span>Registro de Cliente</span>
</div>
<div class="dashboard">
    <h1>Listado de clientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\cliente\listado.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <fieldset>
                <legend>Datos del cliente</legend>
                <form class="formulario-form" action="enviarCliente.php" method="post">

            </fieldset>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>