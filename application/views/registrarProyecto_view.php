<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrar proyecto</title>
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
                Registrar proyecto
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
        </header>
        <section class="registrarProyecto">
            <?= form_open('proyectos/registrar_proyecto') ?>
                <span>Datos del proyecto</span>
                <hr>
                <div class="field">
                    <label for="nombreProyecto">Nombre del proyecto:</label>
                    <input type="text" name="nombre_proyecto" id="nombreProyecto" placeholder="Nombre del proyecto" required>
                </div>
                <div class="field">
                    <label for="encargado">Responsable:</label>
                    <select name="encargado" id="areaEmpresa" required>
                        <option class="defaultOption" value="NULL" selected disabled>-- Seleccione un responsable --</option>
                        <?php foreach ($usuarios as $usuario): ?>
                            <option value="<?= $usuario['id_user'] ?>"><?= $usuario['nombres'] . " " . $usuario['apellidos'] ?></option>
                        <?php endforeach ?>
                    </select>                   
                </div>
                <div class="field">
                    <label for="departamento">Departamento:</label>
                    <select name="departamento" id="departamento" required>
                        <option class="defaultOption" value="NULL" selected disabled>-- Seleccione un departamento --</option>
                        <?php foreach ($departamentos as $departamento): ?>
                            <option value="<?= $departamento['id_depto'] ?>"><?= $departamento['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field">
                    <label for="tipoProyecto">Tipo de proyecto:</label>
                    <select name="tipo_proyecto" id="tipoProyecto" required>
                        <option class="defaultOption" value="NULL" selected disabled>-- Seleccione el tipo de proyecto --</option>
                        <?php foreach ($tipos_proyecto as $tipo_proyecto): ?>
                            <option value="<?= $tipo_proyecto['id_tipo'] ?>"><?= $tipo_proyecto['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field_hidden" id="extProyectoField">
                    <label for="extProyecto">Extension de:</label>
                    <select name="ext_proyecto" id="extProyectoSelect">
                        <option class="defaultOption" value="NULL" selected disabled>-- Seleccione un proyecto --</option>
                        <?php foreach ($proyectos as $proyecto): ?>
                            <option value="<?= $proyecto['id_proyecto'] ?>"><?= $proyecto['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field">
                    <label for="descripcion">Descripci&oacute;n:</label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripci&oacute;n del proyecto" required></textarea>
                </div>
                <!-- <div class="field">
                    <label for="extProyecto">Extension de:</label>
                    <select name="ext_proyecto" id="extProyecto">
                        <option value="1">Proyecto1</option>
                        <option value="2">Proyecto2</option>
                        <option value="3">Proyecto3</option>
                        <option value="4">Proyecto4</option>
                    </select>
                </div> -->
                <div class="field">
                    <label for="fechaInicio">Fecha inicio:</label>
                    <input name="fechaInicio" id="fechaInicio" type="date" required>
                    <!-- <input type="number" name="plazo" min="1" max="10000" class="plazo" placeholder="34">
                    <select name="unidad_tiempo" id="unidadTiempo" class="plazo">
                        <option value="dias">D&iacute;as</option>
                        <option value="meses">Meses</option>
                        <option value="years">A&ntilde;os</option>
                    </select> -->
                </div>
                <div class="field">
                    <label for="fechaFinal">Fecha final:</label>
                    <input name="fechaFinal" id="fechaFinal" type="date" required>
                </div>
                <div class="registrar">
                    <input type="submit" value="Registrar">
                </div>
            </form>
        </section>
    </main>
    <footer class="regProy">Registrar</footer>

    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>