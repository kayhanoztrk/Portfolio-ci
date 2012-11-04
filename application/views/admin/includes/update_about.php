

<?php echo form_open_multipart('admin/about/about_update_submit');?>
						
						<!-- Form -->
						<div class="form">
						 <h2><b>Hakkımda Düzenleme Formu:</b></h2>
						 <br />
									<p>
									<span class="req"></span>
									<label>İsim:<span></span></label>
									<input type="text"  name="name" class="field size1" value="<?php echo $records[0]->about_name;?>"/>
								</p>
								<br />
								<p>
								<label>Resim</label>
								<input type="file" name="resim" value="" />
								</p>
								
								<p class="inline-field">
									<label>Meslek:</label>
									<input type="text" name="working" value="<?php echo $records[0]->about_working;?>" class="field size1" />
								</p>	
									<p>
								<label>Facebook:</label>
								<input type="text" name="facebook_url" class="field size1" value="<?php echo $records[0]->about_face;?>" />
								</p>
								<p> 
								<label>Twitter:</label>
								<input type="text" name="twitter_url"  class="field size1" value="<?php echo $records[0]->about_tweet;?>" />
								</p>
								
							
								
								
								
							
								
								
									
							
									
								
								
						
									
						
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Hakkımda Bilgilerimi Düzenle" />
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
