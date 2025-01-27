<?php 

class Doctors_Model extends CI_Model{
    
    public function insertDoctor($data){
        $this->db->insert('doctors', $data);
        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }

    public function get_all_doctors(){
        $query = $this->db->get('doctors');
        return $query->result_array();
    }
    
    public function get_doctor_by_id($id){
        $query = $this->db->get_where('doctors', array('ID' => $id));
        return $query->row_array();
    }

    public function updateDoctor($id, $data){
        $this->db->where('ID', $id);
        $this->db->update('doctors', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteDoctor($id){
        $this->db->where('ID', $id);
        $this->db->delete('doctors');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_doctors_count() {
        return $this->db->count_all('doctors'); // Ensure the 'doctors' table exists
    }

    
    
    

    public function search_doctors($searchQuery) {
        $this->db->like('Name', $searchQuery);
        $this->db->or_like('Phone', $searchQuery);
        $this->db->or_like('email', $searchQuery);
        $query = $this->db->get('doctors');
        return $query->result_array();
    }
}

?>