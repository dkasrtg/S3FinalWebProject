<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontechange extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('logged')){
            redirect('logger/');
        }
        $this->load->model('objet_model');
        $this->load->model('proposition_model');
    }
	public function index()
	{
        $info = array();
        $info['nono'] = '';
        if($this->input->get('nono')!==null){
            $info['nono'] = 'Please choose an object';
        }
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'echange.php';
        $info['objet'] = $this->objet_model->getDetailObject(intval($this->input->get('idobjet')));
        $id = $this->session->userdata('logged');
        $info['list'] = $this->objet_model->get_user_list($id);
        for ($i=0; $i < count($info['list']); $i++) { 
            $pp = ($info['list'][$i]['prix_estimatif']*100)/$info['objet']['prix_estimatif'];
            $info['list'][$i]['difference'] = $pp-100;
        }
        $this->load->view('front',$info);
    }
    public function echanger(){
        $link =  $_SERVER['QUERY_STRING'];
        if(strpos($link,'on')==false){
            redirect('frontechange/index?idobjet='.$this->input->get('idobjet').'&nono=');
        }
        $a = explode('&',$link);
        $ids = array();
        for($i=1;$i<count($a);$i++){
            $b = explode('=',$a[$i]);
            array_push($ids,intval($b[0]));
        }
        $lautre = intval($this->input->get('idobjet'));
        date_default_timezone_set("Africa/Nairobi");
        $date = date('y-m-d');
        $data = array(
            'idProposeur' => intval($this->session->userdata('logged')),
            'idProposer' => $this->objet_model->getObjectOwner($lautre),
            'idObjetProposer' => $lautre,
            'dateProposition' => $date,
        );
        $this->db->insert('proposition',$data);
        $last = $this->proposition_model->getLastId();
        $last = $last['max'];
        for($i=0;$i<count($ids);$i++){
            $data = array(
                'idProposition' => $last,
                'idObjet' => $ids[$i]
            );
            $this->db->insert('objetaproposer',$data);
        }
        redirect('front/liste_objet');
    }
    public function myproposition(){
        $data = $this->proposition_model->getSaProposition(intval($this->session->userdata('logged')));
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'saproposition.php';
        $info['data'] = $data;
        $this->load->view('front',$info);
    }
    public function propositionlist(){
        $data = $this->proposition_model->getPropositionList(intval($this->session->userdata('logged')));
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'proposition_list.php';
        $info['data'] = $data;
        $this->load->view('front',$info);
    }
    public function refus($idProposition){
        date_default_timezone_set("Africa/Nairobi");
        $date = date('y-m-d');
        $data = array(
            'idProposition' => $idProposition,
            'dateRefus' => $date,
        );
        $this->db->insert('refus',$data);
        redirect('Frontechange/propositionlist');
    }

    public function acceptation($idProposition,$idObjetProposer,$idProposeur){
        date_default_timezone_set("Africa/Nairobi");
        $date = date('y-m-d h:m:s');
        $data = array(
            'idProposition' => $idProposition,
            'dateAcceptation' => $date,
        );
        $this->db->insert('acceptation',$data);

        $data1 = array(
            'idObjet' => $idObjetProposer,
            'idUser' => intval($this->session->userdata('logged')),
            'DerniereDate' => $date,
        );
        $this->db->insert('historique',$data1);

        $ObjetAproposer = $this->proposition_model->getObjetAproposerList($idProposition);
        for ($i=0; $i < count($ObjetAproposer); $i++) { 
                $data2 = array(
                'idObjet' => $ObjetAproposer[$i]['idObjet'],
                'idUser' => $idProposeur,
                'DerniereDate' => $date,
                );
                $this->db->insert('historique',$data2);
                $sql = "update objet set idUser = ".intval($this->session->userdata('logged'))." where id = ".$ObjetAproposer[$i]['idObjet'];
                $this->db->query($sql);
        }
        $sql = "update objet set idUser = ".$idProposeur." where id = ".$idObjetProposer;
        $this->db->query($sql);
        redirect('frontechange/propositionlist');
    }
    public function getHisto($id){
        $this->load->model('Historique_model');
        $data = $this->Historique_model->getAllHistorique($id);
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'historique.php';
        $info['data'] = $data;
        $this->load->view('front',$info);
    }
    public function delete($idP){
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'propositionRefuser.php';
        $this->load->model('Proposition_model');
        $this->Proposition_model->delete($idP);
        redirect('Frontechange/propositionRefuser');
    }
    public function propositionRefuser(){
        $data = $this->proposition_model->getPropositionRefuser(intval($this->session->userdata('logged')));
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'propositionRefuser.php';
        $info['data'] = $data;
        $this->load->view('front',$info);
    }  
    public function delete1($idP){
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'saproposition.php';
        $this->load->model('Proposition_model');
        $this->Proposition_model->delete($idP);
        redirect('Frontechange/myproposition');
    }
}