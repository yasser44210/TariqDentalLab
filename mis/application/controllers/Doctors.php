<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session'); 
        $this->load->model('Doctors_Model');
        
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
    public function index(){
        $this->load->model('Doctors_Model');
        $data['doctors'] = $this->Doctors_Model->get_all_doctors($id);
        $this->load->view('doctors/index', $data);
        


        $this->load->library('pagination');
        $config['base_url'] = base_url('doctors/index');
        $config['total_rows'] = $this->Doctors_Model->get_doctors_count();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['doctors'] = $this->Doctors_Model->get_all_doctors($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();   
    }

    public function search() {
        $searchQuery = $this->input->post('searchQuery');
        $data['doctors'] = $this->Doctors_Model->search_doctors($searchQuery);
        $data['searchQuery'] = $searchQuery;

        $this->load->view('doctors/search_results', $data);
    }

    public function view($id) {
        $doctor = $this->Doctors_Model->get_doctor_by_id($id);
    
        if (empty($doctor)) {
            $this->session->set_flashdata('error', 'Doctor not found');
            redirect(base_url('doctors/index'));
        }
    
        $data['doctor'] = $doctor;
        $this->load->view('doctors/view_doctor', $data);
    }
    
    public function assign_case($id) {
        $doctor = $this->Doctors_Model->get_doctor_by_id($id);
    
        if (empty($doctor)) {
            $this->session->set_flashdata('error', 'Doctor not found');
            redirect(base_url('doctors/index'));
        }
    
        // Your logic for assigning a case goes here
        // Redirect after assigning a case or show a form
        $this->session->set_flashdata('success', 'Case assigned successfully!');
        redirect(base_url('doctors/view/' . $id));
    }
}
?>
