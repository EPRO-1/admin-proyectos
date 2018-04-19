<?php
class Proyectos_model extends CI_Model {

    public function __construct () {
        $this->load->database();
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
        $query = $this->db->query(
            'select proyecto.*, tipo_proyecto.nombre as nombreTipo, usuario.nombres, apellidos, departamentos.nombre as nombreDpto
            from proyecto, tipo_proyecto, usuario, departamentos
            where proyecto.tipo_proyecto = tipo_proyecto.id_tipo
                and proyecto.encargado = usuario.id_user
                and proyecto.id_depto = departamentos.id_depto'
        );

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
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
            proyecto.fecha_final_1
        ');
        $this->db->from('proyecto');
        $this->db->join('usuario', 'proyecto.encargado = usuario.id_user');
        $this->db->join('departamentos', 'proyecto.id_depto = departamentos.id_depto');
        $this->db->join('tipo_proyecto', 'proyecto.tipo_proyecto = tipo_proyecto.id_tipo');
        $this->db->where(array('proyecto.id_proyecto' => $idProyecto));
        
        $query = $this->db->get()->result_array();

        return $query[0];
    }

    public function getTeamAsigned () {
        // Obtener los usuarios que estan asignados al proyecto actual
    }
}