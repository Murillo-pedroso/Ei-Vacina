
	<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>


<body>
<h1> Adicione produtos</h1>
	
<?php 	
		require('conexao.php');
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistorico") or die ("the  query could not be completed. Try again later!");

      if (mysqli_num_rows($userquery) <= 0) {

		echo "Não existe um histórico ainda! <br/>";
		echo "<a href='cadProd.php'>Cadastre novos produtos</a>";
	die();
	}
	
?>
<h1>Histórico geral</h1>


<table>
	<tr>
		<th>Nome do medicamento</th>
		<th>Quantidade anterior</th>
		<th>Quantidade</th>
		<th>Nova quantidade</th>
		<th>Data da entrega/retirada</th>
		
	</tr>
	<?php

	$i=0;
	while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
	
		$nome = $row['nome'];
		$aquant = $row['aQuant'];
		$quant = $row['quant'];
		$nQuant = $row['nQuant'];
		$data = $row['datau'];
		$data = date('d/m/Y',  strtotime($data));
	
				echo "	<tr>";
				
				echo "<th>". $nome ."</th>";

				
				echo "<th>" .$aquant. "</th>";

				echo "<th>".$quant."</th>"; 
				echo "<th>".$nQuant."</th>"; 
				echo "<th>".$data."</th>"; 		
				echo " </tr>";
		
		 

}
 ?>
</table>
<?php 	
		require('conexao.php');
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent") or die ("the  query could not be completed. Try again later!");

      if (mysqli_num_rows($userquery) <= 0) {

		echo "Não existe um histórico de entrada ainda! <br/>";
		echo "<a href='cadProd.php'>Cadastre novos produtos</a>";
	die();
	}
	
?>
<h1>Histórico de entrada</h1>


<table>
	<tr>
		<th>Nome do medicamento</th>
		<th>Quantidade anterior</th>
		<th>Quantidade</th>
		<th>Nova quantidade</th>
		<th>Data da entrega</th>
		
	</tr>
	<?php

	$i=0;
	while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
	
		$nome = $row['nome'];
		$aquant = $row['aQuant'];
		$quant = $row['quant'];
		$nQuant = $row['nQuant'];
		$data = $row['datau'];
		$data = date('d/m/Y',  strtotime($data));
	
				echo "	<tr>";
				
				echo "<th>". $nome ."</th>";

				
				echo "<th>" .$aquant. "</th>";

				echo "<th>".$quant."</th>"; 
				echo "<th>".$nQuant."</th>"; 
				echo "<th>".$data."</th>"; 		
				echo " </tr>";
		
		 

}
 ?>
</table>
<?php 	
		require('conexao.php');
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistret") or die ("the  query could not be completed. Try again later!");

      if (mysqli_num_rows($userquery) <= 0) {

		echo "Não existe um histórico ainda! <br/>";
		echo "<a href='cadProd.php'>Cadastre novos produtos</a>";
	die();
	}
	
?>
<h1>Histórico de retirada</h1>


<table>
	<tr>
		<th>Nome do medicamento</th>
		<th>Quantidade anterior</th>
		<th>Quantidade</th>
		<th>Nova quantidade</th>
		<th>Cliente que retirou</th>
		<th>CPF do cliente</th>
		<th>Médico(a) que autorizou</th>
		<th>Registro do(a) médico(a) </th>
		<th>Data da retirada</th>
		
	</tr>
	<?php

	$i=0;
	while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
	
		$nome = $row['nome'];
		$aquant = $row['aQuant'];
		$quant = $row['quant'];
		$nQuant = $row['nQuant'];
		$cliente = $row['cliente'];
		$cpf = $row['cpfCliente'];
		$medica = $row['medica'];
		$regMed = $row['registroMed'];
		$data = $row['datau'];
		$data = date('d/m/Y',  strtotime($data));
	
				echo "	<tr>";
				
				echo "<th>". $nome ."</th>";

				
				echo "<th>" .$aquant. "</th>";

				echo "<th>".$quant."</th>"; 
				echo "<th>".$nQuant."</th>"; 
				echo "<th>".$cliente."</th>";
				echo "<th>".$cpf."</th>";
				echo "<th>".$medica."</th>";
				echo "<th>".$regMed."</th>";
				echo "<th>".$data."</th>"; 		
				echo " </tr>";
		
		 

}
 ?>
</table>

</body>
</html>
