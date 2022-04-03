<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        redirect('auth/login', 'refresh');
    }


    public function login()
    {
        if($this->input->get('from') == "car_rent")
            $this->session->set_flashdata('info', "Please Login to Rent a Car");
        $page_data['page_title'] = "Login";
        $page_data['page_name'] = "login";
        $this->load->view('auth/index', $page_data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    public function register($user_type = "user")
    {
        $page_data['page_title'] = "Register";
        $page_data['page_name'] = "register";
        $page_data['user_type'] = $user_type;
        if ($user_type == "agency")
            $page_data['page_name'] = "register_agency";
        $this->load->view('auth/index', $page_data);
    }


    public function validate_login()
    {
        //validate form
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != TRUE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/login');
        }

        $user_email = $this->input->post('email');
        $user_pass = $this->input->post('password');
        $user_details = $this->user_model->validate_user($user_email, $user_pass);

        if ($user_details == null) {
            $this->session->set_flashdata('error', 'Wrong Credentials');
            redirect('auth/login');
        }

        $session_data = array(
            'user_id' => $user_details['id'],
            'name' => $user_details['name'],
            'role_id' => $user_details['role_id'],
            'is_logged_in' => TRUE
        );
        $this->session->set_userdata($session_data);
        $this->session->set_flashdata('info', 'Welcome, ' . $user_details['name']);

        if ($user_details['role_id'] == AGENCY_ROLE_ID)
            redirect('agency');
        redirect('/');
    }


    public function validate_register($user_type = "user")
    {
        //validate form
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != TRUE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/register/' . $user_type);
        }

        $user_name = $this->input->post('name');
        $user_email = $this->input->post('email');
        $user_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $user_details = $this->user_model->get_user_by_email($user_email);

        //right credentials?
        if ($user_details != null) {
            $this->session->set_flashdata('error', 'Email Already Registered');
            redirect('auth/regitser/' . $user_type);
        }

        $user_data = array(
            'name' => $user_name,
            'email' => $user_email,
            'pass' => $user_pass,
            'role_id' => $user_type == "agency" ? AGENCY_ROLE_ID : USER_ROLE_ID,
        );

        $this->user_model->add_user($user_data);
        $this->session->set_flashdata('success', 'Registered Sucessfully, Please Login');
        redirect('auth/login');
    }
}
