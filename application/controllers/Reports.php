<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public function __construct () {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('actividades_model');
        $this->load->model('proyectos_model');
        $this->load->model('equipo_model');


        if ($this->session->userdata('usuario') !== NULL) {
            // la sesion exista, el acceso es permitido
        } else {
            redirect(BASE_URL());
        }
    }

    public function index () {
        $level_user = $this->session->userdata('usuario')[1];
        $userName = $this->session->userdata('usuario')[0];

        $data['userdata'] = $this->equipo_model->getSpecificTeamMemberData($userName);
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');


        $this->load->view('reportes_view', $data);
    }
}