<?php

class Researches extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('research_and_development');
	}

	private function clean_input($string) {
		$cleaned_input = '';
		$cleaned_input = (string) filter_var(trim($string), FILTER_SANITIZE_STRING);
		return $cleaned_input;
	}

	private function clean_html($text) {
		$cleaned_html = '';
		$cleaned_html = filter_var(trim($text), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		return $cleaned_html;
	}

	private function format_date($date) {
		$formatted_date = '';
		$formatted_date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
		return $formatted_date;
	}

	public function add_research()
	{

		$exists = $this->research_and_development->check_research_title_exist(clean_input($this->input->post('title')));

		if ($exists) 
		{
			$this->session->set_flashdata('check', 'Research Title already exist.');
			redirect('researches/research_form');
		}	else {
			if ($this->input->post() != NULL) {
			
				$data = array(
								'research_title' => ucwords($this->cleaned_input($this->input->post('title'))),
								'date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('date_published')))),
								'location_address' => ucwords($this->clean_input($this->input->post('address'))),
								'location_city' => ucwords($this->clean_input($this->input->post('selected_city_municipality'))),
								'approved_budget' => floatval($this->input->post('approved_budget')),
								'duration_start' => $this->input->post('date_started'),
								'duration_end' => $this->input->post('date_ended'),
								'category' => ucwords($this->clean_input($this->input->post('category'))),
								'status' => ucwords($this->clean_input($this->input->post('status'))),
								'abstract' => $this->clean_html($this->input->post('abstract')),
								'rationale' => $this->clean_html($this->input->post('rationale')),
								'objectives' => $this->clean_html($this->input->post('objectives')),
								'methodology' => $this->clean_html($this->input->post('methodology')),
								'results_and_discussions' => $this->clean_html($this->input->post('results_and_discussions')),
								'recommendation' => $this->clean_html($this->input->post('recommendation'))
							);
				$research_id = $this->research_and_development->add_research($data);

				foreach ($this->input->post('selected_researchers') as $value) {
					$data = array('research_id' => $research_id, 'researcher_id' => $value);
					$this->research_and_development->add_study_researchers($data);
				}

				foreach ($this->input->post('selected_implement_agency') as $value) {	
					$data = array('research_id' => $research_id, 'implementing_agency_id' => $value);
					$this->research_and_development->add_research_implementor($data);
				}

				foreach ($this->input->post('selected_fund_agency')as $value) {
					$data = array('research_id' => $research_id, 'funding_agency_id' => $value);
					$this->research_and_development->add_research_funder($data);
				}
		
				if ($data != NULL) {
					$this->session->set_flashdata('notification', 'New Data is save!');
					$this->session->set_flashdata('alert', 'success');
				}

				redirect('researches/research_individual/'.$research_id);

			} else {
				$this->research_form();
			}
		}
	}

	public function update($id)
	{
		if ($this->input->post() != NULL) {
		
			$data = array(
							'research_title' => ucwords($this->cleaned_input($this->input->post('title'))),
							'date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('date_published')))),
							'location_address' => ucwords($this->clean_input($this->input->post('address'))),
							'location_city' => ucwords($this->clean_input($this->input->post('selected_city_municipality'))),
							'approved_budget' => floatval($this->input->post('approved_budget')),
							'duration_start' => $this->input->post('date_started'),
							'duration_end' => $this->input->post('date_ended'),
							'category' => ucwords($this->clean_input($this->input->post('category'))),
							'status' => ucwords($this->clean_input($this->input->post('status'))),
							'abstract' => $this->clean_html($this->input->post('abstract')),
							'rationale' => $this->clean_html($this->input->post('rationale')),
							'objectives' => $this->clean_html($this->input->post('objectives')),
							'methodology' => $this->clean_html($this->input->post('methodology')),
							'results_and_discussions' => $this->clean_html($this->input->post('results_and_discussions')),
							'recommendation' => $this->clean_html($this->input->post('recommendation'))
						);
			$this->research_and_development->update_research($id, $data);
			
			// RESEARCHERS
			// check if there are unselected researchers, DELETE record in the database if so.
			$researchers = $this->research_and_development->get_research_researchers($id);

			foreach ($researchers as $researcher) {
				if (!in_array ($researcher->researcher_id, $this->input->post('selected_researchers'))) {
					 $this->research_and_development->delete_research_researcher($id, $researcher->researcher_id);
				} 
			}

			// check if selected_researchers are already in the database, if not ADD.
			$researcherArray = array();
			foreach ($researchers as $value) {
				$researcherArray[] = $value->researcher_id;
			 }

			foreach ($this->input->post('selected_researchers') as $input) {
				if (!in_array($input, $researcherArray)) {
					$data = array('research_id' => $id, 'researcher_id' => $input);
					$this->research_and_development->add_study_researchers($data);
				} 
			}

			// IMPLEMENTING AGENCY
			// check if there are unselected implementing agency, DELETE record in the database if so.
			$implementing_agencies = $this->research_and_development->get_research_implementing_agencies($id);

			foreach ($implementing_agencies as $agency) {
				if (!in_array ($agency->agency_id, $this->input->post('selected_implement_agency'))) {
				
					 $this->research_and_development->delete_research_implementing_agency($id, $agency->agency_id);
				} 
			}

			// check if selected_implement_agency are already in the database, if not ADD.
			$implementArray = array();
			foreach ($implementing_agencies as $value) {
				$implementArray[] = $value->agency_id;
			}

			foreach ($this->input->post('selected_implement_agency') as $input) {
				if (!in_array($input, $implementArray)) {
					$data = array('research_id' => $id, 'implementing_agency_id' => $input);
					$this->research_and_development->add_research_implementor($data);
				} 
			}


			// FUNDING AGENCY
			// check if there are unselected funding agency, DELETE record in the database if so.
			$funding_agencies = $this->research_and_development->get_research_funding_agencies($id);

			foreach ($funding_agencies as $agency) {
				if (!in_array ($agency->agency_id, $this->input->post('selected_fund_agency'))) {
					 $this->research_and_development->delete_research_funding_agency($id, $agency->agency_id);
				} 
			}

			// check if selected_fund_agency are already in the database, if not ADD.
			$fundArray = array();
			foreach ($funding_agencies as $value) {
				$fundArray[] = $value->agency_id;
			}

			foreach ($this->input->post('selected_fund_agency') as $input) {
				if (!in_array($input, $fundArray)) {
					$data = array('research_id' => $id, 'funding_agency_id' => $input);
					$this->research_and_development->add_research_funder($data);
				} 
			}
			$this->session->set_flashdata('notification', 'New Data is updated!');
			$this->session->set_flashdata('alert', 'success');
	
			redirect('researches/research_individual/'.$id);
		} else {
			// display error notification..
			$this->research_form_edit($id);
		}
	}

	public function research_list()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['researches'] = $this->research_and_development->get_researches();
		$data['mainContent'] = 'pages/research/list_research';
		$this->load->view('include/content', $data);
	}

	public function research_individual($research_id)
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['research'] = $this->research_and_development->get_research($research_id);

		foreach ($data['research'] as $value) {
			$data['city_muni_province'] = $this->research_and_development->get_city_municipality($value->location_city);
		}

		$data['researchers'] = $this->research_and_development->get_research_researchers($research_id);
		$data['implementing_agencies'] = $this->research_and_development->get_research_implementing_agencies($research_id);
		$data['funding_agencies'] = $this->research_and_development->get_research_funding_agencies($research_id);
		$data['mainContent'] = 'pages/research/research_individual';
		$this->load->view('include/content', $data);
	
	}

	public function research_form()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');	
		$this->load->view('include/carousel');
	
		$data['provinces'] = $this->research_and_development->get_provinces();
		$data['cities_municipalities'] = $this->research_and_development->get_cities_municipalities();
		$data['researchers'] = $this->research_and_development->get_researchers();
		$data['implementing_agencies'] = $this->research_and_development->get_implementing_agencies();
		$data['funding_agencies'] = $this->research_and_development->get_funding_agencies();
		$data['mainContent'] = 'pages/research/research_input_form';
		$this->load->view('include/content', $data);
	}

	public function research_form_edit($id)
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
	
		$data['research'] = $this->research_and_development->get_research($id);
		$data['r_researchers'] = $this->research_and_development->get_research_researchers($id);
		$data['r_implementing_agencies'] = $this->research_and_development->get_research_implementing_agencies($id);
		$data['r_funding_agencies'] = $this->research_and_development->get_research_funding_agencies($id);	
		$data['provinces'] = $this->research_and_development->get_provinces();
		$data['cities_municipalities'] = $this->research_and_development->get_cities_municipalities();
		$data['researchers'] = $this->research_and_development->get_researchers();
		$data['implementing_agencies'] = $this->research_and_development->get_implementing_agencies();
		$data['funding_agencies'] = $this->research_and_development->get_funding_agencies();
		$data['mainContent'] = 'pages/research/edit_research';
		$this->load->view('include/content', $data);
	}

	// REQUIRED SPECIAL LISTS
	public function by_location()
	{	
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
	
		$data['location_researches'] = $this->research_and_development->get_location_researches();
		$data['mainContent'] = 'pages/research/location';
		$this->load->view('include/content', $data);
	}

	public function by_abstract()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
	
		$data['researches'] = $this->research_and_development->get_researches();
		$data['mainContent'] = 'pages/research/abstracts';
		$this->load->view('include/content', $data);
	}

	public function by_results_and_discussions()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['researches'] = $this->research_and_development->get_researches();
		$data['mainContent'] = 'pages/research/results_and_discussions';
		$this->load->view('include/content', $data);
	}

	public function by_recommendation()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['researches'] = $this->research_and_development->get_researches();
		$data['mainContent'] = 'pages/research/recommendations';
		$this->load->view('include/content', $data);
	}

	public function by_aprroved_budget()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
	
		$data['research_budgets'] = $this->research_and_development->get_research_budget();
		$data['mainContent'] = 'pages/research/approved_budgets';
		$this->load->view('include/content', $data);
	}

	public function by_status()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
	
		$data['statuses'] = $this->research_and_development->get_research_status();
		$data['mainContent'] = 'pages/research/status';
		$this->load->view('include/content', $data);
	}

}
?>