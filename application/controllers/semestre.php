<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Semestre extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('SemestreModel');

		}

		public function index()
		{
			$data = array(
				'mensaje' => "", 
				'class_mensaje' => "error",
				'periodos'		=> $this->SemestreModel->getAll(),
				'periodo'		=> "",
				'fechainicio'	=> "",
				'fechafin'		=> ""
			);

			$this->load->view('Semestre/Registro', $data);
		}

		public function getBySemestre()
		{
			if (isset($_POST['id'])) {
				$result = $this->SemestreModel->getBySemestre($_POST['id'])[0];
				if (isset($result)) {
					$data = array(
						'exito' 		=> true, 
						'id'			=> $result->id,
						'periodo' 		=> $result->periodo,
						'fechainicio' 	=> $result->fecha_inicio,
						'fechafin'	  	=> $result->fecha_fin 
					);
				} else {
					$data = array('exito' => "", );
				}

				$data   = json_encode($data);
				echo $data;	  
			}
		}
		
		public function registrar()
		{
			$data = array(
				'mensaje' => "", 
				'class_mensaje' => "error",
				'periodos'		=> $this->SemestreModel->getAll(),
				'periodo'		=> "",
				'fechainicio'	=> "",
				'fechafin'		=> ""
			);

			if(!empty($_POST) && isset($_POST))
			{
				if ($this->SemestreModel->save($_POST['periodo'], $_POST['fechainicio'], $_POST['fechafin'])) {
					$data['mensaje'] 		= "Se Inserto Correctamente";
					$data['class_mensaje'] 	= "exito";
					$data['periodos']		= $this->SemestreModel->getAll();
				} else {
					$data['mensaje'] 		= "Se Inserto Correctamente";
					$data['periodo'] 		= $_POST['periodo'];
					$data['fechainicio'] 	= $_POST['fechainicio'];
					$data['fechafin'] 		= $_POST['fechafin'];
					$data[''] = $_POST[''];
				}
			}

			$this->load->view('Semestre/Registro', $data);
		}

		public function modificar()
		{
			$data = array(
				'mensaje' => "", 
				'class_mensaje' => "error",
				'periodos'		=> $this->SemestreModel->getAll(),
				'periodo'		=> "",
				'fechainicio'	=> "",
				'fechafin'		=> ""
			);

			if(!empty($_POST) && isset($_POST))
			{
				if ($this->SemestreModel->update($_POST['id'], $_POST['periodo'], $_POST['fechainicio'], $_POST['fechafin'])) {
					$data['mensaje'] 		= "Se Modifico Correctamente";
					$data['class_mensaje'] 	= "exito";
					$data['periodos']		= $this->SemestreModel->getAll();
				} else {
					$data['mensaje'] 		= "Ocurrio un Error al Modificar";
					$data['periodo'] 		= $_POST['periodo'];
					$data['fechainicio'] 	= $_POST['fechainicio'];
					$data['fechafin'] 		= $_POST['fechafin'];
					$data[''] = $_POST[''];
				}
			}

			$this->load->view('Semestre/Registro', $data);
		}
	}