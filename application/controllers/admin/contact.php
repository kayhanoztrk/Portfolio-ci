<?php 

  class Contact extends CI_Controller 
  {
   
      function __construct()
	  {
	    parent::__construct();
	    $this->load->model('contact_model');
		   if(!is_logged_in())
		  redirect(base_url().'index.php/admin/admin/index');
		  
	   }
	   
	   function index()
	   {
	    $data['links']=array();
	    $data['main_content']='contact'; 
		$data['records']=$this->contact_model->get_contact_info();
		$this->load->view('admin/admin_template',$data);
	   }
	   
	   function contact_add()
	   {
	     $data['links']=array();
	     if($this->contact_model->rows()>0)
		  redirect(base_url().'index.php/admin/contact/index');
		  
	     $data['main_content']='contact_add'; 
		 $data['records']=array(); 
		 $this->load->view('admin/admin_template',$data);
	     }
		 
		 function contact_add_submit()
		 {
		   $data['links']=array();
		   $this->load->library('form_validation'); 
		   $this->form_validation->set_rules('email','Email','required|trim|valid_email');
           $this->form_validation->set_rules('phone','Phone','required|trim'); 
           $this->form_validation->set_rules('website','Website','required|trim');		
          if($this->form_validation->run()===TRUE)
           {
              
               if($this->contact_model->contact_add())
             {
                  $data['main_content']='msg_ok'; 
                  $data['records']=array('title'=>'İletisim Bilgileriniz Eklendi!',
                'url'=>contact_panel_url()
                   ); 
             }
     
                else
                {
				    $data['main_content']='msg_error'; 
					$data['records']=array('title'=>'Hata olustu.Lütfen tekrar deneyiniz!', 
					'url'=>contact_panel_url()
					); 
					}
					$this->load->view('admin/admin_template',$data); 
					}
					else
					 {
					   $data['main_content']='msg_error'; 
					   $data['records']=array('title'=>'Lütfen boslukları gerektiği gibi doldurunuz!', 
					   'url'=>contact_panel_url()
					   );
					}
					  $this->load->view('admin/admin_template',$data);
					}
					
					function delete_contact()
					{ 
					
					  $data['links']=array();
					  if($this->contact_model->delete_contact_info())
					  {
					    $data['main_content']='msg_ok'; 
						$data['records']=array('title'=>'İletisim bilgileriniz silindi!',
						'url'=>contact_panel_url()
						); 
						}
						else
						{
						   $data['main_content']='msg_error'; 
						   $data['records']=array('title'=>'İletisim bilgileriniz silinemedi',
						   'url'=>contact_panel_url()
						   ); 
						   }
						   $this->load->view('admin/admin_template',$data); 
					 
					  }
					  
					  function update_contact()
					  {
					     $data['links']=array();
					     $data['main_content']='update_contact'; 
						 $data['records']=$this->contact_model->get_contact_info();
						 $this->load->view('admin/admin_template',$data);
					    }
						
						function contact_update_submit()
						{
						  $data['links']=array();
						  $this->load->library('form_validation'); 
						  $this->form_validation->set_rules('email','Email','required|trim|valid_email'); 
						  $this->form_validation->set_rules('phone','Phone','required|trim'); 
						  $this->form_validation->set_rules('website','Website','required|trim'); 
						  if($this->form_validation->run()===TRUE)
						  {
						    if($this->contact_model->update_contact_info())
							{
							  $data['main_content']='msg_ok'; 
							  $data['records']=array('title'=>'İletisim bilgileriniz güncellendi!', 
							  'url'=>contact_panel_url()
							  ); 
							  }
							  else
							   {
							     $data['main_content']='msg_error'; 
								 $data['records']=array('title'=>'Hata olustu tekrar deneyiniz!', 
								 'url'=>contact_panel_url()
								 ); 
							     }
						     }
							 else
							  {
							     $data['main_content']='msg_error'; 
								 $data['records']=array('title'=>'Lütfen boslukları gerektiği gibi doldurunuz!',
								 'url'=>contact_panel_url()
								 ); 
							     }
								 $this->load->view('admin/admin_template',$data);
						  }
					
              				
		   
		   }
		 
	   
	 
	 ?>
	 