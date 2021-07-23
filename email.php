<?php
require './scripts.php/Exception.php';
require './scripts.php/PHPMailer.php';
require './scripts.php/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	

	function email($para_email, $para_nome,$assunto, $body){
	$mail = new PHPMailer(true);
	try {
    //Server settings
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                         //Send using SMTP
    $mail->Host       = 'mail.observatoriodesaudemental.com.br';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contatoteste@observatoriodesaudemental.com.br';                     //SMTP username
    $mail->Password   = '$Teste$Contato$22';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contatoteste@observatoriodesaudemental.com.br', 'Observatorio de Saude Mental');
    $mail->addAddress($para_email, $para_nome);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<p style="text-align: center;" >Email enviado!</p> ';
} catch (Exception $e) {
    echo "Email não pode ser enviado. Mailer Error: {$mail->ErrorInfo}";
}
	}//Function

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	$telefone = $_POST['phone'];
	$assunto = $_POST['assunto'];
	$corpo_email = "<h3>Nome: $nome </h3> <p>Email: $email </p> <p>Telefone: $telefone </p> <p>Assunto: $assunto </p>  <p>Mensagem:</p> $mensagem";
	email("matheus.levy@discente.ufma.br", "Observatório de Saúde Mental", $assunto, $corpo_email);
	//petcomputacao.ufma@gmail.com
?>
