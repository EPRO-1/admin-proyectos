<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detalles :: Equipo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= BASE_URL() ?>css/main.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
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
            <a href="#">Presupuesto</a>
            <a href="#">Contacto</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Detalles de <?= $memberData['username'] ?>
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
            <div class="barHidden"></div>
        </header>

        <section class="detallesMember">
            <div class="memberData">
                <span class="title">Informaci&oacute;n:</span>
                <?= form_open('equipo/editMemberInfo/' . $memberData['username']) ?>
                    <div class="nombres">
                        <label for="nombres">Nombres:</label>
                        <input id="nombres" name="nombres" type="text" value="<?= $memberData['nombres'] ?>" disabled>
                    </div>
                    <div class="apellidos">
                        <label for="apellidos">Apellidos:</label>
                        <input id="apellidos" name="apellidos" type="text" value="<?= $memberData['apellidos'] ?>" disabled>
                    </div>
                    <div class="username">
                        <label for="username">Usuario:</label>
                        <input id="username" name="username" type="text" value="<?= $memberData['username'] ?>" disabled>
                    </div>
                    <div class="email">
                        <label for="email">Email:</label>
                        <input id="email" name="email" type="text" value="<?= $memberData['mail'] ?>" disabled>
                    </div>
                    <div class="nivel">
                        <label for="nivelUsuario">Nivel:</label>
                        <input id="nivelUsuario" name="nivelUsuario" type="text" value="<?= $memberData['nivel'] ?>" disabled>
                        <select class="hidden" name="selectNivelUsuario" id="selectNivelUsuario">
                            <?php foreach ($niveles AS $nivel): ?>
                                <?php if ($nivel['id'] == $memberData['nivel_usuario']): ?>
                                    <option value="<?= $nivel['id'] ?>" selected><?= $nivel['nivel'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $nivel['id'] ?>"><?= $nivel['nivel'] ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="status">
                        <label for="status">Estado:</label>
                        <input id="status" name="status" type="text" value="<?= $status ?>" disabled>
                        <select class="hidden" name="selectStatusUsuario" id="selectStatusUsuario">
                            <?php if ($memberData['activo'] == 0): ?>
                                <option value="0" selected>Inactivo</option>
                                <option value="1">Activo</option>
                            <?php elseif ($memberData['activo'] == 1): ?>
                                <option value="0">Inactivo</option>
                                <option value="1" selected>Activo</option>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="options">
                        <input type="hidden" name="idMember" value="<?= $memberData['id_user'] ?>">
                        <input id="sendChanges" class="hidden" type="submit" name="sendChanges" value="Guardar">
                        <span id="cancelChanges" class="cancelChanges hidden">Cancelar</span>
                        <span class="change" id="editInfoBtn">Editar</span>
                    </div>
                </form>
                <?php if (isset($errores)): ?>
                    <div class="editMemberErrors">
                        <?= $errores ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="memberProjects">
                <span class="title">Asignado a:</span>
                <div class="projects">
                    <?php if ($proyectosAsignados != false): ?>
                        <div class="columnNames">
                            <span class="proyecto">Proyecto</span>
                            <span class="encargado">Encargado</span>
                            <span class="fechaAsignado">Fecha asignaci&oacute;n</span>
                            <span class="option">Descartar</span>
                        </div>
                        <?php foreach ($proyectosAsignados as $proyecto): ?>
                            <div class="asignado">
                                <span><?= $proyecto['nombre'] ?></span>
                                <span><?= $proyecto['encargado'] ?></span>
                                <span class="fechaAsignado"><?= $proyecto['fecha_asignacion'] ?></span>
                                <span class="option">
                                    <?= form_open('equipo/deleteAsignation/' . $memberData['username']) ?>
                                        <input type="hidden" name="idAsignacion" value="<?= $proyecto['id_asignacion'] ?>">
                                        <label for="descartar" class="deleteAsignationLabel"><i class="fa fa-times-circle"></i></label>
                                        <input type="submit" id="descartar" name="descartar">
                                    </form>
                                </span>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="noAsignado">
                            No se ha asignado a ningun proyecto
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </section>

        <footer>Detalles</footer>
    </main>

    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>