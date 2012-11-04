<?php 
 
  class Upload 
  
  {
     public $upload_path;
       function __construct()
	   {
	    parent::__construct();
	    $this->upload_path=dirname(APPPATH).'/public/admin/post_images/';
		$CI=& get_instance();
		}
		
		function upload_post_img($file_name)
		{
		 
		   $config['upload_path']=$this->upload_path;
		   $config['allowed_types']='jpg|jpeg|png'; 
		   $config['file_name']='picture__images'.'   '.rand(1,1000).'^_^'; 
		   $this->CI->load->library('upload',$config); 
		   if($this->CI->upload->do_upload($file_name))
		   {
		         echo 'Upload oldu!';    
		   }
		  else
			   {
			    echo 'UPpload olamadı siktirgit!';
				  }
		  }
		  }ss
		  ?>
		  
		  