<?php
/* require_once('../../../config/path.php'); */

require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');

$prov = selectall('provincia');
?>
<div>
    <h1> Nuevo Barrio</h1>
</div>
<div class="contenedor">
    <section class="inicio">
        <h2>Alta de nueva localidad</h2>
        <form action="procesarAlta.php" method="POST">
            <div class="input-control">
                <label for="id_provincia">Selecione la provincia </label>
                <select name="id_provincia">
                    <?php foreach ($prov as $reg) : ?>
                        <option value="<?php echo $reg['id_provincia'] ?>"><?php echo $reg['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
                Nombre:<input type="text" name="nombre" autocomplete="off">
                <input type="submit" value="Guardar">
            </div>
        </form>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>