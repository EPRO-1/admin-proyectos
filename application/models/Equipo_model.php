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
                'passcode' => md5($this->input->post('memberPass')),
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
            $errors = '';
           
            $whereCheck = array('id_user' => $id_member);
            $this->db->select('username, mail');
            $this->db->from('usuario');
            $this->db->where($whereCheck);
            $queryResult = $this->db->get();
            $rowsResult = $queryResult->num_rows();
            
            if ($rowsResult > 0) {
                $currentUsername = $queryResult->row('username');
                $currentEmail = $queryResult->row('mail');

                if ($currentUsername == $user) {
                    // echo "No se actualizo el usuario";
                    $userChecked = $currentUsername;
                } else {
                    // echo " Se actualizo el usuario";

                    $this->db->select('username');
                    $this->db->from('usuario');
                    $this->db->where('username', $user);
                    $queryUser = $this->db->get();
                    $rowUser = $queryUser->num_rows();

                    if ($rowUser > 0) {
                        // echo ' El usuario ya esta en uso';
                        $errors .= '<li>El usuario ya est&aacute; en uso</li>';
                    } else {
                        // echo ' Nuevo usuario es correcto';
                        $userChecked = $user;
                    }
                }

                if ($currentEmail == $email) {
                    // echo " No se actualizo el email";
                    $emailChecked = $currentEmail;
                } else {
                    // echo " Se actualizo el email";

                    $this->db->select('mail');
                    $this->db->from('usuario');
                    $this->db->where('mail', $email);
                    $queryEmail = $this->db->get();
                    $rowEmail = $queryEmail->num_rows();

                    if ($rowEmail > 0) {
                        // echo 'El correo ya esta en uso';
                        $errors .= '<li>El correo ya est&aacute; en uso</li>';
                    } else {
                        // echo 'Nuevo correo es correcto';
                        $emailChecked = $email;
                    }
                }

                if (empty($errors)) {
                    $data = array(
                        'username' => $userChecked,
                        'mail' => $emailChecked,
                        'nombres' => $this->input->post('nombres'),
                        'apellidos' => $this->input->post('apellidos'),
                        'nivel_usuario' => $this->input->post('selectNivelUsuario'),
                        'activo' => $this->input->post('selectStatusUsuario')
                    );
                    $where = array('id_user' => $id_member);
                    $this->db->update('usuario', $data, $where);

                    $arr = array('ok' => true, 'newUserName' => $userChecked);
                    return $arr;

                } else {
                    $arr = array('ok' => false, 'errores' => $errors);
                    return $arr;
                }

            }
 
        }

        public function getProjectsAsignedToMember ($username) {
            $this->db->select('actual.nombres, actual.id_user, encargado.nombres AS encargado, proyecto.nombre, asignar_equipo_proyecto.fecha_asignacion');
            $this->db->from('asignar_equipo_proyecto');
            $this->db->join('proyecto', 'asignar_equipo_proyecto.id_proyecto = proyecto.id_proyecto');
            $this->db->join('usuario actual', 'asignar_equipo_proyecto.id_usuario = actual.id_user');
            $this->db->join('usuario encargado', 'proyecto.encargado = encargado.id_user');
            $this->db->where('actual.username', $username);

            /*
            SELECT actual.nombres, encargado.nombres AS encargado, proyecto.nombre, asignar_equipo_proyecto.fecha_asignacion FROM asignar_equipo_proyecto
            JOIN proyecto ON asignar_equipo_proyecto.id_proyecto = proyecto.id_proyecto
            JOIN usuario actual ON asignar_equipo_proyecto.id_usuario = actual.id_user
            JOIN usuario encargado ON proyecto.encargado = encargado.id_user
            WHERE actual.username = 'admin'
            */

            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }

        }
    } 