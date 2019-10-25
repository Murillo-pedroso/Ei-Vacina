<?php 

require('conexao.php');

$usuario = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$senha = (isset($_POST['txSenha']) ? $_POST['txSenha'] : '');
//$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
//$entrar = isset($_POST['entrar']) ? $_POST['entrar'] : '';
//$senha = isset($_POST['txSenha']) ? $_POST['txSenha'] : '';
$userquery = mysqli_query ($conn, "SELECT * FROM tbMedica WHERE usuario = '$usuario'") or die ("the  query could not be completed. Try again later!");

    $cpf = mysqli_fetch_array($userquery, MYSQLI_ASSOC)['cpf'];
  
  
    

 if (isset($_POST['entrar'])) {

   // $nSenha = password_hash($senha, PASSWORD_DEFAULT);
   
    $verifica = mysqli_query($conn, "SELECT * FROM tbMedica WHERE usuario = '$usuario' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
        die();
      }else{
        setcookie("cpf",$cpf);
        header("Location:index.php");
      }
  }
?>