
	<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>


<body>
<h1> Adicione produtos</h1>
	
<?php 	
		require('conexao.php');
			$userquery = mysqli_query ($conn, "SELECT * FROM tbProdutos") or die ("the  query could not be completed. Try again later!");

      if (mysqli_num_rows($userquery) <= 0) {

		echo "Adicione novos produtos <br/>";
		echo "<a href='cadProd.php'>Cadastre novos produtos</a>";
	die();
	}
	
?>
<table>
	<tr>
		<th>Medicamento</th>
		<th>quantidade</th>
		<th>foto</th>
		<th>Adicionar</th>
		
	</tr>
	<?php

	$i=0;
	while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
	
		$nome = $row['nomeRem'];
		$quant = $row['quant'];
		$arquivo = $row['arquivo'];
		$id = $row['idRem'];
	
	
				echo "	<tr>";
				
				echo "<th>". $nome ."</th>";

				
				echo "<th>" .$quant. "</th>";

				echo "<th><img src=" . $arquivo. "/></th>"; 

				echo "<form method='post' action='addProdcod.php?$id'>";

				echo "<th><input type='text'  onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='novaQntd'/> </th>";

				
						

				echo "<th><input type= 'submit' value='Enviar' /></th></form>";
			
				echo " </tr>";
		
		 

}
 ?>
</table>
<a href="cadProd.php">Cadastre novos produtos</a>

</body>
</html>
