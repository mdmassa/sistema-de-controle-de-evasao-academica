<?php

    if (isset($_POST['enviarErros'])) {
        $titulo = $_POST['titulo'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
    }

    include 'sicea.php';
    informarErro($matricula, $titulo, $nome, $email, $mensagem);
?>