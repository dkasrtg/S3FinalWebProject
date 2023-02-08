<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposition_model extends CI_Model
{

    public function getSaProposition($id){
        $result = [];
        $i=0;
        $req = "select p.id as idProposition,
        p.dateProposition as dateProposition,
        p.idProposeur as idProposeur,
        uProposeur.first_name as ProposeurFirstName,
        uProposeur.last_name as ProposeurLastName,
        p.idObjetProposer as idObjetProposer,
        objetProposer.titre as ObjetProposerTitre,
        objetProposer.photos as ObjetProposerPhotos,
        objetProposer.prix_estimatif as ObjetProposerPrixEstimatif
         from proposition p 
         join users uProposeur 
         on uProposeur.id = p.idProposeur 
          join objet objetProposer
          on objetProposer.id = p.idObjetProposer
         where p.idProposeur = %d and p.id not in (select idProposition from acceptation) and p.id not in (select idProposition from refus) ";
        $sql = sprintf($req,$id);
        $sql = $this->db->query($sql);
        foreach ($sql->result_array() as $row){
            $result[$i]['idProposition'] = $row['idProposition'];
            $result[$i]['dateProposition'] = $row['dateProposition'];
            $result[$i]['idProposeur'] = $row['idProposeur'];
            $result[$i]['nomProposeur'] = $row['ProposeurLastName'];
            $result[$i]['prenomProposeur'] = $row['ProposeurFirstName'];
            $result[$i]['idObjetProposer'] = $row['idObjetProposer'];
            $result[$i]['ObjetProposerTitre'] = $row['ObjetProposerTitre'];
            $result[$i]['ObjetProposerPhotos'] = explode(';',$row['ObjetProposerPhotos']);
            $result[$i]['ObjetProposerPrixEstimatif'] = $row['ObjetProposerPrixEstimatif'];
            $result[$i]['ObjetAproposer'] = $this->getObjetAproposerList($result[$i]['idProposition']);
            $i++; 
        }
        return $result;
    }

    public function getObjetAproposerList($idProposition){
        $result = [];
        $req =" select objetaproposer.idProposition,
        objetaproposer.idObjet,
        objet.titre,
        objet.photos,
        objet.prix_estimatif
        from objetaproposer
        join objet
        on objet.id = objetaproposer.idObjet
        where idProposition = %d";
        $req = sprintf($req,$idProposition);
        $query = $this->db->query($req);
        $i=0;
        foreach ($query->result_array() as $row){
            $result[$i]['idProposition'] = $row['idProposition'];
            $result[$i]['idObjet'] = $row['idObjet'];
            $result[$i]['photos'] = explode(';',$row['photos']);
            $result[$i]['prix_estimatif'] = $row['prix_estimatif'];
            $result[$i]['titre'] = $row['titre'];
            $i++;
        }
        return $result;
    }
    public function getPropositionList($id){
        $result = [];
        $i=0;
        $req = "select p.id as idProposition,
        p.dateProposition as dateProposition,
        p.idProposeur as idProposeur,
        uProposeur.first_name as ProposeurFirstName,
        uProposeur.last_name as ProposeurLastName,
        p.idObjetProposer as idObjetProposer,
        objetProposer.titre as ObjetProposerTitre,
        objetProposer.photos as ObjetProposerPhotos,
        objetProposer.prix_estimatif as ObjetProposerPrixEstimatif
         from proposition p 
         join users uProposeur 
         on uProposeur.id = p.idProposeur 
          join objet objetProposer
          on objetProposer.id = p.idObjetProposer
         where p.idProposer = %d and p.id not in (select idProposition from acceptation) and p.id not in (select idProposition from refus) ";
        $sql = sprintf($req,$id);
        $sql = $this->db->query($sql);
        foreach ($sql->result_array() as $row){
            $result[$i]['idProposition'] = $row['idProposition'];
            $result[$i]['dateProposition'] = $row['dateProposition'];
            $result[$i]['idProposeur'] = $row['idProposeur'];
            $result[$i]['nomProposeur'] = $row['ProposeurLastName'];
            $result[$i]['prenomProposeur'] = $row['ProposeurFirstName'];
            $result[$i]['idObjetProposer'] = $row['idObjetProposer'];
            $result[$i]['ObjetProposerTitre'] = $row['ObjetProposerTitre'];
            $result[$i]['ObjetProposerPhotos'] = explode(';',$row['ObjetProposerPhotos']);
            $result[$i]['ObjetProposerPrixEstimatif'] = $row['ObjetProposerPrixEstimatif'];
            $result[$i]['ObjetAproposer'] = $this->getObjetAproposerList($result[$i]['idProposition']);
            $i++; 
        }
        echo count($result);
        return $result;
    }
    public function getLastId()
    {
        $req = "select coalesce(max(id),0) as max from proposition";
        $query  =$this->db->query($req);
        $row = $query->row_array();
        return $row;
    }
    
    public function delete($id){
        $result = [];
        $i=0;
        $req = "delete from proposition where id = %d";
        $req = sprintf($req,$id);
        $sql = $this->db->query($req); 
    }
    public function getPropositionRefuser($id){
        $result = [];
        $i=0;
        $req = "select p.id as idProposition,
        p.dateProposition as dateProposition,
        p.idProposeur as idProposeur,
        uProposeur.first_name as ProposeurFirstName,
        uProposeur.last_name as ProposeurLastName,
        p.idObjetProposer as idObjetProposer,
        objetProposer.titre as ObjetProposerTitre,
        objetProposer.photos as ObjetProposerPhotos,
        objetProposer.prix_estimatif as ObjetProposerPrixEstimatif
         from proposition p 
         join users uProposeur 
         on uProposeur.id = p.idProposeur 
          join objet objetProposer
          on objetProposer.id = p.idObjetProposer
         where p.idProposeur = %d and p.id in (select idProposition from refus) ";
        $sql = sprintf($req,$id);
        $sql = $this->db->query($sql);
        foreach ($sql->result_array() as $row){
            $result[$i]['idProposition'] = $row['idProposition'];
            $result[$i]['dateProposition'] = $row['dateProposition'];
            $result[$i]['idProposeur'] = $row['idProposeur'];
            $result[$i]['nomProposeur'] = $row['ProposeurLastName'];
            $result[$i]['prenomProposeur'] = $row['ProposeurFirstName'];
            $result[$i]['idObjetProposer'] = $row['idObjetProposer'];
            $result[$i]['ObjetProposerTitre'] = $row['ObjetProposerTitre'];
            $result[$i]['ObjetProposerPhotos'] = explode(';',$row['ObjetProposerPhotos']);
            $result[$i]['ObjetProposerPrixEstimatif'] = $row['ObjetProposerPrixEstimatif'];
            $result[$i]['ObjetAproposer'] = $this->getObjetAproposerList($result[$i]['idProposition']);
            $i++; 
        }
        return $result;
    }
}