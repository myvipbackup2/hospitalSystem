<?php

/**
 * Created by PhpStorm.
 * User: 王羽佳
 * Date: 2017/4/12User_model.php
 * Time: 下午4:46
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    //注册
    public function do_register()
    {
        $username = htmlspecialchars($this->input->post('userName'));
        $password = htmlspecialchars($this->input->post('password'));
        $result = $this->user_model->add_user($username, $password);
        if ($result > 0) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }

    //检测用户名是否重名
    public function check_username()
    {
        $username = $this->input->get('userName');
        $user = $this->user_model->get_by_username($username);
        if ($user) {
            echo "check_username fail";
        } else {
            echo "check_username success";
        }
    }

    //登录
    public function do_login()
    {
        $username = $this->input->post('userName');
        $password = $this->input->post('password');
        $result = $this->user_model->get_by_username_pwd($username, $password);
        if ($result) {
            $this->session->set_userdata('userinfo', $result);//登录成功写入session
            echo 'success';
        } else {
            echo 'fail';
        }
    }

    //检查是否登录
    public function check_login()
    {
        $login_user = $this->session->userdata('userinfo');
        if ($login_user) {
            echo "success";
        } else {
            $this->input->set_cookie("prev_url", $_SERVER['HTTP_REFERER'], 3600);
            echo "fail";
        }
    }

    //退出登录
    public function logo_out()
    {
        $this->session->unset_userdata('userinfo');
        redirect('welcome/index');
    }

    //挂号
    public function do_guahao()
    {
        $userName = htmlspecialchars($this->input->post("hzName"));
        $tel = htmlspecialchars($this->input->post("hzContact"));
        $time = $this->input->post("hzTime");
        $content = htmlspecialchars($this->input->post("content"));
        $row = $this->user_model->do_guahao($userName, $tel, $time, $content);
        if ($row) {
            echo "success";
        } else {
            echo "fail";
        }
    }


}