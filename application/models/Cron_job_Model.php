<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cron_job_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getimages()
	{

		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('upload_img');

		$result = $this->db->get();

		return $result->result();
	}
	public function insert_record($insertdata, $table)
	{

		return $this->db->insert($table, $insertdata);
	}
	public function delete_record()
	{
		$sql = "DELETE FROM images";
		$result = $this->db->query($sql);
		return $result;
	}
}
