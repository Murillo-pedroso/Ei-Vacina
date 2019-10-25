<?php

require("conexao.php");

    function UrlAtual(){
     $dominio= $_SERVER['HTTP_HOST'];
     $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
     return $url;
     }
    $url = UrlAtual();
    $url_cod = explode('?', $url, 4);

    $cpf = $url_cod[1];
    $senha = $url_cod[2];
    $senhad = $url_cod[3];
    


  if ($senha !== $senhad){

    echo("<script>alert('As senhas devem ser iguais!');</script>");
    header("Location: http://localhost/senha/trocoSenha.php?$cpf");
    exit();
   
    } else {




      

     $up = "UPDATE tbLogin SET Senha =  md5($senha) WHERE  cpf =$cpf";
     $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt,$up)) {
          echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

          echo ("<script>window.location.href='trocaSenha.php?$cpf';</script>");
          exit();
   }else{

          mysqli_stmt_execute($stmt);
          $stmt = null;
        

        echo("<script>alert('Senha alterada com sucesso!');</script>");
  
        echo ("<script>window.location.href='login.php';</script>");
        
     }}


?>