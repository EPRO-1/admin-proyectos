<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Equipo</title>
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
                <span>{{ username }}</span>
                <span>{{ Rol desempe&ntilde;ado }}</span>
                <span>Cuenta</span>
            </div>
        </div>
        <hr>
        <div class="options">
            <a href="<?= BASE_URL() ?>proyectos">Proyectos</a>
            <a href="<?= BASE_URL() ?>equipo/listado">Equipo</a>
            <a href="#">Presupuesto</a>
            <a href="#">Contacto</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Equipo de trabajo
                <a class="logout" href="<?= BASE_URL() ?>login/logout">X</a>
            </bar>
            <div class="barHidden"></div>
        </header>
        <section class="equipo">
            <!-- No hay equipo registrado -->

            <!-- <article class="noTeam">
                    <span id="headerEquipo">No hay equipo registrado</span>
                    <div id="addUserCard" class="addFirstMember">
                        <i id="newUserIcon" class="fas fa-user-plus fa-7x"></i>
                        <div id="addingMember" class="addMember hidden">
                            <form id="addUserForm" class="addUser_form" action="equipo.php" method="POST">
                                <div class="options">
                                    <i class="fas fa-user-circle fa-4x"></i>
                                    <input  type="submit" id="send">
                                    <label for="send"><i class="fas fa-check-circle fa-3x"></i></label>
                                    <i id="cancelAddUser" onclick="location.reload()" class="fas fa-times-circle fa-2x"></i>
                                </div>
                                <div class="labels">
                                    <label for="memberName">Nombre: </label>
                                    <label for="memberSkill">Habilidad:</label>
                                    <label for="memberEmail">Email:</label>
                                    <label for="memberPhone">Tel&eacute;fono:</label>
                                    <label for="memberCode">C&oacute;digo:</label>
                                </div>
                                <div class="inputs">
                                    <div class="nombre">
                                        <input type="text" name="memberName" placeholder="Nombres" required/>
                                        <input type="text" name="memberLastName" placeholder="Apellidos" required/>
                                    </div>
                                    <input type="text" name="memberSkill" placeholder="Habilidad" required/>
                                    <input type="email" name="memberEmail" placeholder="alguien@ejemplo.com" required/>
                                    <input type="text" name="memberPhone" placeholder="0000-0000" required/>
                                    <input type="text" name="memberCode" placeholder="{{ codigo }} (autogenerado)" disabled="">
                                </div>
                            </form>
                        </div>
                    </div>
            </article> -->


            <!-- Hay equipo registrado -->

            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="GET">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember" class="deleteMemberSubmit"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="POST">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="POST">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="POST">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="POST">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="POST">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="POST">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
            <article class="teamMember">
                <div class="options">
                    <div class="imgCode">
                        <i class="fas fa-user-circle fa-4x"></i>
                        <span>{{COD000}}</span>
                    </div>
                    <div class="details_btn">
                        <a href="#">Detalles</a>
                    </div>
                    <div class="eraseEdit_btns">
                        <form action="" methos="POST">
                            <input type="hidden" value="[id_member]">
                            <i class="fas fa-edit fa-lg"></i>
                            <input type="submit" name="delete_member" id="deleteMember">
                            <label for="deleteMember"><i class="fas fa-user-times fa-lg"></i></label>
                        </form>
                    </div>
                </div>
                <div class="info">
                    <div class="atts">
                        <span>Nombre:</span>
                        <span>Habilidad:</span>
                        <span>Proyectos:</span>
                        <span>Ingreso:</span>
                    </div>
                    <div class="values">
                        <span>{{Nombres Apellidos}}</span>
                        <span>{{Habilidad}}</span>
                        <span>{{Proyectos}}</span>
                        <span>{{00/00/0000}}</span>
                    </div>
                    <div class="asignProject_btn">
                        <a href="#">Asignar a proyecto</a>
                    </div>
                </div>
            </article>
        </section>
    </main>


    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>