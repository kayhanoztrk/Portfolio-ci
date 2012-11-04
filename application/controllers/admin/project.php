<?php 
   class Project extends CI_Controller 
   {
    
	  public $upload_path; 
	  public $per_page;
	   
	   function __construct()
	   {
	     parent::__construct(); 
		 $this->load->model('project_model');
		 $this->upload_path=dirname(APPPATH).'/public/admin/project_images/';
		    if(!is_logged_in())
		  redirect(base_url().'index.php/admin/admin/index');
	
	   }
	     function index()
		 {
		    $this->project_pagination(); 
		   $data['links']=$this->pagination->create_links();
		    $data['main_content']='project'; 
			$data['records']=$this->project_model->get_projects($this->per_page,$this->uri->segment(4));
			$this->load->view('admin/admin_template',$data);
		 }
		 
		 function project_add()
		{
           $data['links']=array();
           $data['records']=array();
		   $data['main_content']='project_add_view';
		   $this->load->view('admin/admin_template',$data);
		  }
		  
		  function upload_project_img()
		  {
		    $data['links']=array();
		    $config['upload_path']=$this->upload_path; 
			$config['allowed_types']='jpeg|jpg|png'; 
			$config['file_name']='project__image'.'  '.date('d/m/y').'  '.rand(1,1000); 
			$this->load->library('upload',$config); 
			$this->upload->initialize($config);
			if($this->upload->do_upload('resim'))
			{
			    $files=$this->upload->data();
			    if($this->project_model->add_project($files['file_name']))
				{
				   $this->project_img_resize($files);  
				   $data['main_content']='msg_ok'; 
				   $data['records']=array('title'=>'Projeniz Eklendi!',
				   'url'=>project_panel_url()
				   ); 
				   }
				   else
				   {
				      $data['main_content']='msg_error'; 
					  $data['records']=array('title'=>'Eklenemedi.Lütfen Tekrar deneyiniz!', 
					  'url'=>project_panel_url()
					  ); 
					  }
					  }
					  else
					    {
						 $data['main_content']='msg_error'; 
						   $data['records']=array('title'=>'Proje resminiz upload edilemedi.Tekrar deneyiniz!',
						   'url'=>project_panel_url()
						   ); 
						   }
						   $this->load->view('admin/admin_template',$data); 
						 
						   
							}
							
							function delete_project()
							{
							
							  $data['links']=array();
							  $this->delete_project_image();
							  if($this->project_model->delete_project())
							  {
							     $data['main_content']='msg_ok'; 
								 $data['records']=array('title'=>'Projeniz silindi',
								 'url'=>project_panel_url()
								 ); 
								 }
								 else
								 {
								    $data['main_content']='msg_error'; 
									$data['records']=array('title'=>'Projeniz silinemedi.Tekrar deneyiniz!',
									'url'=>project_panel_url()
									); 
									}
									$this->load->view('admin/admin_template',$data);
							}
							function delete_project_image()
							{
							  $filename=$this->project_model->get_file_name(); 
							  unlink($this->upload_path.$filename);
							  unlink($this->upload_path.'/thumbs/'.$filename);
							 }
							 
							 function publish_project()
							 {
							    $data['links']=array();
							    if($this->project_model->publish_project())
								{
								  $data['main_content']='msg_ok'; 
								  $data['records']=array('title'=>'Projeniz artık yayında!',
								  'url'=>project_panel_url()
								  ); 
								  }
								  else
								  {
								    $data['main_content']='msg_error'; 
									$data['records']=array('title'=>'Hata olustu lütfen tekrar deneyiniz!',
									'url'=>project_panel_url()
									); 
									}
									$this->load->view('admin/admin_template',$data); 
								
							    }
								
								function unpublish_project()
								{
								   $data['links']=array();
								  if($this->project_model->unpublish_project())
								  {
								    $data['main_content']='msg_ok'; 
									$data['records']=array('title'=>'Projeniz yayından kalktı!',
									'url'=>project_panel_url()
									); 
									
								    }
									else
									{
									  $data['main_content']='msg_error'; 
									  $data['records']=array('title'=>'Hata olustu.Lütfen tekrar deneyiniz!',
									  'url'=>project_panel_url()
									  ); 
									 }
									 $this->load->view('admin/admin_template',$data);
								  }
								  
								  function project_img_resize($file_info)
								  {  
								    
									$pref=array('source_image'=>$file_info['full_path'], 
									'width'=>120,
									'height'=>120, 
									'new_image'=>$this->upload_path.'/thumbs/', 
									); 
									$this->load->library('image_lib',$pref); 
									$this->image_lib->resize();
								   
								     }
									 
					   function project_pagination()
                      {
					     $config=array('base_url'=>base_url().'/index.php/admin/project/index/', 
						 'total_rows'=>$this->project_model->get_total_rows(), 
						 'num_links'=>3, 
						 'per_page'=>5,
						 'full_tag_open'=>'<a>', 
						 'full_tag_close'=>'</a>'
						 ); 
						 $this->per_page=$config['per_page']; 
						 
						   $this->load->library('pagination'); 
						   $this->pagination->initialize($config); 
						   
                       }			
					   
							
				}
			  
			  
		   
		     
	
		
		?>
		