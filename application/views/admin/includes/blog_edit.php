<?php echo form_open_multipart('admin/blog/update_blog_submit');?>
						
						<!-- Form -->
						<div class="form">
						 <h2><b>Blog Düzenleme Formu:</b></h2>
						 <br />
									<p>
									<span class="req"></span>
									<label>Başlık:<span></span></label>
									<input type="text"  name="title" class="field size1" value="<?php echo $records[0]->post_title;?>"/>
								</p>
								<input type="hidden" name="blog_id" value="<?php echo $records[0]->post_id;?>" />
								<br />
								<p>
								<label>Resim</label>
								<input type="file" name="resim" value="<?php echo $records[0]->post_img;?>" />
								</p>
								<input type="hidden" name="pic" value="<?php echo $records[0]->post_img;?>" />
								
								<p class="inline-field">
									<label>İçerik:</label>
									<textarea class="ckeditor" name="content"><?php echo $records[0]->post_content;?></textarea>
								</p>	
								
								
								
							
								
								
									
							
									
								
								
						
									
						
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Blog Yazısı Ekle" />
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
