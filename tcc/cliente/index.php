  <?php 
require('conexao.php');
require('ope.php');
$login_cookie = $_COOKIE['cpf'];
    if(isset($login_cookie)){
      
    	$userquery = mysqli_query ($conn, "SELECT * FROM tbLogin WHERE cpf= '$login_cookie'") or die ("the  query could not be completed. Try again later!");

      if (mysqli_num_rows($userquery) != 1) {

		die("That username copuld not be found");
	}
	while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {

		$cpf = $row['cpf'];
		$NomeC = $row['NomeC'];
		$dtNasc = $row['dtNasc'];
		
		$dtNasc = date('d/m/Y',  strtotime($dtNasc));
		$Email = $row['Email'];
		

	}

      echo"Bem-Vindo, ".$NomeC."<br>";
      echo"Essas informações <font color='red'>PODEM</font> ser acessadas por você";
       echo '<form action="logout.php" method ="post">

          <button type="submit" name = "logout-submit"> Logout</button> </form>';
	 
	

?>


<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf=8" />
		<link rel="stylesheet" href="style.css">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
    
    </head>
	<tittle></tittle>


<body>




	
<h2><?php echo $NomeC; ?>'s Profile</h2>

<table>
	<tr><td>Nome completo: </td><td><?php echo $NomeC;  ?></td></tr>
	<tr><td>CPF: </td><td><?php echo $cpf;  ?></td></tr>
	<tr><td>E-mail: </td><td><?php echo $Email;  ?></td></tr>
	<tr><td>Data de nascimento: </td><td><?php echo $dtNasc;  ?></td></tr>
</table>
	

    
<table class="tg" style="undefined;table-layout: fixed; width: 988px">
<colgroup>
<col style="width: 119px">
<col style="width: 106px">
<col style="width: 114px">
<col style="width: 108px">
<col style="width: 109px">
<col style="width: 108px">
<col style="width: 109px">
<col style="width: 106px">
<col style="width: 109px">
</colgroup>
  <tr>
    <th class="tg-0pky"></th>
    <th class="tg-c3ow" colspan="3">Esquema básico de vacinação</th>
    <th class="tg-c3ow" rowspan="2">Toxóide Tetânico</th>
    <th class="tg-baqh" rowspan="2">Dupla</th>
    <th class="tg-baqh" rowspan="2">Outras vacinas</th>
    <th class="tg-baqh" rowspan="2">Outras vacinas</th>
    <th class="tg-baqh" rowspan="2">Outras vacinas</th>
  </tr>
  <tr>
    <td class="tg-c3ow">Doses\vacinas</td>
    <td class="tg-c3ow">Contra Polio</td>
    <td class="tg-c3ow">Tríplice (DPT)</td>
    <td class="tg-c3ow">B.C.G</td>
  </tr>
  <tr>
    <td class="tg-c3ow">1ª</td>
   
  
  
  <?php
      $consultaPolio = mysqli_query ($conn, "SELECT * FROM tbPolio WHERE cpf= '$login_cookie'");

			
			while ($resultTbLogin = mysqli_fetch_array($consultaPolio, MYSQLI_ASSOC)){	
				
                   echo"<td>{$resultTbLogin['pdose']}</td>";
                   			   
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

			
			while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){	
				
                   echo"<td>{$resultTbLogin['pdose']}</td>";
                   			   
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['pdose']}</td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['pdose']}</td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['pdose']}</td>";


      }



?>
    

      <td class="tg-0lax"></td>
      <td class="tg-0lax"></td>
      <td class="tg-0lax"></td>
    </tr>
    <tr>
    <td class="tg-baqh">2ª</td>
    
    <?php
      $consultaPolio = mysqli_query ($conn, "SELECT * FROM tbPolio WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaPolio, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sdose']}</td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sdose']}</td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sdose']}</td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sdose']}</td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sdose']}</td>";


      }



?>


    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-baqh">3ª</td>
    
    <?php
      $consultaPolio = mysqli_query ($conn, "SELECT * FROM tbPolio WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaPolio, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['tdose']}</td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['tdose']}</td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['tdose']}</td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['tdose']}</td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['tdose']}</td>";


      }



?>



    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-baqh">Reforço</td>
   
      <?php
      $consultaPolio = mysqli_query ($conn, "SELECT * FROM tbPolio WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaPolio, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['preforco']}</td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['preforco']}</td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['preforco']}</td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['preforco']}</td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['preforco']}</td>";


      }



?>



    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-baqh">Reforço</td>
    

     <?php
      $consultaPolio = mysqli_query ($conn, "SELECT * FROM tbPolio WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaPolio, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sreforco']}</td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sreforco']}</td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sreforco']}</td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sreforco']}</td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td>{$resultTbLogin['sreforco']}</td>";


      }



?>


    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
</table>
<?php   
    require('conexao.php');
      $userquery = mysqli_query ($conn, "SELECT * FROM tbReceita WHERE cpf=$cpf") or die ("the  query could not be completed. Try again later!");

      if (mysqli_num_rows($userquery) <= 0) {

		die();
	}else{
  
?>
  <h1>Medicamentos a serem retirados:</h1>

<table>
  <tr>
    <th>Foto</th>
    <th>Medicamento</th>
    <th>Quantidade a ser retirada</th>
    <th>Código para retirar o medicamento</th>
    
  </tr>
  <?php

  $i=0;
  while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
  
    $nome = $row['nomeRem'];
    $quant = $row['qntd'];
    $arquivo = $row['nomeRem'].".jpg";
    $cod = $row['codIdentifi'];
    
  
        echo "  <tr>";
        
        //echo "<th><img src=" . $arquivo. "/></th>"; 
        echo "<th><img src='../medico/upload/$arquivo' alt='some text' width=60 height=40></th>"; 
        echo "<th>". $nome ."</th>";

        
        echo "<th>" .$quant. "</th>";
        echo "<th>" .$cod. "</th>";
        //<img src='upload/$arquivo' alt="some text" width=60 height=40>

        
      
        echo " </tr>";
    
     

}}
 ?>
</table>

<?php



}else{
      echo"Bem-Vindo, convidado <br>";
      echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
      echo"<br><a href='login.php'>Faça Login</a> ou  <a href='register.php'>Cadastre-se </a>Para ler o conteúdo";

    }

 ?>

</table>
</body>
</html>














<!--<table class="table table-dark">

    <thead>
        <tr>
          <th scope="col">1º dose</th>
          <th scope="col">2º dose</th>
          <th scope="col">3º dose</th>
          <th scope="col">1º reforço</th>
          <th scope="col">2º reforço</th>
          <th scope="col">Excluir Usuario</th>
        </tr>
    </thead>


$consultaLogin = mysqli_query ($conn, "SELECT * FROM tbPolio WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaLogin, MYSQLI_ASSOC)){  
        echo"<tr>";
                   echo"<td><a href='vacinas/polio/pdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['pdose']}</a></td>";
                   echo"<td><a href='vacinas/polio/sdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sdose']}</a></td>";
           echo "<td><a href='vacinas/polio/tdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['tdose']}</a></td>";
                   echo"<td><a href='vacinas/polio/preforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['preforco']}</a></td>";
                   echo"<td><a href='vacinas/polio/sreforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sreforco']}</a></td>";
           echo "<td><a href='excluirusuario.php?cpf=$resultTbLogin[cpf]'>Excluir</a></td>";
           
                 echo "</tr>";
        
        /*echo "<p>";
         echo "{$resultTbLogin['Nome']}";
      echo "{$resultTbLogin['Usuario']}";
        
        echo "</p>";*/

        
      }
        
      $pdo=null;
