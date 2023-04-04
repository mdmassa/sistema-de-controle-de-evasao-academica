<?php

function atualizarLista() {

    include 'conexao.php';

    $sql = "SELECT * FROM SolicitacoesEvasao";
    $rs = mysqli_query($con, $sql);

    if(isset($_POST['atualizar'])) {?>
        <table>
            <thead>
                <tr>
                <th>Matricula</th>
                <th>Nome</th>
                <th>Data</th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($rs)) { ?>
                <tr>
                    <td><?php echo $row['matricula']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['data_evasao']; ?></td>
                    <td>
                        <form action="http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/abrirSolicitacao.php" method="POST">
                                <input type="hidden" name="matricula" value="<?php echo $row['matricula'];?>" />
                                <button class="btn5" type="submit" name="gerarPDF">Abrir</button>
                        </form>

                    </td>
                    <td>
                        <form action="http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/confirmarEvasao.php" method="POST">
                                <input type="hidden" name="matricula" value="<?php echo $row['matricula'];?>" />
                                <button class="btn3" type="submit" name="confirmar"> Confirmar evasão</button>
                        </form>
                    </td>
                    <td>
                        <form action="http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/informarErro.php" method="POST">
                            <input type="hidden" name="matricula" value="<?php echo $row['matricula'];?>" /> 
                            <button class="btn4" type="submit" name="informarErro">Informar inconsistências</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    
    <?php }
}


function realizarLogin($login, $senha) {
    include 'conexao.php';

    $sql = "SELECT * FROM Admins WHERE login = '$login' AND senha = '$senha'";

    $rs = mysqli_query($con, $sql);

    atualizarLista(); 

    if (mysqli_num_rows($rs) <= 0){
        echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos.');window.location
        .href='http://localhost/sicea/sistema-de-controle-de-evasao-academica/login.php';</script>";

      } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Login realizado com sucesso.');window.location
        .href='http://localhost/sicea/sistema-de-controle-de-evasao-academica/dashboard.php';</script>";
      }

      mysqli_close($con);
}


function solicitarEvasao($nome, $nome_social, $curso, $unidade, $matricula, $cpf, $email, $telefone, $idade, $sexo, $motivo_evasao, $outros_motivos){
    include 'conexao.php';

    $sql = "INSERT INTO SolicitacoesEvasao (nome, nome_social, curso, unidade, matricula, cpf, email, telefone, idade, sexo, motivo_evasao, outros_motivos, data_evasao) VALUES ('$nome', '$nome_social', '$curso', '$unidade', '$matricula', '$cpf', '$email', '$telefone', '$idade', '$sexo', '$motivo_evasao', '$outros_motivos', NOW())";
  
    $rs = mysqli_query($con, $sql);
    
    if($rs) {
        header("Location: http://localhost/sicea/sistema-de-controle-de-evasao-academica/solicitar-evasao.php?msg=Solicitação enviada com sucesso!");
    }

    mysqli_close($con);
}


