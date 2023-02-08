<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontsearch extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('logged')){
            redirect('logger/');
        }
        $this->load->model('search_model');
        $this->load->model('back_model');
    }
	public function index()
	{
        $info = array();
        $info['mot'] = '';
        $info['cat'] = '';
        $info['list'] = array();
        if($this->input->get('txt')!==null && $this->input->get('cat')!==null){
            $txt = $this->input->get('txt');
            $cat = intval($this->input->get('cat'));
            $rs = $this->search_model->getResult($txt,$cat);
            $info['list'] = $rs;
            $info['mot'] = str_replace('%','',$txt);
            if($cat!=0){
            $info['cat'] = $this->back_model->catcat($cat);
            }
        }
        $info['category'] = $this->back_model->catlist();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'search.php';  
        $this->load->view('front',$info);
    }
}     