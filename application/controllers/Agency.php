<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agency extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // check for session and role
        if ($this->session->userdata('is_logged_in') != TRUE) {
            $this->session->set_flashdata('error', "Restricted Access! Please Login");
            redirect('/');
        }

        if ($this->session->userdata('role_id') != AGENCY_ROLE_ID) {
            $this->session->set_flashdata('error', "Restricted Access! Only Agencies Allowed");
            redirect('/');
        }
    }


    public function index()
    {
        $page_data['page_title'] = 'Home';
        $page_data['page_name'] = 'home';
        $this->load->view('agency/index', $page_data);
    }


    public function my_cars()
    {
        $page_data['page_title'] = 'My Cars';
        $page_data['page_name'] = 'my_cars';
        $page_data['cars'] = $this->vehicle_model->get_vehicles(['agency_id' => $this->session->userdata('user_id')]);
        $this->load->view('agency/index', $page_data);
    }

    public function add_car()
    {
        $page_data['page_title'] = 'Add Car';
        $page_data['page_name'] = 'car_add';
        $this->load->view('agency/index', $page_data);
    }

    public function edit_car($car_id = NULL)
    {
        if ($car_id == NULL)
            redirect('agency/my-cars');

        $car_details = $this->vehicle_model->get_vehicles(['id' => $car_id, 'agency_id' => $this->session->userdata('user_id')]);
        if ($car_details == null) {
            $this->session->set_flashdata('error', "Please Select One of Your Cars to Edit Details");
            redirect('agency/my-cars');
        }
        $page_data['car_details'] = $car_details[0];
        $page_data['page_title'] = 'Edit Car';
        $page_data['page_name'] = 'car_edit';
        $this->load->view('agency/index', $page_data);
    }

    public function car_bookings()
    {
        $page_data['bookings'] = $this->vehicle_model->get_agency_bookings($this->session->userdata('user_id'));
        $page_data['page_title'] = 'Car Bookings';
        $page_data['page_name'] = 'car_bookings';
        $this->load->view('agency/index', $page_data);
    }

    public function car_actions($action, $car_id = null)
    {
        if ($action == "add") {
            //validate form
            $rules = array(
                ['field' => 'vehicle_model', 'label' => 'vehicle model', 'rules' => 'required'],
                ['field' => 'vehicle_number', 'label' => 'vehicle number', 'rules' => 'required'],
                ['field' => 'seating_capacity', 'label' => 'seating capacity', 'rules' => 'required|numeric'],
                ['field' => 'rent_per_day', 'label' => 'rent per day capacity', 'rules' => 'required|numeric'],
            );
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() != TRUE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('agency/add_car');
            }

            //upload photo
            $photo_name = strval(time()) . strval(rand());
            $photo_name = md5($photo_name);
            $photo_config = array(
                'upload_path' => "assets/images/user_upload/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "512000", // size is 500 KB
                "file_name" => $photo_name
            );
            $this->load->library('upload', $photo_config);
            if (!$this->upload->do_upload('vehicle_photo')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('agency/add_car');
            }

            //insert to table
            $vehicle_data = array(
                'model' => $this->input->post('vehicle_model'),
                'number' => $this->input->post('vehicle_number'),
                'seating_capacity' => $this->input->post('seating_capacity'),
                'rent_per_day' => $this->input->post('rent_per_day'),
                'photo' => $this->upload->data()['orig_name'],
                'agency_id' => $this->session->userdata('user_id')
            );
            $this->vehicle_model->add_vehicle($vehicle_data);
            $this->session->set_flashdata('success', 'Car Added Successfully');
            redirect('agency/my-cars');
        } else if ($action == "edit") {

            $car_details = $this->vehicle_model->get_vehicles(['id' => $car_id, 'agency_id' => $this->session->userdata('user_id')]);
            if ($car_details == null) {
                $this->session->set_flashdata('error', "Please Select One of Your Cars to Edit Details");
                redirect('agency/my-cars');
            }

            $car_details = $car_details[0];
            $car_photo = $car_details['photo'];

            //validate form
            $rules = array(
                ['field' => 'vehicle_model', 'label' => 'vehicle model', 'rules' => 'required'],
                ['field' => 'vehicle_number', 'label' => 'vehicle number', 'rules' => 'required'],
                ['field' => 'seating_capacity', 'label' => 'seating capacity', 'rules' => 'required|numeric'],
                ['field' => 'rent_per_day', 'label' => 'rent per day capacity', 'rules' => 'required|numeric'],
            );

            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() != TRUE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('agency/edit_car/' . $car_id);
            }

            if (!empty($_FILES['vehicle_photo']['name'])) {
                //upload photo
                $photo_config = array(
                    'upload_path' => "assets/images/user_upload/",
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,
                    'max_size' => "512000", // size is 500 KB
                    "file_name" => explode('.', $car_photo)[0]
                );
                $this->load->library('upload', $photo_config);
                if (!$this->upload->do_upload('vehicle_photo')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('agency/edit_car/' . $car_id);
                }
                $car_photo =  $this->upload->data()['orig_name'];
            }

            //insert to table
            $vehicle_data = array(
                'model' => $this->input->post('vehicle_model'),
                'number' => $this->input->post('vehicle_number'),
                'seating_capacity' => $this->input->post('seating_capacity'),
                'rent_per_day' => $this->input->post('rent_per_day'),
                'photo' => $car_photo,
                'agency_id' => $this->session->userdata('user_id')
            );

            // delete old photo if name mismatch due to different file type
            if ($car_photo != $car_details['photo'])
                unlink('assets/images/user_upload/' . $car_details['photo']);

            $this->vehicle_model->update_vehicle($car_id, $vehicle_data);
            $this->session->set_flashdata('success', 'Car Edited Successfully');
            redirect('agency/my-cars');
        }
    }
}
