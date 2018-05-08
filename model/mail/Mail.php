<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mail {

    public function enviarCorreoRecordarContraseña($nombre, $apellido, $correo, $mensaje) {
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        $exito = false;
        try {
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "pruebaswebufps@gmail.com";
            $mail->Password = "kakaroto1494";
            $mail->setFrom('palo1493@gmail.com','Panaderia y Reposteria');
            $mail->addAddress($correo);
            $mail->isHTML(true);

            $mail->Subject = 'Recordar Clave de La Panaderia y Reposteria'; //asunto

            $mail->Body = $this->plantillaMensaje($nombre, $apellido, $mensaje); //mensaje
            
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));

            $exito = $mail->send(); //enviar    
        } catch (Exception $e) {
            throw new Exception('No lograste enviar el correo ');
        }
        return $exito;
    }

    public function plantillaMensaje($nombre, $apellido, $mensaje) {
        $plantilla = '<div style="width:90%;display:block;margin:auto;padding: 1em;border: 2px solid rgba(83,44,26,.95);border-radius: 15px 45px 15px 45px;box-shadow: 12px 12px 12px 12px rgba(252,83,2,.9);">
          <h1 style=" font-family:arial;font-size: 40px;color: black;font-family: arial;">¡ Estimado(a), ' . $nombre .' '. $apellido . ' !</h1>
          <hr style="margin-left: 0;width: 100%;border: 3px solid rgba(83,44,26,.95);border-radius: 100px /4px;box-shadow: 5px 5px 5px rgba(252,83,2,.9);">
          <p style="font-size: 20px;color: black;font-family: arial;"> Te encuentras registrado en nuestra plataforma y has solicitado recordar tu contraseña. <br><br>
          Tu contraseña es = ' . $mensaje . '<br><br> Para mayor seguridad, le recomendamos eliminar este mensaje o cambiar la contraseña desde el sitio.</p><br>
          Si no lo ha solicitado ignore este mensaje.<br><br>
          <a style="font-size: 30px;background: rgba(252,83,2,.9);;padding: 2px;text-decoration: none;width: 50%;border-radius: .3rem;color: black;display: block;margin: auto;text-align: center;font-family: arial;border:1px solid rgba(83,44,26,.95)" href="http://localhost/Proyecto_BD/Inicio" role="button">Ir al Sitio</a>
        </div>';
        return $plantilla;
    }

}
