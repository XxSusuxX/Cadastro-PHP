
<?php
//conexão com o servidor
include_once('config.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  // Recebe os dados do formulário
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Insere os dados na tabela
  $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
  if ($conn->query($sql) === TRUE) {
     

  } else {
    echo "Erro ao inserir usuário: " . $conn->error;
    die();
  }
}


?>
<html lang="pt">
  <head>
    <title>Cadastro Susu</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles/cadastro.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Criar Uma Conta</h2>
      </div>
      <form method="post" action="cadastro.php" id="form" class="form">
      <div class="form-control">
          <label for="username">Nome de usuário</label>
          <input
            name="nome"
            type="text"
            id="username"
            placeholder="Digite seu nome de usuário.."
          />
          <i class="fa-solid fa-circle-exclamation"></i>
          <i class="fas fa-check-circle"></i>
          <small>Mensagem de erro</small>
        </div>

        <div class="form-control">
          <label for="email">Email</label>
          <input name="email" type="text" id="email" placeholder="Digite seu email.." />
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
            placeholder="Digite sua senha.."
          />
          <i class="fa-solid fa-circle-exclamation"></i>
          <i class="fas fa-check-circle"></i>
          <small>Mensagem de erro</small>
        </div>

        <div class="form-control">
          <label for="password-confirmation">Confirmação de senha</label>
          <input
            type="password"
            id="password-confirmation"
            placeholder="Digite sua senha novamente"
          />
          <i class="fa-solid fa-circle-exclamation"></i>
          <i class="fas fa-check-circle"></i>
          <small>Mensagem de erro</small>
        </div>
        <small class="msg-sucess">Cadastrado com sucesso</small>
        <button onsubmit="return false;" class="button" name="submit" type="submit">Enviar</button>
      </form>
    </div>
</body>
</html>
    <script
      src="https://kit.fontawesome.com/4a2dfb5915.js"
      crossorigin="anonymous"
    ></script>
    <script src="scripts.js"></script>