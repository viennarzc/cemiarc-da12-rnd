<?php

class Research_And_Development extends CI_Model {

	public function  __construct() {
		$this->load->database();
	}

	public function verify($username, $password) {
		$this->db->select('username, password');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		return $this->db->get('user_account')->row_object();
	}

	// COUNT ROWS
	function get_research_count() {
		$this->db->select('research_id')->from('research');
		$query = $this->db->get();

		return $query->num_rows();
	}

	function get_researcher_count() {
		$this->db->select('researcher_id')->from('researcher');
		$query = $this->db->get();

		return $query->num_rows();
	}

	function get_implementing_agency_count() {
		$this->db->select('agency_id')->from('implementing_agency');
		$query = $this->db->get();

		return $query->num_rows();
	}

	function get_funding_agency_count() {
		$this->db->select('agency_id')->from('funding_agency');
		$query = $this->db->get();

		return $query->num_rows();
	}
	
	// RETRIEVE

	// Research
	function get_researches() {
		$query = $this->db->order_by('research_title asc');
		$query = $this->db->get('research')->result();

		return $query;
	}

	function get_researches_limit($limit, $start) {
		$this->db->order_by('research_title asc')->limit($limit, $start);
		$query = $this->db->get('research')->result();

		return $query;
	}

	function get_research($research_id) {
		$query = $this->db->get_where('research', array('research_id' => $research_id));

		return $query->result();
	}

	function get_research_budget() {
		$this->db->select('research_id, research_title, approved_budget')->order_by('research_title asc');
		$query = $this->db->get('research')->result();

		return $query;
	}

	function get_research_status() {
		$this->db->select('research_id, research_title, status')->order_by('research_title asc');
		$query = $this->db->get('research')->result();

		return $query;
	}

	function get_research_researchers($research_id) {
		$this->db->select('researcher.researcher_id, researcher.designation, researcher.lname, researcher.fname, researcher.mname');
		$this->db->from('researcher');
		$this->db->join('study_researchers', 'study_researchers.researcher_id=researcher.researcher_id', 'inner join');
		$this->db->where('study_researchers.research_id', $research_id);
		$query = $this->db->get();

		return $query->result();
	}

	function get_research_implementing_agencies($research_id) {
		$this->db->select('implementing_agency.agency_id, implementing_agency.agency_name');
		$this->db->from('implementing_agency');
		$this->db->join('research_implementor', 'research_implementor.implementing_agency_id=implementing_agency.agency_id', 'inner join');
		$this->db->where('research_implementor.research_id', $research_id);
		$query = $this->db->get();

		return $query->result();
	}

	function get_research_funding_agencies($research_id) {
		$this->db->select('funding_agency.agency_id, funding_agency.agency_name');
		$this->db->from('funding_agency');
		$this->db->join('research_funder', 'research_funder.funding_agency_id=funding_agency.agency_id', 'inner join');
		$this->db->where('research_funder.research_id', $research_id);
		$query = $this->db->get();

		return $query->result();
	}

	// Researcher
	function get_researchers() {
		$this->db->order_by('lname asc');
		$query = $this->db->get('researcher');

		return $query->result();
	}

	function get_researchers_limit($limit, $start) {
		$this->db->order_by('lname asc')->limit($limit, $start);
		$query = $this->db->get('researcher')->result();

		return $query;
	}

	function get_researcher($researcher_id) {
		$query = $this->db->get_where('researcher', array('researcher_id' => $researcher_id));

		return $query->result();
	}

	function get_researcher_research($researcher_id) {
		$this->db->select('research.research_id, research.research_title');
		$this->db->from('research');
		$this->db->join('study_researchers', 'study_researchers.research_id=research.research_id', 'inner join');
		$this->db->where('study_researchers.researcher_id', $researcher_id);
		$query = $this->db->get();

		return $query->result();
	}

	function get_designations() {
		$query = $this->db->get('designation');

		return $query->result();
	}

	// Implementing Agency
	function get_implementing_agencies() {
		$query = $this->db->get('implementing_agency');

		return $query->result();
	}

	function get_implementing_agencies_limit($limit, $start) {
		$this->db->order_by('agency_name asc')->limit($limit, $start);
		$query = $this->db->get('implementing_agency')->result();

		return $query;
	}

	function get_implementing_agency($agency_id) {
		$query = $this->db->get_where('implementing_agency', array('agency_id' => $agency_id));

		return $query->result();
	}

	function get_implementing_agency_research($agency_id) {
		$this->db->select('research.research_id, research.research_title');
		$this->db->from('research');
		$this->db->join('research_implementor', 'research_implementor.research_id=research.research_id', 'inner join');
		$this->db->where('research_implementor.implementing_agency_id', $agency_id);
		$query = $this->db->get();

		return $query->result();
	}

	// Funding Agency
	function get_funding_agencies() {
		$query = $this->db->get('funding_agency');

		return $query->result();
	}

	function get_funding_agencies_limit($limit, $start) {
		$this->db->order_by('agency_name asc')->limit($limit, $start);
		$query = $this->db->get('funding_agency')->result();

		return $query;
	}

	function get_funding_agency($agency_id) {
		$query = $this->db->get_where('funding_agency', array('agency_id' => $agency_id));

		return $query->result();
	}

