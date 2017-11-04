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
        ;
    }

    public function getAttempts($userId)
    {
        return $this->db
            ->select('user_attempts')
            ->where('user_id', $userId)
            ->get($this->tableResoudre)
        ;
    }

    public function getEnigmeEnCours($userId)
    {
        return $this->db
            ->select('enigme_id')
            ->where('user_id', $userId)
            ->get($this->tableResoudre)
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

}