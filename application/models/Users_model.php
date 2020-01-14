<?php

class Users_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_data($type, $information){
        $this->db->select("id_user, name_user, email, password")->from("users")->where($type, $information);
        $result = $this->db->get();

        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return NULL;
        }
    }

    public function insert_user_data($table, $data){
        if($this->db->insert($table, $data)){
            return 'true';
        }else{
            return NULL;
        }
    }

    public function update_user_data($table, $data, $id){
        $this->db->where('id_user', $id);
        $this->db->update($table, $data);
    }

    public function duplicate_user_data($field, $data, $id = NULL){

        $result = $this->users_model->get_user_data($field, $data);

        var_dump($result);
        if($id != $result->id_user && $result === NULL){
            return false;
        }else{
            return true;
        }
        $this->db->from($table);
        $this->db->where('id_user', $id);
    }
}