<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_by_username_pwd($username, $password)
    {
        return $this->db->get_where('t_user', array(
            'username' => $username,
            'password' => md5($password)
        ))->row();
    }

    public function get_by_username($username)
    {
        return $this->db->get_where('t_user', array(
            'username' => $username
        ))->row();
    }

    public function add_user($username, $password)
    {
        $this->db->insert('t_user', array(
            "username" => $username,
            "password" => md5($password)
        ));
        return $this->db->insert_id();
    }

}