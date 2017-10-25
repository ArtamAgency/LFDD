<?php

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function connexion()
    {
        //$this->load->view('user/login.php');

        //Récupérer les données saisies envoyées en POST
        $login = $this->input->post('login');
        $password = md5($this->input->post('password'));


        $this->form_validation->set_rules('login', '"Identifiant"', 'trim|required');
        $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required');

        if($this->form_validation->run() === TRUE)
        {
            $result = $this->User_model->userLogin($login,$password);
            redirect('/User/account');
            $this->session->set_userdata('user_id', $result[0]);
            $this->session->set_flashdata('connect', 'Connecté en tant que');
            var_dump($result);
        }
        elseif($this->form_validation->run() == true && empty($result))
        {
            $this->session->set_flashdata('noconnect', 'Aucun compte ne correspond à vos identifiants ');
            //redirect('/login');
        }
        else
        {
            $this->load->view('user/login.php');
            echo 'form no run';
        }

    }

    public function account()
    {
        $this->load->view('user/account');
    }

    private function sessionUser()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/login');
    }
}