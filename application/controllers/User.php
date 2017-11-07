<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function connexion()
    {

        if(!empty($this->session->userdata('user_infos'))) {
            redirect('compte');
        }

        $login = $this->input->post('login');
        $password = md5($this->input->post('password'));

        $this->form_validation->set_rules('login', '"Identifiant"', 'trim|required');
        $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required');
        $result = $this->User_model->userLogin($login,$password);

        if($this->form_validation->run() === true && !empty($result))
        {
            $this->session->set_userdata('user_infos', $result);
            $this->session->set_flashdata('connect', 'Connecté en tant que');
            redirect('compte');
        }
        elseif($this->form_validation->run() == true && empty($result))
        {
            $this->session->set_flashdata('noconnect', 'Aucun compte ne correspond à vos identifiants ');
            $this->load->view('user/login');
        }
        else
        {
            $this->load->view('user/login');
        }

    }

    public function account()
    {
        if(!empty($this->session->userdata('user_infos'))) {
            $this->load->view('user/account');
        }
        else {
            redirect('User/connexion');
        }
    }

    public function cgPassword()
    {
        $curpaswd = md5($this->input->post('curpaswd'));
        $newpaswd = md5($this->input->post('newpaswd'));
        $rpnewpaswd = md5($this->input->post('rpnewpaswd'));

        $this->form_validation->set_rules('curpaswd', '"Mot de passe actuel"', 'trim|required');
        $this->form_validation->set_rules('newpaswd', '"Nouveau mot de passe"', 'trim|required');
        $this->form_validation->set_rules('rpnewpaswd', '"Répéter nouveau mot de passe"', 'trim|required');
        if ($curpaswd == $_SESSION['user_infos'][0]['user_password'] && $newpaswd == $rpnewpaswd)
        {
            $this->User_model->updatePassword($newpaswd);
            $this->session->set_flashdata('change', 'Ca a fonctionné ! reconnecte-toi maintenant.');
            $this->logout();
        }
        else
        {
            $this->session->set_flashdata('nochange', 'Tu n\'as pas rempli correctement les champs');
            redirect('compte');
        }
    }

    public function cgMail()
    {
        $curmail = $this->input->post('curmail');
        $newmail = $this->input->post('newmail');

        $this->form_validation->set_rules('curmail', '"Email actuel"', 'trim|required');
        $this->form_validation->set_rules('newmail', '"Nouvel email"', 'trim|required');

        if ($curmail == $_SESSION['user_infos'][0]['user_mail'])
        {
            $this->User_model->updateMail($newmail);
            $this->session->set_flashdata('change', 'Ca a fonctionné ! Déconnecte-toi pour voir les changements appliqués.');
            $this->account();
        }
        else
        {
            $this->session->set_flashdata('change', 'Tu n\'as pas rempli correctement les champs');
            redirect('compte');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('User/connexion');
    }

    public function manageUsers()
    {
        // check si user_admin == 1 sinon rediriger vers account()
        if($_SESSION['user_infos'][0]['user_admin'] == 1)
        {
            //load view backoffice
            // afficher toutes les infos des utilisateurs avec un select * from users
            $data['users'] = $this->User_model->getAllUsers();
            $data['enigmes'] = $this->User_model->getAllEnigmes();
            $this->load->view('user/admin', $data);
        }
        else
        {
            redirect('/user/account');
        }
    }

    /*function index()
    {
        $this->registration();
        $this->load->view('User_registration_view');
    }*/

    public function registration()
    {
        $this->load->view('user/registration');
    }

    public function registrationHandler()
    {
        $this->form_validation->set_rules('login', 'Pseudo', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|md5');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|md5');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $data = array(
                'user_name' => $this->input->post('login'),
                'user_password' => $this->input->post('password'),
                'user_mail' => $this->input->post('email')
            );

            //$this->User_model->insertUser($data);

            if ($this->User_model->insertUser($data))
            {
                // send email

                if ($this->sendEmail($data))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('change','<div class="alert alert-success text-center">Tu es maintenant inscrit ! Confirme ton inscription en cliquant sur le lien !</div>');
                    redirect('/user/registration');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('change','<div class="alert alert-danger text-center">L\'inscription n\'a pas marché !</div>');
                    redirect('/user/registration');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('change','<div class="alert alert-danger text-center">L\'inscription n\'a pas marché !</div>');
                redirect('/user/registration');
            }
        }
        else
        {
            $this->load->view('user/registration');
            //insert the user registration details into database

            // insert form data into database
        }
    }

    public function sendEmail($data)
    {
        require 'asset/PHPMailer-master/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->setFrom('lafermededidier@gmail.com', 'La ferme de Didier');
        $mail->addAddress($data['user_mail'], $data['user_name']);     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Inscrption sur La Ferme de Didier !';
        $mail->Body    = $data['user_name'].', Bienvenue sur la ferme de didier !';
        $mail->AltBody = $data['user_name'].', Bienvenue sur la ferme de didier !';
        if($mail->send())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    private function verify($hash=NULL)
    {
        if ($this->user_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('user/register');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('user/register');
        }
    }
}

