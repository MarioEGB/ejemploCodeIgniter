<div><br></div>
<table>
	<tr>
		<th>id uea</th>
		<th>nombre uea</th>
		<th>creditos uea</th>
	</tr>
	<?php foreach ($uea as $renglon) { ?>
			<tr>
				<td><?= $renglon->id_uea; ?></td>
				<td><?= $renglon->nombre_uea ;?></td>
				<td><?= $renglon->creditos_uea ;?></td>
			</tr>
	<?php } ?>
</table>
</body>
</html>