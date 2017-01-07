<?php 
	
	/**
	* 
	*/
    
	class BeneficiosModel extends CI_Model
	{
		
		public $id;
        public $nombre;
        public $precio;
        public $estado;

		public function __construct()
        {
            parent::__construct();
        }

        public function getBy($id)
        {
            $this->db->select('*');
            $this->db->from('beneficios be');
            $this->db->where('be.id = '.$id);

            $query = $this->db->get();
            if($query->num_rows() > 0 )
            {
                return $query->result();
            }

            return NULL;
        }
		
		public function getAll()
		{
            $query = $this->db->get('beneficios');
            return $query->result();
		}
		
		public function save($nombre, $precio, $estado)
        {
        	$this->nombre = $nombre;
        	$this->precio = $precio;
        	$this->estado = $estado;

            return $this->db->insert('beneficios', $this);
        }

        public function update($id, $nombre, $precio, $estado)
        {
        	$this->id 	  = $id;
            $this->nombre = $nombre;
        	$this->precio = $precio;
        	$this->estado = $estado;

            return $this->db->update('beneficios', $this, array('id' => $id));
        }
	}