<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('logged')){
            redirect('logger/');
        }
        $this->load->model('back_model');
    }
	public function index()
	{
        $info = array();
        $info['contents'] = 'main';
        $cat_list = $this->back_model->catlist();
        $info['catlist'] = $cat_list;
        $this->load->view('back',$info);
    }
    public function statcount(){
        $info = array();
        $info['contents'] = 'statcount';
        $cat_list = $this->back_model->statcount();
        $info['statcount'] = $cat_list;
        $this->load->view('back',$info);
    }
}