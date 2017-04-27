<div> <br> <br>
<p><?=$frase?></p>
</div>

<div id="formulario">

<?php echo form_open(base_url($url));
$mat=array();
foreach ($alumnos as $renglon) {
	$matricula=$renglon->matricula_alumno;
	$mat[$matricula]=$matricula;
}

echo form_label('Selecciona la matricula del alumno a modificar:  ','matricula');

echo form_dropdown('matricula', $mat, $mat[1212]);
echo "<br>"."<br>";
echo form_submit('Cargar','Cargar datos'); 
form_close() ;

?>
</div>	
</body>
</html>