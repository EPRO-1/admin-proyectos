<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('usuarios_model');
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

        $equipo = $this->equipo_model->get_team_members($userName);
        // print_r($equipo);

        if ($equipo != false) {
            $checkEquipo = true;
            $data['equipo'] = $equipo;
        } else {
            $checkEquipo = false;
        }

        $data['checkEquipo'] = $checkEquipo;
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $data['niveles_usuario'] = $this->equipo_model->get_levels();

        $this->load->view('equipo_view', $data);
    }

    public function register_member () {
        $this->equipo_model->register_member();
        redirect(BASE_URL() . 'equipo');
    }
    
    public function remove_member () {
        $this->equipo_model->remove_team_member();
        redirect(BASE_URL() . 'equipo');
    }

    public function listado () {
        $this->load->view('listadoEquipo_view');
    }
}