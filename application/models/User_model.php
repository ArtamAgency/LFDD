<?php

class User_model extends CI_Model
{
    protected $table = 'user';

    public function userLogin($login, $password) {

        return $this->db
            ->from($this->table)
            ->where('user_name', $login)
            ->where('user_password', $password)
            ->get()
            ->result_array();
    }

    public function updatePassword($password)
    {
        $this->db->set('user_password', $password);
        $this->db->where('user_id', $_SESSION['user_infos'][0]['user_id']);
        $this->db->update('user');
    }

    function insertUser($data)
    {
        var_dump($data);
        $this->db->set('user_name', $data['user_name']);
        $this->db->set('user_password', $data['user_password']);
        $this->db->set('user_mail', $data['user_mail']);
        $this->db->set('user_blocked', 0);
        $this->db->set('user_bantil', NULL);
        $this->db->set('user_admin', 0);
        $this->db->insert('user');
    }



    //send verification email to user's email id
    function sendEmail($to_email)
    {
        require 'asset/PHPMailer-master/src/PHPMailer.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('antoine.menardie@gmail.com');     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Inscrption sur La Ferme de Didier !';
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

?>
