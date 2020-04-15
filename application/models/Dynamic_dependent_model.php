<?php

class Dynamic_dependent_model extends CI_Model {
	
	public function fetch_country() {

		$this->db->order_by('country_name', 'asc');
		$query = $this->db->get('country');
		return $query->result();
	}

	public function fetch_states($countryid) {

		$this->db->where('country_id', $countryid)
				->order_by('state', 'asc');
		$query = $this->db->get('state');
		$output = '<option value = "">Select State</option>';

		foreach ($query->result() as $row) {
			$output .= '<option value="'.$row->state_id.'">'.$row->state.'</option>';
		}

		return $output;
	}

	public function fetch_cities($stateid) {

		$this->db->where('state_id', $stateid);
		$this->db->order_by('city', 'asc');
		$query = $this->db->get('city');
		$output = '<option value = "">Select City</option>';

		foreach ($query->result() as $row) {
			$output .= '<option value="'.$row->city_id.'">'.$row->city.'</option>';
		}

		return $output;
	}


}

?>