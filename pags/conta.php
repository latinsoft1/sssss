<?php
    $result = "";

    if(isset($_POST['submit'])){
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=True;
        $mail->SMTPSecure='tls';
        $mail->Usernamer='infoguatajiagua@gmail.com';
        $mail->password='guatajiagua2021';

        $mail->setFrom($_POST['email'],$_POST['nombre']);
        $mail->addAddress('infoguatajiagua@gmail.com');
        $mail->addReplyTo($_POST['email'],$_POST['nombre']);

        $mail->isHTML(true);
        $mail->Subject="Enviado por: " .$_POST['nombre'];
        $mail->Body='<p align=justify>Nombre: '.$_POST['nombre'].'<br>Email: ' .$_POST['email']. 
        '<br>Mensaje: '.$_POST['mensaje'].'</p>';

        if(!$mail->send()){
            $result="Algo Esta mal, intentelo más tarde";}
        
        else
        {
            $result="Mensaje enviado... Que tenga un buen dia".$_POST['nombre'].;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Envio de correo | DG</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../style/normalize/normalize.css">
    <link rel="stylesheet" type="text/css" href="../fuente/fuente.css">
    <link rel="stylesheet" href="../style/css/estilos.css">
</head>
<body>
<main>
    <div class="upcont">
        <section class="l-section s-100 contac" id="">
            <div class="contac__content">
                <h1 class="center-content">Envío de correo con PHP, SMTP y PHPMailer.</h1>
            </div>
        </section>
    </div>
    <section class="l-section cont">
        <div class="espcont center-content center-block">
            <div class="espform s-30 center-block center-content">
                <form action="" method="post">
                    <div class="espnom">
                        <label for="nombre">Nombre y primer apellido</label>
                        <input id="nombre" name="nombre" type="text"  maxlength="50" data-length="50" required />
                    </div>
                    <div class="espema">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email"  maxlength="50" data-length="50" required />
                    </div>
                    <div class="espmen">
                        <label for="titmensaje">Mensaje</label>
                        <div class="alturaMensa">
                            <textarea name="mensaje" id="mensaje" class="ESPmensaje center-content" required></textarea>
                        </div>
                    </div>
                    <div class="espenv">
                        <button type="submit" name="submit">Enviar</button>
                        <h5 class="notifCorrecto"><?= $result; ?></h5>
                    </div>
                </form>
                <section class="btn-in-con" id="btn-in">
                    <a href="../index.html">Regresar</a>
                </section>                    
            </div> 
        </div>                     
    </section>
</main>
</body>
</html>
