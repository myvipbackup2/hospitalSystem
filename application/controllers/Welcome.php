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

    public function do_guahao()
    {
        $userName = $this->input->post("hzName");
        $tel = $this->input->post("hzContact");
        $time = $this->input->post("hzTime");
        $content = $this->input->post("content");
        $this->load->model('user_model');
        $row= $this->user_model->do_guahao($userName,$tel,$time,$content);
        if ($row){
            echo "success";
        }else{
            echo "fail";
        }

    }
}
