<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicle_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_vehicles($conditions)
    {
        foreach ($conditions as $key => $condition) {
            $this->db->where($key, $condition);
        }
        $vehicles = $this->db->get('vehicles')->result_array();
        return $vehicles;
    }

    public function add_vehicle($data)
    {
        $vehicle_id = $this->db->insert('vehicles', $data);
        return $vehicle_id;
    }

    public function update_vehicle($vehicle_id, $data)
    {
        $vehicle_id = $this->db->where('id', $vehicle_id)->update('vehicles', $data);
        return $vehicle_id;
    }

    public function get_agency_bookings($agency_id)
    {
        $this->db->from('bookings b')->join('vehicles v', 'v.id = b.vehicle_id')->join('users u', 'u.id = b.user_id')->where('v.agency_id', $agency_id);
        return $this->db->get()->result_array();
        print_r($this->db->last_query());
        // die;
    }

    public function get_vehicles_for_booking()
    {
        $vehicles = $this->db->get('vehicles')->result_array();
        return $vehicles;
    }
}
