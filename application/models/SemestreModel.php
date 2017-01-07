<?php  

	/**
	* 
	*/
	class SemestreModel extends CI_Model
	{
		public $id;
        public $periodo;
        public $fecha_inicio;
        public $fecha_fin;

		public function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
        	$query = $this->db->get('semestre');
            return $query->result();
        }

        public function  getBySemestre($id)
        {
        	$this->db->select('*');
            $this->db->from('semestre');
            $this->db->where('id = '.$id);

            $query = $this->db->get();
            if($query->num_rows() > 0 )
            {
                return $query->result();
            }
            return NULL;
        }

        public function save($periodo, $fecha_inicio, $fecha_fin)
        {
        	$this->periodo 		= $periodo;
        	$this->fecha_inicio = $fecha_inicio;
        	$this->fecha_fin 	= $fecha_fin;

        	return $this->db->insert('semestre', $this);
        }

        public function update($id, $periodo, $fecha_inicio, $fecha_fin)
        {
        	$this->id 			= $id;
        	$this->periodo 		= $periodo;
        	$this->fecha_inicio = $fecha_inicio;
        	$this->fecha_fin 	= $fecha_fin;

        	return $this->db->update('semestre', $this, array('id' => $id));
        }
	}