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
    

    public function get_cases_by_doctor($doctorID){
        $this->db->select('cases.caseName, cases.type, cases.cost, cases.price, doctorcase.RecDate, doctorcase.ComDate, doctorcase.caseStatus');
        $this->db->from('doctorcase');
        $this->db->join('cases', 'doctorcase.caseTypeID = cases.caseTypeID');
        $this->db->where('doctorcase.doctorID', $doctorID);
        return $this->db->get()->result_array();
    }

    // public function get_all_cases(){
    //     return $this->db->get('cases')->result_array();
    // }

    public function assign_case($data){
        return $this->db->insert('doctorcase', $data);
    }
}
