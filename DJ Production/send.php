<?php
    date_default_timezone_set('Asia/Jakarta');
    include("PHPMailerAutoload.php");
    
    $mail = new PHPMailer;
        
        $mail->IsSMTP();                                      // Set mailer to use SMTP
        $mail->Host = '127.0.0.1';                 // Specify main and backup server
        $mail->Port = 25;                                    // Set the SMTP port
        $mail->Username = 'admin@djudi.com';                 // yes, I have entered my username mail
        $mail->Password = '@dm!n5';           // yes, API key is here
        //$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
        //$mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Helo = 'localhost';
        $mail->From = 'admin@djudi.com';
        $mail->FromName = 'DJ Admin';
        $mail->SMTPDebug = 2;
        //$mail->AddAddress('admin@djudi.com', 'hostmaster');
	 $mail->AddAddress('andrikusuma2277@gmail.com', 'Andri');

        $mail->IsHTML(true);                                  // Set email format to HTML
        $mail->WordWrap = 70;                                 // Set word wrap to 70 characters
        $mail->Subject = 'Subject';
        $mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->Send()) {
            //redirect to
            echo 'Message could not be sent.<br>';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
        }
?>