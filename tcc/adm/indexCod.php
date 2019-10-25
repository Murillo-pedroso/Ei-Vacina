<?php 
require('conexao.php');


do{

$resultado_final = null;
$numero_de_bytes = 4;

$restultado_bytes = random_bytes($numero_de_bytes);
$resultado_final = bin2hex($restultado_bytes);
$resultado_final = strtoupper(bin2hex(random_bytes(4)));

$sql = "SELECT codIdentifi FROM tbReceita WHERE codIdentifi=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: ../signup.php?error=sqlerror");
		exit();
		

		} else{

			mysqli_stmt_bind_param($stmt, "s" , $resultado_final);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

            }}while($resultCheck>0);

    
    $qntdRec = isset($_POST['qntdRec'])? $_POST['qntdRec'] :'';
echo $cpf;
function UrlAtual(){
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 return $url;
 }
$url = UrlAtual();
$url_cod = explode('?', $url, 4);


$id =  $url_cod[1];
$cpf = $url_cod[2];
$null = null;

$userquery = mysqli_query ($conn, "SELECT nomeRem FROM tbProdutos where idRem=$id") or die ("the  query could not be completed. Try again later!");


$nomeRem = mysqli_fetch_array($userquery, MYSQLI_ASSOC)['nomeRem'];

$sql = "INSERT INTO tbReceita (idRec, cpf, qntd, idRem, nomeRem, codIdentifi) VALUES (?, ?, ?, ?, ?,?)";

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();

			}else{
				
				
				mysqli_stmt_bind_param($stmt, "ssssss" , $null, $cpf, $qntdRec, $id,$nomeRem,$resultado_final);
				mysqli_stmt_execute($stmt);	
       	header('Location: http://localhost/tcc/index.php');

     }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 </body>
 </html>