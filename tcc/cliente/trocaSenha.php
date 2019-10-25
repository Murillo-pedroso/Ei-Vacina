<?php 


 function UrlAtual(){
     $dominio= $_SERVER['HTTP_HOST'];
     $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
     return $url;
     }
    $url = UrlAtual();
    $url_cod = explode('?', $url, 2);

    $cpf = $url_cod[1];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran|Cormorant+Garamond" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title> The Vibe | Login</title>
  </head>
  <body>

    <a href="login.php" id="logo"><i class="fas fa-align-center"></i></a>
    
    <div class="box">
      <h2>Insira a senha:</h2>
      <form method="post" >
        <div class="input-box">
            <input type="password" name="senha" id="senha" required="">
            <label>Senha</label>
        </div>
        <div class="input-box">
            <input type="password" name="senhad" id="senhad" required="">
            <label>Insira a senha novamente</label>
            <input type="submit" value="Enviar" id="Enviar" name="Enviar">
           

        </div>
      </form>
    </div>  
    
  </body>
</html>

<?php

require("conexao.php");


if (isset($_POST['Enviar'])) {
 
 $senha = isset($_POST['senha'])? $_POST['senha'] :'';
  $senhad = isset($_POST['senhad'])? $_POST['senhad'] :'';

   echo ("<script>window.location.href='trocoSenhacod.php?$cpf?$senha?$senhad';</script>");

 }
?>