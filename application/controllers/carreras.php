<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carreras extends CI_Controller {

		public function __construct(){
			parent:: __construct();
			$this->load->model('ejemploModel');
		}

		public function index()
		{
			$datos=['title'=>'Carreras','style'=>'css/alumnos_get.css'];
			$carreras['carreras']=$this->ejemploModel->getCarreras();
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('Carreras',$carreras);
		}

		

	}
?>