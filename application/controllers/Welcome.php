<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	Public function __construct() 
      { 
         parent::__construct(); 
         $this->load->model('add_model','add');
      }

	public function index()
	{
		$data['all'] = $this->add->get_data();
		$this->load->view('welcome_message',$data);
	}

	public function add_data()
	{
		$this->load->view('reg_view');
	}

	public function add_record()
	{
		// echo '<pre>';
		// print_r($_POST);
		// exit;
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email ','required|valid_email|is_unique[tbl_employee.email]');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('hobby[]','Hobby','required');
		$this->form_validation->set_rules('city','City','required');

		if($this->form_validation->run()){
			$data = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'gender'=>$this->input->post('gender'),
				'hobby'=>implode(',',$this->input->post('hobby')),
				'city'=>$this->input->post('city'),
				);
			$this->session->set_flashdata('success','Record Added successfull.');
			$ins = $this->add->add_all_data($data);
				redirect('welcome');

		}else{
			$this->session->set_flashdata('error', 'Something went wrong. Please try again with valid format.');
				$this->load->view('reg_view');
		}		
	}

	public function edit_data($id)
	{
		$data['row'] = $this->add->add_row_data($id);
		$this->load->view('edit_view',$data);

	}

	public function update_record($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email ','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('hobby[]','Hobby','required');
		$this->form_validation->set_rules('city','City','required');

		if($this->form_validation->run()){ 
		
		$data = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'gender'=>$this->input->post('gender'),
				'hobby'=>implode(',',$this->input->post('hobby')),
				'city'=>$this->input->post('city'),
				'id'=>$id,
				);
		$this->session->set_flashdata('success','Record Edit successfull.');
		$ins = $this->add->update_record($data);
		redirect('welcome');
		 } else{
			$this->session->set_flashdata('error', 'Something went wrong. Please try again with valid format.');
			$data['row'] = $this->add->add_row_data($id);
			$this->load->view('edit_view',$data);
		}		
		
	}

	public function delete_data($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_employee');
		redirect('welcome');

	}
}
