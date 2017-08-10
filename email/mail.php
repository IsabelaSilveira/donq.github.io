<?php
/**
 * Código para envio de e-mail utilizando a classe PHPMailer
 *
 * @author Leo Baiano <leobaiano@leobaiano.com>
 * @version 1.0
*/

// Chama a classe PHPMailer (pode baixar ela aqui: http://phpmailer.sourceforge.net)
require_once('phpmailer/class.phpmailer.php');

// Instancia o objeto $mail a partir da Classe PHPMailer
$mail = new PHPMailer();

// Recupera os dados do formulário
$nom  = $_POST['nome'];
$ema  = $_POST['email'];
$fon  = $_POST['telefone'];
$dt  = $_POST['data'];

// Recupera o nome do arquivo
$arquivo_nome = $cur['name'];
// Recupera o caminho temporario do arquivo no servidor
$arquivo_caminho = $cur['tmp_name'];

// Monta a mensagem que será enviada
$corpo = "
    <strong>Contato através do site DonQ</strong><br /><br />

		<strong>Nome:</strong> $nom<br/>
    <strong>E-mail:</strong> $ema<br/>
		<strong>Telefone:</strong> $fon<br/>
    <strong>Data:</strong> $dt<br/>
	";
$corpoSimples = "
      Nome: $nom\n
	    E-mail: $ema\n
	    Telefone: $fon\n
	    Mensagem: $men\n
	";

// Define que a codificação do conteúdo da mensagem será utf-8
$mail->CharSet = "utf-8";
// Informo o Host, From, subject e para quem o e-mail será enviado
$mail->Host = 'donq host preencher';
$mail->FromName = $nom;
$mail->From = 'contato@donq.com.br';
$mail->Subject = 'Contato através do site DonQ';
$mail->AddAddress('contato@donq.com.br');
//Define o email que receberá resposta desta mensagem, quando o destinatário responder
$mail->AddReplyTo($ema, $mail->FromName);

//Endereço de resposta
/* $mail->AddReplyTo($ema);
$mail->Body = $mensagem;
$mail->AltBody = " ESPAÇO DO ALT-BODY"; */


// Informa que a mensagem deve ser enviada em HTML
$mail->IsHTML(true);

// Informa o corpo da mensagem
$mail->Body = $corpo;

// Se o e-mail destino não suportar HTML ele envia o texto simples
$mail->AltBody = $corpoSimples;

// Anexa o arquivo
$mail->AddAttachment($arquivo_caminho, $arquivo_nome);


// Tenta enviar o e-mail e analisa o resultado
if ($mail->Send()) {
    echo '<script type="text/javascript">alert("Sua mensagem foi enviada. ");
    window.location.href="http://www.donq.com.br"</script>';
}
else {
    echo 'Erro:' . $mail->ErrorInfo;
}

?>
