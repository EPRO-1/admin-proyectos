<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct () {
        parent::__construct();
        $this->load->library('pdf_report');
        $this->load->model('proyectos_model');
        $this->load->model('usuarios_model');
        $this->load->model('actividades_model');
        $this->load->model('reportes_model');
        $this->load->helper('url');
        $this->load->helper('form');
        
        if ($this->session->userdata('usuario') !== NULL) {
            // la sesion existe, el acceso es permitido
        } else {
            redirect(BASE_URL());
        }
    }

    public function index () {

    }

    public function proyectPdf ($nombreProy, $idProy) {
        $data['proyectos'] = $this->proyectos_model->get_proyectos();
        $data['dataProy'] = $this->reportes_model->proyecto($idProy);

        $equipoAsignado = $this->proyectos_model->getAsignedTeam($idProy);

        if ($equipoAsignado != false) {
            $data['equipoAsignado'] = $equipoAsignado;
        }

        $actsProy = $this->actividades_model->getActByProject($idProy);

        if ($actsProy != false) {
            $data['actsProyecto'] = $actsProy;
        }

        $this->load->view('reportProject_view', $data);
    }
}