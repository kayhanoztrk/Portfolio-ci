

<?php echo form_open_multipart('admin/admin/change_pass_submit');?>
						
						<!-- Form -->
						<div class="form">
						 <h2><b>Admin Bilgilerini Değistirme Formu:</b></h2>
						 <br />
									<p>
									<span class="req"></span>
									<label>Kullanıcı adı:<span></span></label>
									<input type="text"  name="name" class="field size1" value="<?php echo $records[0]->username;?>"/>
								</p>
								<br />
								
								
								<p class="inline-field">
									<label>Parola:</label>
									<input type="password" name="password" value="<?php echo $records[0]->password;?>" class="field size1" />
								</p>	
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Admin Bilgilerimi Güncelle" />
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
