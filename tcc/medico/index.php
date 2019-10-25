<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>

	<title></title>
</head>
<body>
<?php 

require('conexao.php');
require ('ope.php');
$login_cookie = $_COOKIE['cpf'];
    if(isset($login_cookie)){
      
    	$userquery = mysqli_query ($conn, "SELECT * FROM tbMedica WHERE cpf= '$login_cookie'") or die ("the  query could not be completed. Try again later!");
    	

      if (mysqli_num_rows($userquery) != 1) {

		die("That username could not be found");
	
}}



 ?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pesquisaNome.php">Cadastrar vacinas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Preços</a>
      </li>
		<li>  
    <div class="dropdown">
		  <button class="dropbtn">Histórico</button>
		  <div class="dropdown-content">
		    <a href="histGeral.php">Geral</a>
		    <a href="histEnt.php">Entrada</a>
		    <a href="histSaida.php" ">Saída</a>
		  </div>
		</div>		     
      </li>
      <li>  
    <div class="dropdown">
      <button class="dropbtn">Produtos</button>
      <div class="dropdown-content">
        <a href="addProd.php">Adicionar produtos</a>
        
        <?php echo "<a href='procurarReceita.php?$login_cookie'>Retirar produtos</a>";?>
      </div>
    </div>         
      </li>
      <li>
      <form action="logout.php" method ="post">

          <button type="submit" name = "logout-submit"> Logout</button> 
      </form>
   	</li>
    </ul>
  </div>
</nav>

</body>
</html>