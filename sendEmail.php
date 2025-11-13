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
        $mail->Username   = 'oprontuariomais@gmail.com'; 
        $mail->Password   = 'jdqp rclq lfbm jgym'; 
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        
        $mail->setFrom($email, $nome); 
        $mail->addAddress('oprontuariomais@gmail.com'); 
        $mail->addEmbeddedImage('src/images/wisys-logo.png', 'logo', 'wisys-logo.png');
        
$template = "
<html lang='pt-br'>
  <body style='margin: 0; padding: 50px 0; background: #f9f9f9; font-family: Arial, sans-serif;'>
    <table align='center' width='700' cellpadding='0' cellspacing='0' style='background: rgb(179,166,150); border-radius: 20px; box-shadow: 0 0 20px rgba(0,0,0,0.2);'>
      <tr>
        <td align='center' style='padding: 50px 0;'>

       
          <table width='85%' cellpadding='0' cellspacing='0' style='
            background-color: rgb(238,245,245);
            border-radius: 15px;
            padding: 30px;
            box-shadow:
              0 0 25px rgba(60,90,250,0.9),
              0 0 45px rgba(60,90,250,0.5),
              inset 0 0 20px rgba(60,90,250,0.3);
          '>
            <tr>
              <td align='center' style='padding: 30px 20px 15px 20px;'>
                <img src='cid:logo' alt='logo-wisys' style='width: 100px; display: block; margin-bottom: 15px;'>
                <h2 style='margin: 0; color: rgb(53,40,101); font-size: 24px;'>Nova Mensagem recebida!</h2>
              </td>
            </tr>
          </table>

        
          <table width='85%' cellpadding='0' cellspacing='0' style='
            background-color: rgb(25,47,121);
            border: 5px solid rgb(54,76,199);
            border-radius: 20px;
            margin-top: 40px;
            padding: 35px;
            box-shadow:
              0 0 30px rgba(60,90,250,1),
              0 0 60px rgba(60,90,250,0.6),
              inset 0 0 25px rgba(60,90,250,0.4);
          '>

            
            <tr>
              <td style='background-color: rgb(238,245,245); border-radius: 12px; padding: 25px 30px; margin: 20px 0;'>
                <p style='margin: 10px 0; color: rgb(53,40,101); font-size: 17px;'><strong>Nome:</strong> {$nome}</p>
              </td>
            </tr>

            <tr><td style='height: 20px;'></td></tr>

            
            <tr>
              <td style='background-color: rgb(238,245,245); border-radius: 12px; padding: 25px 30px; margin: 20px 0;'>
                <p style='margin: 10px 0; color: rgb(53,40,101); font-size: 17px;'><strong>Email:</strong> {$email}</p>
              </td>
            </tr>

            <tr><td style='height: 20px;'></td></tr>

            
            <tr>
              <td style='background-color: rgb(238,245,245); border-radius: 12px; padding: 25px 30px; margin: 20px 0;'>
                <p style='margin: 10px 0; color: rgb(53,40,101); font-size: 17px;'><strong>Mensagem:</strong></p>
                <p style='margin: 10px 0; color: rgb(53,40,101); font-size: 16px;'>{$mensagem}</p>
              </td>
            </tr>

          </table>

        </td>
      </tr>
    </table>
  </body>
</html>
";
        $mail->isHTML(true);
        $mail->Subject = 'Nova mensagem';
        $mail->Body    = "$template";




            $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "erro: " . $mail->ErrorInfo;

        
    }


     



}
?>