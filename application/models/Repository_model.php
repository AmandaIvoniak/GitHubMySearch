<?php

class Repository_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // public function get_tags_data($user){
    //     $this->db->select("id_user, name_tag, id_tag")->from("tags")->where("id_user", $user);
    //     $result = $this->db->get();

    //     return $result->num_rows() > 0 ? $result->result() : false;
    // }

    public function insertRepository($data){
        return $this->db->insert('repository', $data);
    }

    public function checkRepository($id_rep, $user){
        $this->db->select('id_rep')->from('repository')->where('id_rep', $id_rep)->where('id_user', $user);
        $result = $this->db->get();

        return $result->num_rows() > 0 ? true : false;
    }
    

    // public function deleteTags($table, $data){
    //     var_dump('OIEEEEEEEEEEEEEEE');
    //     var_dump($data);
    //     $this->db->delete($table, $data)->from($table)->where(); 

    //     return $this->db->insert($table, $data);
    // }

    public function updateRepository($data){
        $this->db->where('id_rep', $data['id_rep']);
        $this->db->update('repository', $data); 

    }
}