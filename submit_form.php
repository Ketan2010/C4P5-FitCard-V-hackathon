<?php
if(isset($_POST['contactFrmSubmit']) && !empty($_POST['email']) ){
    include('connection/db.php');
  
    $email  = $_POST['email'];
    $query = mysqli_query($conn, "select * from fit_card_request where email='$email'");
    
    if($query){
        if(mysqli_num_rows($query)>0){
            $row = mysqli_fetch_array($query);
            $cont = $row['contact'];
            $name = $row['name'];
            $pat_mail = $row['email'];
            $fit_id = $row['fit_id'];

                // ================================= send sms=========================================


                $contact='91'.$cont;   //contact from form and adding '91' to it
                $hash = "0103767c1b4c52d07f0cfc3ddb06414e772e1551a73c660e8218a46edfb7b915";   //hash key which you will get after creating an account from api
                $test = "0";  //keep this as it is
                $sender = "TXTLCL"; // This is who the message appears to be from.
                $numbers = "$contact"; // A single number or a comma-seperated list of numbers
                $message = "Hello,".$name." This is your Fit Card ID : ".$fit_id;   //message which is to be displayed in the sms
                $message = urlencode($message);
                $username = 'zeelmehta19.zm@gmail.com';
                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                $ch = curl_init('http://api.textlocal.in/send/?');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
                // echo $result;
                $json = json_decode($result, true);



                // ===================send mail=========================

                require("PHPMailer/src/PHPMailer.php");
                require("PHPMailer/src/SMTP.php");
                require("PHPMailer/src/Exception.php");
                    
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                $mail->setFrom('admin@example.com');
                $mail->addAddress($pat_mail);
                $mail->Subject = 'Fit Card ID';
                $mail->Body = 'Hello,'.$name.' Your Fit Card ID is :'.$fit_id;
                $mail->IsSMTP();
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'ssl://smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Port = 465;
                $mail->Username = 'medtechsolutions.vit@gmail.com';
                $mail->Password = 'medtech@1234';
                $mail->send();

            $status = 'ok';
        } else {
            $status = 'no';
        }
    }else{
        $status = 'err';
    }
    
    // Output status
    echo $status;die;
}