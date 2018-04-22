<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->model('proyectos_model');
        $this->load->model('usuarios_model');
        $this->load->model('actividades_model');
        $this->load->helper('url');
        $this->load->helper('form');
        
        if ($this->session->userdata('usuario') !== NULL) {
            // la sesion existe, el acceso es permitido
        } else {
            redirect(BASE_URL());
        }
    }
    
    public function index(){
        $level_user = $this->session->userdata('usuario')[1];
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $proyectos = $this->proyectos_model->get_proyectos();
        if ($proyectos != false) {
            $data['check_projects'] = true;
            $data['allProjects'] = $this->proyectos_model->get_proyectos();
            $data['proyectos'] = $this->proyectos_model->get_proyectos();

            $this->load->view('proyectos_view', $data);
        } else {
            $data['check_projects'] = false;
        }
    }
    
    public function registrar () {
        $this->load->library('form_validation');
        // $check_projects = $this->proyectos_model->get_proyectos();
        $level_user = $this->session->userdata('usuario')[1];
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');

        $data['tipos_proyecto'] = $this->proyectos_model->get_tipos_proyecto();
        $data['usuarios'] = $this->proyectos_model->get_users();
        $data['departamentos'] = $this->proyectos_model->get_departamentos();
        $data['proyectos'] = $this->proyectos_model->get_proyectos();

        $this->load->view('registrarProyecto_view', $data);
    }

    public function registrar_proyecto () {
        $this->proyectos_model->register_project();
        redirect(BASE_URL() . 'proyectos/registrado');
    }

    public function registrado () {
        $level_user = $this->session->userdata('usuario')[1];
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $this->load->view('proyectoRegistrado_view', $data);
    }

    public function projectDetails ($nombreProyecto, $idProyecto) {
        $level_user = $this->session->userdata('usuario')[1];
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $idProy = $idProyecto;
        
        $data['projectData'] = $this->proyectos_model->getSpecificProjectData($idProy);
        $data['proyectos'] = $this->proyectos_model->get_proyectos();
        
        $equipoAsignado = $this->proyectos_model->getAsignedTeam($idProy);

        if ($equipoAsignado != false) {
            $data['equipoAsignado'] = $equipoAsignado;
        }

        $actsProy = $this->actividades_model->getActByProject($idProy);

        if ($actsProy != false) {
            $data['actsProyecto'] = $actsProy;
        }

        $this->load->view('detallesProyecto_view', $data);

    }

    public function deleteAsignation ($nombreProyecto, $idProyecto) {
        $this->proyectos_model->deleteAsignation();
        redirect(BASE_URL() . 'proyectos/projectDetails/' . $nombreProyecto . '/' . $idProyecto);
    }

    public function filtrados () {
        $filterNumber = $this->input->post('filterProy');
        
        if ($filterNumber != 0) {
            $level_user = $this->session->userdata('usuario')[1];
            $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');

            $data['currentFilter'] = $filterNumber;
            $data['check_projects'] = true;
            $data['allProjects'] = $this->proyectos_model->get_proyectos();
            $data['proyectos'] = $this->proyectos_model->getFilteredProjects($filterNumber);
            // print_r($proys);
            
            $this->load->view('proyectos_view', $data);
        } else {
            redirect(BASE_URL() . 'proyectos');
        }
    }

    public function listado () {
        $level_user = $this->session->userdata('usuario')[1];
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $data['proyectos'] = $this->proyectos_model->get_proyectos();

        // print_r($data['proyectos']);

        $this->load->view('listadoProyectos_view', $data);
    }
}