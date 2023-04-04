<?php 

    include 'sicea.php';


    if(isset($_POST['entrar'])) {
    
        $login = $_POST['login'];
        $senha = $_POST['password'];

        realizarLogin($login, $senha);

    }


    if(isset($_POST['enviar-solicitacao'])) {
    
        $nome = $_POST['nome'];
        $nome_social = $_POST['nomesocial'];
        $curso = $_POST['cursoaluno'];
        $unidade = $_POST['unid'];
        $matricula = $_POST['nmatricula'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['tel'];
        $idade = $_POST['idade'];
        $sexo = $_POST['sexo'];
        $motivo_evasao = $_POST['justif-evasao'];
        $outros_motivos = $_POST['outros-motivos'];

        solicitarEvasao($nome, $nome_social, $curso, $unidade, $matricula, $cpf, $email, $telefone, $idade, $sexo, $motivo_evasao, $outros_motivos);
    
    }


    if (isset($_POST['enviarErros'])) {
        $matricula = $_POST['matricula'];
        $titulo = $_POST['titulo'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        informarErro($matricula, $titulo, $mensagem);
    }


    if (isset($_POST['confirmar'])) {
        $matricula = $_POST['matricula'];

        confirmarEvasao($matricula);
    }    

?>