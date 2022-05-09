<?php

if(isset($_POST['name'], $_POST['email'], $_POST['message'])){
    $fname = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $subject = "Message From {$fname} from Hazel Photography Contact Form";
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $send_to = "skylar.beacham@outlook.com";

    if(mail($send_to, $subject, $message, $headers)){
        $feedback = 'Your message has been sent';
    }else{
        $feedback = '*Message failed to send';
    }
}
else{
    $feedback = 'Missing Params';
}

echo $feedback;
?>