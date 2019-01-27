<!--<link rel="stylesheet" type="text/css" href="http://localhost/CodeIgniter-3.1.9_project/assets/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css'); ?>">-->

<?php echo validation_errors(); ?>

 public function update_article($article_id)
  { 
     $this->load->library('form_validation');
	 if( $this->form_validation->run('add_article_rules'))
	 
  
  

{
		$post = $this->input->post();
        //print_r($post);	exit;
		unset($post['submit']);
		$this->load->model('articlesmodel','articles');
		//print_r($post);	exit;
       	if($this->articles->update_article($article_id,$post))	
		{
			//echo "Insert Successful.";
			$this->session->set_flashdata('feedback',"Article Updated Successfully.");
			$this->session->set_flashdata('feedback_class','alert-success');
	    }
	     else
	    {
		 //echo "Insert Failed.";
		 $this->session->set_flashdata('feedback',"Article Failed To Update, Please Try Again Later.");
	     $this->session->set_flashdata('feedback_class','alert-danger');
	    }
		return redirect('admin/dashboard');
        		
	 }else{
		 $this->load->view('admin/edit_article');
	 }  
  }
  <!--<a class="nav-link" href="<?= base_url('login/logout') ?>">Logout <span class="sr-only">(current)</span></a>-->
    