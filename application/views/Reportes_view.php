<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reportes</title>
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
                Reportes
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
        </header>
        <section class="actividades">
            <ol class="report-links">
                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fActividades&rs:Command=Render">Actividades</a>
                </li>

                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fProyectos&rs:Command=Render">Proyectos</a>
                </li>

                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fUsuarios&rs:Command=Render">Usuarios</a>
                </li>
                
                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fIndicadorNivelUsuario&rs:Command=Render">Indicador Nivel Usuario</a>
                </li>

                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fIndicadorEstadoUsuario&rs:Command=Render">Indicador Estado Usuario</a>
                </li>
                
                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fGraficoProyectosPorDepartamento&rs:Command=Render">Grafico Proyectos Por Departamento</a>
                </li>
                
                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fGraficoPresupuestosPorProyecto&rs:Command=Render">Grafico Presupuestos Por Proyecto</a>
                </li>
                
                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fDrillDownEquipoPorProyecto&rs:Command=Render">Grupo Equipo por Proyecto</a>
                </li>
                
                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fDrillDownActividadesPorProyecto&rs:Command=Render">Grupo Actividades Por Proyecto</a>
                </li>
                
                <li>
                    <a target="_blank" href="http://127.0.0.1/ReportServer/?%2fMy+Reports%2fDrillDownActividadesPorAutor&rs:Command=Render">Grupo Actividades Por Autor</a>
                </li>
            </ol>
        </section>
    </main>
    <footer>Reportes</footer>

    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>