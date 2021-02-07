<?php
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// VALORES 

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$tema = $_POST['tema'];
$mensaje = $_POST['mensaje'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'secure.emailsrvr.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'alertas@medialabla.com';                     // SMTP username
    $mail->Password   = 'Wju`g^?XA3ab9TMPZ?!b';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('alertas@medialabla.com', 'Multitop');
    $mail->addAddress('scuellar@medialabla.com', 'Sandy');     // Add a recipient
    $mail->addAddress('jseclen@medialabla.com');               // Name is optional
    $mail->addAddress('jseclenmeono@gmail.com');   
    // $mail->addCC('dtch1210@gmail.com');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Libro de Reclamaciones - Multitop';
    $mail->Body    = '          <p style="color:black"><strong>Tipo Documento:</strong> '.$tipoDoc.'</p>
                                <p style="color:black"><strong>Documento:</strong> '.$documento.'</p>
                                <p style="color:black"><strong>Nombres:</strong> '.$nombres.'</p>
                                <p style="color:black"><strong>Apellido Paterno:</strong> '.$apePaterno.'</p>
                                <p style="color:black"><strong>Apellido Materno:</strong> '.$apeMaterno.'</p>
                                <p style="color:black"><strong>Domicilio:</strong> '.$domicilio.'</p>
                                <p style="color:black"><strong>Departamento:</strong> '.$departamento.'</p>
                                <p style="color:black"><strong>Provincia:</strong> '.$provincia.'</p>
                                <p style="color:black"><strong>Distrito:</strong> '.$distrito.'</p>
                                <p style="color:black"><strong>Telefono:</strong> '.$telefono.'</p>
                                <p style="color:black"><strong>Email:</strong> '.$email.'</p>
                                <p style="color:black"><strong>Identificaci&oacute;n del bien contratado:</strong> '.$check1.'</p>
                                <p style="color:black"><strong>Monto Reclamado:</strong> S/.'.$montoReclamado.'</p>
                                <p style="color:black"><strong>Detalle de reclamaci&oacute;n:</strong> '.$check2.'</p>
                                <p style="color:black"><strong>Mensaje:</strong> '.$mensaje.'</p>
                                <p style="color:black"><strong>Pedido:</strong> '.$pedido.'</p>
                        ';
    // $mail->AltBody = 'REAL real This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Ok';
    $data['res']='Ok';

} catch (Exception $e) {
    
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $data['res']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


echo json_encode($data);





?>