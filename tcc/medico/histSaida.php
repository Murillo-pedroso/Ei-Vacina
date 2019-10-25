<?php 	
	
	require('conexao.php');
	require ('ope.php');

	$login_cookie = $_COOKIE['cpf'];

    if (empty($login_cookie)) {

    	header("Location:login.php");
		die("Você deve estar logado para continuar...");
		}

    if(isset($login_cookie)){
      
    	$userquery = mysqli_query ($conn, "SELECT * FROM tbMedica WHERE cpf= '$login_cookie'") or die ("the  query could not be completed. Try again later!");
    
    	 if (mysqli_num_rows($userquery) != 1) {

		die("Você deve estar logado para continuar...");
	}

?>
<?php
		
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistret") or die ("the  query could not be completed. Try again later!");

      if (mysqli_num_rows($userquery) <= 0) {

		echo "Não existe um histórico de saída ainda! <br/>";
		echo "<a href='index.php'>voltar</a>";
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
		
		 

}}
 ?>
</table>
<?php echo "<a href='index.php'>voltar</a>"; ?>