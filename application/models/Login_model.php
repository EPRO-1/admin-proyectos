<?php
class Login_model extends CI_MODEL {

    public function __construct() {
        $this->load->database();
    }

    public function login_validation ($username, $password) {
        $where = array('username' => $username, 'passcode' => $password);
        $query_user = $this->db->get_where('usuario', $where);

        if ($query_user->num_rows() > 0) {
            // echo "encontrado";
            return $query_user;
        } else {
            // echo "nel prro";
            return false;
        }
    }

}