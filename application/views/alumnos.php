<div><br></div>
<table>
	<tr>
		<th>matricula</th>
		<th>nombre</th>
		<th>edad</th>
		<th>trimestre</th>
	</tr>
	<?php foreach ($alumnos as $renglon) { ?>
			<tr>
				<td><?= $renglon->matricula_alumno; ?></td>
				<td><?= $renglon->nombre_alumno; ?></td>
				<td><?= $renglon->edad_alumno; ?></td>
				<td><?= $renglon->trimestre_alumno; ?></td>
			</tr>
	<?php } ?>
</table>


</body>
</html>