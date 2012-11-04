
<div class="small-nav">
			
		<?php echo anchor('admin/admin/resume_add','+Yeni Ekle');?>

  
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
						<h2 class="left">Özgeçmis</h2> 
					   
						
					</div>
			
			<!-- End Box Head -->	
			
				       
					<!-- Table -->
					<div class="table">
					
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								
								
								<th>Başlık:</th>
								
								<th>İçerik:</th>
								
					
					   
				  <th width="110" class="ac">Sil</th>
				  	
				  <th width="110" class="ac">Düzenle</th>
				   <th width="110" class="ac">Yayın</th>
							</tr>
							<?php  foreach($records as $row):
							
							  echo '<tr><td>'.$row->resume_title.'</td>'; 
							  echo '<td>'.$row->resume_content.'</td>';
								echo"<td>".anchor(base_url().'index.php/admin/admin/delete_resume/'.$row->resume_id,'Sil',array('class'=>'ico del'))."</td>";
								echo "<td>".anchor(base_url().'index.php/admin/admin/update_resume/'.$row->resume_id,'Düzenle',array('class'=>'ico edit'))."</td>";
                                 $title=($row->resume_pub==0)?'Yayınla':'Yayınlama';
								 $url=($row->resume_pub==0)?'publish_resume':'unpublish_resume';
								echo "<td>".anchor(base_url().'index.php/admin/admin/'.$url.'/'.$row->resume_id,$title,array('class'=>'ico edit'))."</td>";
							  echo '<tr />';							  
							 endforeach;
							  ?>
							
						</table>
						
						
									
						<!-- Pagging -->
					
				<div class="pagging">
							<div class="left"></div>
						
							<div class="right">
					    
						  <?php echo $links;?> 
								
							
							</div>
						</div>
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
