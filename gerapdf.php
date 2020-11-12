<?php	

require_once('fpdf/fpdf.php');
require_once('email/PHPMailer.php');
require_once('email/SMTP.php');
require_once('email/Exception.php');
include 'conexao.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório OS'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,"Id",1,0,"C");
$pdf->Cell(40,7,"Nome.",1,0,"C");
$pdf->Cell(60,7,utf8_decode("Cidade"),1,0,"C");
$pdf->Cell(60,7,("UF"),1,0,"C");
$pdf->Ln();

foreach ($ass as $a){
    $pdf->Cell(50,7,utf8_decode($a["ID"]),1,0,"C");
    $pdf->Cell(40,7,($a["Nome"]),1,0,"C");
    $pdf->Cell(60,7, utf8_decode($a["endereco"]),1,0,"C");
    $pdf->Cell(50,7,($a["UF"]),1,0,"C");
    $pdf->Ln();
}
$pdfdoc = $pdf->Output('', 'S');




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->CharSet="UTF-8";
    $mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'teste14711471@gmail.com';
	$mail->Password = 'senha1471';
	$mail->Port = 587;
	

	$mail->setFrom('teste14711471@gmail.com');
	
	$mail->addAddress('teste14711471@gmail.com');
$mail->addStringAttachment($pdfdoc, 'umpdf.pdf'); 


	$mail->isHTML(true);
	$mail->Subject = 'Teste de email via gmail';
	$mail->Body = 'Tabela</strong>';
	$mail->AltBody = 'Chegou o email teste';

 $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo 'A mensagem não foi enviada!';
    echo ' Erro: ' . $mail->ErrorInfo;
}

?>