<?php 
 
   class Settings extends CI_Controller 
   {
      
	    function __construct()
		{
		  parent::__construct();
		  $this->load->model('settings_model');
		  $this->load->library('form_validation');
		 
		     if(!is_logged_in())
		  redirect(base_url().'index.php/admin/admin/index');
		}
		
		function index()
		{
		  $data['links']=array();
		  $data['main_content']='settings'; 
		  $data['records']=$this->settings_model->get_settings_info();
		  $this->load->view('admin/admin_template',$data);
		}
		
		function setting_add()
		{
		
		  $data['links']=array();
		  if($this->settings_model->seo_num()>0)
		 redirect(base_url().'index.php/admin/settings/index');
		 
		 $data['main_content']='settings_add'; 
		 $data['records']=array();
		 $this->load->view('admin/admin_template',$data);
		}
		
		function setting_add_submit()
		{
		
		   $data['links']=array();
		   $this->form_validation->set_rules('key','Keywords','required|trim'); 
		   $this->form_validation->set_rules('desc','Description','required|trim'); 
		   if($this->form_validation->run()===TRUE)
		   {
		      if($this->settings_model->add_settings())
			  {
			     $data['main_content']='msg_ok'; 
				 $data['records']=array('title'=>'Site ayarlarınız kaydedildi!',
				 'url'=>settings_panel_url()
				 ); 
			    }
				else
				  {
				     $data['main_content']='msg_error'; 
					 $data['records']=array('title'=>'Site ayarlarınız kaydedilemedi.Tekrar deneyiniz!',
					 'url'=>settings_panel_url()
					 ); 
				     }
					 }
					 else
					   {
					     $data['main_content']='msg_error'; 
						 $data['records']=array('title'=>'Lütfen tüm boslukları doldurunuz!',
						 'url'=>settings_panel_url()
						 );
					     }
						 $this->load->view('admin/admin_template',$data);
		     }
			 
			 function delete_setting()
			 {
			  
			    $data['links']=array();
			    if($this->settings_model->delete_setting())
				{
				  $data['main_content']='msg_ok'; 
				  $data['records']=array('title'=>'Ayarlarınız Silindi!',
				  'url'=>settings_panel_url()
				  ); 
				  }
				  else
				    {
					   $data['main_content']='msg_error';
					   $data['records']=array('title'=>'Hata olustu.Lütfen tekrar deneyiniz!', 
					   'url'=>settings_panel_url()
					   ); 
					  }
					    $this->load->view('admin/admin_template',$data);
			   }
			   
			   function update_setting()
			   {
			     $data['links']=array();
			     $data['main_content']='update_settings'; 
				 $data['records']=$this->settings_model->get_settings_info(); 
				 $this->load->view('admin/admin_template',$data);
			   }
			   
			   
			   function setting_update_submit()
			   {
			     $data['links']=array();
			     $this->form_validation->set_rules('key','Key','required|trim'); 
				 $this->form_validation->set_rules('desc','Desc','required|trim'); 
				 if($this->form_validation->run()===TRUE)
				 {
				   if($this->settings_model->update_setting())
				   {
				      $data['main_content']='msg_ok'; 
					  $data['records']=array('title'=>'Ayarlarınız Güncellendi!',
					  'url'=>settings_panel_url()
					  ); 
				     }
					 else
					   {
					     $data['main_content']='msg_error'; 
						 $data['records']=array('title'=>'Hata olustu.Lütfen tekrar deneyiniz!',
						 'url'=>settings_panel_url()
						 ); 
					     }
					}
					else
					   {
					      $data['main_content']='msg_error'; 
						  $data['records']=array('title'=>'Lütfen tüm boslukları doldurunuz!',
						  'url'=>settings_panel_url()
						  ); 
						  }
						  $this->load->view('admin/admin_template',$data);
				           
			     }
		  }
		
		
    
		?>
		