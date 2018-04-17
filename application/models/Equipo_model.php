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
            $where = array('username !=' => $username, 'activo' => 1);
            // $query = $this->db->get_where('usuario', $where);

            $this->db->select('usuario.*, niveles_usuario.nivel');
            $this->db->from('usuario');
            $this->db->join('niveles_usuario', 'usuario.nivel_usuario = niveles_usuario.id');
            $this->db->where($where);
            // $this->db->order_by('usuario.nivel_usuario', 'DESC');
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function remove_team_member () {
            $id_member = $this->input->post('idMember');

            $where = array('id_user' => $id_member);
            $data = array('activo' => 0);

            $this->db->update('usuario', $data, $where);
        }

        public function asign_member_proyect () {
            $data = array(
                'id_proyecto' => $this->input->post('selectProyectToAsign'),
                'id_usuario' => $this->input->post('idMember')
            );

            // print_r($data);
            return $this->db->insert('asignar_equipo_proyecto', $data);
        }

        public function getAsignedProyectsId () {
            $this->db->select('usuario.id_user, proyecto.id_proyecto');
            $this->db->from('asignar_equipo_proyecto');
            $this->db->join('proyecto', 'asignar_equipo_proyecto.id_proyecto = proyecto.id_proyecto');
            $this->db->join('usuario', 'asignar_equipo_proyecto.id_usuario = usuario.id_user');

            $query = $this->db->get();
            return $query->result_array();

        }

        public function getSpecificTeamMemberData ($username) {
            $where = array('username' => $username);

            $this->db->select('usuario.*, niveles_usuario.nivel');
            $this->db->from('usuario');
            $this->db->join('niveles_usuario', 'usuario.nivel_usuario = niveles_usuario.id');
            $this->db->where($where);

            // $query = $this->db->get_where('usuario', $where);
            $query = $this->db->get();
            return $query->result_array()[0];
        }

        public function editMemberInfo () {
            $id_member = $this->input->post('idMember');
            $user = $this->input->post('username');
            $email = $this->input->post('email');

            $whereCheck = array(
                'username' => $user,
                'mail' => $email
            );
            
            $this->db->select('usuario.username, usuario.mail');
            $this->db->from('usuario');
            $this->db->where($whereCheck);

            $checkUserAndMail = $this->db->get();


            print_r($checkUserAndMail->result_array());



            // $data = array(
            //     'username' => $this->input->post('username'),
            //     'mail' => $this->input->post('email'),
            //     'nombres' => $this->input->post('nombres'),
            //     'apellidos' => $this->input->post('apellidos'),
            //     'nivel_usuario' => $this->input->post('selectNivelUsuario'),
            //     'activo' => $this->input->post('selectStatusUsuario')
            // );

            // $where = array('id_user' => $id_member);
            
            // $this->db->update('usuario', $data, $where);
        }
    } 