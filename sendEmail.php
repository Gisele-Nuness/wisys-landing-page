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

        
        $template = "
        <html>
        <head>

        <style>
        body {font-family: Arial, sans-serif; }
            .header { background-color: #0c31acff; padding: 10px; }
            .content { margin: 20px; color:black; align-items:center; border:solid 2px #0c31acff; box-shaddow: ; }


        </style>
    </head>

    <body>
    <div class='header'>
    <h2>Nova Mensagem recebida</h2>
    </div>
    <div class='content'>
        <p><strong>Nome:</strong>{$nome}</p>
        <p><strong>Email:</strong>{$email}</p>    
        <p><strong>Mensagem:</strong></p>
        <p>{$mensagem}</p>
        </div>
    </body>
    </html>
    ";

        $mail->isHTML(true);
        $mail->Subject = 'Nova mensagem';
        $mail->Body    = "$template";




            $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar: {$mail->ErrorInfo}";

        
    }


     



}
?>