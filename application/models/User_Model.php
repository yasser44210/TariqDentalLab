<?php

class User_Model extends CI_Model {

    public function get_user_by_username($username) {
        $query = $this->db->get_where('users', ['username' => $username]);
        return $query->row_array(); // Return a single result as an array
    }
}