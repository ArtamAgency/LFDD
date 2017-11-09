<?php

class Enigme_model extends CI_Model
{
    protected $tableEnigme = 'enigme';
    protected $tableResoudre = 'resoudre';

    public function isPlaying($userId)
    {
        $query = $this->db
            ->where('user_id', $userId)
            ->get($this->tableResoudre)
        ;
        return $query->num_rows();
    }

    public function getReponse($enigmeId)
    {
        return $this->db
            ->select('enigme_response')
            ->where('enigme_id', $enigmeId)
            ->get($this->tableEnigme)
            ->result_array()
        ;
    }

    public function getAttempts($userId)
    {
        return $this->db
            ->select('user_attempts')
            ->where('user_id', $userId)
            ->get($this->tableResoudre)
            ->result_array()
        ;
    }

    public function incrementAttempts($userId)
    {
        $attemptsArray = $this->getAttempts($userId);
        $attempts = $attemptsArray[0]['user_attempts'];
        $this->db
            ->set('user_attempts', $attempts+1)
            ->where('user_id', $userId)
            ->update($this->tableResoudre)
        ;
    }

    public function incrementEnigme($enigmeId, $userId)
    {
        $this->db
            ->set('enigme_id', $enigmeId)
            ->where('user_id', $userId)
            ->update($this->tableResoudre)
        ;
    }

    public function resetAttempts($userId)
    {
        $this->db
            ->set('user_attempts', 0)
            ->where('user_id', $userId)
            ->update($this->tableResoudre)
        ;
    }

    public function getEnigmeById($enigmeId)
    {
        return $this->db
            ->where('enigme_id', $enigmeId)
            ->get($this->tableEnigme)
            ->result_array()
        ;
    }

    public function getEnigmeEnCours($userId)
    {
        return $this->db
            ->select('enigme_id')
            ->where('user_id', $userId)
            ->get($this->tableResoudre)
            ->result_array()
        ;
    }

    public function startGame($userId)
    {
        $this->db->set('user_id', $userId);
        $this->db->set('enigme_id', 1);
        $this->db->set('user_score', 0);
        $this->db->set('user_attempts', 0);
        $this->db->set('user_spentime', 0);
        $this->db->insert($this->tableResoudre);
    }

    public function getRanking()
    {
        return $this->db
            ->join('user', 'user.user_id = resoudre.user_id')
            ->where('enigme_id > 1')
            ->order_by('enigme_id DESC, user_name ASC')
            ->get($this->tableResoudre, 50, 0)
            ->result_array()
        ;
    }

}