<?php
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
    }

    $host = "localhost";
    $dbname = "unifesspa";
    $username = "root";
    $password = "";

    $con = mysqli_connect($host, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }

    $sql = "INSERT INTO SolicitacoesEvasao (nome, nome_social, curso, unidade, matricula, cpf, email, telefone, idade, sexo, motivo_evasao, outros_motivos, data_evasao) VALUES ('$nome', '$nome_social', '$curso', '$unidade', '$matricula', '$cpf', '$email', '$telefone', '$idade', '$sexo', '$motivo_evasao', '$outros_motivos', NOW())";
  
    $rs = mysqli_query($con, $sql);
    
    if($rs) {
        echo "Solicitacao enviada!";
    }
  
    mysqli_close($con);

?>