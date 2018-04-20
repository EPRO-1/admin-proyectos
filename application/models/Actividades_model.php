<?php
    class Actividades_model extends CI_MODEL {
        
        public function __construct() {
            $this->load->database();
            $this->load->helper('url');
            $this->load->helper('form');
        }

        public function getActivities () {
            $this->db->select('
                usuario.username as autor, usuario.nombres as nombresAutor, usuario.apellidos as apeAutor,
                proyecto.nombre as proyecto,
                actividades.*
            ');
            $this->db->from('actividades');
            $this->db->join('usuario', 'actividades.id_autor = usuario.id_user');
            $this->db->join('proyecto', 'actividades.id_proyecto = proyecto.id_proyecto');

            $query = $this->db->get();

            // $query = $this->db->get('actividades');
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function registerAct () {
            $data = array(
                'id_proyecto' => $this->input->post('proyAct'),
                'id_autor' => $this->input->post('userAct'),
                'nombre' => $this->input->post('nombreAct'),
                'costo' => $this->input->post('costoAct'),
                'detalle' => $this->input->post('detalleAct'),
                'fecha_ejecucion' => $this->input->post('inicioAct'),
                'fecha_finalizacion' => $this->input->post('finAct')
            );

            return $this->db->insert('actividades', $data);
        }

        public function getActByProject ($idProy) {
            $this->db->select('
                usuario.username as autor, usuario.nombres as nombresAutor, usuario.apellidos as apeAutor,
                proyecto.nombre as proyecto,
                actividades.*
            ');
            $this->db->from('actividades');
            $this->db->join('usuario', 'actividades.id_autor = usuario.id_user');
            $this->db->join('proyecto', 'actividades.id_proyecto = proyecto.id_proyecto');
            $this->db->where(array('proyecto.id_proyecto' => $idProy));

            $query = $this->db->get();

            // $query = $this->db->get('actividades');
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
    }