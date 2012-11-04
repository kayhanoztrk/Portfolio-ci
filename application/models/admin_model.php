<?php 

   class Admin_Model extends CI_Model 
   {
    
	 
	    function __construct()
		{
		  parent::__construct(); 
		 }
		 
		  function validate()
		  {
		    
			$this->db->where('username',$this->input->post('username')); 
			$this->db->where('password',md5($this->input->post('password'))); 
			$query=$this->db->get('admin'); 
		   if($query->num_rows()>0)
		   {
		      return true;
		     }
			 else 
			 return false; 
			
			}
			
			function insert_resume()
			{
			  $data=array('resume_title'=>$this->input->post('title'), 
			  'resume_content'=>$this->input->post('content'),
			  'resume_date'=>time(),
			  'resume_pub'=>0
			  );
			   if($this->db->insert('resume',$data))
			   return true; 
			   else
			   return false;
			  }
			
		    function get_resumes($per_page,$segment)
			{
			  
			  $this->db->order_by('resume_id','desc');
			  $this->db->limit($per_page,$segment);
			  $query=$this->db->get('resume'); 
			  
			  if($query->num_rows()>0) 
			  {
			    return $query->result();
			    }
			 }
			 
			 function update_resume()
			 {
			   $data=array('resume_title'=>$this->input->post('title'), 
			   'resume_content'=>$this->input->post('content')
			   ); 
			   
			    $this->db->where('resume_id',$this->input->post('resume_id')); 
				if($this->db->update('resume',$data))
				return true; 
				else
				return false; 
				
			    }
				
				 function get_resume_with_id()
				 {
				   $this->db->where('resume_id',$this->uri->segment(4)); 
				  $query=$this->db->get('resume'); 
				   return $query->result();
				   }
				   function delete_resume()
				   {
				     $this->db->where('resume_id',$this->uri->segment(4)); 
					 if($this->db->delete('resume'))
                       return true; 
                     else
                     return false; 					   
					 
				      }
					  
					  function publish_resume()
					  {
					   
					    $data=array('resume_pub'=>1);
					    $this->db->where('resume_id',$this->uri->segment(4)); 
						if($this->db->update('resume',$data))
						return true; 
						else
						 return false;
						
					    }
					
						  
				     function unpublish_resume($id)
					 {
					   $data=array('resume_pub'=>0);
					   $this->db->where('resume_id',$id); 
					   if($this->db->update('resume',$data))
					   return true; 
					   else
					   return false;
					   
					   }
					   
					   
					   function get_total_rows()
					   {
					       $query=$this->db->get('resume'); 
						   return $query->num_rows();
					    }
						
				
				   function get_admin_info()
				   {
				     $query=$this->db->get('admin'); 
					 return $query->result(); 
				   }
				   
				   function update_admin_info()
				   {
				      $data=array('username'=>$this->input->post('name'),
					  'password'=>md5($this->input->post('password'))
					  );
					  if($this->db->update('admin',$data))
					  return true; 
					  else
					  return false; 
				    
					}
				   
	 
	    }
		?>