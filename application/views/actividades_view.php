<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actividades</title>
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
            </div>
            <hr>
        </div>
        <div class="options">
            <a href="<?= BASE_URL() ?>proyectos">Proyectos</a>
            <a href="<?= BASE_URL() ?>equipo">Equipo</a>
            <a href="<?= BASE_URL() ?>actividades">Actividades</a>
            <a href="<?= BASE_URL() ?>reports">Reportes</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Actividades
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
            <div class="filter">
                <span>Viendo:</span>
                <?= form_open('actividades/filtradas') ?>
                    <select name="filterAct" id="filterAct" onchange="this.form.submit()">
                        <?php if (!isset($currentFilter)): ?>
                            <option value="0">Todas</option>
                            <option value="3">&Uacute;ltimas 3</option>
                            <option value="5">&Uacute;ltimas 5</option>
                            <option value="7">&Uacute;ltimas 7</option>
                            <option value="10">&Uacute;ltimas 10</option>
                        <?php endif ?>
    
                        <?php if ($currentFilter == 3): ?>
                            <option value="0">Todas</option>
                            <option value="3" selected>&Uacute;ltimas 3</option>
                            <option value="5">&Uacute;ltimas 5</option>
                            <option value="7">&Uacute;ltimas 7</option>
                            <option value="10">&Uacute;ltimas 10</option>
                        <?php elseif ($currentFilter == 5): ?>
                            <option value="0">Todas</option>
                            <option value="3">&Uacute;ltimas 3</option>
                            <option value="5" selected>&Uacute;ltimas 5</option>
                            <option value="7">&Uacute;ltimas 7</option>
                            <option value="10">&Uacute;ltimas 10</option>
                        <?php elseif ($currentFilter == 7): ?>
                            <option value="0">Todas</option>
                            <option value="3">&Uacute;ltimas 3</option>
                            <option value="5">&Uacute;ltimas 5</option>
                            <option value="7" selected>&Uacute;ltimas 7</option>
                            <option value="10">&Uacute;ltimas 10</option>
                        <?php elseif ($currentFilter == 10): ?>
                            <option value="0">Todas</option>
                            <option value="3">&Uacute;ltimas 3</option>
                            <option value="5">&Uacute;ltimas 5</option>
                            <option value="7">&Uacute;ltimas 7</option>
                            <option value="10" selected>&Uacute;ltimas 10</option>
                        <?php endif ?>
                    </select>
                </form>
            </div>
        </header>
        <section class="actividades">
            <?php if (isset($actividades)): ?>
                <?php foreach ($actividades as $actividad): ?>
                    <div class="act">
                        <div class="info">
                            <div class="nombre field">
                                <div class="icon"><i class="fas fa-sticky-note"></i></div>
                                <div class="label">Nombre:</div>
                                <div class="valor"><?= $actividad['nombre'] ?></div>
                            </div>
                            <div class="autor field">
                                <div class="icon"><i class="fa fa-user-circle"></i></div>
                                <div class="label">Autor:</div>
                                <div class="valor" title="<?= $actividad['nombresAutor'].' '.$actividad['apeAutor'] ?>"><?= $actividad['autor'] ?></div>
                            </div>
                            <div class="proyecto field">
                                <div class="icon"><i class="fas fa-file-archive"></i></div>
                                <div class="label">Proyecto:</div>
                                <div class="valor"><?= $actividad['proyecto'] ?></div>
                            </div>
                            <div class="costo field">
                                <div class="icon"><i class="fas fa-money-bill-alt"></i></div>
                                <div class="label">Costo:</div>
                                <div class="valor"><?= '$ ' . $actividad['costo'] ?></div>
                            </div>
                            <div class="detalle field">
                                <div class="icon"><i class="fas fa-info-circle"></i></div>
                                <div class="label">Detalle:</div>
                                <div class="valor"><?= $actividad['detalle'] ?></div>
                            </div>
                            <div class="inicio field">
                                <div class="icon"><i class="fas fa-calendar-check"></i></div>
                                <div class="label">Fecha inicio:</div>
                                <div class="valor"><?= $actividad['fecha_ejecucion'] ?></div>
                            </div>
                            <div class="final field">
                                <div class="icon"><i class="fas fa-calendar-times"></i></div>
                                <div class="label">Fecha final:</div>
                                <div class="valor"><?= $actividad['fecha_finalizacion'] ?></div>
                            </div>
                        </div>
                        <div class="img">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                <?php endforeach ?>

                <?php if ($this->session->userdata('usuario')[1] != 1 && $this->session->userdata('usuario')[1] != 3): ?>
                    <div class="addAct">
                        <a href="<?= BASE_URL() . 'actividades/registerActivitieForm' ?>">
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                <?php endif ?>

            <?php else: ?>
                <div class="noActs">
                    <span class="title">No hay actividades - Registrar primera</span>
                    <?php if ($this->session->userdata('usuario')[1] != 1 && $this->session->userdata('usuario')[1] != 3): ?>
                        <?= form_open('actividades/registerAct') ?>
                            <input type="hidden" name="userAct" value="<?= $userdata['id_user'] ?>">
                            <div class="field">
                                <label for="nombreAct">Nombre:</label>
                                <input type="text" name="nombreAct" id="nombreAct" placeholder="Nombre de la actividad" required>
                            </div>
                            <div class="field">
                                <label for="costoAct">Costo ($00,00):</label>
                                <input type="number" name="costoAct" id="costoAct" placeholder="10.00" step="0.010" min="0" required>
                            </div>
                            <div class="field">
                                <label for="proyAct">Proyecto:</label>
                                <select name="proyAct" id="proyAct" required>
                                    <option value="NULL" selected disabled>-- Seleccione un proyecto --</option>
                                    <?php foreach ($proyectos as $proyecto): ?>
                                        <option value="<?= $proyecto['id_proyecto'] ?>"><?= $proyecto['nombre'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="field">
                                <label for="detalleAct">Detalle:</label>
                                <textarea name="detalleAct" id="detalleAct" placeholder="Detalles de la actividad" required></textarea>
                            </div>
                            <div class="field">
                                <label for="inicioAct">Fecha ejecuci&oacute;n:</label>
                                <input type="date" name="inicioAct" id="inicioAct" required>
                            </div>
                            <div class="field">
                                <label for="finAct">Fecha finalizaci&oacute;n</label>
                                <input type="date" name="finAct" id="finAct" required>
                            </div>
                            <div class="field submit">
                                <input type="submit" name="registerAct" id="registerAct" value="Registrar">
                            </div>
                        </form>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </section>
    </main>
    <footer>Actividades</footer>

    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>