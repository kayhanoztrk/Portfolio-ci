

<body class="shadow liftedcorners">

<!-- site container -->
<div class="container">
	<!-- begin right content -->
	<div class="content">
		<!-- begin accordion tabs -->
		<div id="tabs">
			<ol>
				<li data-slide-name="home">
					<h2><span><div class="tabtitle">Home</div><div class="tabicon"><img src="<?php echo public_url().'/index/images/home.png';?>" /></div></span></h2>
					<div class="contentarea homearea">
							<div class="thecontent">
								<h1>Home<img src="<?php echo public_url().'/index/images/home.png';?>" /></h1>
								<h2><?php echo $about_me[0]->about_name;?></h2>
                                <h3><?php echo $about_me[0]->about_info;?></h3>
                               
                             
						</div>
					</div>
				</li>
				<li data-slide-name="resume">
					<h2><span><div class="tabtitle">Resume</div><div class="tabicon"><img src="<?php echo public_url();?>/index/images/resume.png" /></div></span></h2>
					<div class="contentarea otherarea">
						<div class="thecontent"><h1>My Resume<img src="<?php echo public_url();?>/index/images/resume.png" /></h1>
							<ul class="timeline">
							  <?php foreach($resume as $row):
							?>
								<li>
									<div class="timepart">
										<h2><?php echo $row->resume_title;?><span><?php echo date('d/m/Y',$row->resume_date);?></span></h2>
										
										<p><?php echo $row->resume_content; ?></p>
									</div>
								</li>
							<?php endforeach;
							?>
							
								
								
							</ul>
						
						</div>
					</div>
				</li>
				<li data-slide-name="blog">
					<h2><span><div class="tabtitle">Blog</div><div class="tabicon"><img src="<?php echo public_url().'/index/images/blog.png';?>" /></div></span></h2>
					<div class="contentarea  otherarea">
						<div class="thecontent" id="theblog"><h1>My blog<img src="<?php echo public_url().'/index/images/blog.png';?>" /></h1>
							<div class="contentitems">
							  <?php foreach($blog as $bb):?>
								<div class="blogpost">
									<div class="blogthumb"><img src="<?php echo base_url().'public/admin/post_images/thumbs/'.$bb->post_img;?>" /></div>
									<h2><a class="blogajaxurl" id="blogpost_1"><?php echo $bb->post_title;?></a></h2>
									<p><?php echo $bb->post_content;?></p>
									<div class="bloginfo"><div class="day"><?php echo date('d',$bb->post_date);?></div><div class="date"><?php echo date('M',$bb->post_date);?></div></div>
								</div>
								<?php endforeach;?>
								
								
							</div>
					</div>
				</li>
				<li data-slide-name="portfolio">
					<h2><span><div class="tabtitle">Portfolio</div><div class="tabicon"><img src="<?php echo public_url().'/index/images/portfolio.png';?>" /></div></span></h2>
					<div class="contentarea  otherarea">
						<div class="thecontent"><h1>My Project<img src="<?php echo public_url().'/index/images/portfolio.png';?>" /></h1>
						<ul class="album">
						<?php foreach($project as $pr):?>
							<li><a class="images" href="<?php echo base_url().'public/admin/project_images/'.$pr->project_name;?>" title="<?php echo $pr->project_name;?>" />
							<img class="thumbnail" src="<?php echo base_url().'public/admin/project_images/thumbs/'.$pr->project_name;?>" />
							</a>
							</li>
							<?php endforeach;?>
						</ul>
						<script>
						  $('.thumbnail').adipoli({
												'startEffect' : 'overlay',
												'hoverEffect' : 'boxRandom'
											});
						</script>
						</div>
					</div>
				</li>
				<li data-slide-name="contact">
					<h2><span><div class="tabtitle">Contact</div><div class="tabicon"><img src="<?php echo public_url().'/index/images/contact.png';?>" /></div></span></h2>
					<div class="contentarea  otherarea">
						<div class="thecontent"><h1>Contact Me!<img src="<?php echo public_url().'/index/images/contact.png';?>" /></h1>
						<ul class="contactdetails">
							<li>Email:<?php echo $contact_info->contact_mail;?></li>
							<li>Phone:<?php echo $contact_info->contact_phone;?></li>
							<li>Website: <a target="_blank" href="<?php echo $contact_info->contact_website;?>"><?php echo $contact_info->contact_website;?></a></li>
						 </ul>
						
						</div>
					</div>
				</li>
			</ol>
		</div>
		</div>
		<!-- end accordion tabs -->
		<script>
			(function($) {
				$('#tabs').liteAccordion({
					containerWidth : 752,                   // fixed (px)  
					containerHeight : 361,
					linkable : true 
				});
			})(jQuery);  
		</script>
		
		<!-- begin footer -->
		<div class="footer">
			<div class="holder">
			<h1><?php echo $about_me[0]->about_name;?></h1>
			<h3><?php echo $about_me[0]->about_working;?></h3>
			
			<ul class="mysocial">
				<li class="socialicon facebook"><a target="_blank" href="<?php echo $about_me[0]->about_face;?>"></a></li>
				<li class="socialicon twitter"><a target="_blank" href ="<?php echo $about_me[0]->about_tweet;?>"></a></li>
			</ul>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- end right content -->
	
	<!-- begin left sidebar -->
	<div class="sidebar">
    <div class="box effect4">
<img style="width: 200px; height:220px; background:black;" src="<?php echo public_url().'/admin/about_image/'.$about_me[0]->about_pic;?>" />
</div>
    </div>
	<!-- end left sidebar -->
</div>
<!-- end site container -->
