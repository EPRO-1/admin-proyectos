<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('usuarios_model');

        if ($this->session->userdata('usuario') !== NULL) {
            // la sesion exista, el acceso es permitido
        } else {
            redirect(BASE_URL());
        }
    }

    public function index () {
        $level_user = $this->session->userdata('usuario')[1];
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $this->load->view('equipo_view', $data);
    }

    public function listado () {
        $this->load->view('listadoEquipo_view');
    }
}