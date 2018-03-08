<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Equipo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
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
            <a href="proyectos.php">Proyectos</a>
            <a href="equipo.php">Equipo</a>
            <a href="#">Presupuesto</a>
            <a href="#">Contacto</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Equipo de trabajo
            </bar>
        </header>
        <section class="equipo">
            <article class="noTeam">
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
            </article>
            <!-- <article class="project">
                <div class="projectImg">
                    <span>{{ Nombre del proyecto }}</span>
                </div>
                <div class="projectInfo">
                    <div class="infoAtt">
                        <span>Encargado:</span>
                        <span>&Aacute;rea:</span>
                        <span>Tipo:</span>
                        <span>Presupuesto:</span>
                        <span>Descripci&oacute;n:</span>
                        <span>Plazo:</span>
                    </div>
                    <div class="infoValue">
                        <span>{{ Nombres Apellidos }}</span>
                        <span>{{ &Aacute;rea de la empresa }}</span>
                        <span>{{ Tipo de proyecto }}</span>
                        <span>{{ $000.00 }}</span>
                        <span>{{ Descripci&oacute;n del proyecto }}</span>
                        <span>{{ 00 d&iacute;as / meses / a&ntilde;os }}</span>
                        <button class="projectDetails_btn">Detalles</button>
                    </div>
                </div>
            </article> -->
        </section>
    </main>


    <script src="js/main.js"></script>
</body>
</html>