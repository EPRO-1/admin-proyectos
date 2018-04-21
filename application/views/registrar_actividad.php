<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrar :: Actividad</title>
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
            <a href="<?= BASE_URL() ?>proyectos">Proyectos</a>
            <a href="<?= BASE_URL() ?>equipo">Equipo</a>
            <a href="<?= BASE_URL() ?>actividades">Actividades</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Registrar actividad
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
        </header>
        <section class="actividades">
            <div class="noActs">
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
            </div>
        </section>
    </main>
    <footer>Actividades</footer>

    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>