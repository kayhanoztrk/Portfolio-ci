<?php 
 
  class About_model extends CI_Model 
  
  {
       function __construct()
	   {
	     parent::__construct(); 
	   }
   
        function get_about_info()
		{ 
		  $query=$this->db->get('about_me'); 
		  return $query->result(); 
		}
		
		function add_about($filename) 
		{ 
		  $data=array('about_name'=>$this->input->post('name'), 
		  'about_working'=>$this->input->post('working'), 
		  'about_pic'=>$filename,
		  'about_face'=>$this->input->post('facebook_url'), 
		  'about_tweet'=>$this->input->post('twitter_url'),
		  'about_info'=>$this->input->post('about_info')
		  ); 
		    if($this->db->insert('about_me',$data))
			 return true; 
			 else
			 return false;
		 
		   }
		   
		   function rows()
		   { 
		     $query=$this->db->get('about_me'); 
			return $query->num_rows();
		    }
		
		  function delete_about()
		  {
		     $this->db->where('about_id',$this->uri->segment(4)); 
			 if($this->db->delete('about_me'))
			 return true; 
			 else
			 return false;
		  }
		  
		  
		 function update_about_page($filename)
		 {
		    $data=array('about_name'=>$this->input->post('name'), 
			'about_working'=>$this->input->post('working'), 
			'about_face'=>$this->input->post('facebook_url'), 
			'about_tweet'=>$this->input->post('twitter_url'),
			'about_pic'=>$filename
			); 
			if($this->db->update('about_me',$data))
			return true; 
			else
			return false;
		 }
			
		
		    
     
	 
	 }
	 
	  ?>
	  
	  