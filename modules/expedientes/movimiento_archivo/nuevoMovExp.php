<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config/database/functions/bd_functions.php');
include(ROOT_PATH . 'config\database\functions\movimiento.php');
include(ROOT_PATH . 'config\database\functions\empleado.php');
$id_expediente = $_GET['id_expediente'];
$conditional = [
    'id_expediente' => $id_expediente
];
$condicional = [
    'estado' => 1
];
$movimiento = selectall('movimiento_tipo_proceso', $condicional);
$expediente = selectall('expediente', $conditional);

foreach ($expediente as $regExp) {
    $caratula = $regExp['expediente_nombre'];
    $idExpediente = $regExp['id_expediente'];
}
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\listado.php">Expediente</a>
    <span>/</span>
    <span>Movimientos
        <?php echo $caratula ?>
    </span>
</div>
<div class="dashboard">
    <h1>Movimiento de
        <?php echo $caratula ?>
    </h1>
    <a href="<?php echo BASE_URL; ?>modules\expedientes\movimiento_archivo\nuevo_mov.php?id_expediente=<?php echo $id_expediente ?>"
        class="volver-atras-button">Volver Atr&aacute;s</a>

    <section class="inicio">
        <div class="contenido">
            <div id="tabs">
                <ul>
                    <li><a href="#movimientoTab">Generar Movimiento</a></li>
                    <li><a href="#escritoTab">Generar Escrito</a></li>
                </ul>

                <div id="movimientoTab">
                    <h2>Nuevo movimiento de
                        <?php echo $caratula ?>
                    </h2>
                    <form action="procesarMovExp.php" method="post" id="formularioMovExp" enctype="multipart/form-data">
                        <!-- <div>
                    <label for="fechamov" class="formulario-label">Fecha y Hora:</label>
                    <input type="date" name="fechamov" id="fechamov" class="formulario-input">
                </div> -->
                        <div>
                            <label for="descripcion" class="formulario-label">Descripcion:</label>
                            <textarea class="formulario-input" name="descripcion" id="descripcion"></textarea>
                        </div>
                        <div>
                            <label for="movimiento" class="formulario-label">Tipo de movimiento:</label>
                            <select name="movimiento" id="movimiento" class="formulario-select">
                                <option value="0">--Seleccione--</option>
                                <?php foreach ($movimiento as $regmov): ?>
                                    <option value="<?php echo $regmov['id_tipo_proceso'] ?>">
                                        <?php echo $regmov['nombre'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <input type="hidden" value="<?php echo $_SESSION['id_usuario'] ?>" name="usuario">
                        <div>
                            <label for="archivo" class="formulario-label">Archivo:</label>
                            <div class="file-input-container">
                                <input type="file" name="archivo" id="myfile" class="formulario-file"
                                    accept=".pdf, .doc, .docx">
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $idExpediente ?>" name="idExpediente">

                        <div>
                            <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar
                            </button>
                        </div>
                    </form>

                </div>
                <div id="escritoTab">
                    <form method="post" id="escrito" action="procesarEscrito.php">
                        <textarea id="mytextarea" name="contenido">Por favor escriba algo aqui!</textarea>
                        <div>
                            <button type="submit" name="submit" id="guardar" class="formulario-submit"> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>