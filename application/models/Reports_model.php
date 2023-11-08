<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Reports_model extends CI_Model {
		Public function __construct() {
			parent::__construct();
		}
        public function reportsdata(){
            $this->db->select('*');
            $this->db->from('vehicles_list');
            $query = $this->db->get();
            return $query->result();
        }
    }