<?php
class Register_user_model extends CI_Model {

    public function __construct () {
        $this->load->database();
    }

    public function set_user () {
        
        $this->load->helper('url');

        $data = array (
            'username' => $this->input->post('user_user'),
            'passcode' => $this->input->post('pass'),
            'mail' => $this->input->post('user_email'),
            'nombres' => $this->input->post('user_names'),
            'apellidos' => $this->input->post('user_lastnames')
        );

        $username = $this->input->post('user_user');
        $passcode = $this->input->post('pass');
        $mail = $this->input->post('user_email');
        $nombres = $this->input->post('user_names');
        $apellidos = $this->input->post('user_lastnames');

        return $this->db->insert('usuario', $data);
        //return $this->db->query("call `agregarUsuario`($username, $passcode, $mail, $nombres, $apellidos)");
    }

}