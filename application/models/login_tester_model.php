<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_tester_model extends CI_Model
{
    public function test($data){
        $rs = array(
            'id' => '',
            'name' => '',
            'error' => ''
        );
        $req = "select id,password from users where email='%s'";
        $req = sprintf($req,$data['email']);
        $query = $this->db->query($req);
        $row = $query->row_array();
        if($row==null){
            $rs['error'] = 'email';
        }
        else {
            $tmp = array('id'=>$row['id'],'password'=>$row['password']);
            if($data['password']!=$tmp['password']){
                $rs['error'] = 'password';
            }
            else {
                $rs['id'] = $tmp['id'];
                $req = "select first_name,last_name from users where id=%d";
                $req = sprintf($req,intval($rs['id']));
                $query = $this->db->query($req);
                $row = $query->row_array();
                $rs['name'] = $row['first_name']." ".$row['last_name'];
            }
        }
        return $rs;
    }
}
?>