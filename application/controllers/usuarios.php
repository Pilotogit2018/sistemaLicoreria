<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		
		if($this->session->userdata('login'))
		{
			redirect('usuarios/panel','refresh');
		}
		else{
			$data['mensaje']=$this->uri->segment(3);//
			$this->load->view('logins/login',$data);//vista del login
		}
		
	}


	public function validarUsuario()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta = $this->usuario_model->validar($login, $password);

		if($consulta->num_rows()>0)
		{
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('idusuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->nombreUsuario);
				$this->session->set_userdata('rol',$row->rol);
				$this->session->set_userdata('estado',$row->estado);//nuevo
				redirect('usuarios/panel','refresh');
			}
			
		}
		else{
			//en caso de que no sea un usuario no valido se le envia el parametro 1
			redirect('usuarios/index/1','refresh');
		}
	}

	public function panel()
	{
/*
		if($this->session->userdata('estado')=='1')
        {
            //cargo panel admin
            redirect('inicio/index','refresh');
        }
        if($this->session->userdata('estado')=='2')
        {
            //cargo panel guest
            redirect('usuarios/modificar1','refresh');
        }
        
        else
        {
            redirect('usuarios/index/2','refresh');
        }
*/

		
		if($this->session->userdata('estado')=='1')
		{
			
			$tipo = $this->session->userdata('rol');//variable tipo es igual a tipo
			if($tipo =='administrador')//si el tipo es igual a rol
			{
				//redireccionar al usuarios correctamente autentificado
				redirect('inicio/index','refresh');//al controlador categoria metodo indexLte(crear otra vista para que me lleve al dashbord)
			}
			else
			{
				redirect('empleado/indexEmpleado','refresh');//necesario crear otro controlador para empleado y mandar a un metodo
			}
			
		}
		else
		{
			if($this->session->userdata('estado')=='2')
			{
				redirect('usuarios/modificar1','refresh');
			}
			else{
				redirect('usuarios/index/2','refresh');//carga el login en caso de que no haya sesion abierta
			}
		
		}


		/* */
	}

	

	public function listasUsers()
	{
		if($this->session->userdata('login'))
		{
			$lista=$this->usuario_model->listaUsuario();
			$data['usuario']=$lista;
	
			$this->load->view('cuerpoLte/cabecera');
			$this->load->view('cuerpoLte/menuSuperior');
			$this->load->view('cuerpoLte/menuLateral');
			$this->load->view('administrador/vistaUsuario/lista_usuarios',$data);//vista de la categoria
			$this->load->view('cuerpoLte/pie');
		}
		else{
			$data['mensaje']=$this->uri->segment(3);//
			$this->load->view('logins/login',$data);//vista del login
		}
	}


	/*para ir al formulario de agregar */
	public function agregarUserLte()
	{//mostrar formulario para agregar categoria
		$this->load->view('cuerpoLte/cabecera');
		$this->load->view('cuerpoLte/menuSuperior');
		$this->load->view('cuerpoLte/menuLateral');
		$this->load->view('administrador/vistaUsuario/formularios/formUsuario');
		$this->load->view('cuerpoLte/pie');
	}

	public function agregarbd()
	{  
		 //atributo bdd nombre   //formulario=NAME	
		 $data['nombre']=$_POST['NAME'];
		 $data['primerApellido']=$_POST['apellido1'];//DATA ALmacena los datos y es enviado
		 $data['segundoApellido']=$_POST['apellido2'];
		 $data['carnetIdentidad']=$_POST['CI'];
		 $data['rol']=$_POST['tipo'];
		 $data['direccion']=$_POST['mapa'];
		 $data['telefono']=$_POST['celular'];
		
		 
		 
		 //para usuario y contraseña

		$user1=$_POST['NAME'];
		$user2=$_POST['CI'];
		$user3=$_POST['apellido1'];
		$usuario = $user1[0].$user2.$user3[0];
		$data['nombreUsuario']=$usuario;

		$contra1=$_POST['CI'];
		$contra2=$_POST['NAME'];
		$password = md5($contra2[0].$contra1);
		$data['contrasenia']=$password;

		$data['estado']='2';//existe algun error por el estado
	
		$this->usuario_model->agregarUsuario($data);//los datos nombre y descricion de mandan a categoria_model luego al metodo agregarCategoria con variable data
		redirect('usuarios/listasUsers','refresh');//salir al login pensamiento
	}


	public function modificar1()// cambiar nombre de la funcion cambiarContra()
    {
        $idusuario=$this->session->userdata('idusuario');
        $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);

            
        $this->load->view('logins/logincambiar',$data);              

    }

    public function modificar2()//cambiar nombre de la funcion confirmarModicacionContra()
    {
        $idusuario=$_POST['idusuario'];

        $data['contrasenia']=md5($_POST['Password']);
        $data['estado']='1';
        
        $this->usuario_model->modificarusuario($idusuario,$data);
        redirect('inicio/index','refresh');
    }

	//FUNCION MOFIFICAR NECESARIO RECUPERADATOSCATEGORIA
	public function modificar()
	{
		$idusuario=$_POST['idusuario'];
		$data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
	
		$this->load->view('administrador/cuerpoLte/cabecera');
		$this->load->view('administrador/cuerpoLte/menuSuperior');
		$this->load->view('administrador/cuerpoLte/menuLateral');
		$this->load->view('administrador/vistaUsuario/formularios/modificar_usuario',$data);//vista de la categor
		$this->load->view('administrador/cuerpoLte/pie');
	}

	//FUNCION DE MOODIFICAR EL REGISTRO NECESARIOS
	public function modificarbd()
	{
		$idusuario=$_POST['idusuario'];//se recupera id necesario para cambiar contraseña
		$data['nombre']=$_POST['NAME'];
		$data['primerApellido']=$_POST['apellido1'];//DATA ALmacena los datos y es enviado
		$data['segundoApellido']=$_POST['apellido2'];
		$data['carnetIdentidad']=$_POST['CI'];
		$data['rol']=$_POST['tipo'];
		$data['direccion']=$_POST['mapa'];
		$data['telefono']=$_POST['celular'];
		
		$this->usuario_model->modificarusuario($idusuario,$data);

		redirect('usuarios/listasUsers','refresh');
	}


	//SOFTDELETE DESHABILITAR
    public function deshabilitarbd()
    {
        $idusuario=$_POST['idusuario'];
        $data['estado']=0;//estado es similiar a habilitado 
            
        $this->usuario_model->modificarusuario($idusuario,$data);//la funcion modificarcategoria es reutilizada por deshabilitarbd

        redirect('usuarios/listasUsers','refresh');
    }

	public function logout()
	{
		$this->session->sess_destroy();//mata la variables de session que se crearon
		redirect('usuarios/index/3','refresh');
	}
	

}
