<?php
   $sdose=$_GET['cpf'];

  require("conexao.php");
  
  
	  
     $up = "update bdVacina.tbTripl set sdose = 'OK' where cpf =$sdose";
     $stmt = mysqli_stmt_init($conn);
	 if (!mysqli_stmt_prepare($stmt,$up)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='index.php';</script>");
					exit();
	 }else{

          mysqli_stmt_execute($stmt);
          $stmt = null;
          header('Location: http://localhost/tcc/medico/vacinas.php');

     }
?>


			
			