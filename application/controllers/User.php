<?php

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function connexion()
    {

        if(!empty($this->session->userdata('user_infos'))) {
            redirect('compte');
        }
        //$this->load->view('user/login.php');

        //Récupérer les données saisies envoyées en POST
        $login = $this->input->post('login');
        $password = md5($this->input->post('password'));


        $this->form_validation->set_rules('login', '"Identifiant"', 'trim|required');
        $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required');
        $result = $this->User_model->userLogin($login,$password);
        //var_dump($result);

        if($this->form_validation->run() === true && !empty($result))
        {
            //var_dump($result);
            $this->session->set_userdata('user_infos', $result);
            $this->session->set_flashdata('connect', 'Connecté en tant que');
            redirect('compte');
        }
        elseif($this->form_validation->run() == true && empty($result))
        {
            $this->session->set_flashdata('noconnect', 'Aucun compte ne correspond à vos identifiants ');
            $this->load->view('user/login');
            //redirect('/login');
        }
        else
        {
            $this->load->view('user/login');
            echo 'form no run';
        }

    }

    public function account()
    {
        $this->load->view('user/account');
    }

    private function sessionUser()
    {
        if (!$this->session->userdata('user_infos')) {
            redirect('/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/User/connexion');
    }
}