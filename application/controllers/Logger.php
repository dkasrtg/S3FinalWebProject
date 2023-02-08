<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logger extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('login_tester_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

	public function index(){
        $inputs = array(
            'email' => '',
            'password' => ''
        );
        if(!$this->session->has_userdata('inputs')){
            $inputs['email'] = "admin@admin.com";
            $inputs['password'] = "admin";
        }
        if($this->session->has_userdata('inputs')){
            $inputs['email'] = $this->session->userdata('inputs')['email'];
            $inputs['password'] = $this->session->userdata('inputs')['password'];
        }
        $info = array(
            'email' => '',
            'password' => '',
            'inputs' => $inputs,
        );
        if($this->input->get('error')!==null){
            $info[$this->input->get('error')] = $this->input->get('error').' is wrong ';
        }
        if($this->input->get('logout')!==null){
            $this->session->unset_userdata('logged');
            $this->session->unset_userdata('name');
        }
        $this->load->view('login',$info);
    }
    
    public function signup(){
        if($this->session->has_userdata('inputs')){
            $this->session->unset_userdata('inputs');     
        }
        $s = '';
        if($this->input->get('success')!==null){
            $s = 'successful';
        }
        $info = array(
            'success' => $s,
        );
        $this->load->view('signup',$info);
    }
    
    public function tester()
	{
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $rs = $this->login_tester_model->test($data);
        if($rs['error']==''){
            $this->session->set_userdata('logged',$rs['id']);
            $this->session->set_userdata('name',$rs['name']);
            $this->session->unset_userdata('inputs');
            if($rs['id']==1){
                redirect('back/');
            }
            else {
                redirect('front/');
            }
        }
        else {
            $this->session->set_userdata('inputs',$data);
            redirect('logger/index?error='.$rs['error']);
        }
    }

    public function signuper()
    {
        $config = array(
            array(
                    'field' => 'first_name',
                    'label' => 'first_name',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide your first name',
                    ),
            ),
            array(
                'field' => 'last_name',
                'label' => 'last_name',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide your last name',
                ),
            ),
            array(
                'field' => 'phone',
                'label' => 'phone',
                'rules' => 'required|is_unique[users.phone]',
                'errors' => array(
                    'required' => 'You must provide your phone number',
                    'is_unique' => 'Phone already used'
                ),
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => array(
                    'required' => 'You must provide your email address',
                    'valid_email' => 'Email is invalid',
                    'is_unique' => 'Email already used'
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Password is very important, so provide it',
                ),
            ),
            array(
                'field' => 'cpassword',
                'label' => 'cpassword',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'Password is very important, so provide it',
                    'matches' => 'This doesn t match the provided password'
                ),
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            $this->load->view('signup',array('success'=>''));
        }
        else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->db->insert('users',$data);
            redirect('logger/signup?success=');
        }
    }
}