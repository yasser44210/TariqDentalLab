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

        $this->load->view('dashboard_includes/header');
        $this->load->view('dashboard_includes/sidebar');
        $this->load->view('dashboard/index');
        $this->load->view('dashboard_includes/footer');
    }
}