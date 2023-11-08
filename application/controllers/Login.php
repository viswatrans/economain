<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
			redirect("Login");
		}
	}

	public function index()
	{
		$this->load->view("loginview");
	}
	public function verify()
	{
		$user_name = $this->input->post("username");
		$password = $this->input->post("password");
		//$user_type_novehicles = '';
		if ($user_name != '' && $password != '') {
			$squery = "SELECT * FROM admin WHERE user='" . $user_name . "' AND pass='" . $password . "'";
			$query = $this->db->query($squery);
			$userverify = $query->result();
			if (count($userverify) > 0) {

				$sessiondata = array(
					'user'  => $userverify[0]->user,
					'userid'  => $userverify[0]->id
				);
				$this->session->set_userdata($sessiondata);
				echo   "<script>
					parent.window.location='" . base_url() . "Dashboard'; setTimeout(' parent.jQuery.fancybox.close();','1000')</script>";
				exit;
			} else {
				$this->session->set_flashdata('error', 'Something is wrong. Error!!');
				redirect($this->redirect);
			}
		} else {
			$this->session->set_flashdata('success', 'Sucessful added Multiple Image');
			redirect($this->redirect);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user');

		$this->session->unset_userdata('userid');

		//$this->session->unset_userdata('user_type');

		$this->session->sess_destroy();

		$this->session->set_flashdata('success', 'Logout Successfully');

			redirect('Login');
		}
}
