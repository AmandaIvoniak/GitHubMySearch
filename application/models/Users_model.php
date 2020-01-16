<?php

class Users_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getUser($type, $information){
        $this->db->select("id_user, name_user, email, password")->from("users")->where($type, $information);
        $result = $this->db->get();

        return $result->num_rows() > 0 ? $result->row() : false;
    }

    public function insertUser($table, $data){
        return $this->db->insert($table, $data);
    }

    public function updateUser($table, $data, $id){
        return $this->db->where('id_user', $id)->update($table, $data);
    }










    
///AJUSTAR
    public function duplicate_user_data($field, $data, $id = NULL){

        $result = $this->users_model->getUser($field, $data);

        if($id != $result->id_user && $result === false){
            return false;
        }else{
            return true;
        }
        var_dump($this->db->from($table)->where('id_user', $id));
     }
}