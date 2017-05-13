<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $this->load->view('index');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function doctor()
    {

    }

    public function guahao()
    {
        if ($this->check_login()) {
            $this->load->view('guahao');
        } else {
            redirect('welcome/login');
        }
    }

    public function check_login()
    {
        if ($this->session->userdata('userinfo')) {
            return true;
        } else {
            return false;
        }
    }


}
