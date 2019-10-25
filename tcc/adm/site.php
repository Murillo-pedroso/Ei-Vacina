<?php
    session_start();
    require('conexao.php');   
    require('ope.php');   
    echo "Usuario: ". $_SESSION['usuarioNome'];    
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
<a href="sair.php">Sair</a>
</body>
</html>
