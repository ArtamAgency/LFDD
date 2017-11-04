<?php

class Enigme extends CI_Controller
{
    protected function isConnected()
    {
        return isset($this->session->userdata);
    }

    public function startGame()
    {
        if($this->isConnected())
        {
            $userId = $_SESSION['user_infos'][0]['user_id'];
            if($this->Enigme_model->isPlaying($userId) == 0)
            {
                $this->Enigme_model->startGame($userId);
            }
            else
            {
                $enigmeId = $this->Enigme_model->getEnigmeEnCours($userId);
                $this->drawEnigme($enigmeId);
            }
        }
        else
        {
            $this->load->view('user/login');
        }
    }

    public function drawEnigme($enigmeId)
    {
        if($this->isConnected())
        {
        $userId = $_SESSION['user_infos'][0]['user_id'];
        $enigmeEnCours = $this->Enigme_model->getEnigmeEnCours($userId);
            if($enigmeEnCours == $enigmeId)
            {
                //rendre vue enigme avec $enigmeId en parametre (url type projets3/enigme/2)
            }
            else
            {
                $this->drawEnigme($enigmeEnCours);
            }
        }
        else
        {
            $this->load->view('user/login');
        }
    }

    //fonction à mettre en action du formulaire de réponse à l'énigme
    public function enigmeHandler($enigmeId)
    {
        $userId = $_SESSION['user_infos'][0]['user_id'];
        $attempts = $this->Enigme_model->getAttempts($userId);
        $reponseUser = $this->input->post('reponse');
        $reponseDB = $this->Enigme_model->getReponse($enigmeId);

        if($reponseUser == $reponseDB)
        {
            $enigmeId += 1;
            $this->drawEnigme($enigmeId);
        }
        else
        {
            if($attempts == 3)
            {
                // appeler fonction qui bloque utilisateur
            }
            else
            {
                // incrémenter user_attempts en db
                $this->drawEnigme($enigmeId);
            }
        }
    }

}