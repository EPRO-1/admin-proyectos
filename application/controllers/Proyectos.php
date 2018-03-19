<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->model('proyectos_model');
        $this->load->helper('url');

        if ($this->session->userdata('usuario') !== NULL) {
            // la sesion existe, el acceso es permitido
        } else {
            redirect(BASE_URL());
        }
    }

    public function index(){
        $proyectos = $this->proyectos_model->get_proyectos();
        // print_r($proyectos);
        if ($proyectos != false) {
            $data['check_projects'] = true;
            $data['proyectos'] = $this->proyectos_model->get_proyectos();

            $this->load->view('proyectos_view', $data);
        } else {
            $data['check_projects'] = false;
        }
    }
    
    public function registrar () {
        $this->load->library('form_validation');
        // $check_projects = $this->proyectos_model->get_proyectos();

        $data['tipos_proyecto'] = $this->proyectos_model->get_tipos_proyecto();
        $data['usuarios'] = $this->proyectos_model->get_users();
        $data['departamentos'] = $this->proyectos_model->get_departamentos();

        $this->load->view('registrarProyecto_view', $data);
    }

    public function registrar_proyecto () {
        $this->proyectos_model->register_project();
        redirect(BASE_URL() . 'proyectos/registrado');
    }

    public function registrado () {
        $this->load->view('proyectoRegistrado_view');
    }

    public function listado () {
        $data['proyectos'] = $this->proyectos_model->get_proyectos();

        // print_r($data['proyectos']);

        $this->load->view('listadoProyectos_view', $data);
    }
}