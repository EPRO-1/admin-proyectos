<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('equipo_model');
        $this->load->model('proyectos_model');

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

        // $idsUserProyectAsigned = $this->equipo_model->getAsignedProyectsId();
        // print_r($idsUserProyectAsigned);

        $data['idsAsignados'] = $this->equipo_model->getAsignedProyectsId();

        if ($equipo != false) {
            $checkEquipo = true;
            $data['equipo'] = $equipo;
        } else {
            $checkEquipo = false;
        }

        $data['checkEquipo'] = $checkEquipo;
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $data['niveles_usuario'] = $this->equipo_model->get_levels();
        $data['proyectos'] = $this->proyectos_model->get_proyectos();

        $arr = array (
            array('valor1' => 1, 'valor2' => 2), 
            array('valor1' => 3, 'valor2' => 4)
        );

        // print_r($arr);

        for ($i = 0; $i < count($arr); $i++) {
            // if (in_array(1, $arr[$i]) && in_array(2, $arr[$i])) {
            //     echo 'Se encontro en el arreglo' . ($i + 1);
                // echo 'TRUE';
            // } else {
                // echo 'No encontrado en' . ($i + 1);
                // echo 'FALSE';
            // }

            if ($arr[$i]['valor1'] == 1 && $arr[$i]['valor2'] == 4) {
                // echo 'Se encontro en el arreglo' . ($i + 1);
                // echo 'TRUE';
            } else {
                // echo 'No encontrado en' . ($i + 1);
                // echo 'FALSE';
            }

        }

        $data['proyectoNoListados'] = array();
        $data['UserYaAsignado'] = array();

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

    public function asign_to_project () {
        $this->equipo_model->asign_member_proyect();
        redirect(BASE_URL() . 'equipo');
    }
}