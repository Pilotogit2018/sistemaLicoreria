<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{

		if($this->session->userdata('login'))
		{
			$this->load->view('cuerpoLte/cabecera');
			$this->load->view('cuerpoLte/menuSuperior');
			$this->load->view('cuerpoLte/menuLateral');
			$this->load->view('index/principal');
			$this->load->view('cuerpoLte/pie');
		}
		else{
			$data['mensaje']=$this->uri->segment(3);//
			$this->load->view('logins/login',$data);//vista del login
		}

		
	}
}