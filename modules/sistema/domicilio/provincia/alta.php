<?php
/* require_once('../../../config/path.php'); */

require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions .php');

$pais = selectall('pais');
?>
<div class="dashboard">
    <h1> Nueva Provincia</h1>
    <section class="inicio">
        <div class="contenido">
            <h2>Alta de nueva provincia</h2>
            <form action="procesarAlta.php" method="POST">
                <div class="input-control">
                    <label for="id_pais">Selecione el pais </label>
                    <select name="id_pais">
                        <?php foreach ($pais as $reg): ?>
                            <option value="<?php echo $reg['id_pais'] ?>"><?php echo $reg['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                    Nombre:<input type="text" name="nombre" autocomplete="off">
                    <input type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>