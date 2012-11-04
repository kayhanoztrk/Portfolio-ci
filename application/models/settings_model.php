<?php 
 
   class Settings_Model extends CI_Model 
   
   {
       function __construct()
	   {
	     parent::__construct(); 
	   }
	   
	    function get_settings_info()
		{
		  $query=$this->db->get('seo'); 
		  return $query->result();
		}
		
		function add_settings()
		{
		  $data=array('meta_key'=>$this->input->post('key'),
		  'meta_desc'=>$this->input->post('desc')
		  ); 
		  if($this->db->insert('seo',$data))
             return true; 
           else
             return false;		   
		  
		  }
		  
		  function seo_num()
		  {
		     $query=$this->db->get('seo'); 
			 return $query->num_rows();
		   }
		   
		   function delete_setting()
		   {
		     $this->db->where('meta_id',$this->uri->segment(4)); 
			 if($this->db->delete('seo'))
			 return true; 
			 else
			 return false;
		   }
		   
		   function update_setting()
		   {
		     $data=array('meta_key'=>$this->input->post('key'), 
			 'meta_desc'=>$this->input->post('desc')
			 );
		     $this->db->where('meta_id',$this->input->post('meta_id')); 
			 if($this->db->update('seo',$data))
			 return true; 
			 else
			  return false;
			 
		     }
			  
		
    }
	
	?>
	