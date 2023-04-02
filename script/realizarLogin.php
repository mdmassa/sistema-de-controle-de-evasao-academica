<?php 
  if(isset($_POST['entrar'])) {
      $login = $_POST['login'];
      $senha = $_POST['password'];
  }

  include 'sicea.php';

  realizarLogin($login, $senha);
?>