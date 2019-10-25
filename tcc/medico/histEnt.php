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

<h1>Histórico de entrada</h1>

<form method="post" >
	
	 <label>Pesquise por produto:</label>
	 <input type="text" name="txNome" id="txNome" >
     
     
     <label>A partir de:</label>
	 <input type="date" name="txDatad" id="txDatad" >

	 
     
     
     <input type="submit" value="Pesquisard" id="Pesquisard" name="Pesquisard">

</form>

<?php 	
		require('conexao.php');
		
		$datad = isset($_POST['txDatad']) ? $_POST['txDatad'] : '';	
		$datad = date('Y/m/d',  strtotime($datad));

		
		$nome = isset($_POST['txNome']) ? $_POST['txNome'] : '';
		
		if (empty($nome)&&empty($datad)) {
			
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent") or die ("the  query could not be completed. Try again later!");
		
		}else if (empty($nome ) && isset($datad) ){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau >= '$datad'") or die ("the  query could not be completed. Try again later!");
		}else if (isset($nome) && empty(	$datad)){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE nome = '$nome'") or die ("the  query could not be completed. Try again later!");

     	}else {

     		$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau >= '$datad' AND  nome = '$nome'") or die ("the  query could not be completed. Try again later!");
     	}
     	

      if (mysqli_num_rows($userquery) <= 0) {

		echo "Não existe um histórico ainda! <br/>";
		echo "<a href='index.php'>voltar</a>";
	die();
	}
	
?>


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
		
		 

}}
 ?>
</table>
<?php echo "<a href='index.php'>voltar</a>"; 


/*

<label>Antes de:</label>
 <input type="date" name="txDataa" id="txDataa" >
$dataa = isset($_POST['txDataa']) ? $_POST['txDataa'] : '';	
$dataa = date('Y/m/d',  strtotime($dataa));
if (empty($nome)&&empty($datad)&&empty($dataa)) {
			
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent") or die ("the  query could not be completed. Try again later!");
		
		}else if (empty($nome ) && isset($datad) && empty($dataa)){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau >= '$datad'") or die ("the  query could not be completed. Try again later!");
		}else if (isset($nome) && empty($datad) && empty($dataa)){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE nome = '$nome'") or die ("the  query could not be completed. Try again later!");

		}else if (empty($nome) && empty($datad) && isset($dataa)){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau <= '$dataa'") or die ("the  query could not be completed. Try again later!");

		}else if (isset($nome) && isset($datad) && empty($dataa)){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau >= '$datad' AND  nome = '$nome'") or die ("the  query could not be completed. Try again later!");

		}else if (isset($nome) && empty($datad) && isset($dataa)){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau <= '$dataa' AND  nome = '$nome'") or die ("the  query could not be completed. Try again later!");

		}else if (empty($nome) && isset($datad) && isset($dataa)){
			$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau >= '$datad' AND  datau <= '$dataa'") or die ("the  query could not be completed. Try again later!");
     	
     	
     	}else {

     		$userquery = mysqli_query ($conn, "SELECT * FROM tbHistent WHERE datau >= '$datad' AND  datau <= '$dataa' AND  nome = '$nome'") or die ("the  query could not be completed. Try again later!");
     	}

*/
?>