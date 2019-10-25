<h1>Insira o Cpf do cliente</h1>
<form method="post" >
<input type="text" name="cpf" placeholder="CPF"  minlength="11" maxlength="11" required>
<input type="submit" name="entrar" value="Submit">
</form>
<?php 

require('conexao.php');

$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

//$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
//$entrar = isset($_POST['entrar']) ? $_POST['entrar'] : '';
//$senha = isset($_POST['txSenha']) ? $_POST['txSenha'] : '';


 if (isset($_POST['entrar'])) {

   // $nSenha = password_hash($senha, PASSWORD_DEFAULT);
   
    
        setcookie("cpf",$cpf);
        header("Location:vacinas.php");
      }
  
 ?>