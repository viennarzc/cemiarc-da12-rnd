<?php

class Researchers extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('research_and_development');
	}

	public function add_researcher()
	{

		$exists = $this->research_and_development->check_researcher_name_exit($this->input->post('fname'), $this->input->post('mname'), $this->input->post('lname'));

		if ($exists) 
		{

			$this->session->set_flashdata('check_name', 'Researcher Profile Exist!');
			echo '<pre>';
			print_r("if exists ");
			print_r($query);
			echo '</pre>';

			redirect('researchers/researcher_form');
		}	else {
			$data = array('designation' => $this->input->post('designation'),
						  'fname' => ucwords($this->input->post('fname')),
			 			  'mname' => ucwords($this->input->post('mname')),
			 			  'lname' => ucwords($this->input->post('lname')),
			 			  'address' => ucwords($this->input->post('address')),
			 			  'sex' => $this->input->post('sex'),
			 			  'marital_status' => $this->input->post('marital_status'),
			 			  'company_office' => $this->input->post('company_office'),
			 			  'email' => $this->input->post('email'),
			 			  'contact_number' => $this->input->post('contact_number'));
			if ($data != NULL) {
				$id = $this->research_and_development->add_researcher($data);
				
				$this->session->set_flashdata('notification', 'New Data is save!');
				$this->session->set_flashdata('alert', 'success');
			}

			redirect('researchers/researcher_individual/'.$id);
		}
	}

	public function update_researcher($id)
	{

		if($this->input->post()) {
			$data = array('designation' => $this->input->post('designation'),
					  'fname' => ucwords($this->input->post('fname')),
		 			  'mname' => ucwords($this->input->post('mname')),
		 			  'lname' => ucwords($this->input->post('lname')),
		 			  'address' => ucwords($this->input->post('address')),
		 			  'sex' => $this->input->post('sex'),
		 			  'marital_status' => $this->input->post('marital_status'),
		 			  'company_office' => $this->input->post('company_office'),
		 			  'email' => $this->input->post('email'),
		 			  'contact_number' => $this->input->post('contact_number'));
			
			$this->research_and_development->update_researcher($id, $data);
			
			$this->session->set_flashdata('notification', 'New Data is Updated!');
			$this->session->set_flashdata('alert', 'success');

			redirect('researchers/researcher_individual/'.$id);
		} else {
				// display error notification
				$this->researcher_form_edit($id);
		}
	}

	public function researcher_list()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['researchers'] = $this->research_and_development->get_researchers();
		$data['mainContent'] = 'pages/researcher/list_researcher';
		$this->load->view('include/content', $data);
	}

	public function researcher_individual($researcher_id)
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['researcher'] = $this->research_and_development->get_researcher($researcher_id);
		$data['researches'] = $this->research_and_development->get_researcher_research($researcher_id);
		$data['designations'] = $this->research_and_development->get_designations();
		$data['mainContent'] = 'pages/researcher/researcher_individual';
		$this->load->view('include/content', $data);
	}

	public function researcher_form()
	{
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['designations'] = $this->research_and_development->get_designations();
		$data['mainContent'] = 'pages/researcher/researcher_input_form';
		$this->load->view('include/content', $data);
	}

	public function researcher_form_edit($id)
	{	
		$this->load->view('include/header');
		$this->load->view('include/menubar');
		$this->load->view('include/carousel');
		
		$data['researcher'] = $this->research_and_development->get_researcher($id);
		$data['designations'] = $this->research_and_development->get_designations();
		$data['mainContent'] = 'pages/researcher/edit_researcher';
		$this->load->view('include/content', $data);
	}
}
?>