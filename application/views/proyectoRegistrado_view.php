<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= BASE_URL() ?>css/main.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="js/main.js"></script>
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
                Proyecto registrado
            </bar>
        </header>
        <section class="proyectoRegistrado">
            <span>El proyecto {{ nombreDelProyecto }} ha sido registrado &nbsp;&nbsp;&nbsp; <i class="fas fa-check-circle fa-2x"></i></span>
            <div class="options">
                <a href="#">Ver detalles</a>
            </div>
        </section>
    </main>

</body>
</html>