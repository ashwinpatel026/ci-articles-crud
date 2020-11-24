<?php

class Client extends MY_Controller
{
	public function index()
	{
		$this->load->model('articlesmodel','article');
		$this->load->library('pagination');
		$config = [
					'base_url' => base_url('client/index'),
					'per_page' => 5,
					'total_rows' => $this->article->all_article_rows(),
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
		$articles = $this->article->all_articles_list($config['per_page'],$this->uri->segment(3));

		$this->load->view('public/articles_list',['articles'=>$articles]);
	}

	public function search()
	{
		
		$this->form_validation->set_rules('query', 'Query', 'required');

		if(! $this->form_validation->run()){
			$this->index();
		}else{
		$query = $this->input->post('query');
		$this->load->model('articlesmodel','article');
		$articles = $this->article->search($query);
		$this->load->view('public/search_article',['articles'=>$articles]);
		}
	}

	public function article( $id )
	{
		$this->load->model('articlesmodel','article');
		$articles = $this->article->find($id);
		$this->load->view('public/article_detail',compact('articles'));

	}
}