<?php

class Enigme extends CI_Controller
{
    protected $nombreEnigmes = 10;

    protected function isConnected()
    {
        return isset($_SESSION['user_infos']);
    }

    protected function isNotBanned()
    {
        $userId = $_SESSION['user_infos'][0]['user_id'];
        $statusArray = $this->User_model->checkBan($userId);
        $banned = $statusArray[0]['user_blocked'];
        if($banned == 0)
        {
            return TRUE;
        }
        else
        {
            $timeBanArray = $this->User_model->getTimeBan($userId);
            $timeBan = $timeBanArray[0]['user_bantil'];
            $now = date('Y-m-d H:i:s');
            if($now > $timeBan)
            {
                $this->unblockUser($userId);
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
    protected function blockUser($userId)
    {
        $this->User_model->blockUserModel($userId);
    }

    protected function unblockUser($userId)
    {
        $this->User_model->unblockUserModel($userId);
        $this->attemptsAtZero($userId);
    }

    protected function attemptsPlusOne($userId)
    {
        $this->Enigme_model->IncrementAttempts($userId);
    }

    protected function enigmePlusOne($enigmeId, $userId)
    {
        $this->Enigme_model->incrementEnigme($enigmeId, $userId);
    }

    protected function attemptsAtZero($userId)
    {
        $this->Enigme_model->resetAttempts($userId);
    }

    public function startGame()
    {
        if($this->isConnected())
        {
            //var_dump($_SESSION);
            $userId = $_SESSION['user_infos'][0]['user_id'];
            if($this->Enigme_model->isPlaying($userId) == 0)
            {
                $this->Enigme_model->startGame($userId);
            }
            else
            {
                $enigmeIdArray = $this->Enigme_model->getEnigmeEnCours($userId);
                $enigmeId = $enigmeIdArray[0]['enigme_id'];
                //header('Location: drawenigme/'.$enigmeId);
                redirect('/enigme/drawenigme/'.$enigmeId);
            }
        }
        else
        {
            $this->load->view('user/login');
        }
    }

    public function drawEnigme($enigmeId)
    {
        if($this->isConnected()) {
            if ($this->isNotBanned()) {
                $userId = $_SESSION['user_infos'][0]['user_id'];
                $enigmeEnCoursArray = $this->Enigme_model->getEnigmeEnCours($userId);
                $enigmeEnCours = $enigmeEnCoursArray[0]['enigme_id'];
                if ($enigmeEnCours == $enigmeId) {
                    $data['enigme'] = $this->Enigme_model->getEnigmeById($enigmeId);
                    $this->load->view('enigmes/enigme', $data);
                } else {
                    //header('Location: http://localhost/projets3/enigme/drawenigme/'.$enigmeEnCours);
                    redirect('/enigme/drawenigme/' . $enigmeEnCours);
                }
            }
            else
            {
                $this->load->view('user/account');
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
        $attemptsArray = $this->Enigme_model->getAttempts($userId);
        $attempts = $attemptsArray[0]['user_attempts'];
        $reponseUser = $this->input->post('response');
        //var_dump($reponseUser);
        $reponseDBArray = $this->Enigme_model->getReponse($enigmeId);
        $reponseDB = $reponseDBArray[0]['enigme_response'];

        if($reponseUser == $reponseDB)
        {
            if($enigmeId == $this->nombreEnigmes)
            {
                $this->session->set_flashdata('change', 'Bravo tu as retrouvé Célestin !');
                redirect('/user/account');
            }
            else
            {
                $enigmeId += 1;
                $this->enigmePlusOne($enigmeId, $userId);
                $this->attemptsAtZero($userId);
                redirect('/Enigme/drawEnigme/'.$enigmeId);
            }
        }
        else
        {
            if($attempts == '2')
            {
                $this->attemptsPlusOne($userId);
                $this->blockUser($userId);
                $this->session->set_flashdata('change', 'Ton compte a été bloqué car tu as raté trois fois cette énigme :(. Il sera débloqué dans 30 minutes.');
                redirect('/User/account');
            }
            else
            {
                $this->attemptsPlusOne($userId);
                redirect('/Enigme/drawEnigme/'.$enigmeId);
            }
        }
    }

}