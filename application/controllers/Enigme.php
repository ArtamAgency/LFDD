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
    public function blockUser24h($userId)
    {
        if($_SESSION['user_infos'][0]['user_admin'] >= 1)
        {
            $this->User_model->blockUserModel24h($userId);
            $this->mailBlock($userId, '24h');
            redirect('/admin');
        }
        else
        {
            show_404();
        }
    }

    public function blockUserDef($userId)
    {
        if($_SESSION['user_infos'][0]['user_admin'] >= 1)
        {
            $this->User_model->blockUserModelDef($userId);
            $this->mailBlock($userId, 'définitif');
            redirect('/admin');
        }
        else
        {
            show_404();
        }
    }

    public function unblockUser($userId)
    {
        if($_SESSION['user_infos'][0]['user_admin'] >= 1)
        {
            $this->User_model->unblockUserModel($userId);
            $this->mailUnBlock($userId);
            redirect('/admin');
        }
        else
        {
            show_404();
        }
    }


    protected function mailBlock($userId, $duration)
    {
        require 'asset/PHPMailer-master/PHPMailerAutoload.php';
        $dataArray = $this->User_model->getUserById($userId);
        $data = $dataArray[0];
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('lafermededidier@gmail.com', 'La ferme de Didier');
        $mail->addAddress($data['user_mail'], $data['user_name']);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Compte bloqué';
        $mail->Body    = $data['user_name'].', Ton compte a été bloqué par un administrateur pour la durée suivante : <b>'.$duration.'</b>';
        $mail->AltBody = $data['user_name'].', Ton compte a été bloqué par un administrateur pour la durée suivante : <b>'.$duration.'</b>';
        if($mail->send())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    protected function mailUnBlock($userId)
    {
        require 'asset/PHPMailer-master/PHPMailerAutoload.php';
        $data = $this->User_model->getUserById($userId);
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('lafermededidier@gmail.com', 'La ferme de Didier');
        $mail->addAddress($data[0]['user_mail'], $data[0]['user_name']);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Compte débloqué';
        $mail->Body    = $data[0]['user_name'].', Ton compte n\'est plus bloqué ! <br/> <a href="'.base_url().'jouer">Clique ici</a> pour venir jouer';
        $mail->AltBody = $data[0]['user_name'].', Ton compte n\'est plus bloqué ! <br/> <a href="'.base_url().'jouer">Clique ici</a> pour venir jouer';
        if($mail->send())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
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
            $userId = $_SESSION['user_infos'][0]['user_id'];
            if($this->Enigme_model->isPlaying($userId) == 0)
            {
                $this->Enigme_model->startGame($userId);
                $this->startGame();
            }
            else
            {
                $enigmeIdArray = $this->Enigme_model->getEnigmeEnCours($userId);
                $enigmeId = $enigmeIdArray[0]['enigme_id'];
                redirect('/enigme/'.$enigmeId);
            }
        }
        else
        {
            redirect('/connexion');
        }
    }

    public function drawEnigme($enigmeId)
    {
        if(isset($_SESSION['user_infos']))
        {
            if ($this->isNotBanned())
            {
                $userId = $_SESSION['user_infos'][0]['user_id'];
                $enigmeEnCoursArray = $this->Enigme_model->getEnigmeEnCours($userId);
                $enigmeEnCours = $enigmeEnCoursArray[0]['enigme_id'];

                if ($enigmeEnCours == $enigmeId)
                {
                    $data['enigme'] = $this->Enigme_model->getEnigmeById($enigmeId);
                    $this->load->view('enigmes/enigme'.$enigmeId, $data);
                }
                else
                {
                    redirect('/enigme/' . $enigmeEnCours);
                }
            }
            else
            {
                $userId = $_SESSION['user_infos'][0]['user_id'];
                $timeBanArray = $this->User_model->getTimeBan($userId);
                $timeBanTS = $timeBanArray[0]['user_bantil'];

                $dtime = DateTime::createFromFormat("Y-m-d H:i:s", $timeBanTS);
                $timestamp = $dtime->getTimestamp();
                $banYear = date('Y', $timestamp);
                $timeBan = date('d/m/Y', $timestamp);
                $timeBan .= ' à ';
                $timeBan .= date('H:i:s', $timestamp);

                if($banYear == '2025')
                {
                    $this->session->set_flashdata('change', 'Ton compte a été banni définitivement par un modérateur');
                }
                else
                {
                    $this->session->set_flashdata('change', 'Ton compte est actuellement bloqué, il sera débloqué le ' . $timeBan);
                }
                redirect('/compte');
            }
        }
        else
        {
            redirect('/connexion');
        }
    }

    //Quand le puzzle est completé, ou quand toutes les zones ont été cliquées
    //set la value d'un champs hidden sur la réponse de la BDD

    //fonction à mettre en action du formulaire de réponse à l'énigme
    public function enigmeHandler($enigmeId)
    {
        $userId = $_SESSION['user_infos'][0]['user_id'];
        $attemptsArray = $this->Enigme_model->getAttempts($userId);
        $attempts = $attemptsArray[0]['user_attempts'];
        $reponseUser = $this->input->post('response');
        $reponseDBArray = $this->Enigme_model->getReponse($enigmeId);
        $reponseDB = $reponseDBArray[0]['enigme_response'];

        if($reponseUser == $reponseDB)
        {
            $enigmeId += 1;
            $this->Enigme_model->incrementEnigme($enigmeId, $userId);
            $this->Enigme_model->resetAttempts($userId);
            redirect('/enigme/'.$enigmeId);
        }
        else
        {
            if($attempts == '2')
            {
                $this->attemptsPlusOne($userId);
                $this->blockUser($userId);
                redirect('/compte');
                $this->session->set_flashdata('change', 'Ton compte a été bloqué car tu as raté trois fois cette énigme :(. Il sera débloqué dans 30 minutes.');
            }
            else
            {
                $this->Enigme_model->incrementEnigme($enigmeId, $userId);
                redirect('/enigme/'.$enigmeId);
            }
        }
    }

}