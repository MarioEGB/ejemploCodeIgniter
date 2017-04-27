<div><br></div>
<table>
	<tr>
		<th>id carrera</th>
		<th>nombre carrera</th>
		<th>duracion carrera  (años)</th>
	</tr>
	<?php foreach ($carreras as $renglon) { ?>
			<tr>
				<td><?= $renglon->id_carrera; ?></td>
				<td><?= $renglon->nombre_carrera ;?></td>
				<td><?= $renglon->duracion_carrera ;?></td>
			</tr>
	<?php } ?>
</table>
</body>
</html>