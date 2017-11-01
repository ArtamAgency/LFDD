<?php

class Enigme extends CI_Controller
{
    protected function isConnected()
    {
        return isset($this->session->userdata());
    }

    public function startGame()
    {
        if($this->isConnected())
        {
            //quand l'utilisateur appuie sur le bouton "commencer à jouer" sur l'accueil
            //insérer ses infos en db dans la table résoudre
        }else
        {
            $this->load->view('user/login');
        }
    }

    public function drawEnigme($enigmeId)
    {
        if($this->isConnected())
        {
        $userId = $this->session->userdata('user_id');
        $enigmeEnCours = $this->Enigme_model->getEnigmeEnCours($userId);
            if($enigmeEnCours == $enigmeId)
            {
                //rendre vue enigme avec $enigmeId en parametre (url type projets3/enigme/2)
            }else
            {
                $this->drawEnigme($enigmeEnCours);
            }
        }else
        {
            $this->load->view('user/login');
        }
    }

    //fonction à mettre en action du formulaire de réponse à l'énigme
    public function enigmeHandler($enigmeId)
    {
        $userId = $this->session->userdata('user_id');
        $attempts = $this->Enigme_model->getAttempts($userId);
        $reponseUser = $this->input->post('reponse');
        $reponseDB = $this->Enigme_model->getReponse($enigmeId);

        if($reponseUser == $reponseDB)
        {
            $enigmeId += 1;
            $this->drawEnigme($enigmeId);
        }else
        {
            if($attempts == 3)
            {
                // appeler fonction qui bloque utilisateur
            }else
            {
                // incrémenter user_attempts en db
                $this->drawEnigme($enigmeId);
            }
        }
    }
}