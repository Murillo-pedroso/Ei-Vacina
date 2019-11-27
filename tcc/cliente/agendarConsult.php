<?php require('conexao.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		


	</title>
</head>
<body>

<h1>Agende sua consulta aqui!</h1>

<form method="post" action="agendarConsultcod.php" id="consulta">

	<?php $userquery = mysqli_query ($conn, "SELECT * FROM tbHospital") or die ("the  query could not be completed. Try again later!"); ?>

    <label>Insira o hospital desejado:</label>       
    <select name="Hospital" form="consulta">
		
		<?php

	$i=0;
	while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
	
		$nome = $row['nomeHosp'];
		
		$value = "'" . $nome . "'";
				echo "	<option value=$value>$nome</option> ";			
}
 ?>	  
	</select>

		        <div class="input-box">
		            <input type="text" name="cpf" id="cpf" required="">
		            <label>Insira seu CPF</label>
		        </div>
		        <div class="input-box">
		            <input type="date" name="txConsult" id="txConsult" required="">
		            <label>Data da consulta</label>
		            

    <?php $userquery = mysqli_query ($conn, "SELECT * FROM tbModalidade") or die ("the  query could not be completed. Try again later!"); ?>
    <div>
    <label>Insira a modalidade desejada:</label>       
    <select name="modalidade" form="consulta">
		
		<?php

	$i=0;
	while ($row = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
	
		$nome = $row['nomeModal'];
		
		$value = "'" . $nome . "'";
				echo "	<option value=$value>$nome</option> ";			
}
 ?>	  
	</select>
	</div>
	<div>
		<label>Selecione o horário</label>
		<input type="radio" name="horario" value="9:00:00 Horas" id="9:00:00 Horas"> 9 Horas
		<input type="radio" name="horario" value="10:00:00 Horas" id="10:00:00 Horas"> 10 Horas
		<input type="radio" name="horario" value="11:00:00 Horas" id="11:00:00 Horas"> 11 Horas
		<input type="radio" name="horario" value="12:00:00 Horas" id="12:00:00 Horas"> 12 Horas
		<input type="radio" name="horario" value="13:00:00 Horas" id="13:00:00 Horas"> 13 Horas
		<input type="radio" name="horario" value="14:00:00 Horas" id="14:00:00 Horas"> 14 Horas
		<input type="radio" name="horario" value="15:00:00 Horas" id="15:00:00 Horas"> 15 Horas
		<input type="radio" name="horario" value="16:00:00 Horas" id="16:00:00 Horas"> 16 Horas
		<input type="radio" name="horario" value="17:00:00 Horas" id="17:00:00 Horas"> 17 Horas
		<input type="radio" name="horario" value="18:00:00 Horas" id="18:00:00 Horas"> 18 Horas

	</div>
	<input type="submit" value="Enviar" id="Enviar" name="Enviar">
</div>
</form>

</body>
</html>