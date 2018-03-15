<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= BASE_URL() ?>css/main.css" />
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
            <a href="<?= BASE_URL() ?>proyectos">Proyectos</a>
            <a href="<?= BASE_URL() ?>equipo">Equipo</a>
            <a href="#">Presupuesto</a>
            <a href="#">Contacto</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Registrar proyecto
            </bar>
        </header>
        <section class="registrarProyecto">
            <form action="<?= BASE_URL() ?>proyectos/registrado" method="POST">
                <span>Datos del proyecto</span>
                <hr>
                <div class="field">
                    <label for="nombreProyecto">Nombre del proyecto:</label>
                    <input type="text" name="nombre_proyecto" id="nombreProyecto" placeholder="Nombre del proyecto">
                </div>
                <div class="field">
                    <label for="responsableProyecto">Responsable:</label>
                    <input type="text" name="responsable_proyecto" id="responsableProyecto" value="{{Nombres Apellidos}}" disabled>
                </div>
                <div class="field">
                    <label for="areaEmpresa">&Aacute;rea de la empresa:</label>
                    <select name="area_empresa" id="areaEmpresa">
                        <option value="1">area1</option>
                        <option value="2">area2</option>
                        <option value="3">area3</option>
                        <option value="4">area4</option>
                        <option value="5">area5</option>
                    </select>
                </div>
                <div class="field">
                    <label for="tipoProyecto">Tipo de proyecto:</label>
                    <select name="tipo_proyecto" id="tipoProyecto">
                        <option value="nuevo">Nuevo</option>
                        <option value="ext">Extensi&oacute;n</option>
                    </select>
                </div>
                <div class="field">
                    <label for="extProyecto">Extension de:</label>
                    <select name="ext_proyecto" id="extProyecto">
                        <option value="1">Proyecto1</option>
                        <option value="2">Proyecto2</option>
                        <option value="3">Proyecto3</option>
                        <option value="4">Proyecto4</option>
                    </select>
                </div>
                <div class="field">
                    <label for="unidadTiempo">Plazo:</label>
                    <input type="number" name="plazo" min="1" max="10000" class="plazo" placeholder="34">
                    <select name="unidad_tiempo" id="unidadTiempo" class="plazo">
                        <option value="dias">D&iacute;as</option>
                        <option value="meses">Meses</option>
                        <option value="years">A&ntilde;os</option>
                    </select>
                </div>
                <div class="registrar">
                    <input type="submit" value="Registrar">
                </div>
            </form>
        </section>
    </main>

</body>
</html>