<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertController extends Controller
{

    public static function sendEmail($email, $email_message, $email_subject, $client_name)
    {


        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,'https://pfamart.com/email_send/send.php');
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, "email=".$email."&message=".$email_message."&subject=".$email_subject."");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //execute post
        $result = curl_exec($ch);


        //close connection
        curl_close($ch);
        /*echo $result; exit;*/
        // Further processing ...
        if ($result == 1)
        {

            return $result;

        }
        else
        {


            return $result;

        }
    }
}
