<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('logged')){
            redirect('logger/');
        }
    }
	public function index()
	{
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'main';
        $this->load->view('front',$info);
    }
}