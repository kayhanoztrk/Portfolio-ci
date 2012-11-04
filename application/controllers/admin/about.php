<?php 
 
   class About extends CI_Controller 
   { 
    
	   public $upload_path;
    
	  function __construct()
	  {
	    parent::__construct();
		$this->load->model('about_model');
		$this->load->library('form_validation');
		  $this->upload_path=dirname(APPPATH).'/public/admin/about_image/'; 
		    if(!is_logged_in())
		  redirect(base_url().'index.php/admin/admin/index');
		
	  }
	    
		function index()
		{
		   $data['links']=array();
		 $data['main_content']='about'; 
		 $data['records']=$this->about_model->get_about_info();
		 $this->load->view('admin/admin_template',$data); 
		  
		}
		 
		   function about_add()
		   {
		     $data['links']=array();
		     if($this->about_model->rows()>0)
			 redirect(about_panel_url());
			 
		     $data['main_content']='about_add'; 
			 $data['records']=array(); 
			 $this->load->view('admin/admin_template',$data); 
			 
		   }
		   
		    function about_add_submit($filename)
			{
			  $data['links']=array();
			   $this->form_validation->set_rules('name','Name','trim|required'); 
			   $this->form_validation->set_rules('working','Working','trim|required'); 
			   $this->form_validation->set_rules('facebook_url','Facebook','trim|required'); 
			   $this->form_validation->set_rules('twitter_url','Twitter','trim|required');
			   $this->form_validation->set_rules('about_info','About','trim|required');
			   if($this->form_validation->run()==TRUE)
			   {
			      if($this->about_model->add_about($filename))
				    {
					  $data['main_content']='msg_ok'; 
					  $data['records']=array('title'=>'Hakkınızdaki Bilgiler Eklendi!', 
					  'url'=>about_panel_url()
					  ); 
					  }
					  else
					     {
						   $data['main_content']='msg_error'; 
						   $data['records']=array('title'=>'Hata olustu.Lütfen tekrar deneyiniz!', 
						   'url'=>about_panel_url()
						   ); 
						  }
						
				} 
				else
				   {
				      $data['main_content']='msg_error'; 
					  $data['records']=array('title'=>'Tüm boslukları gerektiği gibi doldurunuz!', 
					  'url'=>about_panel_url()
					  ); 
				   } 
				    $this->load->view('admin/admin_template',$data); 
				
		   
		   }
		   
		   function upload_about_img()
		   {
		           $data['links']=array();
				    $config['upload_path']=$this->upload_path; 
					$config['allowed_types']='jpg|jpeg|png'; 
					$config['file_name']='about_me'.rand(1,100).'__'.'port'; 
					$this->load->library('upload'); 
					$this->upload->initialize($config); 
					if($this->upload->do_upload('resim')) 
					 { 
					    $files=$this->upload->data(); 
						$this->resize_img($files);
					    $this->about_add_submit($files['file_name']); 
						 
					    }
						else
						   {
						     $data['main_content']='msg_error'; 
							 $data['records']=array('title'=>'Resim upload edilemedi.Lütfen tekrar deneyiniz!', 
							 'url'=>about_panel_url()
							 ); 
							 $this->load->view('admin/admin_template',$data); 
							 }
							 
							
		    }
			 
			   function resize_img($files)
			   {
			        $data['links']=array();
			      $pref=array('source_image'=>$files['full_path'], 
				  'width'=>480, 
				  'height'=>545, 
				  'new_image'=>$this->upload_path.'/thumbs/'
				  ); 
				   $this->load->library('image_lib',$pref); 
				   $this->image_lib->resize(); 
				}
				
				  function delete_about()
				  {
				      $data['links']=array();
				    if($this->about_model->delete_about())
					{
					 $data['main_content']='msg_ok'; 
				     $data['records']=array('title'=>'Hakkınızda bilgileriniz silindi!', 
					 'url'=>admin_panel_url()
					 ); 
					  }
					  else
					    {
						  $data['main_content']='msg_error'; 
						  $data['records']=array('title'=>'Silinemedi.Lütfen tekrar deneyiniz!', 
						  'url'=>admin_panel_url()
						  ); 
						  }
						  $this->load->view('admin/admin_template',$data);
						   }
						   
						   
				     function update_about()
					 {
					     $data['links']=array();
					   $data['main_content']='update_about'; 
					   $data['records']=$this->about_model->get_about_info();
					   $this->load->view('admin/admin_template',$data);
					   }
					   
					function upload_update_img()
					{  
					   $data['links']=array();
					   $config['upload_path']=$this->upload_path; 
					   $config['allowed_types']='jpeg|jpg|png'; 
					   $config['file_name']='about_me'.rand(1,100).'__'.'port'; 
					   $this->load->library('upload'); 
					   $this->upload->initialize($config); 
					   if($this->upload->do_upload('resim'))
					   {
					      $this->delete_ex_pic();
					      $files=$this->upload->data(); 
						  $this->resize_img($files);
						   return true;
					    }
					  else
					    return false;
						  
					   }
						
						
						function about_update_submit()
						{
						     $data['links']=array();
						   $this->form_validation->set_rules('name','Name','required|trim'); 
						   $this->form_validation->set_rules('working','Working','required|trim'); 
						   $this->form_validation->set_rules('facebook_url','Facebook','required|trim'); 
						   $this->form_validation->set_rules('twitter_url','Twitter','required|trim'); 
						   if($this->form_validation->run()==TRUE)
						    {
							   if($this->upload_update_img())
							   {
							  $file=$this->upload->data(); 
							  if($this->about_model->update_about_page($file['file_name']))
							  {
							    $data['main_content']='msg_ok'; 
								$data['records']=array('title'=>'Hakkımızda sayfanız güncellendi!', 
								'url'=>admin_panel_url()
								); 
								
							    }
								else
								{
								   $data['main_content']='msg_error'; 
								   $data['records']=array('title'=>'Sorun oldu.Lütfen tekrar deneyiniz!', 
								   'url'=>admin_panel_url()
								   ); 
								   }
								  
						    }
							 else
								   {
								     $data['main_content']='msg_error'; 
									 $data['records']=array('title'=>'Resminiz upload edilemedi.Tekrar deneyiniz!', 
									 'url'=>admin_panel_url()
									 ); 
								      }
							}
									 
							else
							  {
							      $data['main_content']='msg_error'; 
								  $data['records']=array('title'=>'Lütfen tüm bilgileri giriniz!', 
								  'url'=>admin_panel_url()
								  ); 
								  }
								
							     
								
									  $this->load->view('admin/admin_template',$data); 
					
				    }
					
					function delete_ex_pic()
					{
					    $picture=$this->about_model->get_about_info(); 
						unlink($this->upload_path.$picture[0]->about_pic); 
						unlink($this->upload_path.'thumbs/'.$picture[0]->about_pic);
						
					 }
					 
					 
				
					
					
					
					
			    
				}    
				
				
		
		?>
		
		
		