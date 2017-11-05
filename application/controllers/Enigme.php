<?php

class Enigme extends CI_Controller
{
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
    }

    public function attemptsPlusOne($userId)
    {
        $this->Enigme_model->IncrementAttempts($userId);
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
                var_dump($enigmeEnCours);
                if ($enigmeEnCours == $enigmeId) {
                    //rendre vue enigme avec $enigmeId en parametre (url type projets3/enigme/2)
                    echo 'it works';
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
            if($attempts == 2)
            {
                $this->attemptsPlusOne($userId);
                $this->blockUser($userId);
            }
            else
            {
                $this->attemptsPlusOne($userId);
                $this->drawEnigme($enigmeId);
            }
        }
    }

}