<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(!empty($username) && !empty($password)){
            $this->db->where('username',$username);
            $this->db->where('password',md5($password));
            $result = $this->db->get('users',1);
            if($result->num_rows() > 0){

                $sid = md5(uniqid(rand(), true));
                $this->db->set('sid',$sid);
                $this->db->set('last_login',date('Y-m-d H:i:s'));
                $this->db->where('username',$username);
                $this->db->where('password',md5($password));
                $this->db->update('users');

                $this->session->set_userdata('sid', $sid);
                redirect('administrator');
            }else{
                $data['msg'] = "Username Or Password Is Invalid";
            }
        }

        $data['username'] = $username;
        $data['password'] = $password;
        $this->load->view('admin/login',$data);
    }

    public function logout()
    {
        $this->session->unset_userdata('sid');
        $this->session->sess_destroy();
        $this->db->set('sid',null);
        $this->db->update('users');
        redirect('auth/login');
    }

}