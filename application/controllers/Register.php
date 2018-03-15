<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('register_user_model');
	}

	public function index()	{

		$this->load->helper('form_helper');
		$this->load->view('register_view');
	}

	public function register_user () {

		$this->load->library('form_validation');
		$this->load->helper('url');

		$config = array(
			array(
					'field' => 'pass',
					'label' => 'Contrase&ntilde;a',
					'rules' => 'required'
			),
			array(
					'field' => 'pass_conf',
					'label' => 'Repetir contrase&ntilde;a',
					'rules' => 'required|matches[pass]',
					'errors' => array(
							'matches' => 'Las contrase&ntilde;as no coinciden.',
					)
			)
		);
		
		$this->form_validation->set_rules($config);
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register_view');
		} else {
			$this->register_user_model->set_user();
			// Method redirect from the url helper loaded at the start of this function
			redirect(BASE_URL().'login');
		}
	}
}