<?php
session_start();
require('conexao.php');
?>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf=8" />
		<link rel="stylesheet" href="style.css">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
	<table class="table table-dark">
	
	
  <thead>
    <tr>
      <th scope="col">CPF</th>
      <th scope="col">Nome Completo</th>
      <th scope="col">Situação</th>
      <th scope="col">Usuario</th>
      <th scope="col">Senha</th>
      <th scope="col">Excluir Usuario</th>
    </tr>
  </thead>
  
  <tbody>
	
	
	<section>
			
												<section>
													
													<form method="post" action="editarusuario.php">
													<input type="text name="id"  value="<?php echo @$_GET['id']; ?>" />
														<input type="text" name="usuario" maxlength="40" placeholder="Usuario" value="<?php echo @$_GET['usuario']; ?>" />
														<input type="text" name="senha" placeholder="Senha" value="<?php echo @$_GET['senha']; ?>" />
														<input type="submit" value="Salvar" />				
													</form>			
													
												</section>		
			


<?php 

	require("conexao.php");


		$consultaLogin = $pdo->query("SELECT * FROM bdVacina.tbVacina;");
			while ($resultTbLogin = $consultaLogin->fetch(PDO::FETCH_ASSOC)){
				
				echo"<tr>";
                   echo"<th scope='row'>{$resultTbLogin['cpf']}</th>";
                   echo"<td>{$resultTbLogin['Nome']}</td>";
				   echo "<td><a href='confirmar.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['confirmacao']}</a></td>";
                   echo"<td>{$resultTbLogin['Usuario']}</td>";
                   echo"<td>{$resultTbLogin['Senha']}</td>";
				   echo "<td><a href='excluirusuario.php?cpf=$resultTbLogin[cpf]'>Excluir</a></td>";
				   
                 echo "</tr>";
				
				/*echo "<p>";
				 echo "{$resultTbLogin['Nome']}";
			echo "{$resultTbLogin['Usuario']}";
				
				echo "</p>";*/

				
			}
				
			$pdo=null;
?>
 </tbody>
</table>

</section>

	
    
	
 