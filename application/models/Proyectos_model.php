<?php
class Proyectos_model extends CI_Model {

    public function __construct () {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_tipos_proyecto () {
        $query = $this->db->get('tipo_proyecto');
        return $query->result_array();
    }

    public function get_users () {
        $query = $this->db->get('usuario');
        return $query->result_array();
    }

    public function get_departamentos () {
        $query = $this->db->get('departamentos');
        return $query->result_array();
    }

    public function get_proyectos () {
        $this->db->select('
            proyecto.*, 
            tipo_proyecto.nombre AS nombreTipo, 
            usuario.nombres, usuario.apellidos,
            departamentos.nombre AS nombreDpto
        ');
        $this->db->from('proyecto');
        $this->db->join('tipo_proyecto', 'tipo_proyecto.id_tipo = proyecto.tipo_proyecto');
        $this->db->join('usuario', 'usuario.id_user = proyecto.encargado');
        $this->db->join('departamentos', 'departamentos.id_depto = proyecto.id_depto');
        $this->db->order_by('proyecto.id_proyecto', 'DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getFilteredProjects ($filterNumber) {
        $this->db->select('
            proyecto.*, 
            tipo_proyecto.nombre AS nombreTipo, 
            usuario.nombres, usuario.apellidos,
            departamentos.nombre AS nombreDpto
        ');
        $this->db->from('proyecto');
        $this->db->join('tipo_proyecto', 'tipo_proyecto.id_tipo = proyecto.tipo_proyecto');
        $this->db->join('usuario', 'usuario.id_user = proyecto.encargado');
        $this->db->join('departamentos', 'departamentos.id_depto = proyecto.id_depto');
        $this->db->order_by('proyecto.id_proyecto', 'DESC');
        $this->db->limit($filterNumber);

        $query = $this->db->get()->result_array();
        return $query;
    }

    public function register_project () {
        $this->load->helper('url');

        $data = array (
            'nombre' => $this->input->post('nombre_proyecto'),
            'tipo_proyecto' => $this->input->post('tipo_proyecto'),
            'encargado' => $this->input->post('encargado'),
            'descripcion' => $this->input->post('descripcion'),
            'id_depto' => $this->input->post('departamento'),
            'fecha_inicio_1' => $this->input->post('fechaInicio'),
            'fecha_final_1' => $this->input->post('fechaFinal'),
            'extension_de' => $this->input->post('ext_proyecto')
        );

        return $this->db->insert('proyecto', $data);
    }

    public function getSpecificProjectData ($idProyecto) {
        // Obtener informacion del proyecto actual
        $this->db->select('
            proyecto.id_proyecto,
            proyecto.nombre,
            usuario.nombres AS nombresEncargado,
            usuario.apellidos AS apellidosEncargado,
            departamentos.nombre AS departamento,
            tipo_proyecto.nombre AS tipo,
            proyecto.extension_de,
            proyecto.descripcion,
            proyecto.presupuesto_inicial,
            proyecto.estado,
            proyecto.fecha_inicio_1,
            proyecto.fecha_final_1,
            proyecto.fecha_final_2
        ');
        $this->db->from('proyecto');
        $this->db->join('usuario', 'proyecto.encargado = usuario.id_user');
        $this->db->join('departamentos', 'proyecto.id_depto = departamentos.id_depto');
        $this->db->join('tipo_proyecto', 'proyecto.tipo_proyecto = tipo_proyecto.id_tipo');
        $this->db->where(array('proyecto.id_proyecto' => $idProyecto));
        
        $query = $this->db->get()->result_array();

        return $query[0];
    }

    public function getAsignedTeam ($idProyecto) {
        // Obtener los usuarios que estan asignados al proyecto actual
        $this->db->select('
            usuario.id_user, usuario.username, usuario.nombres, usuario.apellidos, usuario.mail,
            asignar_equipo_proyecto.fecha_asignacion, asignar_equipo_proyecto.id_asignacion
        ');
        $this->db->from('usuario');
        $this->db->join('asignar_equipo_proyecto', 'asignar_equipo_proyecto.id_usuario = usuario.id_user');
        $this->db->join('proyecto', 'proyecto.id_proyecto = asignar_equipo_proyecto.id_proyecto');
        $this->db->where(array('proyecto.id_proyecto'  => $idProyecto));

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

    public function deleteAsignation () {
        $idAsignacion = $this->input->post('idAsignacion');

        $this->db->delete('asignar_equipo_proyecto', array('id_asignacion' => $idAsignacion));
    }

    public function asignBudget () {
        $idProy = $this->input->post('idProy');
        $presupuesto = $this->input->post('budget');
        $where = array('id_proyecto' => $idProy);
        $data = array('presupuesto_inicial' => $presupuesto);

        $this->db->update('proyecto', $data, $where);
    }
}