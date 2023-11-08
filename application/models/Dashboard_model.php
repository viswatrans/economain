<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function reportsdata()
    {
        $this->db->select('*');
        $this->db->from('vehicles_list');
        $query = $this->db->get();
        return $query->result();
    }
    public function total()
    {
        $this->db->select('*');
        $this->db->from('vehicles_list');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function geofence()
    {
        $this->db->select('*');
        $this->db->from('vehicles_list');
        $this->db->where('vehicles_list.geofence=', 'Yes');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
