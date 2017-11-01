<?php

class Enigme_model extends CI_Model
{
    protected $tableEnigme = 'enigme';
    protected $tableResoudre = 'resoudre';

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
}