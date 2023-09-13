<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {
   
    public function indexEmpleado()
	{
		$this->load->view('empleado/cuerpoLte/cabecera');
		$this->load->view('empleado/cuerpoLte/menuSuperior');
		$this->load->view('empleado/cuerpoLte/menuLateral');
		$this->load->view('empleado/cuerpoLte/principal');//vista de la categor
		$this->load->view('empleado/cuerpoLte/pie');
	}

     
 



}