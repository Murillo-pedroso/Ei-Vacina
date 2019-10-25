<?php 

	require ('conexao.php');

	$cpf = isset($_POST['cpf'])? $_POST['cpf'] :'';
	$email = isset($_POST['email'])? $_POST['email'] :'';

		if (empty($cpf)||empty($email)) {

				echo("<script>alert('Preencha todos os campos!');</script>");

				echo ("<script>window.location.href='register.php';</script>");

		} else {
	   
		    $verifica = mysqli_query($conn, "SELECT * FROM tbLogin WHERE cpf = '$cpf' AND Email = '$email'") or die("erro ao selecionar");
		     
		      if (mysqli_num_rows($verifica)<=0){
		        echo"<script language='javascript' type='text/javascript'>alert('CPF ou Email não foram encontrados.');window.location.href='esqueciSenha.php';</script>";

		        die();

		      }else{
		        
		        echo ("<script>window.location.href='enviaemail.php?$cpf?$email';</script>");
		        

	 } }



 ?>