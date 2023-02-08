<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('logged')) {
            redirect('logger/');
        }
        $this->load->model('objet_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'main';
        $id = $this->session->userdata('logged');
        $info['list'] = $this->objet_model->get_user_list($id);
        $info['del']  = '';
        if($this->input->get('deleted')!==null){
            $info['del'] = '(Object deleted successfully)';
        }
        $this->load->view('front', $info);
    }
    public function details_objet()
    {
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'details_objet';
        $info['objet'] = $this->objet_model->getDetailObject(intval($this->input->get('idobjet')));
        $this->load->view('front', $info);
    }
    public function gererphotos()
    {
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'gererphotos';
        $info['objet'] = $this->objet_model->getDetailObject(intval($this->input->get('idobjet')));
        $this->load->view('front', $info);
    }
    public function liste_objet()
    {
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'liste_objet';
        $id = $this->session->userdata('logged');
        $info['list'] = $this->objet_model->get_user_not_list($id);
        $this->load->view('front', $info);
    }
    public function listecompris()
    {
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'liste_objet_compris';
        $id = $this->session->userdata('logged');
        $perc = intval($this->input->get('percent'));
        $val = intval($this->input->get('price'));
        $pp = ($val*$perc)/100;
        $min = $val - $pp;
        $max = $val + $pp;
        $info['list'] = $this->objet_model->get_user_not_list2($id,$min,$max);
        $this->load->view('front', $info);
    }
    public function details_objet2()
    {
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'details_objet2';
        $info['objet'] = $this->objet_model->getDetailObject(intval($this->input->get('idobjet')));
        $this->load->view('front', $info);
    }
    public function new_object()
    {
        $this->load->model('back_model');
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'new_objet';
        $info['category'] = $this->back_model->catlist();
        $this->load->view('front', $info);
    }
    public function object_insert()
    {  
        $fifi = "";
        $this->load->library('upload');

        $imagePath = realpath(APPPATH . '../assets/images');

        $number_of_files_uploaded = count($_FILES['files']['name']);

        for ($i = 0; $i < $number_of_files_uploaded; $i++) {

            $_FILES['userfile']['name'] = $_FILES['files']['name'][$i];

            $_FILES['userfile']['type'] = $_FILES['files']['type'][$i];

            $_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

            $_FILES['userfile']['error'] = $_FILES['files']['error'][$i];

            $_FILES['userfile']['size'] = $_FILES['files']['size'][$i];

            //configuration for upload your images

            $config = array(

                'file_name' => time() . uniqid(),

                'allowed_types' => 'jpg|jpeg|png|gif',

                'max_size' => 30000,

                'overwrite' => FALSE,

                'upload_path'

                => $imagePath

            );

            $this->upload->initialize($config);

            $errCount = 0; //counting errrs

            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());

                $theImages[] = array(

                    'errors' => $error

                ); //saving arrors in the array

            } else {

                $filename = $this->upload->data();

                $theImages[] = array(

                    'fileName' => $filename['file_name']

                );
                $fifi = $fifi.$filename['file_name'].";";

                $params = array('file_name' => '/assets/uploads/' . $filename['file_name'],);


                // $this->mediamodel->store($params);
            } //if file uploaded

        } //for loop end
        $this->load->helper('form');
        $this->load->library('form_validation');
        $config = array(
            array(
                    'field' => 'titre',
                    'label' => 'titre',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide object title',
                    ),
            ),
            array(
                'field' => 'prix_estimatif',
                'label' => 'prix_estimatif',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide object price',
                ),
            ),
            array(
                'field' => 'description',
                'label' => 'description',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide object description',
                ),
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            $this->load->model('back_model');
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'new_objet';
        $info['category'] = $this->back_model->catlist();
            $this->load->view('front',$info);
        }
        else {     
        $data = array(
            'idUser' => intval($this->session->userdata('logged')),
            'idCategory' =>intval($this->input->post('category')),
            'titre' => $this->input->post('titre'),
            'description' => $this->input->post('description'),
            'photos' => $fifi,
            'prix_estimatif'=>$this->input->post('prix_estimatif') 
        );
        $this->db->insert('objet',$data);
        redirect('front/new_object?success=');
        }
    }
    public function objet_update()
    {
        $ido = intval($this->input->get('idobjet'));
        $o  = $this->objet_model->getobjet($ido);
        $this->load->model('back_model');
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'objet_update1';
        $info['category'] = $this->back_model->catlist();
        $info['objet'] = $o;
        $info['success'] = '';
        if($this->input->get('success')!==null){
            $info['success'] = '(update successful)';
        }
        $this->load->view('front', $info);   
    }
    public function object_updater(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $config = array(
            array(
                    'field' => 'titre',
                    'label' => 'titre',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide object title',
                    ),
            ),
            array(
                'field' => 'prix_estimatif',
                'label' => 'prix_estimatif',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide object price',
                ),
            ),
            array(
                'field' => 'description',
                'label' => 'description',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide object description',
                ),
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE){
            $o  = $this->objet_model->getobjet(intval($this->input->post('idobjet')));
            $this->load->model('back_model');
            $info = array();
            $info['name'] = $this->session->userdata('name');
            $info['contents'] = 'objet_update2';
            $info['category'] = $this->back_model->catlist();
            $info['objet'] = $o;
            $this->load->view('front',$info);
        }
        else {
            $data = array(
                'titre' => $this->input->post('titre'),
                'prix_estimatif' => $this->input->post('prix_estimatif'),
                'description' => $this->input->post('description'),
            );
            $this->db->where('id',intval($this->input->post('idobjet')));
            $this->db->update('objet',$data);
            redirect('front/objet_update?idobjet='.intval($this->input->post('idobjet')).'&success=');
        }
    }
    public function object_delete()
    {
        $id = $this->input->get('idobjet');
        $this->db->delete('objet',array('id'=>$id));
        redirect('front/index?deleted=');
    }
    public function photo_insert(){
        $idobjet = $this->input->post('idobjet');
        //
        $fifi = "";
        $this->load->library('upload');

        $imagePath = realpath(APPPATH . '../assets/images');

        $number_of_files_uploaded = count($_FILES['files']['name']);
        

        for ($i = 0; $i < $number_of_files_uploaded; $i++) {

            $_FILES['userfile']['name'] = $_FILES['files']['name'][$i];

            $_FILES['userfile']['type'] = $_FILES['files']['type'][$i];

            $_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

            $_FILES['userfile']['error'] = $_FILES['files']['error'][$i];

            $_FILES['userfile']['size'] = $_FILES['files']['size'][$i];

            //configuration for upload your images

            $config = array(

                'file_name' => time() . uniqid(),

                'allowed_types' => 'jpg|jpeg|png|gif',

                'max_size' => 30000,

                'overwrite' => FALSE,

                'upload_path'

                => $imagePath

            );

            $this->upload->initialize($config);

            $errCount = 0; //counting errrs

            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());

                $theImages[] = array(

                    'errors' => $error

                ); //saving arrors in the array

            } else {

                $filename = $this->upload->data();

                $theImages[] = array(

                    'fileName' => $filename['file_name']

                );
                $fifi = $fifi.$filename['file_name'].";";

                $params = array('file_name' => '/assets/uploads/' . $filename['file_name'],);


                // $this->mediamodel->store($params);
            } //if file uploaded

        }
        //
        if($number_of_files_uploaded!=0){

        $oo = $this->objet_model->getobjet($idobjet);
        $newf = $oo['photos'].$fifi;
        $query = "update objet set photos='".$newf."' where id=".$idobjet;
        $this->db->query($query);
        }
        redirect('front/gererphotos?idobjet='.$idobjet);
    }
    public function photo_delete()
    {
        $idobjet = $this->input->get('idobjet');
        $carac = $this->input->get('photo');
        $carac = $carac.';';
        $oo = $this->objet_model->getobjet($idobjet);
        $newf = str_replace($carac,"",$oo['photos']);
        $query = "update objet set photos='".$newf."' where id=".$idobjet;
        $this->db->query($query);
        redirect('front/gererphotos?idobjet='.$idobjet);
    }
}
