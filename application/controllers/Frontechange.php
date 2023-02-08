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
        if($this->input->get('idobjet')!==null){
            $info['nono'] = 'Please choose an object';
        }
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'echange.php';
        $info['objet'] = $this->objet_model->getDetailObject(intval($this->input->get('idobjet')));
        $id = $this->session->userdata('logged');
        $info['list'] = $this->objet_model->get_user_list($id);
        $this->load->view('front',$info);
    }
    public function echanger(){
        $link =  $_SERVER['QUERY_STRING'];
        if(strpos($link,'on')==false){
            redirect('frontechange/index?idobjet='.$this->input->get('idobjet').'&nono=');
        }
        $a = explode('&',$link);
        $b = explode('=',$a[1]);
        $lemien = intval($b[0]);
        $lautre = intval($this->input->get('idobjet'));
        date_default_timezone_set("Africa/Nairobi");
        $date = date('y-m-d');
        $data = array(
            'idProposeur' => intval($this->session->userdata('logged')),
            'idObjetAproposer' => $lemien,
            'idProposer' => $this->objet_model->getObjectOwner($lautre),
            'idObjetProposer' => $lautre,
            'dateProposition' => $date,
        );
        $this->db->insert('proposition',$data);
        redirect('front/liste_objet');
    }
    public function myproposition(){
        $data = $this->proposition_model->getSaProposition(intval($this->session->userdata('logged')));
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'Saproposition.php';
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

    public function acceptation($idProposition,$idObjetProposer,$idObjetAProposer,$idProposeur){
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

        $data2 = array(
            'idObjet' => $idObjetAProposer,
            'idUser' => $idProposeur,
            'DerniereDate' => $date,
        );
        $this->db->insert('historique',$data2);

        $sql = "update objet set idUser = ".intval($this->session->userdata('logged'))." where id = ".$idObjetAProposer;
        $this->db->query($sql);
        $sql = "update objet set idUser = ".$idProposeur." where id = ".$idObjetProposer;
        $this->db->query($sql);
        redirect('Frontechange/propositionlist');
    }
    public function getHisto($id){
        $this->load->model('Historique_model');
        $data = $this->Historique_model->getAllHistorique($id);
        $info = array();
        $info['name'] = $this->session->userdata('name');
        $info['contents'] = 'Historique.php';
        $info['data'] = $data;
        $this->load->view('front',$info);
    }
}