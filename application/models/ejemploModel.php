<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');

class ejemploModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}


function getAlumnos(){
	$this->db->select('matricula_alumno,nombre_alumno,edad_alumno,trimestre_alumno');
	$query = $this->db->get('alumnos');
	if($query->num_rows()>0){
	return $query->result();
	}else{
		return false;
	}
}

function getCarreras(){
	$query = $this->db->get('carrera');
	if($query->num_rows()>0){
	return $query->result();
	}else{
		return false;
	}
}



function getUeas(){
	$query = $this->db->get('ueas');
	if($query->num_rows()>0){
	return $query->result();
	}else{
		return false;
	}
}


function repeated_mat($mat){
	$this->db->where('matricula_alumno', $mat);
	$query= $this->db->get('alumnos');
	if(empty($query->result())){
		return FALSE;
	}else{
		return TRUE;
	}
}


function inserta_alumno($data){
	$query=$this->db->insert('alumnos',$data);
	return $query;
}

function getMatriculas(){
	$this->db->select('matricula_alumno');
	$query = $this->db->get('alumnos');
	if($query->num_rows()>0){
	return $query->result();
	}else{
		return false;
	}
}

function getAlumno($id){
	$this->db->where('matricula_alumno',$id);
	$query = $this->db->get('alumnos');
	if($query->num_rows()>0){
	return $query->result();
	}else{
		return false;
	}
}

function eliminar($id){
	$this->db->where('matricula_alumno',$id);
	$query=$this->db->delete('alumnos');
	return $query;
}

function actualiza_alumno($data){
	$this->db->where('matricula_alumno',$data['matricula_alumno']);
	$query=$this->db->update('alumnos',$data);
	return $query;
}




}

?>	