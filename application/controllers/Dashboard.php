<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        // Check if the user is logged in
        
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }

        // Load dashboard view
        $this->load->view('dashboard/index');
    }
}