<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran|Cormorant+Garamond" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title> The Vibe | Register</title>
  </head>
  <body>

    <a href="login.php" id="logo"><i class="fas fa-align-center"></i></a>
    
    <div class="box">
      <h2>Register now!</h2>
      <form method="post" action="CodRegister.php">
	   
        <div class="input-box">
            <input type="text" name="txcpf" maxlength="11" placeholder="Não use pontos ou traços."required>
            <label>CPF</label>
        </div>
       
        <div class="input-box">
            <input type="text" name="txNome" maxlength="60" required>
            <label>Full Name</label>
        </div>

        <div class="input-box">
            <input type="date" name="txNasc" required>
            <label>Born date</label>
        </div>
       
        <div class="input-box">
            <input type="text" name="txEmail" maxlength="100" required>
            <label>E-mail</label>
        </div>
       
        <div class="input-box">
            <input type="text" name="txCidade" maxlength="2" required>
            <label>City</label>
            
        </div>

            <input type="submit" name="" value="Submit" ">
        </div>
      



      
      </form>
    </div>
  </body>
</html>
