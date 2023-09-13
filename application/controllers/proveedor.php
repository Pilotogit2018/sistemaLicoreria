<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {
   
    public function lista()
	{
		//AÑADIR AQUI EL LOGIN
		if($this->session->userdata('login'))
		{
			$lista=$this->proveedor_model->listaProveedores();
			$data['proveedor']=$lista;

			$this->load->view('administrador/cuerpoLte/cabecera');
			$this->load->view('administrador/cuerpoLte/menuSuperior');
			$this->load->view('administrador/cuerpoLte/menuLateral');
			$this->load->view('administrador/vistaProveedor/proveedor_listLte',$data);//vista de la categoria
			$this->load->view('administrador/cuerpoLte/pie');
		}
		else{
			$data['mensaje']=$this->uri->segment(3);//
			$this->load->view('logins/login',$data);//vista del login
		}
	}

    /*para ir al formulario de agregar */
	public function agregarProvLte()
	{//mostrar formulario para agregar categoria
		$this->load->view('administrador/cuerpoLte/cabecera');
		$this->load->view('administrador/cuerpoLte/menuSuperior');
		$this->load->view('administrador/cuerpoLte/menuLateral');
		$this->load->view('administrador/vistaProveedor/formularios/formProveedor');
		$this->load->view('administrador/cuerpoLte/pie');
	}

    //CRUD METODO INSERTAR NECESARIO
	public function agregarbd()
	{  //atributo bdd nombre   //formulario=NAME
		$data['nombre']=$_POST['NAME'];
		$data['direccion']=$_POST['DESCRIPCION'];//DATA ALmacena los datos y es enviado
        $data['telefono']=$_POST['CELULAR'];

		$this->proveedor_model->agregarProveedor($data);//los datos nombre y descricion de mandan a categoria_model luego al metodo agregarCategoria con variable data
		
		redirect('proveedor/lista','refresh');
	
	}

    //FUNCION MOFIFICAR NECESARIO RECUPERADATOSCATEGORIA
	public function modificar()
	{
		$idproveedor=$_POST['idproveedor'];
		$data['infoProveedor']=$this->proveedor_model->recuperarProveedor($idproveedor);
	
		$this->load->view('administrador/cuerpoLte/cabecera');
		$this->load->view('administrador/cuerpoLte/menuSuperior');
		$this->load->view('administrador/cuerpoLte/menuLateral');
		$this->load->view('administrador/vistaProveedor/formularios/modificar_proveedor',$data);//vista de la categor
		$this->load->view('administrador/cuerpoLte/pie');

	}

	//FUNCION DE MOODIFICAR EL REGISTRO NECESARIOS
	public function modificarbd()
	{
		$idproveedor=$_POST['idproveedor'];//se recupera id necesario para cambiar contraseña
		$data['nombre']=$_POST['NAME'];
		$data['direccion']=$_POST['DIRECCION'];
        $data['telefono']=$_POST['CELULAR'];
		
		$this->proveedor_model->modificarProveedor($idproveedor,$data);

		redirect('proveedor/lista','refresh');
	}
	

     //SOFTDELETE DESHABILITAR
     public function deshabilitarbd()
     {
         $idproveedor=$_POST['idproveedor'];
         $data['estado']=0;//estado es similiar a habilitado 
             
         $this->proveedor_model->modificarProveedor($idproveedor,$data);//la funcion modificarcategoria es reutilizada por deshabilitarbd
 
         redirect('proveedor/lista','refresh');
     }
 
     //para ir a ver la lista de deshabilitado o eliminados SOFTDELETE
     public function deshabilitados()
     {
         $lista=$this->proveedor_model->listaProveedorDeshabi();
         $data['proveedor']=$lista;
 
 
         $this->load->view('administrador/cuerpoLte/cabecera');
         $this->load->view('administrador/cuerpoLte/menuSuperior');
         $this->load->view('administrador/cuerpoLte/menuLateral');
         $this->load->view('administrador/vistaProveedor/proveedoresEliminados',$data);//vista de la categoria
         $this->load->view('administrador/cuerpoLte/pie');
     }
 
     //volver a la lista de habilitados y cambiar estado a 1
     public function habilitarbd()
     {
         $idproveedor=$_POST['idproveedor'];
         $data['estado']=1;//estado es similiar a habilitado 
         
         $this->proveedor_model->modificarProveedor($idproveedor,$data);//la funcion modificarcategoria es reutilizada por deshabilitarbd
 
         redirect('proveedor/deshabilitados','refresh');
     }
     
 



}