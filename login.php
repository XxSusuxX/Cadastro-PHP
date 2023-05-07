
<?php

    if(isset($_POST['submit'])){
        
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        $result = $conn->query($sql);

        if(mysqli_num_rows($result) < 1){
            header('Location: login.php');
        }else{
            header('Location: sistema.php');
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
    <link rel="stylesheet" type="text/css" href="login.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <a href="index.html" class="back">Voltar</a>
<div class="container">
      <div class="header">
        <h2>Logar minha conta</h2>
      </div>

      <form method="POST" action="login.php" id="form" class="form">

        <div class="form-control">
          <label for="email">Email</label>
          <input name="email" type="text" id="email" placeholder="Digite seu email..." />
        </div>

        <div class="form-control">
          <label for="password">Senha</label>
          <input
          name="senha"
            type="password"
            id="password"
            placeholder="Digite sua senha..."
          />

        </div>

 
        <button name="submit" type="submit">Enviar</button>
      </form>
    </div>

</body>
</html>