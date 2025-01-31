<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session'); 
        $this->load->model('Cases_Model');
    }

    public function add(){
        
        $data['types'] = ['Type1', 'Type2', 'Type3', 'Type4', 'Type5'];
        if($_SERVER['REQUEST_METHOD']=='POST') {
            $caseName = $this->input->post('caseName');
            $type = $this->input->post('type');
            $cost = $this->input->post('cost');
            $price = $this->input->post('price');
            $RecDate = $this->input->post('RecDate');
            $ComDate = $this->input->post('ComDate');

            $data = array(
                'caseName' => $caseName,
                'type' => $type,
                'cost' => $cost,
                'price' => $price,
                'recivdate' => $RecDate,
                'complationdate' => $ComDate,
            );

            $status = $this->Cases_Model->insertCase($data);
            if($status==true){
                $this->session->set_flashdata('success', 'Case created successfully');
                redirect(base_url('cases/index'));
            }
            else{
                $this->session->set_flashdata('error', 'Case not added');
                $this->load->view('cases/add_case');
            }
        }// end of if

        else{
            $this->load->view('cases/add_case',$data);
        }

    } // end of add fucntion

    public function edit($id) {
        $data['cases'] = $this->Cases_Model->get_case_by_id($id);
        $data['types'] = ['Type1', 'Type2', 'Type3']; // Add types for the dropdown
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $caseName = $this->input->post('caseName');
            $type = $this->input->post('type');
            $cost = $this->input->post('cost');
            $price = $this->input->post('price');
            $RecDate = $this->input->post('RecDate');
            $ComDate = $this->input->post('ComDate');
    
            $data = array(
                'caseName' => $caseName,
                'type' => $type,
                'cost' => $cost,
                'price' => $price,
                'recivdate' => $RecDate,
                'complationdate' => $ComDate,
            );
    
            $status = $this->Cases_Model->updateCase($data, $id);
            if ($status == true) {
                $this->session->set_flashdata('success', 'Case updated successfully');
                redirect(base_url('cases/index'));
            } else {
                $this->session->set_flashdata('error', 'Error');
            }
        }
    
        $this->load->view('cases/edit_case', $data);
    }
    
    
    public function delete($id){
        if(is_numeric($id)){
            $status = $this->Cases_Model->deleteCase($id);
            if($status==true){
                $this->session->set_flashdata('success', 'Case deleted successfully');
                redirect(base_url('cases/index'));
            }
            else{
                $this->session->set_flashdata('error', 'Error');   
            }
            redirect(base_url('cases/index'));
        }

    }    

    public function index() {
        $this->load->model('Cases_Model');
        $data['cases'] = $this->Cases_Model->get_all_cases();
        $this->load->view('cases/index', $data);
    }    
}
