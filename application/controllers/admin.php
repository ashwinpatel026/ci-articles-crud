<?php

class Admin extends MY_Controller
{
	public function __construct(){
		parent::__construct();
		if( ! $this->session->userdata('user_id') )
			return redirect('login');
		$this->load->model('articlesmodel','article');
	}
	public function dashboard()
	{
		$this->load->library('pagination');
		$config = [
					'base_url' => base_url('admin/dashboard'),
					'per_page' => 5,
					'total_rows' => $this->article->num_rows(),
					'full_tag_open' => "<ul class='pagination pagination-lg'>",
					'full_tag_close' => '</ul>',
					'next_tag_open' => "<li>",
					'next_tag_close' => '</li>',
					'prev_tag_open' => "<li>",
					'prev_tag_close' => '</li>',
					'num_tag_open' => "<li>",
					'num_tag_close' => '</li>',
					'cur_tag_open' => "<li><a class='page-link'>",
					'cur_tag_close' =>'</a></li>',

		];
		$this->pagination->initialize($config);
		$articles = $this->article->articles_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}

	public function add_article()
	{
		$this->load->view('admin/add_article');
	}

	public function store_article()
	{
		$config = [
					'upload_path' => './upload',
					'allowed_types' => 'gif|jpg|png|jpeg',

			];
		$this->load->library('upload',$config);
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload() ){
			$post = $this->input->post();
			unset($post['submit']);
			$data = $this->upload->data();
			$image_path = base_url('upload/'.$data['raw_name'].$data['file_ext']);
			$post['image_path'] = $image_path;
			if($this->article->add_article($post))
			{
				$this->session->set_flashdata('feedback','Record Add Success');	
			}else{
				$this->session->set_flashdata('feedback','Failed Please Try Again Add Record');
			}
			
			return redirect('admin/dashboard');
		}else{
			$upload_error = $this->upload->display_errors();
			
			$this->load->view('admin/add_article',['upload_error'=>$upload_error]);
		}
	}
	public function edit_article($article_id)
	{
		$articles = $this->article->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$articles]);
	}
	public function update_article($article_id){

		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){
			$post = $this->input->post();
			unset($post['submit']);
			if($this->article->updated_article($article_id,$post))
			{
				$this->session->set_flashdata('feedback','Record Update Success');
			}
			else
			{
				$this->session->set_flashdata('feedback','Failed Please Try Again');
			}
			return redirect('admin/dashboard');
		}else{
			$articles = $this->article->find_article($article_id);
			$this->load->view('admin/edit_article',['article'=>$articles]);
		}
	}

	public function delete_article()
	{
		$article_id = $this->input->post('article_id');
			if($this->article->delet_article($article_id))
			{
				$this->session->set_flashdata('feedback','Record Delete Success');		
			}
			else
			{
				$this->session->set_flashdata('feedback','Deleted Failed Please Try Again');
			}
			return redirect('admin/dashboard'); 
	}
}
