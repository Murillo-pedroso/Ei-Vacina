<?php 
require('conexao.php');



$novaQntd = isset($_POST['novaQntd'])? $_POST['novaQntd'] :'';
function UrlAtual(){
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 return $url;
 }
$url = UrlAtual();
$url_cod = explode('?', $url, 2);


$id =  $url_cod[1];
$null = null;
 
$userquery = mysqli_query ($conn, "SELECT quant FROM tbProdutos where idRem=$id") or die ("the  query could not be completed. Try again later!");


$quant = mysqli_fetch_array($userquery, MYSQLI_ASSOC)['quant'];
$userquery = mysqli_query ($conn, "SELECT nomeRem FROM tbProdutos where idRem=$id") or die ("the  query could not be completed. Try again later!");
$nome  = mysqli_fetch_array($userquery, MYSQLI_ASSOC)['nomeRem'];
$quantTotal = (int)$quant+(int)$novaQntd;
$quantEnt = "+".$novaQntd;
function curdate() {
			    // gets current timestamp
			    date_default_timezone_set('UTC'); // What timezone you want to be the default value for your current date.
			    return date('Y-m-d H:i:s');
}

				
$dtAtual=curdate();

$up = "update bdVacina.tbProdutos set quant = $quantTotal where idRem=$id";
     $stmt = mysqli_stmt_init($conn);
	 if (!mysqli_stmt_prepare($stmt,$up)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='index.php';</script>");
					exit();
	 }else{

          mysqli_stmt_execute($stmt);
          $stmt = null;

     
     $ent = "INSERT INTO tbHistorico (id,nome,aQuant,quant,nQuant,datau) VALUES ( ?, ?, ?, ?,?,?)";

				

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$ent)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $null,$nome,$quant,$quantEnt,$quantTotal,$dtAtual);
				mysqli_stmt_execute($stmt);
				
}
 $sql = "INSERT INTO tbHistent (id,nome,aQuant,quant,nQuant,datau) VALUES ( ?, ?, ?, ?,?,?)";

				

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $null,$nome,$quant,$quantEnt,$quantTotal,$dtAtual);
				mysqli_stmt_execute($stmt);
				header('Location: http://localhost/tcc/addProd.php');
}}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 </body>
 </html>