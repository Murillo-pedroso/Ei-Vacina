<?php 

require ('conexao.php');

$hospital = isset($_POST['Hospital'])? $_POST['Hospital'] :'';
$cpf = isset($_POST['cpf'])? $_POST['cpf'] :'';
$data = isset($_POST['txConsult'])? $_POST['txConsult'] :'';
$Modalidade = isset($_POST['modalidade'])? $_POST['modalidade'] :'';
$Horario = isset($_POST['horario'])? $_POST['horario'] :'';
$null = null;




    $verifica = mysqli_query($conn, "SELECT * FROM tbLogin WHERE cpf = '$cpf' ") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>alert('CPF não registrado!Cadastre-se ou tente novamente mais tarde');window.location.href='agendarConsult.php';</script>";
        die();
      }else{
        
        $verifica = mysqli_query($conn, "SELECT * FROM tbConsulta WHERE dataConsulta = '$data'  and nomeHosp = '$hospital'  and nomeModal = '$Modalidade'  and horarioConsulta = '$Horario'  ") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)!=0){
       

        	echo("<script>alert('Já existe uma consulta marcada neste horário.Por favor, selecione outro horário.');</script>");

			echo ("<script>window.location.href='agendarConsult.php';</script>");
        die();
      }else{

      	$sql = "INSERT INTO tbConsulta (idConsulta, cpfCliente, dataConsulta, nomeHosp, nomeModal, horarioConsulta) VALUES (?, ?, ?, ?, ?, ?)";

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='agendarConsult.php';</script>");
					exit();

			}else{
				
				

				mysqli_stmt_bind_param($stmt, "ssssss" , $null, $cpf, $data, $hospital,$Modalidade, $Horario);
				mysqli_stmt_execute($stmt);

				$stmt = mysqli_stmt_init($conn);
				echo("<script>alert('Consulta agendada com sucesso.');</script>");
				echo ("<script>window.location.href='agendarConsult.php';</script>");
      }
  }

}

 ?>