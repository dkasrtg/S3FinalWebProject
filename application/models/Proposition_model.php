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
        p.idObjetAProposer as idObjetAProposer,
        objetProposeur.titre as ObjetProposeurTitre,
        objetProposeur.photos as ObjetProposeurPhotos,
        objetProposeur.prix_estimatif as ObjetProposeurPrixEstimatif,
        p.idObjetProposer as idObjetProposer,
        objetProposer.titre as ObjetProposerTitre,
        objetProposer.photos as ObjetProposerPhotos,
        objetProposer.prix_estimatif as ObjetProposerPrixEstimatif
         from proposition p 
         join users uProposeur 
         on uProposeur.id = p.idProposeur 
          join objet objetProposeur
          on objetProposeur.id = p.idObjetAProposer
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
            $result[$i]['idObjetAProposer'] = $row['idObjetAProposer'];
            $result[$i]['ObjetProposeurTitre'] = $row['ObjetProposeurTitre'];
            $result[$i]['ObjetProposeurPhotos'] = explode(';',$row['ObjetProposeurPhotos']);
            $result[$i]['ObjetProposeurPrixEstimatif'] = $row['ObjetProposeurPrixEstimatif'];
            $result[$i]['idObjetProposer'] = $row['idObjetProposer'];
            $result[$i]['ObjetProposerTitre'] = $row['ObjetProposerTitre'];
            $result[$i]['ObjetProposerPhotos'] = explode(';',$row['ObjetProposerPhotos']);
            $result[$i]['ObjetProposerPrixEstimatif'] = $row['ObjetProposerPrixEstimatif'];
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
        p.idObjetAProposer as idObjetAProposer,
        objetProposeur.titre as ObjetProposeurTitre,
        objetProposeur.photos as ObjetProposeurPhotos,
        objetProposeur.prix_estimatif as ObjetProposeurPrixEstimatif,
        p.idObjetProposer as idObjetProposer,
        objetProposer.titre as ObjetProposerTitre,
        objetProposer.photos as ObjetProposerPhotos,
        objetProposer.prix_estimatif as ObjetProposerPrixEstimatif
         from proposition p 
         join users uProposeur 
         on uProposeur.id = p.idProposeur 
          join objet objetProposeur
          on objetProposeur.id = p.idObjetAProposer
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
            $result[$i]['idObjetAProposer'] = $row['idObjetAProposer'];
            $result[$i]['ObjetProposeurTitre'] = $row['ObjetProposeurTitre'];
            $result[$i]['ObjetProposeurPhotos'] = explode(';',$row['ObjetProposeurPhotos']);
            $result[$i]['ObjetProposeurPrixEstimatif'] = $row['ObjetProposeurPrixEstimatif'];
            $result[$i]['idObjetProposer'] = $row['idObjetProposer'];
            $result[$i]['ObjetProposerTitre'] = $row['ObjetProposerTitre'];
            $result[$i]['ObjetProposerPhotos'] = explode(';',$row['ObjetProposerPhotos']);
            $result[$i]['ObjetProposerPrixEstimatif'] = $row['ObjetProposerPrixEstimatif'];
            $i++; 
        }
        return $result;
    }
}