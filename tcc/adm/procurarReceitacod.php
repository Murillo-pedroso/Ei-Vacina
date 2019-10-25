
<?php 

require('conexao.php');
	
 $cod = isset($_POST['txCod'])? $_POST['txCod'] :'';

$sql = "SELECT codIdentifi FROM tbReceita WHERE codIdentifi=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: ../signup.php?error=sqlerror");
		exit();
		

		} else{

			mysqli_stmt_bind_param($stmt, "s" , $cod);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if ($resultCheck > 0) {
					
			$userquery = mysqli_query ($conn, "SELECT * FROM tbReceita  WHERE codIdentifi= '$cod'") or die ("the  query could not be completed. Try again later!");



			

 ?>


	<table>
	  <tr>
	    <th>Foto</th>
	    <th>Medicamento</th>
	    <th>Quantidade disponível</th>
	    <th>Quantidade a ser retirada</th>
	    <th>Gerar receita</th>
	    
	  </tr>
<?php

	  while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
	   

	    $nome = $row['nomeRem'];
	   	$idRec = $row['idRec'];
	   	$cpf = $row['cpf'];
	   	$qntdret =  $row['qntd'];
	   	$codIdentifi = $row['codIdentifi'];
	    $arquivo = $row['nomeRem'].".jpg";
	    $id = $row['idRem'];
	    $userquery2 = mysqli_query ($conn, "SELECT quant FROM tbProdutos  WHERE idRem= '$id'") or die ("the  query could not be completed. Try again later!");
	    while ($row2 = mysqli_fetch_array($userquery2, MYSQLI_ASSOC)) {
	    $quant = $row2['quant'];

	      echo "  <tr>";
	        
	        //echo "<th><img src=" . $arquivo. "/></th>"; 
	        echo "<th><img src='upload/$arquivo' alt='some text' width=60 height=40></th>"; 
	        echo "<th>". $nome ."</th>";

	        
	        echo "<th>" .$quant. "</th>";

	        //<img src='upload/$arquivo' alt="some text" width=60 height=40>

	        echo "<form method='post' action='retirarProd.php?$id?$qntdret?$quant?$cpf'>";

	        echo "<th>".$qntdret."</th>";

	        
	            

	        echo "<th><input type= 'submit' value='Enviar' /></th></form>";
	      
	        echo " </tr>";
	    
	     

	}}
?>
	</table>

 <?php 

}else{

	echo("<script>alert('Este código não existe ou ja foi utilizado');</script>");
	echo ("<script>window.location.href='procurarReceita.php';</script>");
}}
  ?>