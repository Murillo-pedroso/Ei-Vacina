<?php 

require('conexao.php');

$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$senha = md5(isset($_POST['txSenha']) ? $_POST['txSenha'] : '');
//$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
//$entrar = isset($_POST['entrar']) ? $_POST['entrar'] : '';
//$senha = isset($_POST['txSenha']) ? $_POST['txSenha'] : '';


 if (isset($_POST['entrar'])) {

   // $nSenha = password_hash($senha, PASSWORD_DEFAULT);
   
    $verifica = mysqli_query($conn, "SELECT * FROM tbLogin WHERE cpf = '$cpf' AND Senha = '$senha'") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
        die();
      }else{
        setcookie("cpf",$cpf);
        header("Location:index.php");
      }
  }
?>