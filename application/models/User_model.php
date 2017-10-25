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
}

?>