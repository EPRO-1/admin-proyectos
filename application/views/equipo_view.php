<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Equipo</title>
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
                Equipo de trabajo
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
            <div class="barHidden"></div>
        </header>
        <section class="equipo">

            <?php if ($checkEquipo): ?>
                <!-- Si hay equipo -->

                <?php foreach ($equipo as $member): ?>
                    <article class="teamMember">
                        <div class="options">
                            <div class="imgCode">
                                <i class="fas fa-user-circle fa-4x"></i>
                                <span><?= $member['username'] ?></span>
                            </div>
                            <!-- <div class="details_btn">
                                <a href="#">Detalles</a>
                            </div> -->
                            <!-- <span class="editIcon"><i class="fas fa-edit fa-2x"></i></span> -->
                            <div class="eraseEdit_btns">
                                <?= form_open('equipo/remove_member') ?>
                                    <input type="hidden" name="idMember" value="<?= $member['id_user'] ?>">
                                    <input type="submit" name="delete_member" id="deleteMember<?= $member['id_user'] ?>">
                                    <label for="deleteMember<?= $member['id_user'] ?>" class="deleteMemberSubmit"><i class="fas fa-user-times fa-lg"></i></label>
                                </form>
                            </div>
                        </div>
                        <div class="info">
                            <div class="atts">
                                <span>Nombres:</span>
                                <span>Apellidos:</span>
                                <span>Email:</span>
                                <span>Nivel:</span>
                            </div>
                            <div class="values">
                                <span><?= $member['nombres'] ?></span>
                                <span><?= $member['apellidos'] ?></span>
                                <span><?= $member['mail'] ?></span>
                                <span><?= $member['nivel'] ?></span>
                            </div>
                            <?= form_open('equipo/asign_to_project', 'class="asignTeamProject_form" id="asignTeamProject_form"') ?>
                                <input type="hidden" name="idMember" value="<?= $member['id_user'] ?>">
                                <div class="asignProject_btn">
                                    <a href="#">Asignar a proyecto</a>
                                    <select name="selectProyectToAsign" id="selectProyectToAsign" class="selectProyectToAsign hidden">
                                        <option value="" disabled selected>----- Proyectos -----</option>
                                        <!-- Por cada fila en proyectos hacer... -->
                                        <?php foreach ($proyectos as $proyecto): ?>
                                            <!-- Por cada fila en asignar_equipo_proyecto hacer... -->
                                            <?php for ($i = 0; $i < count($idsAsignados); $i++): ?>
                                                <!-- Si el valor del id del usuario iterado Y el valor del proyecto iterado se encuentran en la misma fila, hacer... -->
                                                <?php if ($idsAsignados[$i]['id_user'] == $member['id_user'] && $idsAsignados[$i]['id_proyecto'] == $proyecto['id_proyecto']): ?>
                                                    <option 
                                                        value="" 
                                                        title="<?= $member['nombres'] . ' ya est&aacute; asignado a este proyecto'?>"
                                                        disabled>
                                                        <?= $proyecto['nombre'] ?>
                                                    </option>
                                                    <?php
                                                        // Agregar el valor del id del usuario y proyecto iterado a los arreglos correspondientes... 
                                                        array_push($proyectoNoListados, $idsAsignados[$i]['id_proyecto']);
                                                        array_push($UserYaAsignado, $idsAsignados[$i]['id_user']);
                                                    ?>
                                                <?php endif ?> <!-- Termina comprobacion de usuario y proyecto ya asignado -->
                                            <?php endfor ?> <!-- Termina for de la tabla asignar_equipo_proyecto -->
                                            <!-- Si el id del proyecto O del usuario iterados NO estan en los arreglos correspondientes, se listan los proyectos... -->
                                            <?php if (!in_array($proyecto['id_proyecto'], $proyectoNoListados) || !in_array($member['id_user'], $UserYaAsignado)): ?>
                                                <option 
                                                    value="<?= $proyecto['id_proyecto'] ?>" 
                                                    title="Encargado: <?= $proyecto['nombres'] . ' ' . $proyecto['apellidos'] . 
                                                        ' - Departamento: ' . $proyecto['nombreDpto'] ?>">
                                                    <?= $proyecto['nombre'] ?>
                                                </option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="memberDetails_btn">
                                    <a href="equipo/teamMemberDetails/<?= $member['username'] ?>" class="memberDetails_link">Detalles</a>
                                    <input type="submit" name="asignar" value="Asignar" class="asignarProyectoSubmit hidden" disabled="">
                                    <span class="cancelAsign hidden"><i class="fa fa-times-circle"></i></span>
                                </div>
                            </form>
                        </div>
                    </article>
                <?php endforeach ?>

                <article class="addTeam">
                    <div id="addUserCard" class="addFirstMember">
                        <i id="newUserIcon" class="fas fa-user-plus fa-7x"></i>
                        <div id="addingMember" class="addMember hidden">
                            <?= form_open('equipo/register_member', 'class="addUser_form" id="addUserForm"') ?>
                                <div class="options">
                                    <i class="fas fa-user-circle fa-4x"></i>
                                    <input  type="submit" id="send">
                                    <label for="send"><i class="fas fa-check-circle fa-3x"></i></label>
                                    <i id="cancelAddUser" onclick="location.reload()" class="fas fa-times-circle fa-2x"></i>
                                </div>
                                <div class="labels">
                                    <label for="memberName">Nombre: </label>
                                    <label for="memberSkill">Usuario:</label>
                                    <label for="memberEmail">Email:</label>
                                    <label for="memberPhone">Nivel:</label>
                                    <label for="memberPass">Contrase&ntilde;a:</label>
                                </div>
                                <div class="inputs">
                                    <div class="nombre">
                                        <input type="text" name="memberName" placeholder="Nombres" required/>
                                        <input type="text" name="memberLastName" placeholder="Apellidos" required/>
                                    </div>
                                    <input type="text" name="memberUser" placeholder="Nombre de usuario" required/>
                                    <input type="email" name="memberEmail" placeholder="alguien@ejemplo.com" required/>
                                    <select name="memberLevel" id="memberLevelSelect" required>
                                        <option value="null" disabled selected>-- Seleccione un nivel --</option>
                                        <?php foreach ($niveles_usuario as $niv_user): ?>
                                            <option value="<?= $niv_user['id'] ?>"><?= $niv_user['nivel'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="password" name="memberPass" placeholder="Contrase&ntilde;a">
                                </div>
                            </form>
                        </div>
                    </div>
                    <span id="headerEquipo" class="headerEquipo" style="display: none"></span>
                </article>
                <?php if (isset($erroresRegistro)): ?>
                    <div class="erroresRegistro">
                        <?= $erroresRegistro ?>
                    </div>
                <?php endif ?>

            <?php else: ?>
                <!-- No hay equipo -->

                <article class="noTeam">
                    <span id="headerEquipo"></span>
                    <div id="addUserCard" class="addFirstMember">
                        <i id="newUserIcon" class="fas fa-user-plus fa-7x"></i>
                        <div id="addingMember" class="addMember hidden">
                            <!-- <form id="addUserForm" class="addUser_form" action="equipo.php" method="POST"> -->
                            <?= form_open('equipo/register_member', 'class="addUser_form" id="addUserForm"') ?>
                                <div class="options">
                                    <i class="fas fa-user-circle fa-4x"></i>
                                    <input  type="submit" id="send">
                                    <label for="send"><i class="fas fa-check-circle fa-3x"></i></label>
                                    <i id="cancelAddUser" onclick="location.reload()" class="fas fa-times-circle fa-2x"></i>
                                </div>
                                <div class="labels">
                                    <label for="memberName">Nombre: </label>
                                    <label for="memberSkill">Usuario:</label>
                                    <label for="memberEmail">Email:</label>
                                    <label for="memberPhone">Nivel:</label>
                                    <label for="memberPass">Contrase&ntilde;a:</label>
                                </div>
                                <div class="inputs">
                                    <div class="nombre">
                                        <input type="text" name="memberName" placeholder="Nombres" required/>
                                        <input type="text" name="memberLastName" placeholder="Apellidos" required/>
                                    </div>
                                    <input type="text" name="memberUser" placeholder="Nombre de usuario" required/>
                                    <input type="email" name="memberEmail" placeholder="alguien@ejemplo.com" required/>
                                    <select name="memberLevel" id="memberLevelSelect" required>
                                        <option value="null" disabled selected>-- Seleccione un nivel de usuario --</option>
                                        <?php foreach ($niveles_usuario as $niv_user): ?>
                                            <option value="<?= $niv_user['id'] ?>"><?= $niv_user['nivel'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="password" name="memberPass" placeholder="Contrase&ntilde;a">
                                </div>
                            </form>
                        </div>
                    </div>
                </article>

            <?php endif ?>

        </section>
    </main>

    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>