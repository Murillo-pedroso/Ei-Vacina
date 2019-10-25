
<?php	

	require('conexao.php');
	
    $cpf = isset($_POST['txcpf'])? $_POST['txcpf'] :'';
    $nome = isset($_POST['txNome'])? $_POST['txNome'] :'';
    $nascimento = isset($_POST['txNasc'])? $_POST['txNasc'] :'';
	$email = isset($_POST['txEmail'])? $_POST['txEmail'] :'';
	$password = isset($_POST['txSenha'])? $_POST['txSenha'] :'';
	$passwordRepeat = isset($_POST['txrepSenha'])? $_POST['txrepSenha']:'';
	$pendente = 'pendente';

if (empty($cpf)||empty($nome)||empty($nascimento)||empty($email)||empty($password)||empty($passwordRepeat)) {

		echo("<script>alert('Preencha todos os campos!');</script>");

		echo ("<script>window.location.href='register.php';</script>");

	}else if ( !filter_var($email, FILTER_VALIDATE_EMAIL)){

		echo("<script>alert('Email invalido!');</script>");

		echo ("<script>window.location.href='register.php';</script>");

	}else if ($password !== $passwordRepeat){

		echo("<script>alert('As senhas devem ser iguais!');</script>");

		exit();
		} else {

		$sql = "SELECT cpf FROM tbLogin WHERE cpf=?";
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

				$sql = "INSERT INTO tbLogin (cpf, dtCadastro, nomeC, dtNasc, Email, Senha) VALUES (?, ?, ?, ?, ?, ?)";

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();

			}else{
				
				//$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

				$nsenha = md5($password);
				function curdate() {
			    // gets current timestamp
			    date_default_timezone_set('UTC'); // What timezone you want to be the default value for your current date.
			    return date('Y-m-d H:i:s');
}

				
				$dtAtual=curdate();

				mysqli_stmt_bind_param($stmt, "ssssss" , $cpf, $dtAtual, $nome, $nascimento,$email, $nsenha);
				mysqli_stmt_execute($stmt);

				$stmt = mysqli_stmt_init($conn);



				$polio = "INSERT INTO tbPolio (idPolio, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";

				//$sql = "INSERT INTO tbLogin (cpf, dtCadastro, nomeC, dtNasc, Email, Senha) VALUES (?, ?, ?, ?, ?, ?)";

				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$polio)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
                    
                
                    
                    
                $tripl = "INSERT INTO tbTripl (idTripl, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$tripl)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
				
                
                    
                    
                $bcg = "INSERT INTO tbbcg (idBcg, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$bcg)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
                    
                    
                
                $tox = "INSERT INTO tbTox (idTox, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$tox)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
                    
                    
                    
                    
                  $dupla = "INSERT INTO tbDupla (idDupla, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$dupla)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
				
                    
                    
                
                 $outrap = "INSERT INTO tboutrap (idOutrap, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$outrap)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
                    
                    
                   
                    
                    
                    
                  $outras = "INSERT INTO tboutras (idOutras, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$outras)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
                    
                    
                    
                    
                    
                     
                 
                  $outrat = "INSERT INTO tboutrat (idOutrat, pdose, sdose, tdose, preforco, sreforco,cpf) VALUES (null, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
		
				if (!mysqli_stmt_prepare($stmt,$outrat)) {
					echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

					echo ("<script>window.location.href='register.php';</script>");
					exit();
				}else{

					mysqli_stmt_bind_param($stmt, "ssssss" ,  $pendente, $pendente, $pendente,$pendente, $pendente, $cpf);
				mysqli_stmt_execute($stmt);
                    
                    
                    
                
				
				
				
				echo ("<script>alert('Cadastro Efetuado com sucesso');</script>");
				echo ("<script>window.location.href='login.php';</script>");
				exit();
			
}}}}}}}}}}}}

	

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