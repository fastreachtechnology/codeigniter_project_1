<?php
class Articlesmodel extends CI_Model
{
	public function articles_list( $limit, $offset )
	{   
	    $user_id = $this->session->userdata('user_id');
		$query = $this->db
		                ->select(['id','title','body'])
						//->select('id')
						->from('articles')
						->where('user_id',$user_id)
						->limit( $limit, $offset )
						->get();
    //print_r($query->result());  exit;                  						
	    return $query->result();	
	}
    public function num_rows()
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db
		                ->select(['id','title','body'])
						//->select('id')
						->from('articles')
						->where('user_id',$user_id)
						->get();
    //print_r($query->result());  exit;                  						
	    return $query->num_rows();	
    }		
	public function add_article($array)
	{   
		return $this->db->insert('articles', $array );
	}
	public function find_article($article_id)
	{   //exit ($article_id);
		$q = $this->db->select(['id','title','body'])
		       ->where('id',$article_id)
		         ->get('articles');
		return $q->row();
		//return $q->result();
	}
	public function update_article($article_id, Array $article)
	{
       return  $this->db
		            ->where('id', $article_id)
			        ->update('articles', $article);
			  
	}
	public function delete_article($article_id)
	{
		return $this->db->delete('articles',['id'=>$article_id]);
	}
}
?>