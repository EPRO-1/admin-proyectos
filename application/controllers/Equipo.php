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
        $data['proyectoNoListados'] = array();
        $data['UserYaAsignado'] = array();

        $this->load->view('equipo_view', $data);
    }

    public function register_member () {
        $this->load->library('form_validation');

        $config = array(
			array(
					'field' => 'memberUser',
					'label' => 'usuario',
					'rules' => 'trim|is_unique[usuario.username]',
					'errors' => array(
						'is_unique' => 'El %s ya est&aacute; en uso.',
					)
			),
			array(
					'field' => 'memberEmail',
					'label' => 'email',
					'rules' => 'trim|valid_email|is_unique[usuario.mail]',
					'errors' => array(
						'is_unique' => 'El %s ya est&aacute; en uso.',
					)
			)
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            
            $level_user = $this->session->userdata('usuario')[1];
            $userName = $this->session->userdata('usuario')[0];
            $equipo = $this->equipo_model->get_team_members($userName);
    
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
            $data['proyectoNoListados'] = array();
            $data['UserYaAsignado'] = array();
            $data['erroresRegistro'] = validation_errors();
    
            $this->load->view('equipo_view', $data);

		} else {
            $this->equipo_model->register_member();
			redirect(BASE_URL().'equipo');
		}
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

    public function teamMemberDetails ($username) {
        $level_user = $this->session->userdata('usuario')[1];
        $userName = $this->session->userdata('usuario')[0];
        $numStatus = $this->equipo_model->getSpecificTeamMemberData($username)['activo'];

        $data['status'] = ($numStatus == 1) ? 'Activo' : 'Inactivo';
        $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
        $data['username'] = $username;
        $data['memberData'] = $this->equipo_model->getSpecificTeamMemberData($username);
        $data['niveles'] = $this->equipo_model->get_levels();
        $data['proyectosAsignados'] = $this->equipo_model->getProjectsAsignedToMember($username);

        $this->load->view('detallesTeamMember_view', $data);
    }

    public function editMemberInfo ($username) {

        if (!$this->equipo_model->editMemberInfo()['ok']) {

            $level_user = $this->session->userdata('usuario')[1];
            $userName = $this->session->userdata('usuario')[0];
            $numStatus = $this->equipo_model->getSpecificTeamMemberData($username)['activo'];

            $data['status'] = ($numStatus == 1) ? 'Activo' : 'Inactivo';
            $data['nivel_usuario'] = $this->usuarios_model->get_user_levels($level_user)->row('nivel');
            $data['username'] = $username;
            $data['memberData'] = $this->equipo_model->getSpecificTeamMemberData($username);
            $data['niveles'] = $this->equipo_model->get_levels();
            $data['errores'] = $this->equipo_model->editMemberInfo()['errores'];

            $this->load->view('detallesTeamMember_view', $data);

            // print_r($this->equipo_model->editMemberInfo()['errores']);
            
        } else {
            $this->equipo_model->editMemberInfo();
            $newUserName = $this->equipo_model->editMemberInfo()['newUserName'];
            redirect(BASE_URL() . 'equipo/teamMemberDetails/' . $newUserName);
        }
    }
}
