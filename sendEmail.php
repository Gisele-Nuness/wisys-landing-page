<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer-master/src/Exception.php';
require __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $templatePath = __DIR__ . '/email.html';
    if (!file_exists($templatePath)) {
        die("Erro: Template de e-mail não encontrado em " . $templatePath);
    }
    $template = file_get_contents($templatePath);

    $template = str_replace(
        ['{{NOME}}', '{{EMAIL}}', '{{MENSAGEM}}'],
        [$nome, $email, nl2br($mensagem)], 
        $template
    );

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'oprontuariomais@gmail.com'; 
        $mail->Password   = 'jdqp rclq lfbm jgym'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom('oprontuariomais@gmail.com', 'Site Wisys'); 
        $mail->addReplyTo($email, $nome); 
        $mail->addAddress('oprontuariomais@gmail.com'); 

        $logoPath = __DIR__ . '/src/images/wisys-logo.png';
        if (file_exists($logoPath)) {
            $mail->addEmbeddedImage($logoPath, 'logo_wisys', 'wisys-logo.png');
        }
        
        $mail->isHTML(true);
        $mail->Subject = 'Nova Mensagem - Wisys';
        $mail->Body    = $template;

        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar: " . $mail->ErrorInfo;
    }
}
?>