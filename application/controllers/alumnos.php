<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumnos extends CI_Controller {

		public function __construct(){
			parent:: __construct();
			$this->load->model('ejemploModel');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index()
		{
			$datos=['title'=>'Alumnos','style'=>'css/alumnos_get.css'];
			$alumnos['alumnos']=$this->ejemploModel->getAlumnos();
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('alumnos',$alumnos);
		}

		public function add(){
			$datos=['title'=>'añadir','style'=>'css/alumnos_add.css'];
			$carreras['carreras']=$this->ejemploModel->getCarreras();
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('alumno_add',$carreras);
		}

		public function anadir(){
				$this->form_validation->set_rules('matricula','Matricula','callback_matricula_repetida');
				$this->form_validation->set_rules('nombre','Nombre','trim|required');
				$this->form_validation->set_rules('edad','Edad','trim|required|integer|callback_edad_correcta');
				$this->form_validation->set_rules('trimestre','Trimestre','trim|required|integer');
				$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('integer','El campo %s debe ser numerico');
				if(!$this->form_validation->run()){
					$this->add();	
				}
				else{
					$matricula=$this->input->post('matricula');
					$nombre=$this->input->post('nombre');
					$edad=$this->input->post('edad');
					$trimestre=$this->input->post('trimestre');
					$genero=$this->input->post('genero');
					$carrera=$this->input->post('carreras');
					$data=array('matricula_alumno'=>$matricula,
								'nombre_alumno'=>$nombre,
								'edad_alumno'=>$edad,
								'trimestre_alumno'=>$trimestre,
								'genero_alumno'=>$genero,
								'fk_id_carrera'=>$carrera);
					if($this->ejemploModel->inserta_alumno($data)){
						$datos['res']="todo salio bien";
						$this->load->view('pop_add',$datos);
					}else{
						$datos['res']="Algo salio mal intenta de nuevo";
						$this->load->view('pop_add',$datos);
					}
				}
			
		}

		public function edad_correcta($edad){
			$edad=str_replace(' ', '', $edad);
			if($edad==""){
        			 $this->form_validation->set_message('edad_correcta', 'El campo edad no puede estar vacio');
        			 return FALSE;
        		}
			elseif (!is_numeric($edad)) {
        			 $this->form_validation->set_message('edad_correcta', 'La edad debe ser númerica');
        			 return FALSE;
        		}
			elseif($edad>=18 && $edad<120){
				return TRUE;
			}else{
				 $this->form_validation->set_message('edad_correcta', 'La edad debe de ser mayor o igual a 18 y menor a 120');
				 return FALSE;
			}
		}

		public function matricula_repetida($mat)
        {
        		
        		$mat=str_replace(' ', '', $mat);
        		
        		if($mat==""){
        			 $this->form_validation->set_message('matricula_repetida', 'La matricula no puede estar vacia');
        			 return FALSE;
        		}elseif (!is_numeric($mat)) {
        			 $this->form_validation->set_message('matricula_repetida', 'La matricula debe ser númerica');
        			 return FALSE;
        		}

                elseif ($this->ejemploModel->repeated_mat($mat))
                {
                        $this->form_validation->set_message('matricula_repetida', 'La matricula ya se encuentra en la base de datos');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }


		public function upd_mat(){
			$datos=['title'=>'actualizar','style'=>'css/alumnos_add.css'];
			$alumnos['alumnos']=$this->ejemploModel->getMatriculas();
			$alumnos['frase']="EDITAR UN ALUMNO";
			$alumnos['url']="alumnos/update";
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('alumno_upd_mat',$alumnos);
		}

		public function update(){
			$datos=['title'=>'actualizar','style'=>'css/alumnos_add.css'];
			$id=$this->input->post('matricula');
			$alumno['alumno']=$this->ejemploModel->getAlumno($id);
			$alumno['carreras']=$this->ejemploModel->getCarreras();
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('alumno_update',$alumno);
		}

		public function actualizar(){
				$this->form_validation->set_rules('nombre','Nombre','trim|required');
				$this->form_validation->set_rules('edad','Edad','trim|required|integer|callback_edad_correcta');
				$this->form_validation->set_rules('trimestre','Trimestre','trim|required|integer');
				$this->form_validation->set_message('required','El campo %s es obligatorio');
				$this->form_validation->set_message('integer','El campo %s debe ser numerico');
				if(!$this->form_validation->run()){
					$this->update();	
				}
				else{
					$matricula=$this->input->post('matricula');
					$nombre=$this->input->post('nombre');
					$edad=$this->input->post('edad');
					$trimestre=$this->input->post('trimestre');
					$genero=$this->input->post('genero');
					$carrera=$this->input->post('carreras');
					$data=array('matricula_alumno'=>$matricula,
								'nombre_alumno'=>$nombre,
								'edad_alumno'=>$edad,
								'trimestre_alumno'=>$trimestre,
								'genero_alumno'=>$genero,
								'fk_id_carrera'=>$carrera);
					if($this->ejemploModel->actualiza_alumno($data)){
						$datos['res']="Datos modificados exitosamente";
						$this->load->view('pop_update',$datos);
					}else{
						$datos['res']="Algo salio mal intenta de nuevo";
						$this->load->view('pop_update',$datos);	
					}
				}	
		}		

		public function delete(){
			$datos=['title'=>'eliminar','style'=>'css/alumnos_add.css'];
			$alumnos['alumnos']=$this->ejemploModel->getMatriculas();
			$alumnos['frase']="BORRAR UN ALUMNO";
			$alumnos['url']="alumnos/borrar";
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('alumno_upd_mat',$alumnos);
		}

		public function borrar(){
			$datos=['title'=>'actualizar','style'=>'css/alumnos_add.css'];
			$id=$this->input->post('matricula');
			$alumno['alumno']=$this->ejemploModel->getAlumno($id);
			$alumno['carreras']=$this->ejemploModel->getCarreras();
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('alumno_delete',$alumno);
		}

		public function borrar_2(){
			$id=$this->input->post('matricula');
			if($this->ejemploModel->eliminar($id)){
				$datos['res']="Alumno eliminado exitosamente";
				$this->load->view('pop_delete',$datos);	
			}else{
				$datos['res']="Algo salio mal intentalo de nuevo";
				$this->load->view('pop_delete',$datos);
			}
		}		
	}
?>