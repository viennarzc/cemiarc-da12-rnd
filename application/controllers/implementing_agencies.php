<?php

class Implementing_Agencies extends CI_Controller
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

	public function add_implementing_agency()
	{
		$data = array(
						'agency_name' => $this->clean_input($this->input->post('agency_name')),
						'address' => $this->clean_input($this->input->post('address'))
					);

		if ($data != NULL) {
			$id = $this->research_and_development->add_implementing_agency($data);
			
			$this->session->set_flashdata('notification', 'New Data is save!');
			$this->session->set_flashdata('alert', 'success');
		}
		redirect('implementing_agencies/implementing_agency_individual/'.$id);
	}

	public function update_implementing_agency($id)
	{
		if ($this->input->post()) {
			$data = array(
							'agency_name' => $this->clean_input($this->input->post('agency_name')),
							'address' => $this->clean_input($this->input->post('address'))
						);
			$query = $this->research_and_development->update_implementing_agency($id, $data);

			if ($query) {
				// display error notification
				$this->implementing_agency_form_edit($id);
	
			} else {
				$this->session->set_flashdata('notification', 'The Implementing Agency has been updated successfully!');
				$this->session->set_flashdata('alert', 'success');
				redirect('implementing_agencies/implementing_agency_individual/'.$id);
	
			}
		}
	}

	public function implementing_agency_list()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['implementing_agencies'] = $this->research_and_development-> get_implementing_agencies();
		$data['mainContent'] = 'pages/implementing-agency/list_implementing_agency';
		$this->load->view('include/content', $data);
	}

	// public function implementing_agency_list()
	// {
	// 	$this->load->view('include/header');
	// 	$this->load->view('include/menubar');
	// 	$this->load->view('include/carousel');
		
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url('implementing_agencies/funding_agency_list/');
	// 	$config['per_page'] = 10;
	// 	$config['total_rows'] = $this->research_and_development->get_implementing_agency_count();
	// 	$config['uri_segment'] = 3;
	// 	$config['use_page_numbers'] = TRUE;

	// 	$config['full_tag_open'] = '<ul class="pagination">';
	// 	$config['full_tag_close'] ='</ul>';
	// 	$config['num_tag_open'] = '<li>';
	// 	$config['num_tag_close'] = '</li>';
	// 	$config['cur_tag_open'] = '<li class="disabled"><li class="active"><a href=#>';
	// 	$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
	// 	$config['next_tag_open'] = '<li>';
	// 	$config['next_tagl_close'] = '</li>';
	// 	$config['prev_tag_open'] = '<li>';
	// 	$config['prev_tagl_close'] = '</li>';
	// 	$config['first_tag_open'] = '<li>';
	// 	$config['first_tagl_close'] = '</li>';
	// 	$config['last_tag_open'] = '<li>';
	// 	$config['last_tagl_close'] = '</li>';

	// 	$this->pagination->initialize($config); 

	// 	$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;

	// 	$data['implementing_agencies'] = $this->research_and_development->get_implementing_agencies_limit($config['per_page'], $page);
	// 	$data['pages'] = $this->pagination->create_links();

	// 	$data['mainContent'] = 'pages/implementing-agency/implementing_agency_list';
	// 	$this->load->view('include/content', $data);
	// }

	// VIEW
	public function implementing_agency_individual($agency_id)
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['implementing_agencies'] = $this->research_and_development->get_implementing_agency($agency_id);
		$data['researches'] = $this->research_and_development->get_implementing_agency_research($agency_id);
		$data['mainContent'] = 'pages/implementing-agency/implementing_agency_individual';
		$this->load->view('include/content', $data);
	}

	public function implementing_agency_form()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');	
		$this->load->view('include/carousel');
		
		$data['mainContent'] = 'pages/implementing-agency/implementing_agency_input_form';
		$this->load->view('include/content', $data);
	}

	public function implementing_agency_form_edit($id)
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['implementing_agency'] = $this->research_and_development->get_implementing_agency($id);
		$data['mainContent'] = 'pages/implementing-agency/edit_implementing_agency';
		$this->load->view('include/content', $data);
	}
}
?>