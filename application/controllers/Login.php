<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->helper('form_helper');
		$this->load->view('login_view');
	}

	public function user_validation () {
		$this->load->helper('form_helper');
		$this->load->helper('url');
		
		$username = $this->input->post('user');
        $password = $this->input->post('pass');
		
		if ($this->login_model->login_validation($username, $password) != false) {
			$username = $this->login_model->login_validation($username, $password)->row('username');
			$rol_user = $this->login_model->login_validation($username, $password)->row('nivel_usuario');
			$user = array($username, $rol_user);
			$this->session->set_userdata('usuario', $user);
			redirect(BASE_URL() . 'proyectos');
		} else {
			$this->load->view('login_view');
		}

		// echo $this->input->post('user');
	}

	public function logout () {
        $this->session->sess_destroy();
        redirect(BASE_URL());
    }
}