<?php 

require('conexao.php');


$medica="Beatriz Gomes";
$regMed = "1212";
$novaQntd = isset($_POST['novaQntd'])? $_POST['novaQntd'] :'';
echo $novaQntd;
function UrlAtual(){
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 return $url;
 }
$url = UrlAtual();
$url_cod = explode('?', $url, 5);


$id =  $url_cod[1];
$quantret = $url_cod[2];
$quanttotal = $url_cod[3];
$cpf = $url_cod[4];
$userquery = mysqli_query ($conn, "SELECT nomeC FROM tbLogin where cpf=$cpf") or die ("the  query could not be completed. Try again later!");

$cliente  = mysqli_fetch_array($userquery, MYSQLI_ASSOC)['nomeC'];
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

$novaQuant =  (int)$quanttotal - (int)$quantret;

$nquantret = "-".$quantret;
echo $novaQuant;

$up = "update bdVacina.tbProdutos set quant = $novaQuant where idRem=$id";
     $stmt = mysqli_stmt_init($conn);
	 if (!mysqli_stmt_prepare($stmt,$up)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='index.php';</script>");
					exit();
	 }else{

          mysqli_stmt_execute($stmt);
          $stmt = null;
       
     }

     $ent = "INSERT INTO tbHistorico (id,nome,aQuant,quant,nQuant,datau) VALUES ( ?, ?, ?, ?,?,?)";

				

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$ent)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $null,$nome,$quanttotal,$nquantret,$novaQuant,$dtAtual);
				mysqli_stmt_execute($stmt);
				
				 $sql = "INSERT INTO tbHistret (id,nome,aQuant,quant,nQuant,cliente,cpfCliente,medica,registroMed,datau) VALUES ( ?, ?, ?, ?,?,?,?,?,?,?)";

				

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssssssss" ,  $null,$nome,$quanttotal,$nquantret,$novaQuant,$cliente,$cpf,$medica,$regMed,$dtAtual);
					mysqli_stmt_execute($stmt);
				header('Location: http://localhost/tcc/addProd.php');
}}
	 


?>