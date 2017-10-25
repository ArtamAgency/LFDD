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

}

?>