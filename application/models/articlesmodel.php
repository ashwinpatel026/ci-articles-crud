<?php

/**
 * 
 */
class Articlesmodel extends CI_Model
{
	public function articles_list($limit,$offset)
	{
		# code...
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->select(['title','id'])
							->from('articles')
							->where('user_id',$user_id)
							->limit($limit,$offset)
							->get();
		return $query->result();
	}
	public function all_articles_list($limit,$offset)
	{
		$query = $this->db->select(['title','id','created_at'])
							->from('articles')							
							->limit($limit,$offset)
							->get();
		return $query->result();
	}
	public function num_rows()
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->select(['title','id'])
							->from('articles')
							->where('user_id',$user_id)
							->get();
		return $query->num_rows();
	}
	public function all_article_rows()
	{
		$query = $this->db->select(['title','id'])
							->from('articles')							
							->get();
		return $query->num_rows();
	}

	public function add_article($article)
	{
		return $this->db->insert('articles',$article);
	}

	public function find_article($article_id)
	{
		$query = $this->db->where('id',$article_id)
							->select('*')
							->from('articles')
							->get();
		return $query->row();						
	}


	public function updated_article($article_id, array $article)
	{

		return $this->db->where('id',$article_id)
						->update('articles',$article);
	}

	public function delet_article($article_id)
	{
		return $this->db->delete('articles',['id'=>$article_id]);
	}

	public function search($query)
	{
		$query = $this->db->from('articles')
							->like('title',$query)
							->get();
		return $query->result();

	}

	public function find( $id )
	{
		$query = $this->db->from('articles')
							->where(['id'=>$id])
							->get();
				if($query->num_rows())
					return $query->row();
				return false;
	}
}