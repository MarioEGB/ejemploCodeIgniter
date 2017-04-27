<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ueas extends CI_Controller {

		public function __construct(){
			parent:: __construct();
			$this->load->model('ejemploModel');
		}

		public function index()
		{
			$datos=['title'=>'Ueas','style'=>'css/alumnos_get.css'];
			$ueas['uea']=$this->ejemploModel->getUeas();
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('Ueas',$ueas);
		}

		

	}
?>