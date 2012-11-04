<?php 
 
   class Blog extends CI_Controller 
   
   { 
     var $upload_path;
	 public $per_page;
	 
      function __construct()
	  {
	    parent::__construct();
		$this->load->model('admin_blog_model');
		$this->load->library('form_validation'); 
	
       $this->upload_path=dirname(APPPATH).'/public/admin/post_images';
	      if(!is_logged_in())
		  redirect(base_url().'index.php/admin/admin/index');

     }
	   
	   function index()
	   {
	     $this->blog_pagination(); 
		
	     $data['main_content']='blog'; 
		 $data['records']=$this->admin_blog_model->get_blog_posts($this->per_page,$this->uri->segment(4)); 
		  $data['links']=$this->pagination->create_links();
		 $this->load->view('admin/admin_template',$data); 
	      }
		
		function blog_add()
		{
		  $data['links']=array();
		  $data['main_content']='blog_add'; 
		  $data['records']=array(); 
		  $this->load->view('admin/admin_template',$data);
		  
		  }
		  
		  
		  
		  function blog_add_submit($filename)
		  {
		   
		     $data['links']=array();
			 $this->form_validation->set_rules('title','Title','required|trim'); 
			 $this->form_validation->set_rules('content','Content','required|trim'); 
			 if($this->form_validation->run()===TRUE)
			 {
			  
		   if($this->admin_blog_model->insert_blog($filename))
			{
			  
			 $data['main_content']='msg_ok'; 
			 $data['records']=array('title'=>'Blog Yazınız Eklendi', 
			 'url'=>blog_panel_url()
			 ); 
		     }
			 else
			 {
			   $data['main_content']='msg_error'; 
			   $data['records']=array('title'=>'Blog yazınız Eklenemedi!',
			   'url'=>blog_panel_url()
			   ); 
			   }
			   $this->load->view('admin/admin_template',$data);
		  }
		
		  else
		    {
			   $data['main_content']='msg_error'; 
			   $data['records']=array('title'=>'Blog yazınız eklenemedi.Lütfen 
			   gerekli alanları doldurunuz!',
			   'url'=>admin_panel_url()
			   ); 
			   $this->load->view('admin/admin_template',$data);
		  
		  }
		  }
		 function upload_post_img()
		{
		    $data['links']=array();
		   $config['upload_path']=$this->upload_path;
		   $config['allowed_types']='jpg|jpeg|png'; 
		   $config['file_name']='picture__images'.'   '.rand(1,1000).'^_^'; 
		   $this->load->library('upload',$config); 
		   if($this->upload->do_upload('resim'))
		   {
		       $files=$this->upload->data(); 
			   $this->blog_img_resize($files);
		         $this->blog_add_submit($files['file_name']);
           }			  
		   
		  else
			   {
			   $data['main_content']='msg_error'; 
			   $data['records']=array('title'=>'Resminiz yüklenemedi.Tekrar deneyiniz!',
			   'url'=>blog_panel_url()
			   );
			   $this->load->view('admin/admin_template',$data);
				  }
		  }
		  
		   function update_blog()
		   {
		      $result=$this->admin_blog_model->get_blog_with_id($this->uri->segment(4));
			  $data['links']=array();
			  $data['records']=$result; 
			  $data['main_content']='blog_edit'; 
			  $this->load->view('admin/admin_template',$data);
		     }
			 
			 function update_blog_submit()
			 {
			     $data['links']=array();
			    if($this->update_upload_post_img()) 
				{
			     $this->form_validation->set_rules('title','Title','required|trim'); 
				 $this->form_validation->set_rules('content','Content','required|trim'); 
				 if($this->form_validation->run()===TRUE)
				 {
				   $files=$this->upload->data(); 
				   $this->blog_img_resize($files);
				   
				   if($this->admin_blog_model->update_blog($files['file_name']))
				   {
				    $data['main_content']='msg_ok'; 
					$data['records']=array('title'=>'Basarıyla Güncellendi!',
					'url'=>blog_panel_url()
					); 
				     }
					 else
					 {
					   $data['main_content']='msg_error'; 
					   $data['records']=array('title'=>'Güncellenemedi.Tekrar deneyiniz!',
					   'url'=>blog_panel_url()
					   ); 
					  }
				  }
				 else
				 {
				   $data['main_content']='msg_error'; 
				   $data['records']=array('title'=>'Güncellenemedi.Tekrar deneyiniz!',
				   'url'=>blog_panel_url()
				   ); 
				   }
				  }
				  else
				  {
				    $data['main_content']='msg_error'; 
					$data['records']=array('title'=>'Resim upload edilemedi.Tekrar deneyiniz!',
					'url'=>blog_panel_url()
					); 
			       }
                    $this->load->view('admin/admin_template',$data);	   
			   }
			    function update_upload_post_img()
				{
				   $config['upload_path']=$this->upload_path; 
				   $config['allowed_types']='jpeg|jpg|png'; 
				   $config['file_name']='picture__images'.'   '.rand(1,1000).'^_^'; 
				   $this->load->library('upload',$config); 
				   unlink($this->upload_path.$this->input->post('pic'));
				   if($this->upload->do_upload('resim'))
				   return true; 
				   else
				   return false;
				}
				
				function delete_blog()
				{
				  $data['links']=array();
				  if($this->admin_blog_model->delete_post())
				  {
				    $data['main_content']='msg_ok'; 
					$data['records']=array('title'=>'Yazınız Silindi!',
					'url'=>blog_panel_url()
					); 
					}
					else
					 {
					    $data['main_content']='msg_error'; 
						$data['records']=array('title'=>'Yazınız silinemedi.Tekrar deneyiniz!',
						'url'=>blog_panel_url()
						); 
						}
						$this->load->view('admin/admin_template',$data); 
				  
				  }
				  function publish_blog()
				  {
				    $data['links']=array();
				    if($this->admin_blog_model->publish_post())
					{
					  $data['main_content']='msg_ok'; 
					  $data['records']=array('title'=>'Blog yazınız artık yayında!', 
					  'url'=>blog_panel_url()
					  ); 
				    }
					else
					 {
					   $data['main_content']='msg_error'; 
					   $data['records']=array('title'=>'Hata olustu.Tekrar deneyiniz!', 
					   'url'=>blog_panel_url()
					   );
					   }
					   $this->load->view('admin/admin_template',$data);
				   }
				   function unpublish_blog()
				   {
				      $data['links']=array();
				     if($this->admin_blog_model->unpublish_post())
					 {
					    $data['main_content']='msg_ok'; 
						$data['records']=array('title'=>'Blog yazınız yayından kalktı!', 
						'url'=>blog_panel_url()
						); 
						
					    }
						else
						 {
						    $data['main_content']='msg_error'; 
							$data['records']=array('title'=>'Hata olustu.Tekrar deneyiniz!', 
							'url'=>blog_panel_url()
							); 
					     }
						   $this->load->view('admin/admin_template',$data);
				      }
					  
					  function blog_img_resize($file_info)
					  {
					     $pref=array('source_image'=>$file_info['full_path'],
						 'width'=>80,
						 'height'=>80, 
						 'new_image'=>$this->upload_path.'/thumbs/'
						 ); 
						 $this->load->library('image_lib',$pref); 
						$this->image_lib->resize();
		              }

                       function blog_pagination()
                      {
					     $config=array('base_url'=>base_url().'/index.php/admin/blog/index/', 
						 'total_rows'=>$this->admin_blog_model->get_total_rows(), 
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
		  
		  