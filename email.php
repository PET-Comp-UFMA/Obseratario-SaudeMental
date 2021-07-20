<?php
require './scripts.php/Exception.php';
require './scripts.php/PHPMailer.php';
require './scripts.php/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_POST['nome']) or !isset($_POST['email']) or !isset($_POST['mensagem'])) {
	echo "Pacote não Permitido";
}else{
	

	function email($para_email, $para_nome,$assunto, $body){
	$mail = new PHPMailer(true);
	try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '**';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contatoteste@observatoriodesaudemental.com.br';                     //SMTP username
    $mail->Password   = '**';                               //SMTP password
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
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
	}//Function

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	$telefone = $_POST['phone'];
	$corpo_email = "<h1>Nome: $nome</h1> <p>Email: $email</p> <p>Mensagem: $mensagem</p><p>Telefone: $telefone</p>";
	$controle = email("petcomputacao.ufma@gmail.com", "Observatorio de Saude Mental", "Contato", $corpo_email);
	if($controle == 1){
		echo "Envio ok";
	}else{
		echo $controle;
	}
	}//Else
?>
