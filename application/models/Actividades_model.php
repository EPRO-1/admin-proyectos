<?php
    class Actividades_model extends CI_MODEL {
        
        public function __construct() {
            $this->load->database();
            $this->load->helper('url');
        }

        public function getActivities () {
            $query = $this->db->get('actividades');
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
    }