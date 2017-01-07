<?php 
    /**
    * 
    */
	class TarjetaModel extends CI_Model
	{
		public $id;
        public $codigo;
        public $alumno_id;
        public $fecha_emision;
        public $estado;

		public function __construct()
        {
            parent::__construct();
        }

        public function getByAlumnoCode($code_alumno)
        {
            $this->db->select("ta.id, ta.codigo, concat(al.nombre,' ', al.apellido) as alumno, ta.estado");
            $this->db->from('tarjeta ta');
            $this->db->join('alumno al ', 'ta.alumno_id = al.id');
            $this->db->where("ta.estado = '1' and  al.codigo = ".$code_alumno);
            $query = $this->db->get();
            if($query->num_rows() > 0 )
            {
                return $query->result();
            }
            return NULL;
        }

        public function getByAlumno($code_alumno)
        {
            $this->db->select("al.id, al.nombre, al.apellido");
            $this->db->from('alumno al');
            $this->db->where('al.codigo = '.$code_alumno);
            $query = $this->db->get();
            if($query->num_rows() > 0 )
            {
                return $query->result();
            }
            return NULL;
        }
		
        public function getByTarjeta($id_tarjeta)
        {
            $this->db->select("ta.id, ta.codigo, concat(al.nombre,' ', al.apellido) as alumno, ta.estado");
            $this->db->from('tarjeta ta');
            $this->db->join('alumno al ', 'ta.alumno_id = al.id');
            $this->db->where('ta.codigo = '.$id_tarjeta);
            $query = $this->db->get();
            if($query->num_rows() > 0 )
            {
                return $query->result();
            }

            return NULL;
        }

		public function save($codigo, $alumno_id, $fecha_emision, $estado)
        {
        	$this->codigo          = $codigo;
        	$this->alumno_id       = $alumno_id;
            $this->fecha_emision   = $fecha_emision;
        	$this->estado          = $estado;

            return $this->db->insert('tarjeta', $this);
        }

        public function update($id,  $estado)
        {
            $data = array(
                'estado' => $estado
            );
            $this->db->where('id', $id);
            return $this->db->update('tarjeta', $data);

        	// $this->id 	           = $id;
         //    $this->estado          = $estado;

         //    return $this->db->update('tarjeta', $this, array('id' => $id));
        }

	}
