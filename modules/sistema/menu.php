<?php
/* require_once('../../config/path.php'); */
require_once($_SERVER['DOCUMENT_ROOT'] . '/sistemajuridico5/config/path.php');
include(ROOT_PATH . 'includes\header.php');
include(ROOT_PATH . 'includes\nav.php');
?>
<div class="breadcrumbs">
    <a href="<?php echo BASE_URL; ?>">INICIO</a>
    <span>/</span>
    <span>Sistema</span>
</div>

<div class="dashboard">
    <h1>SISTEMA</h1>
    <a href="<?php echo BASE_URL; ?>index.php" class="volver-atras-button">Volver Atrás</a>
    <section class="inicio">
        <div class="contenido">
            <div class="menu">
                <ul>

                    <li>
                        <span class="submenu-toggle">EXPEDIENTE</span>
                        <ul class="submenu">
                            <li><a
                                    href="<?php echo BASE_URL ?>modules/sistema/expediente/estado_de_expediente/listado.php">Estado
                                    de Expediente</a></li>
                            <li><a
                                    href="<?php echo BASE_URL ?>modules/sistema/expediente/tipo_de_expediente/listado.php">Expediente
                                    tipo</a></li>
                            <li><a
                                    href="<?php echo BASE_URL ?>modules/sistema/expediente/tipo_de_sub_expediente/listado.php">Expediente
                                    subtipo</a></li>
                            <li><a href="<?php echo BASE_URL ?>modules\sistema\movimientos\listado.php">Movimientos del
                                    expediente</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="submenu-toggle">DOMICILIO</span>
                        <ul class="submenu">
                            <li><a href="<?php echo BASE_URL ?>modules/sistema/domicilio/pais/listado.php">Pais</a></li>
                            <li><a
                                    href="<?php echo BASE_URL ?>modules/sistema/domicilio/provincia/listado.php">Provincia</a>
                            </li>
                            <li><a
                                    href="<?php echo BASE_URL ?>modules/sistema/domicilio/localidad/listado.php">Localidad</a>
                            </li>
                            <li><a href="<?php echo BASE_URL ?>modules\sistema\domicilio\barrio\listado.php">Barrio</a>
                            </li>
                            <li><a
                                    href="<?php echo BASE_URL ?>modules/sistema/domicilio/atributo_de_domicilio/listado.php">Atributos
                                    de domicilio</a></li>
                            <li><a href="<?php echo BASE_URL ?>modules/sistema/domicilio/tipo_de_domicilio/listado.php">Tipo
                                    domicilio</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="submenu-toggle">USUARIOS</span>
                        <ul class="submenu">
                            <li><a
                                    href="<?php echo BASE_URL ?>modules\sistema\gestion de usuario\perfil\nuevo_perfil\listado.php">Perfil
                                </a>
                            </li>
                            <li><a
                                    href="<?php echo BASE_URL ?>modules\sistema\gestion de usuario\modulo\listado.php">Modulos</a>
                            </li>
                            <li><a
                                    href="<?php echo BASE_URL ?>modules\sistema\gestion de usuario\usuario\listado.php">Usuarios</a>
                            </li>
                            <li><a
                                    href="<?php echo BASE_URL; ?>modules\sistema\gestion de usuario\sexo\listado.php">Sexo</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="menu-item"
                            href="<?php echo BASE_URL ?>modules\sistema\contacto\listado.php">CONTACTO</a>
                    </li>
                    <li>
                        <a class="menu-item"
                            href="<?php echo BASE_URL ?>modules\sistema\documento\listado.php">DOCUMENTO</a>
                    </li>
                </ul>
            </div>
    </section>
</div>

<?php
include(ROOT_PATH . 'includes\footter.php');
?>
</div>
</section>
</div>
<?php
include(ROOT_PATH . 'includes\footter.php');
?>