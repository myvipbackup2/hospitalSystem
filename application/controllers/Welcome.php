<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    //显示首页
    public function index()
    {
        $this->load->view('index');
    }

    //登录
    public function login()
    {
        $this->load->view('login');
    }

    //注册
    public function register()
    {
        $this->load->view('register');
    }

    //医生登录后台
    public function doctor()
    {
        redirect('http://127.0.0.1/doctorSystem/site');
    }

    //挂号页面
    public function guahao()
    {
        if ($this->check_login()) {
            $this->load->view('guahao');
        } else {
            redirect('welcome/login');
        }
    }

    //检测用户是否登录
    public function check_login()
    {
        if ($this->session->userdata('userinfo')) {
            return true;
        } else {
            return false;
        }
    }

}
