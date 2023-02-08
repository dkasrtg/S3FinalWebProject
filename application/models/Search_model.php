<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model
{

    public function getResult($txt,$cat,$logged){
        $result = [];
        $i=0;
        $req = null;
        echo $cat;
        if($cat==0){
            $req = "select objet.id,category.name,objet.titre,objet.prix_estimatif,objet.photos from objet join category on objet.idcategory=category.id where objet.titre like '%s%s%s' and objet.idUser!=%d";
            $req = sprintf($req,'%',$txt,'%',$logged);
        }
        else{
            $req = "select objet.id,category.name,objet.titre,objet.prix_estimatif,objet.photos from objet join category on objet.idcategory=category.id where objet.titre like '%s%s%s' and objet.idcategory=%d and objet.idUser!=%d";
            $req = sprintf($req,'%',$txt,'%',$cat,$logged);
        }
        echo $req;
        $sql = $this->db->query($req);
        foreach ($sql->result_array() as $row){
            $result[$i]['id'] = $row['id'];
            $result[$i]['titre'] = $row['titre'];
            $result[$i]['category'] = $row['name'];
            $result[$i]['prix_estimatif'] = $row['prix_estimatif'];
            $result[$i]['photos'] = explode(';',$row['photos']);
            $i++; 
        }
        return $result;
    }
}