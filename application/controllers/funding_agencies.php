<?php

class Funding_Agencies extends CI_Controller
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

	public function add_funding_agency()
	{
		$data = array(
						'agency_name' => $this->clean_input($this->input->post('agency_name')),
						'address' => $this->clean_input($this->input->post('address'))
					);

		if ($data != NULL) {
			$id = $this->research_and_development->add_funding_agency($data);
			
			$this->session->set_flashdata('notification', 'New Data is save!');
			$this->session->set_flashdata('alert', 'success');
		}
		redirect('funding_agencies/funding_agency_individual/'.$id);
	}

	public function update($id)
	{
		if ($this->input->post()) {
			$data = array(
						'agency_name' => $this->clean_input($this->input->post('agency_name')),
						'address' => $this->clean_input($this->input->post('address'))
					);
			$query = $this->research_and_development->update_funding_agency($id, $data);

			if ($query) {
	
				echo "<div class='alert alert-warning alert-dismissible' role='alert'>
  				<button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
  				<strong>Update failed!</strong>
				</div>";
				$this->edit($id);
		
			} else {
			$this->session->set_flashdata('notification', 'Data is Update!');
			$this->session->set_flashdata('alert', 'success');

				redirect('funding_agencies/funding_agency_individual/'.$id);
			}
		}
	}

	public function funding_agency_list()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['funding_agencies'] = $this->research_and_development-> get_funding_agencies();
		$data['mainContent'] = 'pages/funding-agency/list_funding_agency';
		$this->load->view('include/content', $data);
	}

	// public function funding_agency_list()
	// {
	// 	$this->load->view('include/header');
	// 	$this->load->view('include/menubar');
	// 	$this->load->view('include/carousel');
		
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url('funding_agencies/funding_agency_list/');
	// 	$config['per_page'] = 10;
	// 	$config['total_rows'] = $this->research_and_development->get_funding_agency_count();
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

	// 	$data['funding_agencies'] = $this->research_and_development->get_funding_agencies_limit($config['per_page'], $page);
	// 	$data['pages'] = $this->pagination->create_links();

	// 	$data['mainContent'] = 'pages/funding-agency/funding_agency_list';
	// 	$this->load->view('include/content', $data);
		
	// }

	public function funding_agency_individual($agency_id)
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['funding_agencies'] = $this->research_and_development->get_funding_agency($agency_id);
		$data['researches'] = $this->research_and_development->get_funding_agency_research($agency_id);
		$data['mainContent'] = 'pages/funding-agency/funding_agency_individual';
		$this->load->view('include/content', $data);
	}

	public function funding_agency_form()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');	
		$this->load->view('include/carousel');
		$data['mainContent'] = 'pages/funding-agency/funding_agency_input_form';
		$this->load->view('include/content', $data);
	}

	public function edit($id)
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		$data['funding_agency'] = $this->research_and_development->get_funding_agency($id);	
		$data['mainContent'] = 'pages/funding-agency/edit_funding_agency';
		$this->load->view('include/content', $data);
	}
}
?>