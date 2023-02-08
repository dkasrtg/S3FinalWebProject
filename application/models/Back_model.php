<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_model extends CI_Model
{
    public function catlist(){
        $req = "select * from category";
        $query = $this->db->query($req);
        $rs = array();
        foreach ($query->result_array() as $row) {
            array_push($rs,$row);
        }
        return $rs;
    }
    public function catcat($id){
        $req = "select * from category where id=%d";
        $req = sprintf($req,$id);
        $query = $this->db->query($req);
        $row = $query->row_array();
        return $row['name'];
    }
    public function statcount(){
        $req = " select count(id)-1 as c from users";
        $query = $this->db->query($req);
        $row = $query->row_array();
        $rs = [];
        $rs['users'] = $row['c'];
        $req = " select count(id) as c from acceptation";
        $query = $this->db->query($req);
        $row = $query->row_array();
        $rs['echanges'] = $row['c'];
        return $rs;
    }
}
?>