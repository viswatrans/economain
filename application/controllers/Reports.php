<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    Public function __construct() 
	{
		parent::__construct();
		if($_SESSION['user']=='')
		{ 
			redirect("Login");
		}
		$this->load->model('Reports_model'); 
	}
    public function index()
	{
		$data['reports'] = $this->Reports_model->reportsdata();
        $this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('reports_view',$data);
        $this->load->view('footer');
    }
}