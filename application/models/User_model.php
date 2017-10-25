<?php

require 'asset/PHPMailer-master/src/PHPMailer.php';

class user_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('user', $data);
    }



    //send verification email to user's email id
    function sendEmail($to_email)
    {
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('antoine.menardie@gmail.com');     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Mail test'.$user_ip;
        $mail->Body    = $_POST['message'];
        $mail->AltBody = $_POST['message'];


    }

    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('user_mail', $key);
        return $this->db->update('user', $data);
    }
}