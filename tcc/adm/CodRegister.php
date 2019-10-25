
<?php	

	require('conexao.php');
	do{

$usuario = rand(100000, 999999);

$sql = "SELECT usuario FROM tbMedica WHERE usuario=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: ../signup.php?error=sqlerror");
		exit();
		

		} else{

			mysqli_stmt_bind_param($stmt, "s" , $usuario);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

            }}while($resultCheck>0);



    $cpf = isset($_POST['txcpf'])? $_POST['txcpf'] :'';
    $nome = isset($_POST['txNome'])? $_POST['txNome'] :'';
    $nascimento = isset($_POST['txNasc'])? $_POST['txNasc'] :'';
	$email = isset($_POST['txEmail'])? $_POST['txEmail'] :'';
	$cidade = isset($_POST['txCidade'])? $_POST['txCidade'] :'';
	$numero_de_bytes = 2;

	$restultado_bytes = random_bytes($numero_de_bytes);
	$resultado_final = bin2hex($restultado_bytes);
	$senha = strtoupper(bin2hex(random_bytes(2)));
	

if (empty($cpf)||empty($nome)||empty($nascimento)||empty($email)||empty($cidade)) {

		echo("<script>alert('Preencha todos os campos!');</script>");

		echo ("<script>window.location.href='register.php';</script>");

	}else if ( !filter_var($email, FILTER_VALIDATE_EMAIL)){

		echo("<script>alert('Email invalido!');</script>");

		echo ("<script>window.location.href='register.php';</script>");

		} else {

		$sql = "SELECT cpf FROM tbMedica WHERE cpf=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: ../signup.php?error=sqlerror");
		exit();
		

		} else{

			mysqli_stmt_bind_param($stmt, "s" , $cpf);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if ($resultCheck > 0) {
					
			echo("<script>alert('Este cpf já está cadastrado!');</script>");

			echo ("<script>window.location.href='register.php';</script>");
			exit();

			}else{

				$sql = "INSERT INTO tbMedica (cpf, nome, email, dtNasc, estado,usuario, senha) VALUES (?, ?, ?, ?, ?, ?,?)";

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();

			}else{
				
				//$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

				
				

				mysqli_stmt_bind_param($stmt, "sssssss" , $cpf, $nome, $email, $nascimento,$cidade,$usuario, $senha);
				mysqli_stmt_execute($stmt);

				
				echo ("<script>window.location.href='enviaemail.php?$email?$usuario?$senha?$nome';</script>");
				exit();
			
}}}

	

?>

<!-- possible codes:

 && !preg_match("/^[a-zA-Z0-9]*$/", $username);
		

		 } else if( !filter_var($email, FILTER_VALIDATE_EMAIL)){

		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();

			} else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){

			header("Location: ../signup.php?error=invaliduid&mail=".$email);
			exit();

				passwordcheck])))--&uid=".$username. "$mail=" . $email

					} else {

					$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt,$sql)) {
						header("Location: ../signup.php?error=sqlerror");
					exit();

}if ($resultCheck > 0) {
					
			echo("<script>alert('Este cpf já está cadastrado!');</script>");

			echo ("<script>window.location.href='register.php';</script>");
			mysqli_stmt_close($stmt);
			
			}else{
				try{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					$stmt = $conn->prepare("INSERT INTO bdVacina.tblogin VALUES($cpf,curdate(), $nome,$nascimento,$email,$hashedPwd)");				 		
					mysqli_stmt_execute($stmt);
					$stmt = null;
					$pdo = null;

					echo ("<script>alert('Cadastro Efetuado com sucesso');</script>");

			}catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();

		echo ("<script>alert('Erro ao efetuar o cadastro');</script>");
				

-->