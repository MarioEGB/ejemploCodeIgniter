<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

		public function __construct(){
			parent:: __construct();
		}

		public function index()
		{
			$datos=['title'=>'home','style'=>'css/home_f.css'];
			$this->load->view('header',$datos);
			$this->load->view('home_view');
			$this->load->view('home_foot'); 
		}


	}
?>