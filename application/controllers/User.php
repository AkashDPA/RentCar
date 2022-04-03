<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index()
	{
		redirect('/');
	}

	public function rent_car($car_id)
	{
		$car_details = $this->vehicle_model->get_vehicles(['id' => $car_id]);
		if ($car_details == null) {
			$this->session->set_flashdata('error', "Please Select Cars to Rent");
			redirect('home/rent-car');
		}

		$page_data['car_details'] = $car_details[0];
		$page_data['page_title'] = 'Rent Car';
		$page_data['page_name'] = 'rent_car';
		$this->load->view('user/index', $page_data);
	}

	public function my_bookings()
	{
        $page_data['bookings'] = $this->vehicle_model->get_user_bookings($this->session->userdata('user_id'));
        $page_data['page_title'] = 'My Bookings';
        $page_data['page_name'] = 'my_bookings';
        $this->load->view('user/index', $page_data);
	}

	public function car_actions($action, $car_id)
	{
		$rules = array(
			['field' => 'start_date', 'label' => 'Start date', 'rules' => 'required'],
			['field' => 'no_of_days', 'label' => 'No of days', 'rules' => 'required|numeric'],
		);

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() != TRUE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('user/rent_car/' . $car_id);
		}

		$start_date = $this->input->post('start_date');
		$start_date = str_replace('/', '-', $start_date);
		$no_of_days = $this->input->post('no_of_days');
		$booking_details = array(
			'vehicle_id' => $car_id,
			'start_date' => Date('Y-m-d', strtotime($start_date)),
			'no_of_days' => $no_of_days,
			'user_id' => $this->session->userdata('user_id')
		);
		$this->vehicle_model->book_vehicle($booking_details);
		$this->session->set_flashdata('success', "Car Booked Successfully");
		redirect('home/rent-car');
	}
}
