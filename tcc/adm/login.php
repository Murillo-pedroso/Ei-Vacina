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
      <h2>The Vibe</h2>
      <form method="post" action="ope.php">
        <div class="input-box">
            <input type="text" name="cpf" id="cpf" required="">
            <label>CPF</label>
        </div>
        <div class="input-box">
            <input type="password" name="txSenha" id="txSenha" required="">
            <label>Senha</label>
            <input type="submit" value="entrar" id="entrar" name="entrar">
            <a href="register.php">Cadastre-se</a>

        </div>
      </form>
    </div>  
    
  </body>
</html>

