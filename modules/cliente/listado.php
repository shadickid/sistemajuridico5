<?php
/* require_once('../../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
include(ROOT_PATH . 'config\database\functions\cliente.php');
$datosclientesFisicos = datosClientesFisicos();
$datosClientesJuridico = datosClientesJuridicos();
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Cliente</span>
</div>
<div class="dashboard">
    <h1>Listado de clientes</h1>
    <a href="<?php echo BASE_URL; ?>modules\dashboard\dashboard.php" class="volver-atras-button">Volver Atrás</a>

    <section class="inicio">
        <div class="contenido">
            <div class="btn-filtro-container">
                <a href="formularioCliente.php" class="a-alta">Nuevo Cliente</a>
                <button type="button" id="btnMostrarTodos" class="btn-filtro">Ver Todos</button>
                <button type="button" id="btnFisicos" class="btn-filtro">Ver Persona F&iacute;sica</button>
                <button type="button" id="btnJuridicos" class="btn-filtro">Ver Persona Jur&iacute;dica</button>
                <div>
                    <a href="formularioClienteF.php" class="a-alta">Nuevo cliente fisico</a>
                    <a href="formularioClienteJ.php" class="a-alta">Nuevo cliente Juridico</a>
                </div>
            </div>

            <table class="tablamodal">
                <thead>
                    <tr>
                        <th>Nombres y Apellidos/Raz&oacute;n Social</th>
                        <th>Tipo de Persona</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datosclientesFisicos as $regclientefisico): ?>
                        <tr class="clienteFisico">
                            <td>
                                <?php echo $regclientefisico['persona_nombre'] . ' ' . $regclientefisico['persona_apellido'] ?>
                            </td>
                            <td>F&iacute;sica</td>
                            <td> <a
                                    href="<?php echo BASE_URL ?>modules\abogado\modificar.php?idPersonaFisica=<?php echo $regclientefisico['id_persona_fisica'] ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL ?>modules\abogado\modal_borrar.php?idPersonaFisica=<?php echo $regclientefisico['id_persona_fisica'] ?>"
                                    <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php foreach ($datosClientesJuridico as $regClienteJuridico): ?>
                        <tr class="clienteJuridico">
                            <td>
                                <?php echo $regClienteJuridico['razon_social'] ?>
                            </td>
                            <td>Jur&iacute;dica</td>
                            <td> <a
                                    href="<?php echo BASE_URL ?>modules\abogado\modificar.php?idPersonaJuridica=<?php echo $regClienteJuridico['id_persona_juridica'] ?>">
                                    <button class="editarButton">
                                        <i class="fi fi-rr-edit"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL ?>modules\abogado\modal_borrar.php?idPersonaJuridica=<?php echo $regClienteJuridico['id_persona_juridica'] ?>"
                                    <button class="darDeBajaButton">
                                    <i class="fi-rr-eraser"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>


<?php
include(ROOT_PATH . 'includes\footter.php');
?>