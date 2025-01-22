<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load member model
        $this->load->model('Members_Model');
    }
    
    function index(){
        // Load the member list view
        $this->load->view('members/index');
    }
    
    function getLists(){
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->Members_Model->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            $created = date( 'jS M Y', strtotime($member->created));
            $status = ($member->status == 1)?'Active':'Inactive';
            $data[] = array($i, $member->first_name, $member->last_name, $member->email, $member->gender, $member->country, $created, $status);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Members_Model->countAll(),
            "recordsFiltered" => $this->Members_Model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
}