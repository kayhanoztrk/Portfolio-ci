
<div class="small-nav">
			
		<?php echo anchor('admin/about/about_add','+Yeni Ekle');?>

  
		</div>
		
		<!-- Message OK -->		
		<div class="msg msg-ok">
			
		</div>
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<div class="msg msg-error">
			
		</div>
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Hakkımdaki Bilgiler</h2> 
					   
						
					</div>
			
			<!-- End Box Head -->	
			
				       
					<!-- Table -->
					<div class="table">
					
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								
								<th>Resim:</th>
								<th>İsim:</th>
								
								<th>Meslek:</th>
								<th>Facebook Adresim:</th>
								<th>Twitter Adresim:</th>
								<th>Hakkımda:</th>
								
					
					   
				  <th width="110" class="ac">Sil</th>
				  	
				  <th width="110" class="ac">Düzenle</th>
				 
							</tr>
							<?php  foreach($records as $row):
						
							  echo '<tr><td><img src="'.base_url().'public/admin/about_image/'.$row->about_pic.'"'.'width="100px"'.' '.'height="60px"'.' /></td>';
							  echo '<td>'.$row->about_name.'</td>'; 
							  echo '<td>'.$row->about_working.'</td>';
							  echo '<td>'.substr($row->about_face,0,12).'</td>'; 
							  echo '<td>'.$row->about_tweet.'</td>';
							  echo '<td>'.substr($row->about_info,0,10).'</td>';
								echo"<td>".anchor(base_url().'index.php/admin/about/delete_about/'.$row->about_id,'Sil',array('class'=>'ico del'))."</td>";
								echo "<td>".anchor(base_url().'index.php/admin/about/update_about/'.$row->about_id,'Düzenle',array('class'=>'ico edit'))."</td>";
                   
							  echo '<tr />';							  
							 endforeach;
							  ?>
							
						</table>
						
						
										  
						<!-- Pagging -->
					
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
				
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				 <table border='0' width='50' height='50'>
				 <tr>
				
</td>
</table>
			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
