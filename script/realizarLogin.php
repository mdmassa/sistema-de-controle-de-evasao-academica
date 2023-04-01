<?php
    include 'conexao.php';

    if(isset($_POST['entrar'])) {
        $login = $_POST['login'];
        $senha = $_POST['password'];
    }

    $sql = "SELECT * FROM Admins WHERE login = '$login' AND senha = '$senha'";

    $rs = mysqli_query($con, $sql);

    if (mysqli_num_rows($rs) <= 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos.');window.location
        .href='http://localhost/sicea/sistema-de-controle-de-evasao-academica/login.html';</script>";

      } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Login realizado com sucesso.');window.location
        .href='http://localhost/sicea/sistema-de-controle-de-evasao-academica/dashboard.html';</script>";
      }

?>