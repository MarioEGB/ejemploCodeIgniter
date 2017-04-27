<div> <br> <br>
<p>AÑADIR UN ALUMNO NUEVO</p>
</div>

<div id="formulario">


<font id="errores">
<?php echo validation_errors(); ?>
</font>

<?php echo form_open(base_url("alumnos/anadir"));

$matricula = array('name'		   => 'matricula' ,
				   'placeholder'   => 'Escribe la matricula',
				   'maxlength'     => '10',
				   'size'          => '50');

$nombre =    array('name'		   => 'nombre' ,
				   'placeholder'   => 'Escribe el nombre del alumno',
				   'maxlength'     => '200',
				   'size'          => '50');

$edad =      array('name'		   => 'edad' ,
				   'placeholder'   => 'Escribe la edad del alumno',
				   'maxlength'     => '3',
				   'size'          => '50');

$trimestre = array('name'		   => 'trimestre' ,
				   'placeholder'   => 'Escribe el trimestre del alumno',
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

echo form_input($matricula);
echo "<br>"."<br>";
echo form_input($nombre);
echo "<br>"."<br>";
echo form_input($edad);
echo "<br>"."<br>";
echo form_input($trimestre);
echo "<br>"."<br>";
echo form_dropdown('genero', $genero, 'Masculino');
echo "<br>"."<br>";
echo form_dropdown('carreras', $carr, $carr[1]);
echo "<br>"."<br>";
echo form_submit('Agregar','Añadir alumno'); 
form_close() ;
?>

</div>	
</body>
</html>