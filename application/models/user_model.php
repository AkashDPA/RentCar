<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_user_by_email($user_email)
    {
        $this->db->where('email', $user_email);
        $result = $this->db->get('users')->row_array();
        return $result;
    }

    public function validate_user($user_email, $user_pass)
    {
        $this->db->where('email', $user_email);
        $result = $this->db->get('users')->row_array();
        if($result == null || !password_verify($user_pass, $result['pass']))
            return null;
        return $result;
    }

    public function add_user($user_data)
    {
        $user_id = $this->db->insert('users', $user_data);
        return $user_id;
    }
}
