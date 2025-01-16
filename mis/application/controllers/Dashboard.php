<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
    }

    public function index() {

        $this->load->view('dashboard/index');
    }
}