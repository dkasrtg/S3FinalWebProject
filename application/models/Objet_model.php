<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Objet_model extends CI_Model
{
    public function get_user_list($id){
        $result = [];
        $i=0;
        $req = "select objet.id,category.name,objet.titre,objet.prix_estimatif from objet join category on objet.idcategory=category.id where idUser=%d";
        $req = sprintf($req,$id);
        $sql = $this->db->query($req);
        foreach ($sql->result_array() as $row){
            $result[$i]['id'] = $row['id'];
            $result[$i]['titre'] = $row['titre'];
            $result[$i]['category'] = $row['name'];
            $result[$i]['prix_estimatif'] = $row['prix_estimatif'];
            $i++; 
        }
        return $result;
    }
    public function get_user_not_list($id){
        $result = [];
        $i=0;
        $req = "select objet.id,category.name,objet.titre,objet.prix_estimatif from objet join category on objet.idcategory=category.id where idUser!=%d";
        $req = sprintf($req,$id);
        $sql = $this->db->query($req);
        foreach ($sql->result_array() as $row){
            $result[$i]['id'] = $row['id'];
            $result[$i]['titre'] = $row['titre'];
            $result[$i]['category'] = $row['name'];
            $result[$i]['prix_estimatif'] = $row['prix_estimatif'];
            $i++; 
        }
        return $result;
    }
    public function get_user_not_list2($id,$min,$max){
        $result = [];
        $i=0;
        $req = "select objet.id,category.name,objet.titre,objet.prix_estimatif from objet join category on objet.idcategory=category.id where idUser!=%d and prix_estimatif >= %d and prix_estimatif <= %d";
        $req = sprintf($req,$id,$min,$max);
        $sql = $this->db->query($req);
        foreach ($sql->result_array() as $row){
            $result[$i]['id'] = $row['id'];
            $result[$i]['titre'] = $row['titre'];
            $result[$i]['category'] = $row['name'];
            $result[$i]['prix_estimatif'] = $row['prix_estimatif'];
            $i++; 
        }
        return $result;
    }
    public function getDetailObject($id){
        $result = [];
        $req = "select objet.id,category.name,objet.titre,objet.prix_estimatif,objet.description,objet.photos,users.first_name,users.last_name from objet join category join users on objet.idcategory=category.id and objet.iduser=users.id where objet.id=%d";
        $req = sprintf($req,$id);
        $sql = $this->db->query($req);
        foreach ($sql->result_array() as $row){
            $result['id'] = $row['id'];
            $result['category'] = $row['name'];
            $result['titre'] = $row['titre'];
            $result['description'] = $row['description'];
            $result['photos'] = explode(';',$row['photos']);
            $result['prix_estimatif'] = $row['prix_estimatif'];
            $result['owner'] = $row['first_name']." ".$row['last_name'];
        }
        return $result;
    }
    public function getObjectOwner($idobject){
        $req = "select iduser from objet where id=%d";
        $req = sprintf($req,$idobject);
        $query = $this->db->query($req);
        $row = $query->row_array();
        return $row['iduser'];
    }
    public function getobjet($id){
        $req = " select * from objet where id=%d";
        $req = sprintf($req,$id);
        $query = $this->db->query($req);
        $row = $query->row_array();
        return $row;
    }
}
?>