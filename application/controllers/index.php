<?php 
 
   class Index extends CI_Controller 
   
   {
      
	     function __construct()
		 {
		  parent::__construct();
		  $this->load->model('index/index_model');
		  }
		 
		 function index()
		 {
		    $data['main_content']='index';
			$data['about_me']=$this->get_about_info();
		    $data['resume']=$this->get_resumes();
		    $data['meta_info']=$this->get_meta_chars();
			$data['blog']=$this->get_blog();
		    $data['project']=$this->get_project();
		   $data['contact_info']=$this->get_contact(); 
		   $this->load->view('index/template',$data); 
		
		  }
		     
	    function get_resumes()
			 {
			 return $this->index_model->get_resumes();
			 }
			 
			 function get_meta_chars()
			 {
		   return $this->index_model->get_meta_chars();
			  }
			  
			  function get_contact()
			  {
			    return $this->index_model->get_contact(); 
				
			    }
				
		   function get_project()
		   {
		    
			 return $this->index_model->get_project(); 
			 
		    }
			function get_blog()
			{
			  return $this->index_model->get_blog();
			}
			
			function get_about_info()
			{
			  return $this->index_model->get_about_info();
			  
			}
		  
		 
		   
		  }
		  
		  ?>
		  
		  
		    