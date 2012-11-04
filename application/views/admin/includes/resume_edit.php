	

	<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
			
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->

					<!-- End Box Head -->	
	
				       
					<!-- Table -->
					
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
				   <div class="box-head">
						<h2>Özgeçmisi Düzenle:</h2>
					</div>
					
					<!-- End Box Head -->
					
					<form action="<?php echo base_url();?>index.php/admin/admin/update_resume_submit" method="post" enctype="multipart/form-data">
						<input type="hidden" name="resume_id" value="<?php echo $records[0]->resume_id;?>">
					
					
						   
						<!-- Form -->
						<div class="form">
						
									<p>
									<span class="req"></span>
									<label>Başlık:<span></span></label>
									<input type="text"  name="title" class="field size1" value="<?php echo $records[0]->resume_content;?>"/>
								</p>
<p>
								
								
											
								
							
							
							
									<p>
									<span class="req"></span>
									<label>Özgeçmis İçerik:<span></span></label>
										<textarea class="ckeditor" name="content"><?php echo $records[0]->resume_content;?></textarea>
								</p>	
								
							
								
									
										
									
							
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
						
							<input type="submit" class="button" value="Özgeçmisi Düzenle" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->

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