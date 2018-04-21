<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= BASE_URL() ?>css/main.css" />
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> -->
    <script defer src="<?= BASE_URL() ?>/js/fontawesome-all.js"></script>
</head>
<body>
    <aside class="back"></aside>
    <aside >
        <div class="userInfo">
            <div class="userImg">
                <i class="fas fa-user-circle fa-4x"></i>
            </div>
            <div class="userInfoDet">
                <span><?= $this->session->userdata('usuario')[0] ?></span>
                <span><?= $nivel_usuario ?></span>
                <span>Cuenta</span>
            </div>
            <hr>
        </div>
        <div class="options">
            <a href="proyectos">Proyectos</a>
            <a href="equipo">Equipo</a>
            <a href="<?= BASE_URL() ?>actividades">Actividades</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Proyectos
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
        </header>
        <section class="proyectos">

            <?php if($check_projects): ?>
                <?php foreach ($proyectos as $proyecto): ?>
                    <article class="project">
                        <div class="projectImg">
                            <span><?= $proyecto['nombre'] ?></span>
                        </div>
                        <div class="projectInfo">
                            <div class="infoAtt">
                                <span>Encargado:</span>
                                <span>&Aacute;rea:</span>
                                <span>Tipo:</span>
                                <?php if ($proyecto['extension_de'] != NULL ): ?>
                                    <span>Extension de:</span>
                                <?php endif ?>
                                <span>Presupuesto:</span>
                                <span>Descripci&oacute;n:</span>
                                <span>Fecha inicio:</span>
                                <span>Fecha final:</span>
                            </div>
                            <div class="infoValue">
                                <span><?= $proyecto['nombres'] . " " . $proyecto['apellidos'] ?></span>
                                <span><?= $proyecto['nombreDpto'] ?></span>
                                <span><?= $proyecto['nombreTipo'] ?></span>
                                <?php if ($proyecto['extension_de'] != NULL ): ?>
                                    <span><?php echo $proyectos[$proyecto['extension_de']-1]['nombre'] ?></span>
                                <?php endif ?>
                                <?php if($proyecto['presupuesto_inicial'] == NULL): ?>
                                    <span>No asignado</span>
                                <?php else: ?>
                                    <span><?= $proyecto['presupuesto_inicial'] ?></span>
                                <?php endif ?>
                                <span><?= $proyecto['descripcion'] ?></span>
                                <span><?= $proyecto['fecha_inicio_1'] ?></span>
                                <span><?= $proyecto['fecha_final_1'] ?></span>
                            </div>
                        </div>
                        <div class="projectDetails">
                            <a href="proyectos/projectDetails/<?= $proyecto['nombre'] . '/' . $proyecto['id_proyecto'] ?>" class="projectDetails_btn">Detalles</a>
                        </div>
                    </article>
                <?php endforeach ?>

                <article class="noProjects">
                    <a href="<?= BASE_URL() ?>proyectos/registrar">
                        <div class="addFirstProject">
                            <i class="fas fa-plus-circle fa-7x"></i>
                        </div>
                    </a>
                </article>    
            <?php else: ?>            
                <article class="noProjects">
                        <span>No hay proyectos</span>
                        <a href="<?= BASE_URL() ?>proyectos/registrar">
                            <div class="addFirstProject">
                                <i class="fas fa-plus-circle fa-7x"></i>
                            </div>
                        </a>
                </article>
            <?php endif ?>


        </section>
    </main>

</body>
</html>