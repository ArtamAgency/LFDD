<?php

class User_model extends CI_Model
{
    protected $tableUser = 'user';

    public function userLogin($login, $password)
    {
        return $this->db
            ->from($this->tableUser)
            ->where('user_name', $login)
            ->where('user_password', $password)
            ->get()
            ->result_array()
        ;
    }

    public function updatePassword($password)
    {
        $this->db->set('user_password', $password);
        $this->db->where('user_id', $_SESSION['user_infos'][0]['user_id']);
        $this->db->update($this->tableUser);
    }

    public function getUsers()
    {
        $this->db->get($this->tableUser);
    }

    public function updateMail($mail)
    {
        $this->db->set('user_mail', $mail);
        $this->db->where('user_id', $_SESSION['user_infos'][0]['user_id']);
        $this->db->update($this->tableUser);
    }

    public function insertUser($data)
    {
        var_dump($data);
        $this->db->set('user_name', $data['user_name']);
        $this->db->set('user_password', $data['user_password']);
        $this->db->set('user_mail', $data['user_mail']);
        $this->db->set('user_blocked', 0);
        $this->db->set('user_bantil', NULL);
        $this->db->set('user_admin', 0);
        $this->db->insert($this->tableUser);
    }

    //send verification email to user's email id
    public function sendEmail($to_email)
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
        return $this->db->update($this->tableUser, $data);
    }

    public function blockUserModel($userId)
    {
        $date = date('Y-m-d H:i:s', strtotime('+1 day'));
        $this->db
            ->set('user_blocked', 1)
            ->set('user_bantil', $date, TRUE)
            ->where('user_id', $userId)
            ->update($this->tableUser)
        ;
    }

    public function unblockUserModel($userId)
    {
        $this->db
            ->set('user_blocked', 0)
            ->set('user_bantil', NULL)
            ->where('user_id', $userId)
            ->update($this->tableUser)
        ;
    }

    public function getTimeBan($userId)
    {
        $query = $this->db
            ->select('user_bantil')
            ->where('user_id', $userId)
            ->get($this->tableUser)
            ->result_array()
        ;
        return $query;
    }
    public function checkBan($userId)
    {
        $query = $this->db
            ->select('user_blocked')
            ->where('user_id', $userId)
            ->get($this->tableUser)
            ->result_array()
        ;
        return $query;
    }
}
