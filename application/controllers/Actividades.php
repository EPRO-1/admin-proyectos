<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('actividades_model');


        if ($this->session->userdata('usuario') !== NULL) {
            // la sesion exista, el acceso es permitido
        } else {
            redirect(BASE_URL());
        }
    }

    public function index () {
        $level_user = $this->session->userdata('usuario')[1];
        $userName = $this->session->userdata('usuario')[0];
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');

        $actividades = $this->actividades_model->getActivities();
        
        if ($actividades != false) {
            $data['actividades'] = $actividades;
        }

        $this->load->view('actividades_view', $data);
    }
}