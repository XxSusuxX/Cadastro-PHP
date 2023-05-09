<?php 

if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['id'])){
    die("Você não pode acessar está página porque não está logado. <a href=\"./pages/login.php\">Login</a>");
}

?>