<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Historique_model extends CI_Model
{
    public function getAllHistorique($id){
        $result = [];
        $i=0;
        $sql = "select u.first_name as first_name,u.last_name as last_name,h.DerniereDate as DerniereDate,o.id as idObjet 
        from historique h
        join users u
        on u.id = h.idUser
        join objet o
        on o.id = h.idObjet
        where h.idObjet = ".$id." order by h.DerniereDate desc";
        echo $sql;
        $sql = $this->db->query($sql);
        foreach ($sql->result_array() as $row){
            $result[$i]['nom'] = $row['last_name'];
            $result[$i]['prenom'] = $row['first_name'];
            $result[$i]['derniereDate'] = $row['DerniereDate'];
            $result[$i]['idObjet'] = $row['idObjet'];
            $i++;
        }
        return $result;
}
}
?>