<div> <br> <br>
<p>BORRAR UN ALUMNO</p>
</div>

<div id="formulario">

<?php echo form_open(base_url("alumnos/borrar_2"));
foreach ($alumno as $valor ) {
	$matricula_v=$valor->matricula_alumno;
	$nombre_v=$valor->nombre_alumno;
	$edad_v=$valor->edad_alumno;
	$trimestre_v=$valor->trimestre_alumno;
	$genero_v=$valor->genero_alumno;
	$carrera_v=$valor->fk_id_carrera;
}
if($genero_v==0){
	$genero_v="FEMENINO";
}else{
	$genero_v="MASCULINO";
}

foreach ($carreras as $renglon) {
	if($renglon->id_carrera===$carrera_v){
		$carrera_v=$renglon->nombre_carrera;
		break 1;
	}
}

$matricula = array('name'		   => 'matricula' ,
				   'id'			   => 'matricula',
				   'placeholder'   => 'Escribe la matricula',
				   'maxlength'     => '10',
				   'value'		   => $matricula_v,
				   'size'          => '50',
				   'readonly'      => 'readonly');

$nombre =    array('name'		   => 'nombre' ,
				   'id'			   => 'nombre',
				   'value'		   => $nombre_v,
				   'maxlength'     => '200',
				   'size'          => '50',
				   'readonly'      => 'readonly');

$edad =      array('name'		   => 'edad' ,
			       'id'			   => 'edad',
				   'value'		   => $edad_v,
				   'maxlength'     => '3',
				   'size'          => '50',
				   'readonly'      => 'readonly');

$trimestre = array('name'		   => 'trimestre' ,
				   'id'			   => 'trimestre',
				   'value'		   => $trimestre_v,
				   'maxlength'     => '2',
				   'size'          => '50',
				   'readonly'      => 'readonly');

$genero =    array('name'		   => 'genero' ,
				   'id'			   => 'genero',
				   'value'		   => $genero_v,
				   'maxlength'     => '10',
				   'size'          => '50',
				   'readonly'      => 'readonly');

$carrera =    array('name'		   => 'carrera' ,
				   'id'			   => 'carrera',
				   'value'		   => $carrera_v,
				   'maxlength'     => '100',
				   'size'          => '50',
				   'readonly'      => 'readonly');

echo form_label('Matricula:','matricula');
echo form_input($matricula);
echo "<br>"."<br>";
echo form_label('Nombre:','nombre');
echo form_input($nombre);
echo "<br>"."<br>";
echo form_label('Edad:','edad');
echo form_input($edad);
echo "<br>"."<br>";
echo form_label('Trimestre:','trimestre');
echo form_input($trimestre);
echo "<br>"."<br>";
echo form_label('Genero:','genero');
echo form_input($genero);
echo "<br>"."<br>";
echo form_label('Carrera:','carreras');
echo form_input($carrera);
echo "<br>"."<br>";
echo form_submit('Borrar','Borrar alumno alumno'); 
form_close() ;
?>