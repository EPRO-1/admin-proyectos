<?php
    class Equipo_model extends CI_MODEL {
        public function __construct() {
            $this->load->database();
            $this->load->helper('url');
        }

        public function get_levels () {
            $query = $this->db->get('niveles_usuario');
            return $query->result_array();
        }

        public function register_member () {
            $data = array (
                'username' => $this->input->post('memberUser'),
                'passcode' => $this->input->post('memberPass'),
                'mail' => $this->input->post('memberEmail'),
                'nombres' => $this->input->post('memberName'),
                'apellidos' => $this->input->post('memberLastName'),
                'nivel_usuario' => $this->input->post('memberLevel')
            );
            return $this->db->insert('usuario', $data);
        }

        public function get_team_members ($username) {
            $where = array('username !=' => $username);
            $query = $this->db->get_where('usuario', $where);

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
    } 