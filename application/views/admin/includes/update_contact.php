<?php echo form_open('admin/contact/contact_update_submit');?>						
						<!-- Form -->
						<div class="form">
						 <h2><b>İletisim Bilgileri Düzenleme Formu:</b></h2>
						 <br />
									<p>
									<span class="req"></span>
									<label>Email Adresi:<span></span></label>
									<input type="text"  name="email" class="field size1" value="<?php echo $records[0]->contact_mail;?>"/>
								</p>
								<br />
								<p>
								<label>Telefon No:</label>
								<input type="text" name="phone" value="<?php echo $records[0]->contact_phone;?>"  class="field size1" />
								</p>
								
								<p class="inline-field">
									<label>Website:</label>
								  <input type="text" name="website" value="<?php echo $records[0]->contact_website;?>" class="field size1" />
								</p>	
								
								<input type="hidden" name="contact_id" value="<?php echo $records[0]->contact_id;?>" />
								
							
								
								
									
							
									
								
								
						
									
						
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="İletisim Bilgilerimi Düzenle" />
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
