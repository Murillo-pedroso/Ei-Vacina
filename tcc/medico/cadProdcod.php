
<?php   

    require('conexao.php');
   
  // $imagem = $_FILES["imagem"]; 
   $imagem = isset($_FILES['imagem'])? $_FILES['imagem'] :'';
   $nomeProd = isset($_POST['txnomeprod'])? $_POST['txnomeprod'] :'';
   $zero = 0;
   $null = null;



    if($imagem != NULL) {
   // $nomeFinal = time().'.jpg';
    $nomeFinal = $nomeProd .'.jpg';
        
        $pasta = '/upload/';
        if (move_uploaded_file($imagem["tmp_name"], "upload/".$nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal); 
     
            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
     
            
       
        $sql = "SELECT nomeRem FROM tbProdutos WHERE nomeRem=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../signup.php?error=sqlerror");
        exit();
        

        } else{

            mysqli_stmt_bind_param($stmt, "s" , $nomeProd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                    
            echo("<script>alert('Este medicamento já está cadastrado!');</script>");

            echo ("<script>window.location.href='cadProd.php';</script>");
            exit();

            }else{

                $sql = "INSERT INTO tbProdutos (idRem, nomeRem, quant,arquivo) VALUES (?, ?, ?, ?)";

                $stmt = mysqli_stmt_init($conn);
        
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    echo("<script>alert('Erro no servidor!Tente novamente mais tarde.');</script>");

                    echo ("<script>window.location.href='cadProd.php';</script>");
                    exit();

            }else{
                         
                mysqli_stmt_bind_param($stmt, "ssss" ,$null , $nomeProd, $zero, $mysqlImg);
                mysqli_stmt_execute($stmt);

                $stmt = mysqli_stmt_init($conn);

                
                echo ("<script>alert('Cadastro Efetuado com sucesso');</script>");
                echo ("<script>window.location.href='cadProd.php';</script>");
                exit();
            

}}}}}

    

?>