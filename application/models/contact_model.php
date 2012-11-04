<?php 
   
     class Contact_Model extends CI_Model
	 {
	    
		  function __construct()
		  {
		    parent::__construct(); 
		  }
		  
		  function get_contact_info()
		  {
		    $query=$this->db->get('contact'); 
			return $query->result();
		   }
		   
		   function contact_add()
		   {
		     $data=array('contact_mail'=>$this->input->post('email'),
			 'contact_phone'=>$this->input->post('phone'),
			 'contact_website'=>$this->input->post('website')
			 );
			 if($this->db->insert('contact',$data))
			 return true;
			 else
			 return false;
		     }
			 
			 function rows()
			 {
			   $query=$this->db->get('contact'); 
			   return $query->num_rows();
			   }
			   
			   function delete_contact_info()
			   {
			     $this->db->where('contact_id',$this->uri->segment(4)); 
				 if($this->db->delete('contact'))
                    return true; 
                 else
                    return false;				 
				 
			     }
				 
				 function update_contact_info()
				 {
				     $data=array('contact_mail'=>$this->input->post('email'), 
					 'contact_phone'=>$this->input->post('phone'), 
					 'contact_website'=>$this->input->post('website')
					 ); 
				    $this->db->where('contact_id',$this->input->post('contact_id')); 
					if($this->db->update('contact',$data))
                      return true; 
                    else
                      return false;					
					
				   }
				 
				 
		   }
		   ?>
		   