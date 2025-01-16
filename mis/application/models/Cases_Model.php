<?php

class Cases_Model extends CI_Model {
    
    public function insertCase($data){
        $this->db->insert('cases', $data);
        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }

    public function get_all_cases(){
        $query = $this->db->get('cases');
        return $query->result_array();
    }

    public function get_case_by_id($id){
        $query = $this->db->get_where('cases', array('caseTypeID' => $id));
        return $query->row_array();
    }

    public function updateCase($data, $id){
        $this->db->where('caseTypeID', $id);
        $this->db->update('cases', $data);
        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCase($id){
        $this->db->where('caseTypeID', $id);
        $this->db->delete('cases');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
