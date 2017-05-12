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

    public function do_register()
    {
        $username = $this->input->post('userName');
        $password = $this->input->post('password');
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


}