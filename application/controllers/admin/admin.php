<?php 
 
   class Admin extends CI_Controller 
   
   {
   
     public $per_page; 
	 public $total_rows; 
	public $data=array();
	 
	      function __construct()
		  {
			   parent::__construct();
			   $this->load->model('admin_model'); 
			   $this->load->library('form_validation');
		      if(!is_logged_in())
			  $this->index();
			  
		  }
		  function index()
		  {
		    
	      $this->load->view('admin/index'); 
	      }
		  
		
		  
		  function login()
		  {
		 
		   
			 if($this->admin_model->validate())
			 {
			   $data=array('username'=>$this->input->post('username'),
			   'is_logged_in'=>true); 
			   $this->session->set_userdata($data); 
			  $this->admin_panel();
			   }
			 else
			 $this->index(); 
			 
		    }
			
			
			
			
			function admin_panel()
			{
			   
			    $this->panel_pagination();
			   
			   if($query=$this->admin_model->get_resumes($this->per_page,$this->uri->segment(4)))
            {
			  
			  $data['records']=$query;
			  $data['links']=$this->pagination->create_links();
			 
            }		
            $data['main_content']='panel';			
			 
		
		
			 $this->load->view('admin/admin_template',$data);
			
			  }
			  function is_logged_in()
			  {
			     if($this->session->userdata('username'))
				 return true; 
				 else
				 return false;
			    }
			  
			  function resume_add()
			  {
			    $data['links']=array();
			  $data['main_content']='resume_add';
			  $data['records']=array();
			   $this->load->view('admin/admin_template',$data);
			    }
				function resume_add_submit()
				{
				    $data['links']=array();
					if($this->admin_model->insert_resume())
					{
					 $data['main_content']='msg_ok';
					 $data['records']=array('title'=>'Ekleme İsleminiz Gerceklestirildi!',
					 'url'=>admin_panel_url()
					 ); 
					 }
					   else
					  { 
					   $data['main_content']='msg_error'; 
					   $data['records']=array('title'=>'Ekleme İslemi Gerceklestirilemedi.Lütfen Tekrar Deneyiniz!',
					   'url'=>admin_panel_url()
					   ); 
					  }
					   $this->load->view('admin/admin_template',$data);
				  }
				  
				  function update_resume()
				  {
				 $data['links']=array();
				   if($query=$this->admin_model->get_resume_with_id())
                   {
				    $data['records']=$query; 
					
					
                   }
				    $data['main_content']='resume_edit'; 
					
				  
		
				 $this->load->view('admin/admin_template',$data);
    
				  }
				  function update_resume_submit()
				  {
				      $data['links']=array();
					 if($this->admin_model->update_resume())
					 {
					  $data['main_content']='msg_ok';
					 $data['records']=array('title'=>'Güncelleme İsleminiz Gerceklesti!',
					 'url'=>admin_panel_url()
					 ); 
				
				    }
					else
					{
					  $data['main_content']='msg_error'; 
					  $data['records']=array('title'=>'Güncelleme İsleminiz Gerceklestirilemedi.Tekrar deneyiniz!',
					  'url'=>admin_panel_url()
					  ); 
					  
					  }
					   $this->load->view('admin/admin_template',$data);
				  }
				  
				  function delete_resume()
				  {
				       $data['links']=array();
				      if($this->admin_model->delete_resume())
					  {
					    $data['records']=array('title'=>'İçeriginiz Silindi',
						'url'=>admin_panel_url()
						); 
						$data['main_content']='msg_ok'; 
						
					     }
						 else
						   {
						      $data['records']=array('title'=>'Silme İslemi Gerceklestirilemedi.Lütfen Tekrar Deneyiniz!', 
							  'url'=>admin_panel_url()
							  ); 
							  $data['main_content']='msg_error'; 
							 
				    }
					 $this->load->view('admin/admin_template',$data); 
					}
					function publish_resume()
					{
					    $data['links']=array();
					   if($this->admin_model->publish_resume())
                     
                    {
                        $data['records']=array('title'=>'İçeriğiniz artık Yayında!',
                           'url'=>admin_panel_url()
                         ); 
                       $data['main_content']='msg_ok';  
       	             }
					else
					   {
					      $data['records']=array('title'=>'İçeriğiniz yayından kalktı!',
						  'url'=>admin_panel_url()
						  ); 
						  $data['main_content']='msg_error'; 
						  }
						  $this->load->view('admin/admin_template',$data); 
					   
					   }
					   
					   function unpublish_resume()
					   {
					       $data['links']=array();
					      if($this->admin_model->unpublish_resume($this->uri->segment(4)))
						  {
						     $data['records']=array('title'=>'İçeriğiniz Yayından kalktı!',
							 'url'=>admin_panel_url()
							 ); 
							 $data['main_content']='msg_ok'; 
							 
						  }
						  else
						   {
						     $data['records']=array('title'=>'İçeriğiniz Yayından kaldırılamadı.Tekrar deneyiniz!',
							 'url'=>admin_panel_url()
							 ); 
							 $data['main_content']='msg_error'; 
							 }
							 $this->load->view('admin/admin_template',$data);
						      }
							  
							  
				function panel_pagination()
				{
				 $this->load->library('pagination');
			     $config['base_url']=base_url().'/index.php/admin/admin/admin_panel/';
			     $this->total_rows=$config['total_rows']=$this->admin_model->get_total_rows(); 
			     $this->per_page=$config['per_page']=5; 
				 $config['num_links']=3;
				 $config['first_link']='First';
				 $config['full_tag_open']='<a>'; 
				 $config['full_tag_close']='</a>';
				 $config['cur_tag_open']='<b>'; 
				 $config['cur_tag_close']='</b>';
				 $config['prev_tag_open'] = '<div>';
				 $config['prev_tag_close'] = '</div>';
				 
				
			     $this->pagination->initialize($config); 
				   }
				   
				
				
				function change()
				{
				   $data['main_content']='change_root'; 
				   $data['records']=$this->admin_model->get_admin_info();  
				   $data['links']=array(); 
				   $this->load->view('admin/admin_template',$data);
				}
				
				function change_pass_submit()
				{
				   $data['links']=array();
				   $this->form_validation->set_rules('name','Name','required|trim'); 
				   $this->form_validation->set_rules('password','Password','required|trim|min_length[6]|max_length[20]'); 
				   if($this->form_validation->run()==TRUE)
				    {
					   if($this->admin_model->update_admin_info())
                    {
				       $data['main_content']='msg_ok'; 
					   $data['records']=array('title'=>'Yönetici bilgileriniz güncellendi!', 
					   'url'=>admin_panel_url()
					   ); 
					   }
					   else
					     {
						    $data['main_content']='msg_error'; 
							$data['records']=array('title'=>'Bir hata olustu.Tekrar deneyiniz!', 
							'url'=>admin_panel_url()
							); 
						  }
					}
					else
					   {
					      $data['main_content']='msg_error'; 
						  $data['records']=array('title'=>'Lütfen boslukları gerektiği gibi doldurunuz!', 
						  'url'=>admin_panel_url()
						  ); 
					   }
					   $this->load->view('admin/admin_template',$data);
                    }

                    function logout()
			     {
			     $data=array('username','is_logged_in');
			     $this->session->unset_userdata($data); 
			     redirect(base_url().'/index.php/admin/admin/index');
			     }					
					   
					   }
				   
				   
				  
				  
				  
   
   ?>