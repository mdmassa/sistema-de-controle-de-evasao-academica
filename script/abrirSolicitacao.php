<?php
    $host = "localhost";
    $dbname = "unifesspa";
    $username = "root";
    $password = "";

     $con = mysqli_connect($host, $username, $password, $dbname);

    if (!$con) {
       die("Connection failed!" . mysqli_connect_error());
    }

    require_once('./lib/tcpdf/tcpdf.php');
    
    $matricula = $_GET['matricula'];
    $sql = "SELECT * FROM SolicitacoesEvasao WHERE matricula = '$matricula'";

    $rs = mysqli_query($con, $sql);

    if ($aluno = mysqli_fetch_assoc($rs)) {
    
        $pdf = new TCPDF('L', 'cm', array(10, 20), true, 'UTF-8', false);
        
        $pdf->SetTitle('Informações do aluno');
        
        $pdf->AddPage();
        
        $pdf->SetFont('helvetica', '', 11);
        $pdf->Write(5, 'Nome: ' . $aluno['nome']);
        $pdf->Ln();
        $pdf->Write(5, 'Matrícula: ' . $aluno['matricula']);
        $pdf->Ln();
        $pdf->Write(5, 'Curso: ' . $aluno['curso']);
        $pdf->Ln();
        $pdf->Write(5, 'Campus: ' . $aluno['campus']);
        $pdf->Ln();
        $pdf->Write(5, 'E-mail: ' . $aluno['email']);
        $pdf->Ln();
        $pdf->Write(5, 'Telefone: ' . $aluno['telefone']);
        $pdf->Ln();
        $pdf->Write(5, 'Motivo da evasão: ' . $aluno['motivo_evasao']);
        
        $pdf->Output('informacoes_do_aluno.pdf', 'I');    

    } else {
        echo "Aluno não encontrado!";
    }

?>