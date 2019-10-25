<h1>Insira o código para retirar um produto!</h1>
<?php  

function UrlAtual(){
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 return $url;
 }
$url = UrlAtual();
$url_cod = explode('?', $url, 2);


$cpf =  $url_cod[1];

echo"<form method= 'post' action='procurarReceitacod.php?$cpf'>";
?>
<input type="text" name="txCod" placeholder="Codigo da receita"  minlength="8" maxlength="8" required>
<input type="submit" name="" value="Submit">
</form>
<a href="index.php">Voltar</a>
<?php 


 ?>