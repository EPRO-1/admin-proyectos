<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyectos</title>
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
            <a href="<?= BASE_URL() ?>reports">Reportes</a>
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Proyecto registrado
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
        </header>
        <section class="proyectoRegistrado">
            <span>El proyecto ha sido registrado &nbsp;&nbsp;&nbsp; <i class="fas fa-check-circle fa-2x"></i></span>
            <div class="options">
                <a href="<?= BASE_URL() ?>proyectos">Ver proyectos</a>
            </div>
        </section>
    </main>

</body>
</html>