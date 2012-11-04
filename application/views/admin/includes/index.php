 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Yönetim Safası</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo public_url();?>/admin/cayda.css" />
</head>

<body>

    			
				 <form id="login-form" action="<?php echo base_url();?>index.php/admin/admin/login" method="post">
		<fieldset>
		
			<legend>Giriş Yap</legend>
			
			<label for="login">Kullanıcı Adı</label>
			<input type="text" id="login" name="username"/>
			<div class="clear"></div>
			
			<label for="password">Parola</label>
			<input type="password" id="password" name="password"/>
			<div class="clear"></div>
			
			
			<div class="clear"></div>
			
			<br />
			
			<input type="submit" style="margin: -20px 0 0 287px;" class="button" name="commit" value="Giriş "/>	
		</fieldset>
		 
	</form> 
  
		
	
	
	
</body>

</html>
