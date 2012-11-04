<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
    class Admin_Errors
{

   function __construct()
  {
  parent::__construct(); 
  $CI=& get_instance(); 
  
  }   
  
  function msg_ok($title,$url)
  {
    echo '<div class="msg msg-ok">
			<p><strong>'.$title.'</strong></p>
			<a href="'.$url.'" class="close">close</a>
		</div>';
    }
	function msg_error($title,$url)
	{
	  echo '<div class="msg msg-error">
			<p><strong>'.$title.'</strong></p>
			<a href="'.$url.'" class="close">close</a>
		</div>';
	  }
	  }
	  
	  ?>
	  

	