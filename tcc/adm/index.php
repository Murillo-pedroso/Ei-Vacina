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
				
                   echo"<td><a href='vacinas/polio/pdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['pdose']}</a></td>";
                   			   
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

			
			while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){	
				
                   echo"<td><a href='vacinas/triplice/pdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['pdose']}</a></td>";
                   			   
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/bcg/pdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['pdose']}</a></td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/toxoide/pdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['pdose']}</a></td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/dupla/pdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['pdose']}</a></td>";


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
        
                   echo"<td><a href='vacinas/polio/sdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sdose']}</a></td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/triplice/sdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sdose']}</a></td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/bcg/sdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sdose']}</a></td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/toxoide/sdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sdose']}</a></td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/dupla/sdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sdose']}</a></td>";


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
        
                   echo"<td><a href='vacinas/polio/tdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['tdose']}</a></td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/triplice/tdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['tdose']}</a></td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/bcg/tdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['tdose']}</a></td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/toxoide/tdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['tdose']}</a></td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/dupla/tdose.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['tdose']}</a></td>";


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
        
                   echo"<td><a href='vacinas/polio/preforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['preforco']}</a></td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/triplice/preforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['preforco']}</a></td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/bcg/preforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['preforco']}</a></td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/toxoide/preforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['preforco']}</a></td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/dupla/preforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['preforco']}</a></td>";


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
        
                   echo"<td><a href='vacinas/polio/sreforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sreforco']}</a></td>";
                           
        }         
                
     $consultaTripl = mysqli_query ($conn, "SELECT * FROM tbTripl WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTripl, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/triplice/sreforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sreforco']}</a></td>";
                           
        }         
        $consultaBcg = mysqli_query ($conn, "SELECT * FROM tbbcg WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaBcg, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/bcg/sreforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sreforco']}</a></td>";

      }
        $consultaTox = mysqli_query ($conn, "SELECT * FROM tbTox WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaTox, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/toxoide/sreforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sreforco']}</a></td>";


      }

        $consultaDupla = mysqli_query ($conn, "SELECT * FROM tbDupla WHERE cpf= '$login_cookie'");

      
      while ($resultTbLogin = mysqli_fetch_array($consultaDupla, MYSQLI_ASSOC)){  
        
                   echo"<td><a href='vacinas/dupla/sreforco.php?cpf=$resultTbLogin[cpf]'>{$resultTbLogin['sreforco']}</a></td>";


      }



?>


    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
</table>
<?php   
    require('conexao.php');
      $userquery = mysqli_query ($conn, "SELECT * FROM tbProdutos") or die ("the  query could not be completed. Try again later!");

      
  
?>
  <h1>Receite remedios para este cliente:</h1>

<table>
  <tr>
    <th>Foto</th>
    <th>Medicamento</th>
    <th>Quantidade disponível</th>
    <th>Quantidade a ser retirada</th>
    <th>Gerar receita</th>
    
  </tr>
  <?php

  $i=0;
  while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
  
    $nome = $row['nomeRem'];
    $quant = $row['quant'];
    $arquivo = $row['nomeRem'].".jpg";
    $id = $row['idRem'];
    
  
        echo "  <tr>";
        
        //echo "<th><img src=" . $arquivo. "/></th>"; 
        echo "<th><img src='upload/$arquivo' alt='some text' width=60 height=40></th>"; 
        echo "<th>". $nome ."</th>";

        
        echo "<th>" .$quant. "</th>";

        //<img src='upload/$arquivo' alt="some text" width=60 height=40>

        echo "<form method='post' action='indexCod.php?$id?$cpf'>";

        echo "<th><input type='number' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='qntdRec'/> </th>";

        
            

        echo "<th><input type= 'submit' value='Enviar' /></th></form>";
      
        echo " </tr>";
    
     

}
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
