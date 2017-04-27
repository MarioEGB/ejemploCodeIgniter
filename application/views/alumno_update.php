<div> <br> <br>
<p>EDITAR UN ALUMNO</p>
</div>

<div id="formulario">

<font id="errores">
<?php echo validation_errors(); ?>
</font>

<?php echo form_open(base_url("alumnos/actualizar"));

foreach ($alumno as $valor ) {
	$matricula_v=$valor->matricula_alumno;
	$nombre_v=$valor->nombre_alumno;
	$edad_v=$valor->edad_alumno;
	$trimestre_v=$valor->trimestre_alumno;
	$genero_v=$valor->genero_alumno;
	$carrera_v=$valor->fk_id_carrera;
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
				   'placeholder'   => 'Escribe el nombre del alumno',
				   'value'		   => $nombre_v,
				   'maxlength'     => '200',
				   'size'          => '50');

$edad =      array('name'		   => 'edad' ,
			       'id'			   => 'edad',
				   'placeholder'   => 'Escribe la edad del alumno',
				   'value'		   => $edad_v,
				   'maxlength'     => '3',
				   'size'          => '50');

$trimestre = array('name'		   => 'trimestre' ,
				   'id'			   => 'trimestre',
				   'placeholder'   => 'Escribe el trimestre del alumno',
				   'value'		   => $trimestre_v,
				   'maxlength'     => '2',
				   'size'          => '50');

$genero =   array( 1         =>'Masculino',
				   0         =>'Femenino');
$carr=array();

foreach ($carreras as $renglon) {
	$id_carrera=$renglon->id_carrera;
	$nombre_carrera=$renglon->nombre_carrera;
	$carr[$id_carrera]=$nombre_carrera;
}

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
echo form_dropdown('genero', $genero, $genero_v);
echo "<br>"."<br>";
echo form_label('Carrera:','carreras');
echo form_dropdown('carreras', $carr, $carrera_v);
echo "<br>"."<br>";
echo form_submit('Actualizar','Actualizar alumno'); 
form_close() ;


?>
</div>	
</body>
</html>