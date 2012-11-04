<?php 
 
   class Admin_blog_model extends CI_Model 
   {
    
	  function __construct()
	  {
	   parent::__construct();
	  }
	  
	  function get_blog_posts($per_page,$segment)
	  {
	    $this->db->order_by('post_id','desc'); 
		$this->db->limit($per_page,$segment);
		$query=$this->db->get('blog'); 
		return $query->result();
	   }
	   
	   function insert_blog($filename)
	   { 
	     $post=array('post_title'=>$this->input->post('title'),
		 'post_content'=>$this->input->post('content'),
		 'post_img'=>$filename,
		 'post_date'=>time(),
		 'post_pub'=>0
		 ); 
		 if($this->db->insert('blog',$post))
		 return true;
		 else
		 return false;
	   
	     }
		 
		 function get_blog_with_id($id)
		 {
		    $this->db->where('post_id',$id); 
			$query=$this->db->get('blog'); 
			return $query->result();
		   }
		   
		   function update_blog($filename)
		   {
		     $data=array('post_title'=>$this->input->post('title'),
			 'post_content'=>$this->input->post('content'), 
			 'post_img'=>$filename,
			 'post_date'=>time(),
			 'post_pub'=>0
			 );
		     $this->db->where('post_id',$this->input->post('blog_id')); 
			 if($this->db->update('blog',$data))
              return true; 
              else
             return false;
			 
		    }
			function delete_post()
			{
			  $this->db->where('post_id',$this->uri->segment(4)); 
			  if($this->db->delete('blog'))
			  return true; 
			  else
			  return false;
			   }
			   
			   function publish_post()
			   {
			      $data=array('post_pub'=>1);
			      $this->db->where('post_id',$this->uri->segment(4)); 
				  if($this->db->update('blog',$data))
				  return true; 
				  else
				  return false;
			   }
			    function unpublish_post()
				{
				  $data=array('post_pub'=>0); 
				  $this->db->where('post_id',$this->uri->segment(4)); 
				  if($this->db->update('blog',$data))
				  return true; 
				  else
				  return false;
				 }
				 
				 function get_total_rows()
				 {
				   $query=$this->db->get('blog'); 
				   return $query->num_rows(); 
				  }
	   }
	   
	   ?>
	   