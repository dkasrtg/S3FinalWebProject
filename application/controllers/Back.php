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
    public function loadCategory(){
        $info = array();
        $info['contents'] = 'insertCategory';
        if(isset($_GET['message'])){
            $this->load->view('back',$info,$_GET['message']);
        }
        $this->load->view('back',$info);
    } 
    public function insert_category(){
        $nomCategory = $this->input->get("txt");
        if(strlen(trim($nomCategory))==0){
            redirect('Back/loadCategory?erreur=');
        }
        $data = array(
            'name' => $nomCategory,
        );
        $this->db->insert('category',$data);
        redirect('Back/loadCategory?message=');
    }
}