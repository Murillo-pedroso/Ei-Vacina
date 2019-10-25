<?php
   $idExcluir=$_GET['cpf'];

  require("conexao.php");
  
  try{
	  $stmt = $pdo->prepare("delete from bdVacina.tbVacina where cpf=$idExcluir");
	  $stmt ->execute();
	  $stmt = null;
	  header('Location: Table.php');
	  
  }catch(PDOException $e){
	  echo 'Error: ' . $e->getMessage();
  }

?>