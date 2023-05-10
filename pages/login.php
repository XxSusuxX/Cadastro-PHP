
<?php

    if(isset($_POST['submit'])){
        
        include_once('../config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        $result = $conn->query($sql);

        if(mysqli_num_rows($result) < 1){
         
          header('Location: ../pages/login.php');

          }else{
            $usuario = $result->fetch_assoc();

            if(!isset($_SESSION)){
              session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            
            header('Location: ../pages/sistema.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Susu</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <a href="../index.html" class="back">Voltar</a>
<div class="container">
      <div class="header">
        <h2>Logar minha conta</h2>
      </div>

      <form method="POST" action="login.php" id="form" class="form">

        <div class="form-control">
          <label for="email">Email</label>
          <input name="email" type="text" id="email" placeholder="Digite seu email..." />
          <i class="fa-solid fa-circle-exclamation"></i>
          <i class="fas fa-check-circle"></i>
          <small>Mensagem de erro</small>
        </div>

        <div class="form-control">
          <label for="password">Senha</label>
          <input
          name="senha"
            type="password"
            id="password"
            placeholder="Digite sua senha..."
          />
          <i class="fa-solid fa-circle-exclamation"></i>
          <i class="fas fa-check-circle"></i>
          <small>Mensagem de erro</small>
        </div>
        <small id="msg-error">Seu email ou senha não está registrado</small>
 
        <button name="submit" type="submit">Enviar</button>
      </form>
    </div>
    <script src="../scripts/validationLogin.js"></script>
<script
      src="https://kit.fontawesome.com/4a2dfb5915.js"
      crossorigin="anonymous"
    ></script>
</body>
</html>
