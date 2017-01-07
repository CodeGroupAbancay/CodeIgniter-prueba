<?php 
	/**
	* 
	*/
	class Tarjeta extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('TarjetaModel');
		}
		public function getByAlumno()
		{
			if (isset($_POST['codigo'])) {
				$result = $this->TarjetaModel->getByAlumnoCode($_POST['codigo'])[0];
				if (isset($result)) {
					$data = array(
						'exito' 	=> true, 
						'id'		=> $result->id,
						'codigo'	=> $result->codigo,
						'alumno'	=> $result->alumno,
						'estado' 	=> $result->estado
					);
				} else {
					$data = array('exito' => "", );
				}
			} else {
				$data = array('exito' => "", );
			} 

			$data   = json_encode($data);
			echo $data;
		}

		public function getByTarjeta()
		{
			if (isset($_POST['id'])) {
				$result = $this->TarjetaModel->getByTarjeta($_POST['id'])[0];
				if (isset($result)) {
					$data = array(
						'exito' 	=> true, 
						'id'		=> $result->id,
						'codigo'	=> $result->codigo,
						'alumno'	=> $result->alumno,
						'estado' 	=> $result->estado
					);
				} else {
					$data = array('exito' => "", );
				}
			} else {
				$data = array('exito' => "", );
			} 

			$data   = json_encode($data);
			echo $data;	  
		}

		public function index()
		{
			$data = array(
				'mensaje' => "",
				'class_mensaje' => "error",
				'beneficios'	=>$this->BeneficiosModel->getAll(),
				'codigo'		=> "",
				'alumno'		=> "",
				'fecha_recarga' => "",
				'estado'		=> ""
			);

			$this->load->view('Tarjeta/Registro', $data);
		}


		public function registrar()
		{
			$data = array(
				'mensaje' => "",
				'class_mensaje' => "error",
				'beneficios'	=>$this->BeneficiosModel->getAll(),
				'codigo'		=> "",
				'alumno'		=> "",
				'fecha_recarga' => "",
				'estado'		=> ""
			);

			if(!empty($_POST) && isset($_POST)){
				date_default_timezone_set('America/Lima');
            	$date = date('Y-m-d H:i:s');

            	// falta validar el codigo del estudiante
            	$id_alumno = $this->TarjetaModel->getByAlumno($_POST['alumno'])[0];
            	if (isset($id_alumno)) {
					if ($this->TarjetaModel->save($_POST['codigo'], $id_alumno->id, $date, $_POST['estado'])) {
						$data['mensaje'] 		= "Se Registro Correctamente";
						$data['class_mensaje'] 	= "exito";
						$data['tarjeta'] 		= "";
					} else {
						$data['mensaje'] 		= "Ocurrio un Error al Registrar";
						$data['codigo'] 		= $_POST['codigo'];
						$data['alumno'] 		= $_POST['alumno'];
						$data['estado'] 		= $_POST['estado'];
					}
            	} else {
            		$data['mensaje'] 		= "Error no Existe el Alumno en la Nomina";
            	}

			}
			$this->load->view('Tarjeta/Registro', $data);
		}

		public function modificar()
		{
			$data = array(
				'mensaje' => "",
				'class_mensaje' => "error",
				'beneficios'	=>$this->BeneficiosModel->getAll(),
				'codigo'		=> "",
				'alumno'		=> "",
				'fecha_recarga' => "",
				'estado'		=> ""
			);

			if(!empty($_POST) && isset($_POST)){
				if ($this->TarjetaModel->update($_POST['id'], $_POST['estado'])) {
					$data['mensaje'] 		= "Se Modifico Correctamente";
					$data['class_mensaje'] 	= "exito";
					$data['tarjeta'] = "";
				} else {
					$data['mensaje'] 		= "Ocurrio Un Error al Modificar";
					$data['codigo'] 		= $_POST['codigo'];
					$data['alumno'] 		= $_POST['alumno'];
					$data['estado'] 		= $_POST['estado'];
				}
			}
			$this->load->view('Tarjeta/Registro', $data);
		}
	}