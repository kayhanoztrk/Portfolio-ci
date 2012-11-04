<?php echo form_open('admin/settings/setting_update_submit');?>						
						<!-- Form -->
						<div class="form">
						 <h2><b>Site Ayar Bilgileri Düzenleme Formu:</b></h2>
						 <br />
									<p>
									<span class="req"></span>
									<label>Anahtar Kelimeler:<span></span></label>
									<input type="text"  name="key" class="field size1" value="<?php echo $records[0]->meta_key;?>"/>
								</p>
								<br />
								
								<p class="inline-field">
									<label>Site Açıklaması:</label>
								<textarea name="desc" value="" class="ckeditor" /><?php echo $records[0]->meta_desc;?></textarea>
								</p>	
								
								<input type="hidden" name="meta_id" value="<?php echo $records[0]->meta_id;?>" />
								
							
								
								
									
							
									
								
								
						
									
						
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Site Ayar Bilgilerimi Düzenle" />
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
