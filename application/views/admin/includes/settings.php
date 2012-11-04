<div class="small-nav">
			
		<?php echo anchor('admin/settings/setting_add','+Yeni Ekle');?>

  
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
						<h2 class="left">Ayar Bilgilerim</h2> 
					   
						
					</div>
			
			<!-- End Box Head -->	
			
				       
					<!-- Table -->
					<div class="table">
					
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								
								<th>Keywords:<i>(Anahtar kelimeler)</i></th>
							    <th>Description:<i>(Site açıklaması)</i></th>
								
				
				  <th width="110" class="ac">Sil</th>
				  <th width="110" class="ac">Düzenle</th>
							</tr>
							<?php  foreach($records as $row):
							  echo '<td>'.$row->meta_key.'</td>'; 
							  echo'<td>'.$row->meta_desc.'</td>';
			     			echo"<td>".anchor(base_url().'index.php/admin/settings/delete_setting/'.$row->meta_id,'Sil',array('class'=>'ico del'))."</td>";
                           echo '<td>'.anchor(base_url().'index.php/admin/settings/update_setting/'.$row->meta_id,'Düzenle',array('class'=>'ico edit')).'</td>';
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
