
<?php

  class Admin extends CI_Controller
  {
	  public function dashboard()
	  { 	    
		  //if(! $this->session->userdata('user_id'))
			  //return redirect('login');
		  //$this->load->view('admin/dashboard');
		
		$this->load->library('pagination');
		
		$config = [
		          'base_url'   => base_url('admin/dashboard'),
				  'per_page'   =>  4,
				  'total_rows' => $this->articles->num_rows(),
				  'full_tag_open'   => "<ul class ='pagination'>",
				  'full_tag_close'   => "</ul>",
				  'first_tag_open'   => '<li>',
				  'first_tag_close'   => '</li>',
				  'last_tag_open'   => '<li>',
				  'last_tag_close'   => '</li>',
				  'next_tag_open'   => '<li>',
				  'next_tag_close'   => '</li>',
				  'prev_tag_open'   => '<li>',
				  'prev_tag_close'   => '</li>',
				  'num_tag_open'   => '<li>',
				  'num_tag_close'   => '</li>',
				  'cur_tag_open'   => "<li class ='active'><a>",
				  'cur_tag_close'   => '</a></li>',
				  ];
		
		$this->pagination->initialize($config);
		$articles = $this->articles->articles_list( $config['per_page'] , $this->uri->segment( 3 ));
		
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	
      }
  public function add_article()
  {
      
	  $this->load->view('admin/add_article');
	  
  }
  public function store_article()
  {
	 $this->load->library('form_validation');
	 if( $this->form_validation->run('add_article_rules'))
	 {
		$post = $this->input->post();
        //print_r($post);	exit;
		unset($post['submit']);	
        //$article_id = $this->input->post('article_id');
        return $this->_falshAndRedirect(  
		                         $this->articles->add_article($post),
	                            "Article Added Successfully.",
                                "Article Failed To Add, Please Try Again Later.");          		
	 }else{
		 $this->load->view('admin/add_article');
	 }
  }
  public function edit_article($article_id)
  {
	  //echo $article_id;
	  
	  $article = $this->articles->find_article($article_id);
	  //echo "<pre>";
	 // print_r($article);
	  $this->load->view('admin/edit_article',['article'=>$article]);
  }
  public function update_article($article_id)
  { 
     //print_r($this->input->post());
	 //$this->load->model('articlesmodel','articles');
	 //if( $this->articles->update_article())
	 $this->load->library('form_validation');
	 if( $this->form_validation->run('add_article_rules') || true)
	 {
		$post = $this->input->post();
        //print_r($post);	exit;
		unset($post['submit']);	
        //$article_id = $this->input->post('article_id');
        return $this->_falshAndRedirect(  
		                        $this->articles->update_article($article_id,$post),
	                            "Article Updated Successfully.",
                                "Article Failed To Update, Please Try Again Later."); 			
		//print_r($post);	exit;
	 }else{
		 $this->load->view('admin/dashboard');
	 }  
  
  }
  public function delete_article()
  {
	  //print_r($this->input->post());
	  $article_id = $this->input->post('article_id');
      return $this->_falshAndRedirect(  
	                             $this->articles->delete_article($article_id,$post),
	                            "Article Deleted Successfully.",
                                "Article Failed To Delete, Please Try Again Later."); 	  	
  }
  public function __construct()
  {   
      parent:: __construct();
	  if(!$this->session->userdata('user_id'))
			  return redirect('login');
		  $this->load->model('articlesmodel','articles');
		  $this->load->helper('form');
  }	
  private function _falshAndRedirect($successful, $successMessage , $failureMessage)  
  { 
     if($successful){
		 $this->session->set_flashdata('feedback', $successMessage);
		 $this->session->set_flashdata('feedback_class','alert_success');	  
  }	 else {
         $this->session->set_flashdata('feedback', $failureMessage);
         $this->session->set_flashdata('feedback_class','alert_danger');			 
  }
     return redirect('admin/dashboard');
  }
  }  
  
?>
