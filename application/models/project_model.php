<?php 
  class Project_Model extends CI_Model 
  
  {
        function __construct()
		{
		  parent::__construct(); 
		  }
		  function get_projects($per_page,$segment)
		  {
		     $this->db->limit($per_page,$segment);
		     $query=$this->db->get('projects'); 
			 return $query->result();
		  }
		  
		   function add_project($filename)
		   {
		     $data=array(
			 'project_name'=>$filename,
			 'project_pub'=>0
			 ); 
			 if($this->db->insert('projects',$data))
             return true; 
			 else 
			 return false;
			 
		      }
			
		   function delete_project()
		   {
		    
		     $this->db->where('project_id',$this->uri->segment(4));
			 if($this->db->delete('projects'))
               return true; 
             else
                return false;			 
			 
		     }
			
			function get_file_name()
			{
			  $this->db->where('project_id',$this->uri->segment(4)); 
			  $query=$this->db->get('projects'); 
			 $results=$query->result(); 
			  return $results[0]->project_name;
			   }
			   
			   function publish_project()
			   {
			     $data=array('project_pub'=>1);
			     $this->db->where('project_id',$this->uri->segment(4)); 
				 if($this->db->update('projects',$data))
				 return true; 
				 else
				 return false;
			   }
			   
			   function unpublish_project()
			   {
			     $data=array('project_pub'=>0); 
				 $this->db->where('project_id',$this->uri->segment(4)); 
				 if($this->db->update('projects',$data))
		          return true; 
				  else
				  return false;
			     }
				 
			  function get_total_rows()
			  {
			     $query=$this->db->get('projects'); 
				 return $query->num_rows();
			  }
			}
			?>
			