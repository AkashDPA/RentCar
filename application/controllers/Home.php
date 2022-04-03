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

	
}
