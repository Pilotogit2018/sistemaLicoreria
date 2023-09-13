<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function index()
	{
		//AÑADIR AQUI EL LOGIN
		if($this->session->userdata('login'))
		{
			$lista=$this->categoria_model->listaCategoria();
			$data['categoria']=$lista;

			$this->load->view('cuerpoLte/cabecera');
			$this->load->view('cuerpoLte/menuSuperior');
			$this->load->view('cuerpoLte/menuLateral');
			$this->load->view('administrador/vistaCategoria/categoria_listLte',$data);//vista de la categoria
			$this->load->view('cuerpoLte/pie');
		}
		else{
			$data['mensaje']=$this->uri->segment(3);//
			$this->load->view('logins/login',$data);//vista del login
		}
	}

	/*para ir al formulario de agregar */
	public function agregarCatLte()
	{//mostrar formulario para agregar categoria
		$this->load->view('cuerpoLte/cabecera');
		$this->load->view('cuerpoLte/menuSuperior');
		$this->load->view('cuerpoLte/menuLateral');
		$this->load->view('administrador/vistaCategoria/formularios/formCategory');
		$this->load->view('cuerpoLte/pie');
	}

	//CRUD METODO INSERTAR NECESARIO
	public function agregarbd()
	{  //atributo bdd nombre   //formulario=NAME
		$data['nombre']=$_POST['NAME'];
		$data['descripcion']=$_POST['DESCRIPCION'];//DATA ALmacena los datos y es enviado

		$this->categoria_model->agregarCategoria($data);//los datos nombre y descricion de mandan a categoria_model luego al metodo agregarCategoria con variable data
		
		redirect('categoria/index','refresh');
	
	}

	//FUNCION MOFIFICAR NECESARIO RECUPERADATOSCATEGORIA
	public function modificar()
	{
		$idcategoria=$_POST['idcategoria'];
		$data['infoCategoria']=$this->categoria_model->recuperarCategoria($idcategoria);
	
		$this->load->view('cuerpoLte/cabecera');
		$this->load->view('cuerpoLte/menuSuperior');
		$this->load->view('cuerpoLte/menuLateral');
		$this->load->view('administrador/vistaCategoria/formularios/modificar_categoria',$data);//vista de la categor
		$this->load->view('cuerpoLte/pie');
	}

	//FUNCION DE MOODIFICAR EL REGISTRO NECESARIOS
	public function modificarbd()
	{
		$idcategoria=$_POST['idcategoria'];//se recupera id necesario para cambiar contraseña
		$data['nombre']=$_POST['NAME'];
		$data['descripcion']=$_POST['DESCRIPCION'];
		
		$this->categoria_model->modificarcategoria($idcategoria,$data);

		redirect('categoria/index','refresh');
	}
	
	
    //SOFTDELETE DESHABILITAR
    public function deshabilitarbd()
    {
        $idcategoria=$_POST['idcategoria'];
        $data['estado']=0;//estado es similiar a habilitado 
            
        $this->categoria_model->modificarcategoria($idcategoria,$data);//la funcion modificarcategoria es reutilizada por deshabilitarbd

        redirect('categoria/index','refresh');
    }

	//para ir a ver la lista de deshabilitado o eliminados SOFTDELETE
	public function deshabilitados()
	{
        $lista=$this->categoria_model->listaCategoriaDeshabi();
        $data['categoria']=$lista;


		$this->load->view('cuerpoLte/cabecera');
		$this->load->view('cuerpoLte/menuSuperior');
		$this->load->view('cuerpoLte/menuLateral');
		$this->load->view('administrador/vistaCategoria/categoriasEliminadas',$data);//vista de la categoria
		$this->load->view('cuerpoLte/pie');
	}

	//volver a la lista de habilitados y cambiar estado a 1
	public function habilitarbd()
	{
		$idcategoria=$_POST['idcategoria'];
		$data['estado']=1;//estado es similiar a habilitado 
		
		$this->categoria_model->modificarcategoria($idcategoria,$data);//la funcion modificarcategoria es reutilizada por deshabilitarbd

		redirect('categoria/deshabilitados','refresh');
	}

}
