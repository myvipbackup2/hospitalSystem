<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    //登录（查询用户名和密码）
    public function get_by_username_pwd($username, $password)
    {
        return $this->db->get_where('t_user', array(
            'username' => $username,
            'password' => md5($password)
        ))->row();
    }

    //查询用户名
    public function get_by_username($username)
    {
        return $this->db->get_where('t_user', array(
            'username' => $username
        ))->row();
    }

    //新增用户
    public function add_user($username, $password)
    {
        $this->db->insert('t_user', array(
            "username" => $username,
            "password" => md5($password)
        ));
        return $this->db->insert_id();
    }

    //挂号
    public function do_guahao($name, $tel, $time, $content, $doctor, $addTime)
    {
        $this->db->insert('guahao', array(
            "hzName" => $name,
            "hzContact" => $tel,
            "hzTime" => $time,
            "content" => $content,
            "bztype" => $doctor,
            "addTime" => $addTime
        ));
        return $this->db->affected_rows();
    }

}