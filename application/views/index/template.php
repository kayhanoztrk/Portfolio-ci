<?php 
 
  $this->load->view('index/includes/header',$meta_info); 
  $this->load->view('index/includes/'.$main_content,$about_me,$resume,$blog,$project,$contact_info); 
  $this->load->view('index/includes/footer'); 
  ?>
  