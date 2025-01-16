<?php

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->library('session'); // Load session library
        
        if (!$this->session->userdata('is_logged_in')) {
            redirect('auth/login');
        }
    }

    public function login() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Retrieve user by username
            $user = $this->User_Model->get_user_by_username($username);

            // Verify user and password
            if ($user && password_verify($password, $user['password'])) {
                // Set session data
                $this->session->set_userdata([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'is_logged_in' => true,
                ]);

                // Redirect to the dashboard
                redirect('dashboard');
            } else {
                // Set flash message for invalid credentials
                $this->session->set_flashdata('error', 'Invalid username or password');
            }
        }

        // Load login view
        $this->load->view('auth/login');
    }

    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
