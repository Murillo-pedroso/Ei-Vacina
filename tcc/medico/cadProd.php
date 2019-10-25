
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
      <h2>Cadastre medicamentos:</h2>
      <form method="post" action="cadProdcod.php" enctype="multipart/form-data">
       
        <div class="input-box">
            <input type="text" name="txnomeprod" required>
            <label>Nome</label>
        </div>
       

        <label for="imagem">Imagem do medicamento:</label>
        <input type="file" name="imagem" required>
        <br/>
        <input type="submit" value="Enviar"/>
    </form>
        
        <a href="addProd.php">Adicione produtos que chegaram recentemente</a>
  </body>
</html>
