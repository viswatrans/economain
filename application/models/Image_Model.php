<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Image_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getimages()
	{
		$result =  $this->db->select("*")
			->from("userdata")
			->get()->result();
		return $result;
	}
	public function getreports()
	{
$sql="SELECT * FROM userdata ORDER BY transactionDate desc";
		$result = $this->db->query($sql);

		return $result;
	}

	public function getreports1()
	{
		$sql="SELECT * FROM userdata ORDER BY transactionDate desc";
		$result = $this->db->query($sql);

		return $result;
	}
	public function delete_record()
	{
		$sql = "DELETE FROM images";
		$result = $this->db->query($sql);
		return $result;
	}
	public function delete_record1()
	{
		$sql = "DELETE FROM upload_img";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getsec($id)
	{
		$sql="SELECT endtime FROM userdata WHERE id = $id";
		$result = $this->db->query($sql);
		return $result->result();
	}
}
