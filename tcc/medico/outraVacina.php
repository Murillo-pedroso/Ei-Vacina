<?php 

require ('conexao.php');

function UrlAtual(){
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 return $url;
 }
$url = UrlAtual();
$url_cod = explode('?', $url, 5);


$cpf =  $url_cod[1];
$tabela =  $url_cod[2];
$coluna =  $url_cod[3];
$select =  $url_cod[4];
$vacina = $_POST[$select];
$vacina = "'".$vacina."'";


echo $cpf;
echo "</br>";
echo $tabela;
echo "</br>";
echo $coluna;
echo "</br>";
echo $vacina;

  
     $up = "update bdVacina.$tabela set $coluna = $vacina where cpf =$cpf";
     $stmt = mysqli_stmt_init($conn);
	 if (!mysqli_stmt_prepare($stmt,$up)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='vacinas.php';</script>");
					exit();
	 }else{

          mysqli_stmt_execute($stmt);
          $stmt = null;
         // header('Location: http://localhost/tcc/medico/vacinas.php');

     }


 ?>