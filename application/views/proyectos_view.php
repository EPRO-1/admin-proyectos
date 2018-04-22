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
            <?php if ($check_projects): ?>
                <div class="filter">
                    <span>Viendo:</span>
                    <?= form_open('proyectos/filtrados') ?>
                        <select name="filterProy" id="filterProy" onchange="this.form.submit()">
                            <?php if (!isset($currentFilter)): ?>
                                <option value="0">Todos</option>
                                <option value="3">&Uacute;ltimos 3</option>
                                <option value="5">&Uacute;ltimos 5</option>
                                <option value="7">&Uacute;ltimos 7</option>
                                <option value="10">&Uacute;ltimos 10</option>
                            <?php endif ?>

                            <?php if ($currentFilter == 3): ?>
                                <option value="0">Todos</option>
                                <option value="3" selected>&Uacute;ltimos 3</option>
                                <option value="5">&Uacute;ltimos 5</option>
                                <option value="7">&Uacute;ltimos 7</option>
                                <option value="10">&Uacute;ltimos 10</option>
                            <?php elseif ($currentFilter == 5): ?>
                                <option value="0">Todos</option>
                                <option value="3">&Uacute;ltimos 3</option>
                                <option value="5" selected>&Uacute;ltimos 5</option>
                                <option value="7">&Uacute;ltimos 7</option>
                                <option value="10">&Uacute;ltimos 10</option>
                            <?php elseif ($currentFilter == 7): ?>
                                <option value="0">Todos</option>
                                <option value="3">&Uacute;ltimos 3</option>
                                <option value="5">&Uacute;ltimos 5</option>
                                <option value="7" selected>&Uacute;ltimos 7</option>
                                <option value="10">&Uacute;ltimos 10</option>
                            <?php elseif ($currentFilter == 10): ?>
                                <option value="0">Todos</option>
                                <option value="3">&Uacute;ltimos 3</option>
                                <option value="5">&Uacute;ltimos 5</option>
                                <option value="7">&Uacute;ltimos 7</option>
                                <option value="10" selected>&Uacute;ltimos 10</option>
                            <?php endif ?>
                        </select>
                    </form>
                </div>
            <?php endif ?>
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
                                    <?php foreach ($allProjects as $proy): ?>
                                        <?php if ($proy['id_proyecto'] == $proyecto['extension_de']): ?>
                                            <span><?= $proy['nombre'] ?></span>
                                        <?php endif ?>
                                    <?php endforeach ?>                                    
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
                            <a href="<?= BASE_URL() ?>proyectos/projectDetails/<?= $proyecto['nombre'] . '/' . $proyecto['id_proyecto'] ?>" class="projectDetails_btn">Detalles</a>
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