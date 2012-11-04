<?php
 
  
   class Index_model extends CI_Model 
   
   {
    
	  
	   function __construct()
	   {
	     parent::__construct();
	   }
	   
	   function get_meta_chars()
	   {
	      $query=$this->db->get('seo'); 
		  return $query->row();
		  
		  }
		  
		  function get_resumes()
		  {
		   // $this->db->where('resume_pub','1');
		    $this->db->order_by('resume_id','desc'); 
			$this->db->limit(3);
			$query=$this->db->get('resume'); 
			return $query->result();
		     
			}
			
			function get_contact()
			{
			   $query=$this->db->get('contact'); 
			   return $query->row();
			}
			
			function get_project()
			{
			 $this->db->order_by('project_id','desc');
			 $this->db->where('project_pub',1);
			 $query=$this->db->get('projects'); 
			 return $query->result();
			 } 
			 
			 function get_blog()
			 {
			   $this->db->order_by('post_id','desc'); 
			   $this->db->where('post_pub',1);
			   $this->db->limit(3);
			   $query=$this->db->get('blog'); 
			   return $query->result();
			    }
				
		    function get_about_info()
			{
			   $query=$this->db->get('about_me'); 
			   if($query->num_rows()>0)
			   return $query->result();
			  
			}
		  }
		  
		  ?>
		  
		  