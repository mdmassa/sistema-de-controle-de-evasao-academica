<?php

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

    }

?>