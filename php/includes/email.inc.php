<?php
	$email = $checkPwd['email'];
	$pseudo = $checkPwd['pseudo'];
	$pwd = $sendPwd;
	
	function editPwd(){
		global $email, $pseudo, $pwd;
		
		$mail = new PHPMailer();
		$mail->CharSet = "UTF-8";
		$mail->SMTPAutoTLS = false;
		//Enable SMTP debugging. 
		//$mail->SMTPDebug = 3;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();            
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;      
		//Set SMTP host name                          
		$mail->Host = "smtp.gmail.com";                    
		//Provide username and password     
		$mail->Username = "lpdimgroupe4@gmail.com";                 
		$mail->Password = "Bafifipe62";                                                     
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->From = "lpdimgroupe4@gmail.com";
		$mail->FromName = "Bafifipe Inc";

		$mail->addAddress("".$email."", "".$pseudo."");

		$mail->isHTML(true);

		$mail->Subject = "Modification mot de passe.";
		$mail->Body = '<i>Bonjour '.$pseudo.', votre mot de passe a été réinitialisé, le voici: '.$pwd.'</i>';

		if(!$mail->send()) 
		{
			echo "Mailer Error: " . $mail->ErrorInfo;
		} 
		else 
		{
			echo 'Mot de passe envoyé avec succès à '.$email;
		}		
	}
	
	

?>