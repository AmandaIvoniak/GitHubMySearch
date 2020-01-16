<?php

class Users_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getUser($type, $information){
        $this->db->select('id_user, name_user, email, password')->from('users')->where($type, $information);
        $result = $this->db->get();

        return $result->num_rows() > 0 ? $result->row() : false;
    }

    public function insertUser($data){
        
        return $this->db->insert('users',$data);
    }

    public function updateUser($data, $id){
        return $this->db->where('id_user', $id)->update('users', $data);
    }

    public function duplicateEmail($data, $id = NULL){
        $result = $this->users_model->getUser('email', $data);

        if($result){
            return  $id === $result->id_user ? true : false;
        }else{
            return true;
       }
     }
}