<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	public function index()
	{
		$this->load->view('proyectos_view');
    }
    
    public function registrar () {
        $this->load->view('registrarProyecto_view');
    }

    public function registrado () {
        $this->load->view('proyectoRegistrado_view');
    }

    public function listado () {
        $this->load->view('listadoProyectos_view');
    }
}