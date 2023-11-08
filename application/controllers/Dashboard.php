<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($_SESSION['user'] == '') {
			redirect("Login");
		}
		$this->load->model('Dashboard_model');
	}
	public function index()
	{
		$data['reports'] = $this->Dashboard_model->reportsdata();
		$data['total'] = $this->Dashboard_model->total();
		$data['geofence'] = $this->Dashboard_model->geofence();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
}
