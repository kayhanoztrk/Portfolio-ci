<?php 
 
   function public_url()
   {
      return base_url().'public';
   }
	
	 function admin_panel_url()
	 {
	   return base_url().'index.php/admin/admin/admin_panel';
	  }
	  function blog_panel_url()
	  {
	   return base_url().'index.php/admin/blog/index';
	  }
	  
	  function project_panel_url()
	  {
	    return base_url().'index.php/admin/project/index';
	  }
	  
	  function contact_panel_url()
	  {
	    return base_url().'index.php/admin/contact/index';
	   }
	   
	   function settings_panel_url()
	   {
	     return base_url().'index.php/admin/settings/index';
	     }
		 
		 function month_date($month)
		 {
		   $ing_month=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		   $tr_month=array('Ocak','Subat','Mart','Nisan','Mayýs','Haziran','Temmuz','Aðustos','Eylül','Ekim','Kasým','Aralýk'); 
		   return str_replace($ing_month,$tr_month,$month);
		   }
		   
		   function about_panel_url()
		   {
		    return base_url().'index.php/admin/about/index';
		    }
		
		  function is_logged_in()
		  {
		      $CI=& get_instance();
		       $logged=$CI->session->userdata('username'); 
			 if(isset($logged))
			 return true; 
			 else 
			 return false; 
			 
		   }
	  
	  
	?>
	
	