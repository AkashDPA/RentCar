<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$page_data['page_title'] = 'Home';
		$page_data['page_name'] = 'home';
		$this->load->view('index', $page_data);
	}

	public function rent_car()
	{
		$page_data['cars'] = $this->vehicle_model->get_vehicles_for_booking();
		$page_data['page_title'] = 'Rent Car';
		$page_data['page_name'] = 'rent_car';
		$this->load->view('index', $page_data);
	}
}
