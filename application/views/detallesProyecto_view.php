<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detalles :: Proyecto</title>
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
        </div>
    </aside>
    <main>
        <header>
            <bar>
                Detalles de proyecto: <?= $projectData['nombre'] ?>
                <a class="logout" href="<?= BASE_URL() ?>login/logout">
                    <i class="fa fa-times-circle fa-2x" title="Cerrar Sesi&oacute;n"></i>
                </a>
            </bar>
        </header>
        <section class="proyectos">
            <div class="projectData">
                <span class="title">Informaci&oacute;n:</span>
                <div class="info">
                    <div class="projectField">
                        <span class="icon"><i class="fa fa-tags"></i></span>
                        <label for="">Nombre:</label>
                        <div class="value"><?= $projectData['nombre'] ?></div>
                    </div>
                    <div class="projectField">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <label for="">Encargado:</label>
                        <div class="value"><?= $projectData['nombresEncargado'] . ' ' . $projectData['apellidosEncargado'] ?></div>
                    </div>
                    <div class="projectField">
                        <span class="icon"><i class="fa fa-building"></i></span>
                        <label for="">&Aacute;rea:</label>
                        <div class="value"><?= $projectData['departamento'] ?></div>
                    </div>
                    <div class="projectField">
                        <span class="icon"><i class="fa fa-archive"></i></span>
                        <label for="">Tipo:</label>
                        <div class="value"><?= $projectData['tipo'] ?></div>
                    </div>
                    <?php if ($projectData['extension_de'] != NULL): ?>
                        <div class="projectField">
                            <span class="icon"><i class="fa fa-tags"></i></span>
                            <label for="">Extensi&oacute;n de:</label>
                            <div class="value">
                                <?php foreach ($proyectos as $proy): ?>
                                    <?php if ($proy['id_proyecto'] == $projectData['extension_de']): ?>
                                        <?php echo $proy['nombre'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="projectField">
                        <span class="icon"><i class="fa fa-money-bill-alt"></i></span>
                        <label for="">Presupuesto:</label>
                        <?php if ($projectData['presupuesto_inicial'] != NULL): ?>
                            <div class="value"><?= '$' . substr($projectData['presupuesto_inicial'], 0, -2) ?></div>
                        <?php else: ?>

                            <?php if ($this->session->userdata('usuario')[1] == 3 ||  $this->session->userdata('usuario')[1] == 4): ?>
                                <div class="value" id="asignBudget">No asignado <i class="fa fa-edit"></i></div>
                                <?= form_open('proyectos/asignarPresupuesto', 'class="value hidden" id="asignBudget_form"') ?>
                                    <input type="hidden" name="nombreProy" value="<?= $projectData['nombre'] ?>">
                                    <input type="hidden" name="idProy" value="<?= $projectData['id_proyecto'] ?>">
                                    <input type="number" name="budget" id="budgetInput" placeholder="1000,00" step="0.010" min="0">
                                    <label for="sendBudget" id="sendBudgetLbl" class="hidden"><i class="fa fa-check-circle fa-lg"></i></label>
                                    <span class="cancelAsign" onclick="location.reload()"><i class="fa fa-times-circle fa-lg"></i></span>
                                    <input type="submit" name="sendBudget" id="sendBudget">
                                </form>
                            <?php else: ?>
                                <div class="value">No asignado</div>
                            <?php endif ?>

                        <?php endif ?>
                    </div>
                    <div class="projectField">
                        <span class="icon"><i class="fas fa-align-center"></i></span>
                        <label for="">Descripci&oacute;n:</label>
                        <div class="value"><?= $projectData['descripcion'] ?></div>
                    </div>
                    <div class="projectField">
                        <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                        <label for="">Fecha inicio:</label>
                        <div class="value"><?= $projectData['fecha_inicio_1'] ?></div>
                    </div>
                    <div class="projectField">
                        <span class="icon"><i class="fas fa-calendar-alt"></i></span>
                        <label for="">Fecha final:</label>
                        <div class="value"><?= $projectData['fecha_final_1'] ?></div>
                    </div>
                    <div class="projectField">
                        <span class="icon"><i class="fas fa-flag-checkered"></i></span>
                        <label for="">
                            <?php if(!$projectData["fecha_final_2"]){
                                if ($this->session->userdata('usuario')[1] == 4) {
                                    echo "<span>¿Finalizar?</span>";
                                } else {
                                    echo  "<span>Finalización:</span>";
                                }
                            } else {
                                echo  "<span>Finalización:</span>";
                            }
                            ?>
                        </label>
                        <div class="value">
                            <?php if(!$projectData["fecha_final_2"]) {
                                if ($this->session->userdata('usuario')[1] == 4) {
                                    echo '<span class="fechaFin">';
                                    echo  '<a href="'.BASE_URL().'proyectos/estado/'.$projectData["id_proyecto"].'/2" class="finalizar" value="Finalizar">Finalizar</a>';
                                    echo ' </span>';
                                } else {
                                    echo '<span>';
                                    echo 'No finalizado';
                                    echo '</span>';
                                }
                            } else {
                                echo  "<span>".$projectData["fecha_final_2"]."</span>";
                            }?>
                        </div>
                    </div>
                </div>
                <div class="iconInfo"><i class="fas fa-info-circle"></i></div>
            </div>

            <div class="projectData">
                <span class="title">Equipo asignado:</span>
                <?php if (isset($equipoAsignado)): ?>
                    <div class="team">
                        <div class="columnsTeam">
                            <div class="icon"><i class="fa fa-user-circle fa-2x"></i></div>
                            <div class="username">Usuario</div>
                            <div class="nombre">Nombre</div>
                            <div class="email">Email</div>
                            <div class="fecha">Fecha de asignaci&oacute;n</div>
                            <?php if ($this->session->userdata('usuario')[1] == 2 || $this->session->userdata('usuario')[1] == 4): ?>
                                <div class="accion"><i class="fa fa-times-circle"></i></div>
                            <?php endif ?>
                        </div>
                        <?php foreach ($equipoAsignado as $equipo): ?>
                            <div class="asignedMember">
                                <div class="icon"><i class="fa fa-user-circle fa-2x"></i></div>
                                <div class="username"><?= $equipo['username'] ?></div>
                                <div class="nombre"><?= $equipo['nombres'] ?></div>
                                <div class="email"><?= $equipo['mail'] ?></div>
                                <div class="fecha"><?= $equipo['fecha_asignacion'] ?></div>
                                <?php if ($this->session->userdata('usuario')[1] == 2 || $this->session->userdata('usuario')[1] == 4): ?>
                                    <div class="accion">
                                        <?= form_open('proyectos/deleteAsignation/' . $projectData['nombre'] . '/' . $projectData['id_proyecto']) ?>
                                            <input type="hidden" name="idAsignacion" value="<?= $equipo['id_asignacion'] ?>">
                                            <label for="desasignar<?= $equipo['id_asignacion'] ?>" class="desasignarEquipo"><i class="fa fa-times-circle"></i></label>
                                            <input type="submit" name="desasignar" id="desasignar<?= $equipo['id_asignacion'] ?>">
                                        </form>
                                    </div>
                                <?php endif ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php else:?>
                    <div class="team">
                        <span class="noEquipo">No hay equipo asignado</span>
                    </div>
                <?php endif ?>
            </div>

            <div class="projectData">
                <span class="title">Actividades:</span>
                <?php if (isset($actsProyecto)): ?>
                    <?php $totalCost = 0.0 ?>
                    <?php foreach($actsProyecto as $act): ?>
                        <div class="actProy">
                            <div class="title">
                                <div class="icon"><i class="fas fa-tasks"></i></div>
                                <div class="nombre"><?= $act['nombre'] ?></div>
                            </div>
                            <div class="infoAct">
                                <div class="field">
                                    <div class="label">Detalles:</div>
                                    <div class="value"><?= $act['detalle'] ?></div>
                                </div>
                                <div class="field">
                                    <div class="label">Costo:</div>
                                    <div class="value"><?= '$' . $act['costo'] ?></div>
                                </div>
                                <div class="field">
                                    <div class="label">Fecha ejecuci&oacute;n:</div>
                                    <div class="value"><?= $act['fecha_ejecucion'] ?></div>
                                </div>
                                <div class="field">
                                    <div class="label">Fecha finalizaci&oacute;n:</div>
                                    <div class="value"><?= $act['fecha_finalizacion'] ?></div>
                                </div>
                                <div class="field">
                                    <div class="label">Autor:</div>
                                    <div class="value"><?= $act['nombresAutor'] . ' ' . $act['apeAutor'] . ' (' . $act['autor'] . ')' ?></div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $totalCost += $act['costo']
                        ?>
                    <?php endforeach ?>

                    <?php if ($this->session->userdata('usuario')[1] == 2 || $this->session->userdata('usuario')[1] == 4): ?>
                        <div class="addAct">
                            <a href="<?= BASE_URL() . 'actividades/registerActivitieForm' ?>">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                    <?php endif ?>

                    <div class="totalCostAct">
                        <div class="icon">
                            <i class="fas fa-money-bill-alt fa-2x"></i>
                        </div>
                        <span>El costo total de las actividades es:</span>
                        <span><?= '$' . $totalCost ?></span>
                    </div>
                    

                    <?php if ($projectData['presupuesto_inicial'] != NULL): ?>
                        <div class="compararPresupuesto">
                            <?php if ($totalCost <= $projectData['presupuesto_inicial']): ?>
                                <div class="inBudget">
                                    <span class="icon"><i class="fa fa-check-circle"></i></span>
                                    <span>&nbsp;Se est&aacute; dentro del presupuesto</span>
                                </div>
                                <span>($<?= $projectData['presupuesto_inicial'] - $totalCost ?> restantes)</span>
                            <?php else: ?>
                                <div class="outBudget">
                                    <span class="icon"><i class="fa fa-exclamation-triangle"></i></span>
                                        <span>&nbsp;Se est&aacute; fuera del presupuesto</span>
                                    </div>
                                    <span>($<?= substr(($projectData['presupuesto_inicial'] - $totalCost), 1) ?> sobrepasados)</span>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                <?php else:?>
                    <div class="team">
                        <span class="noEquipo">No hay actividades asignadas</span>
                    </div>

                    <?php if ($this->session->userdata('usuario')[1] == 2 || $this->session->userdata('usuario')[1] == 4): ?>
                        <div class="addAct">
                            <a href="<?= BASE_URL() . 'actividades/registerActivitieForm' ?>">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                    <?php endif ?>
                    
                <?php endif ?>
            </div>
            
            <footer></footer>
        </section>
        <a  class="report" 
            href="<?= BASE_URL() ?>reportes/proyectPdf<?= '/' . $projectData['nombre'] . '/' . $projectData['id_proyecto'] ?>">
                Generar PDF 
                <i class="fa fa-file-pdf fa-lg"></i>
        </a>
    </main>

    <script src="<?= BASE_URL() ?>js/main.js"></script>
</body>
</html>