<?php

class Login extends CI_Controller
{
	
	public function index()
	{
		if( $this->session->userdata('user_id') )
			return redirect('admin/dashboard');
		$this->load->view('public/admin_login');
	}

	public function admin_login()
	{
		$this->form_validation->set_rules('username','User Name','required|alpha');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('loginmodel');
			$login_id = $this->loginmodel->valid_login( $username,$password); 
			if($login_id)
			{
				$this->session->set_userdata("user_id",$login_id);
				return redirect('admin/dashboard');
				// $this->load->view('admin/dashboard');
			}else{
				//Authentication failed
				$this->session->set_flashdata('login_failed','Invalid Username/Password');
				return redirect('login');
				// $this->load->view('public/admin_login');
			}

			
		}else{
			//validation fail
			$this->load->view('public/admin_login');
			//echo validation_errors();
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}