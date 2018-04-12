<?php
class Usuarios_model extends CI_Model {

    public function __construct () {
        $this->load->database();
    }

    public function get_user_levels($level_user) {
        $where = array('id' => $level_user);
        $query = $this->db->get_where('niveles_usuario', $where);
        return $query;
    }
}