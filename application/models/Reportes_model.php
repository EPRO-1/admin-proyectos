<?php
class Reportes_model extends CI_Model {

    public function __construct () {
        $this->load->database();
        $this->load->helper('url');
    }

    public function proyecto ($idProyecto) {
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
}