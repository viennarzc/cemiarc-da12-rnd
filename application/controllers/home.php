<?php

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('research_and_development');
	}

	public function index()
	{		
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		$this->load->view('pages/dashboard');
		$this->load->view('include/footer');
	}

	// LOGIN
	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() && $this->input->post()) {
			$check = $this->research_and_development->verify($this->input->post('username'),md5($this->input->post('password')));

			if($check != null ) {
				$this->session->set_userdata(array('user_data' => $check));
				redirect('home/');

			} else {
				$this->session->set_flashdata('feedback', 'Invalid Username and Password!',$invalid);
				redirect('home/');
			}
		}
		else {
		redirect('home/');	
		}
	}

	// LOGOUT
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/');
	}

	// SEARCH
	public function search()
	{
		if ($this->input->post('search_key') != NULL) {
			if ($this->input->post('search_filter') == 'research') {
				$data['results'] = $this->research_and_development->search_research(strtolower($this->input->post('search_key')));
			} else if ($this->input->post('search_filter') == 'researcher') {
				$data['results'] = $this->research_and_development->search_researcher(strtolower($this->input->post('search_key')));
			} else if ($this->input->post('search_filter') == 'implementing_agency') {
				$data['results'] = $this->research_and_development->search_implementing_agency(strtolower($this->input->post('search_key')));
			} else if ($this->input->post('search_filter') == 'funding_agency') {
				$data['results'] = $this->research_and_development->search_funding_agency(strtolower($this->input->post('search_key')));
			} 

		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');

		if ($this->input->post('search_filter') == 'research') {
			$data['mainContent'] = 'pages/research/search_results';
		} else if ($this->input->post('search_filter') == 'researcher') {
			$data['mainContent'] = 'pages/researcher/search_results';
		} else if ($this->input->post('search_filter') == 'implementing_agency') {
			$data['mainContent'] = 'pages/implementing-agency/search_results';
		} else if ($this->input->post('search_filter') == 'funding_agency') {
			$data['mainContent'] = 'pages/funding-agency/search_results';
		}

		$this->load->view('include/content', $data);

		} else {
			redirect('home/', 'refresh');
		}
	}
}
?>