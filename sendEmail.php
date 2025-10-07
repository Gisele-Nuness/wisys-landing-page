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

    $mail = new PHPMailer(true);

    try {
       
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'admwisys@gmail.com'; 
        $mail->Password   = 'zmhv xymv ttef vwnv'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        
        $mail->setFrom($email, $nome); 
        $mail->addAddress('admwisys@gmail.com'); 

        $mail->isHTML(true);
        $mail->Subject = 'Nova mensagem';
        $mail->Body    = "<strong>Nome:</strong> $nome<br>
                          <strong>Email:</strong> $email<br>
                          <strong>Mensagem:</strong><br>$mensagem";

            $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar: {$mail->ErrorInfo}";
    }
}
?>