	function get_funding_agency_research($agency_id) {
		$this->db->select('research.research_id, research.research_title');
		$this->db->from('research');
		$this->db->join('research_funder', 'research_funder.research_id=research.research_id', 'inner join');
		$this->db->where('research_funder.funding_agency_id', $agency_id);
		$query = $this->db->get();

		return $query->result();
	}

	// Location
	function get_provinces() {
		$query = $this->db->get('province');

		return $query->result();
	}

	function get_cities_municipalities() {
		$query = $this->db->get('city_municipality');

		return $query->result();
	}

	function get_city_municipality($city_municipality) {
		$this->db->select('city_municipality.city_municipality_id, city_municipality.name, city_municipality.province_id, province.province_name');
		$this->db->from('city_municipality');
		$this->db->join('province', 'province.province_id=city_municipality.province_id', 'inner join');
		$this->db->where('city_municipality.city_municipality_id', $city_municipality);
		$query = $this->db->get();

		return $query->result();
	}

	function get_location_researches() {
		$this->db->select('research.research_id, research.research_title, research.duration_start, research.duration_end, city_municipality.*, province.province_name');
		$this->db->from('research');
		$this->db->join('city_municipality', 'city_municipality.city_municipality_id=research.location_city', 'inner join'); 
		$this->db->join('province', 'province.province_id=city_municipality.province_id', 'inner join');
		$this->db->order_by('city_municipality.city_municipality_id asc, province.province_id asc');
		$query = $this->db->get();

		return $query->result();
	}


	// INSERT
	function add_research($data) {
		$this->db->trans_start();
	  	$this->db->insert('research', $data);
	   	$insert_id = $this->db->insert_id();
	   	$this->db->trans_complete();
	   	return  $insert_id;
	}

	function add_study_researchers($data) {
		$this->db->insert('study_researchers', $data);
	}

	function add_research_implementor($data) {
		$this->db->insert('research_implementor', $data);
	}

	function add_research_funder($data) {
		$this->db->insert('research_funder', $data);
	}

	function add_researcher($data) {
		$this->db->trans_start();
	  	$this->db->insert('researcher', $data);
	   	$insert_id = $this->db->insert_id();
	   	$this->db->trans_complete();
	   	return  $insert_id;
	}

	function add_implementing_agency($data) {
		$this->db->trans_start();
	  	$this->db->insert('implementing_agency', $data);
	   	$insert_id = $this->db->insert_id();
	   	$this->db->trans_complete();
	   	return  $insert_id;
	}

	function add_funding_agency($data) {
		$this->db->trans_start();
	  	$this->db->insert('funding_agency', $data);
	   	$insert_id = $this->db->insert_id();
	   	$this->db->trans_complete();
	   	return  $insert_id;
	}

	// UPDATE

	function update_research($id, $data) {
		$this->db->where('research_id', $id);
		$query = $this->db->update('research', $data);

		// return $query;
	}

	function update_researcher($id, $data) {
		$this->db->where('researcher_id', $id);
		$query = $this->db->update('researcher', $data);

		// return $query;
	}

	function update_implementing_agency($id, $data) {
		$this->db->where('agency_id', $id);
		$query = $this->db->update('implementing_agency', $data);

		// return $query;
	}

	function update_funding_agency($id, $data) {
		$this->db->where('agency_id', $id);
		$query = $this->db->update('funding_agency', $data);

		// return $query;
	}

	// DELETE

	function delete_research_researcher($research_id, $researcher_id) {
		$row = array('research_id' => $research_id, 'researcher_id' => $researcher_id);
		$this->db->where($row);
		$this->db->delete('study_researchers');
	}

	function delete_research_implementing_agency($research_id, $agency_id) {
		$row = array('research_id' => $research_id, 'implementing_agency_id' => $agency_id);
		$this->db->where($row);
		$this->db->delete('research_implementor');
	}

	function delete_research_funding_agency($research_id, $agency_id) {
		$row = array('research_id' => $research_id, 'funding_agency_id' => $agency_id);
		$this->db->where($row);
		$this->db->delete('research_funder');
	}

	// SEARCH
	function search_research($key) {
		$this->db->like('research_title',$key);
        $query = $this->db->get('research');
        return $query->result();
	}

	function search_researcher($key) {
		$this->db->like('fname',$key);
		$this->db->or_like('mname',$key);
		$this->db->or_like('lname',$key);
        $query = $this->db->get('researcher');
        return $query->result();
	}

	function search_implementing_agency($key) {
		$this->db->like('agency_name', $key);
        $query = $this->db->get('implementing_agency');
        return $query->result();
	}

	function search_funding_agency($key) {
		$this->db->like('agency_name',$key);
        $query = $this->db->get('funding_agency');
        return $query->result();
	}

	function check_research_title_exist($title) {
		$query = $this->db->get_where('research', array('research_title' => $title ));
		$count = $query->num_rows();
		
		if ($count > 0 )
			return true;
		else
			return false;
	}

	function check_researcher_name_exit($fname, $mname, $lname) {
		$query = $this->db->get_where('researcher', array('fname' => $fname, 'mname' => $mname, 'lname' => $lname));
		$count = $query->num_rows();
		
		if ($count > 0 )
			return true;
		else
			return false;
	}
}