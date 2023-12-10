<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require '../config.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    $email = $_POST["email"];

    $conn = config::getConnexion();
    $sql = "SELECT mdp FROM client WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->rowcount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $user_password = $row["mdp"];
    
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';                  
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'mariemaraoud3@gmail.com';                     
            $mail->Password   = 'tqji oibs jomt foao';                            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($email);     //Add a recipient         
        
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Your Password Recovery';
            $mail->Body = 'Your password is: ' . $user_password;
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }else {
        echo "User not found or email is invalid";}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <div class="cadre">
        <h1><strong>Password Recovery</strong></h1>
        <form class="" action="" method="POST">
            <div class="input-box">
                <input type="email" name="email" value="" placeholder="Email" ><br>
            </div>
            <button type="submit" name="send" class="btn">Send email</button>
        </form>
    </div>
</body>
<style>
    *{
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }
    body {
        font-family: Arial, sans-serif;
        justify-content: center;
        align-items: center;
        background: #84CB86;
    }
    .cadre{
        width: 420px;
        background: transparent;
        border: 2px solid rgba(255,255,255, .2);
        backdrop-filter: blur(20px);
        box-shadow: 0 0 10px rgba(0,0,0, .2);
        color: #fff;
        border-radius: 10px;
        padding: 40px 20px;
        margin: 30px auto;
    }
    .cadre h1{
        font-size: 36px;
        text-align: center;
        color:white;
        }
    .cadre .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255,255,255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }
        .input-box input::placeholder{
            color: #fff;
        }
        .cadre .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0,0,0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
    form {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
    }

</style>
</html>
