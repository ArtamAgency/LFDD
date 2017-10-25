<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('user_model');
    }
    function index()
    {
        $this->registration();
        $this->load->view('User_registration_view');
    }

    public function registration()
    {
        //set validation rules
        $this->form_validation->set_rules('login', 'Pseudo', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|md5');
        $this->form_validation->set_rules('email', 'Email', 'required');

        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('user_registration_view');
        }
        else
        {
            //insert the user registration details into database
                $data = array(
                'user_name' => $this->input->post('login'),
                'user_password' => $this->input->post('password'),
                'user_mail' => $this->input->post('email'),

            );

            // insert form data into database
            if ($this->user_model->insertUser($data))
            {
                // send email
                if ($this->user_model->sendEmail($this->input->post('email')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Tu es maintenant inscrit ! Confirme ton inscription en cliquant sur le lien !</div>');
                    redirect('user/registration');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">L\'inscription n\'a pas marché !</div>');
                    redirect('user/registration');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">L\'inscription n\'a pas marché !</div>');
                redirect('user/registration');
            }
        }
    }

    function verify($hash=NULL)
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


?>