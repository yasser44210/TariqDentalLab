<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session'); 
        $this->load->model(['Doctors_Model', 'Cases_Model']);
        
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth/login');
        }
    }

    public function add(){

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $Name = $this->input->post('Name');
            $Phone = $this->input->post('Phone');
            $email = $this->input->post('email');

            $data = array(
                'Name' => $Name,
                'Phone' => $Phone,
                'email' => $email,
            );

            $status = $this->Doctors_Model->insertDoctor($data);
            if($status==true){
                $this->session->set_flashdata('success', 'Doctor added successfully');
                redirect(base_url('doctors/index'));
            }
            else{
                $this->session->set_flashdata('error', 'Doctor not added');
                $this->load->view('doctors/add_doctor');
            }
        }// end of if

        else{
            $this->load->view('doctors/add_doctor',$data);
        }

    } // end of add fucntion
    
    public function edit($id){
        $this->load->library('form_validation');
        if($_SERVER['REQUEST_METHOD']=='POST') {
            $Name = $this->input->post('Name');
            $Phone = $this->input->post('Phone');
            $email = $this->input->post('email');

            $data = array(
                'Name' => $Name,
                'Phone' => $Phone,
                'email' => $email,
            );

            $status = $this->Doctors_Model->updateDoctor($id, $data);
            if($status==true){
                $this->session->set_flashdata('success', 'Doctor updated successfully');
                redirect(base_url('doctors/index'));
            }
            else{
                $this->session->set_flashdata('error', 'Doctor not updated');
                $data['doctor'] = $this->Doctors_Model->get_doctor_by_id($id);
                $this->load->view('doctors/edit_doctor', $data);
            }
        }// end of if

        else{
            $data['doctor'] = $this->Doctors_Model->get_doctor_by_id($id);
            $this->load->view('doctors/edit_doctor',$data);
        }
    } 
    
    public function delete($id){
        if(is_numeric($id)){
            $status = $this->Doctors_Model->deleteDoctor($id);
            if($status==true){
                $this->session->set_flashdata('success', 'Doctor deleted successfully');
                redirect(base_url('doctors/index'));
            }
            else{
                $this->session->set_flashdata('error', 'Error');   
            }
            redirect(base_url('doctors/index'));
        }

    }

    public function search() {
        $searchQuery = $this->input->post('searchQuery');
        $data['doctors'] = $this->Doctors_Model->search_doctors($searchQuery);
        $data['searchQuery'] = $searchQuery;

        $this->load->view('doctors/search_results', $data);
    }

    public function view_cases($doctorID){
        $data['doctor'] = $this->Doctors_Model->get_doctor_by_id($doctorID);
        $data['cases'] = $this->Cases_Model->get_cases_by_doctor($doctorID);
        $data['all_cases'] = $this->Cases_Model->get_all_cases();
        $this->load->view('doctors/view_cases', $data);
    }

    public function assign_case(){
        if($_SERVER['REQUEST_METHOD']=='POST') {
            $doctorID = $this->input->post('doctorID');
            $caseTypeID = $this->input->post('caseTypeID');
            $RecDate = date('Y-m-d');
            $ComDate = date('Y-m-d', strtotime('+7 days'));
            $Status = 'Pending';
            
            $data = [
                'doctorID' => $doctorID,
                'caseTypeID' => $caseTypeID,
                'RecDate' => $RecDate,
                'ComDate' => $ComDate,
                'caseStatus' => $Status
            ];

            if ($this->Cases_Model->assign_case($data)) {
                $this->session->set_flashdata('success', 'Case assigned successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to assign case');
            }
            redirect('doctors/view_cases/'.$doctorID);
        }
    }

    public function index(){
        $this->load->model('Doctors_Model');
        $data['doctors'] = $this->Doctors_Model->get_all_doctors($id);
        $this->load->view('doctors/index', $data); 
    }    
}
?>
