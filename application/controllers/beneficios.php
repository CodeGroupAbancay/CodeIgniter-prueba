<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* 
	*/
	class Beneficios extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function getBeneficios()
		{
			if (isset($_POST['id'])) {
				$result = $this->BeneficiosModel->getBy($_POST['id'])[0];
				$data = array(
					'exito' 	=> true,
					'id' 		=> $result->id,
					'nombre' 	=> $result->nombre,
					'precio'	=> $result->precio,
					'estado' 	=> $result->estado 
				);
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
				'beneficios'	=>$this->BeneficiosModel->getAll()
			);

			$this->load->view('Beneficio/Insert', $data);
		}


		public function registrar()
		{

			$data = array(
				'mensaje' => "",
				'class_mensaje' => "error",
				'beneficios'	=>$this->BeneficiosModel->getAll()
			);

			if(!empty($_POST) && isset($_POST))
			{
				if ($this->BeneficiosModel->save($_POST['nombre'], $_POST['precio'], $_POST['estado'])) {
					$data['mensaje'] = "Se Inserto Correctamente";
					$data['beneficios'] = $this->BeneficiosModel->getAll();
				} else {
					$data['mensaje'] = "Ocurrio un Error al Insertar";
					$data['nombre'] = $_POST['nombre'];
					$data['precio'] = $_POST['precio'];
					$data['estado'] = $_POST['estado'];
				}
			}

			$this->load->view('Beneficio/Insert', $data);
		}

		public function modificar()
		{
			$data = array(
				'mensaje' => "",
				'class_mensaje' => "error",
				'beneficios' => $this->BeneficiosModel->getAll()
			);
			if(!empty($_POST) && isset($_POST))
			{
				if ($this->BeneficiosModel->update($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['estado'])) {
					$data['mensaje'] = "Se modifico correctamente";
					$data['beneficios'] = $this->BeneficiosModel->getAll();
				} else {
					$data['mensaje'] = "Ocurrio un Error al Modificar";
				}
			}

			$this->load->view('Beneficio/Insert', $data);
		}
	}