function abrirSolicitacao($matricula){

    include 'conexao.php';

    if (isset($_POST['gerarPDF'])) {
        $matricula = $_POST['matricula'];
} 

    require_once('../lib/TCPDF/tcpdf.php');
    
    $sql = "SELECT * FROM SolicitacoesEvasao WHERE matricula = '$matricula'";

    $rs = mysqli_query($con, $sql);

    if ($aluno = mysqli_fetch_assoc($rs)) {
    
        $pdf = new TCPDF('P', 'cm', array(21, 30), true, 'UTF-8', false);
                
        $pdf->SetTitle('Informações da Solicitação');

        $pdf->SetFont('helvetica', 'B', 11);

        $pdf->AddPage();

        $pdf->Image('../img/logo-pdf.png', 7, 2, 7);
        $pdf->Write(1, '');
        $pdf->Ln(4);
        $pdf->Cell(0, 0, 'SIGAA – Sistema Integrado de Gestão de Atividades Acadêmicas', 0, 1, 'C');
        $pdf->Cell(0, 0, 'Unifesspa – Universidade Federal do Sul e Sudeste do Pará CRCA', 0, 1, 'C');
        $pdf->Cell(0, 0, 'Centro de Registro e Controle Acadêmico', 0, 1, 'C');
        $pdf->Cell(0, 0, 'Rodovia BR-230 (Transamazônica), Loteamento Cidade Jardim, Av. dos Ipês, Bairro: Cidade Jardim,', 0, 1, 'C');
        $pdf->Cell(0, 0, 'Cidade: Marabá, Estado: Pará, CEP.: 68.500-000.', 0, 1, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('helvetica', 'B', 20);
        $pdf->Cell(0, 0, 'Solicitação de Evasão', 0, 1, 'C');
        $pdf->Ln();

        $pdf->SetFont('helvetica', '', 11);
        $pdf->Write(1, 'Nome: ' . $aluno['nome']);
        $pdf->Ln();
        $pdf->Write(1, 'Nome social: ' . $aluno['nome_social']);
        $pdf->Ln();
        $pdf->Write(1, 'Curso: ' . $aluno['curso']);
        $pdf->Ln();
        $pdf->Write(1, 'Unidade: ' . $aluno['unidade']);
        $pdf->Ln();
        $pdf->Write(1, 'Matrícula: ' . $aluno['matricula']);
        $pdf->Ln();
        $pdf->Write(1, 'CPF: ' . $aluno['cpf']);
        $pdf->Ln();
        $pdf->Write(1, 'E-mail: ' . $aluno['email']);
        $pdf->Ln();
        $pdf->Write(1, 'Telefone: ' . $aluno['telefone']);
        $pdf->Ln();
        $pdf->Write(1, 'Idade: ' . $aluno['idade']);
        $pdf->Ln();
        $pdf->Write(1, 'Sexo: ' . $aluno['sexo']);
        $pdf->Ln();
        $pdf->Write(1, 'Motivo da evasão: ' . $aluno['motivo_evasao']);
        $pdf->Ln();
        $pdf->Write(1, 'Outros motivos: ' . $aluno['outros_motivos']);
        $pdf->Output('informacoes_da_solicitacao.pdf', 'I');
        mysqli_close($con);
    }
}


function confirmarEvasao($matricula){
    include 'conexao.php';

    $sql = "SELECT * FROM SolicitacoesEvasao WHERE matricula = '$matricula'";
    $rs = mysqli_query($con, $sql);

    while($row =  mysqli_fetch_assoc($rs)) {
        $nome = $row['nome'];
        $nome_social = $row['nome_social'];
        $curso = $row['curso'];
        $unidade = $row['unidade'];
        $matricula = $row['matricula'];
        $cpf = $row['cpf'];
        $email = $row['email'];
        $telefone = $row['telefone'];
        $idade = $row['idade'];
        $sexo = $row['sexo'];
        $motivo_evasao = $row['motivo_evasao'];
        $outros_motivos = $row['outros_motivos'];
        $data_evasao = $row['data_evasao'];
    }

    $sql2 ="INSERT INTO EstatisticasEvasao (nome, nome_social, curso, unidade, matricula, cpf, email, telefone, idade, sexo, motivo_evasao, outros_motivos, data_evasao) VALUES ('$nome', '$nome_social', '$curso', '$unidade', '$matricula', '$cpf', '$email', '$telefone', '$idade', '$sexo', '$motivo_evasao', '$outros_motivos', '$data_evasao')";
    $rs2 = mysqli_query($con, $sql2);

    $sql3 = "DELETE FROM SolicitacoesEvasao WHERE matricula = '$matricula'";
    $rs3 = mysqli_query($con, $sql3);

    $sql4 = "UPDATE Alunos SET status_matricula=0 WHERE matricula='$matricula'";
    $rs4 = mysqli_query($con, $sql4);

    require '../lib/sendgrid-php/sendgrid-php.php';

    $sendgrid = new \SendGrid('');

    $titulo = "UNIFESSPA - Solicitação de evasão confirmada";

    $mensagem = "Caro, aluno\n Sua solicitação de evasão foi confirmada pela secretaria.\n\nAtt: Secretaria da UNIFESSPA. ";

    $mail = new \SendGrid\Mail\Mail(); 
    $mail->setFrom("felipe@unifesspa.edu.br", "Luiz Felipe de Sousa Vasconcelos");
    $mail->setSubject($titulo);
    $mail->addTo($email, $nome);
    $mail->addContent("text/plain", $mensagem);
    
    try {
        $response = $sendgrid->send($mail);
        echo "<script language='javascript' type='text/javascript'>
        alert('Solicitação confirmada com sucesso!');window.location.
        href='http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/dashboard.php';</script>";

    } catch (Exception $e) {
        echo "Erro ao confirmar solicitação: " . $e->getMessage();
    }

    mysqli_close($con);
}


function informarErro($matricula, $titulo, $mensagem){
    include 'conexao.php';

    $sql = "SELECT * FROM SolicitacoesEvasao WHERE matricula = '$matricula'";
    $rs = mysqli_query($con, $sql);

    if (mysqli_num_rows($rs) > 0) {
        $row = mysqli_fetch_assoc($rs);
        $nome = $row['nome'];
        $email = $row['email'];
    } else {
        echo "Nenhum resultado encontrado";
    }



    require '../lib/sendgrid-php/sendgrid-php.php';

    $sendgrid = new \SendGrid('');

    $mail = new \SendGrid\Mail\Mail(); 
    $mail->setFrom("felipe@unifesspa.edu.br", "Luiz Felipe de Sousa Vasconcelos");
    $mail->setSubject($titulo);
    $mail->addTo($email, $nome);
    $mail->addContent("text/plain", $mensagem);

    $sql2 = "DELETE FROM SolicitacoesEvasao WHERE matricula = '$matricula'";
    $rs2 = mysqli_query($con, $sql2);

    try {
        $response = $sendgrid->send($mail);
        echo "<script language='javascript' type='text/javascript'>
        alert('E-mail informando inconsistências enviado com sucesso!');window.location.
        href='http://localhost/sicea/sistema-de-controle-de-evasao-academica/script/informarErro.php';</script>";

    } catch (Exception $e) {
        echo "Erro ao enviar e-mail: " . $e->getMessage();
    }

    mysqli_close($con);
}

?>

