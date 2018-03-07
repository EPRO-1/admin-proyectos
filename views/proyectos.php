<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="main.js"></script>
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
            <button>Proyectos</button>
            <button>Equipo</button>
            <button>Presupuesto</button>
            <button>Contacto</button>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Proyectos
            </bar>
        </header>
        <section class="proyectos">
            <!-- <article class="noProjects">
                    <span>No hay proyectos</span>
                    <div class="addFirstProject">
                        <i class="fas fa-plus-circle fa-7x"></i>
                    </div>
            </article> -->
            <article class="project">
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
            </article>
            <article class="project">
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
            </article>
            <article class="project">
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
            </article>
            <article class="project">
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
            </article>
        </section>
    </main>

</body>
</html>