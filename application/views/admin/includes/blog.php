
<div class="small-nav">
			
		<?php echo anchor('admin/blog/blog_add','+Yeni Ekle');?>

  
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
						<h2 class="left">Blog İçeriklerim</h2> 
					   
						
					</div>
			
			<!-- End Box Head -->	
			
				       
					<!-- Table -->
					<div class="table">
					
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								
								<th>Resim:</th>
								<th>Başlık:</th>
								
								<th>İçerik:</th>
								
								
					
					   
				  <th width="110" class="ac">Sil</th>
				  	
				  <th width="110" class="ac">Düzenle</th>
				   <th width="110" class="ac">Yayın</th>
							</tr>
							<?php  foreach($records as $row):
						
							  echo '<tr><td><img src="'.base_url().'public/admin/post_images/'.$row->post_img.'"'.'width="100px"'.' '.'height="60px"'.' /></td>';
							  echo '<td>'.$row->post_title.'</td>'; 
							  echo '<td>'.$row->post_content.'</td>';
								echo"<td>".anchor(base_url().'index.php/admin/blog/delete_blog/'.$row->post_id,'Sil',array('class'=>'ico del'))."</td>";
								echo "<td>".anchor(base_url().'index.php/admin/blog/update_blog/'.$row->post_id,'Düzenle',array('class'=>'ico edit'))."</td>";
                                 $title=($row->post_pub==0)?'Yayınla':'Yayınlama';
								 $url=($row->post_pub==0)?'publish_blog':'unpublish_blog';
								echo "<td>".anchor(base_url().'index.php/admin/blog/'.$url.'/'.$row->post_id,$title,array('class'=>'ico edit'))."</td>";
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
