<div class="wrap">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>Blank Buttons Options and Settings</h2>
	
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">
					
					<div class="postbox">
					
						<h3><span>Choose Your Buttons to Display</span></h3>
						<div class="inside">
							<form name="wpblank_buttons_form" method="POST" action="">
								<input type="hidden" name="wpblank_buttons_form_submitted" value="Y" />
								<table class="form-table">
									<tr>
										<td>
											<fieldset>
												<legend class="screen-reader-text"><span>Facebook</span></legend>
												<label for="facebook">
													<input name="facebook" type="checkbox" id="facebook" value="1"  <?php if($facebook_is_checked == 'checked'){ echo 'CHECKED'; } ?>/> Facebook
												</label>
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
											<fieldset>
												<legend class="screen-reader-text"><span>Twitter</span></legend>
												<label for="twitter">
													<input name="twitter" type="checkbox" id="twitter" value="1"  <?php if($twitter_is_checked == 'checked'){ echo 'CHECKED'; } ?> /> Twitter
												</label>
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
											<fieldset>
												<legend class="screen-reader-text"><span>LinkedIn</span></legend>
												<label for="linkedin">
													<input name="linkedin" type="checkbox" id="linkedin" value="1"  <?php if($linkedin_is_checked == 'checked'){ echo 'CHECKED'; } ?> /> LinkedIn
												</label>
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
											<fieldset>
												<input class="button-primary" type="submit" name="wpblank_buttons_submit" value="Save Buttons" />
											</fieldset>
										</td>
									</tr>									
								</table>
							</form>			
							
							
						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->
					
					<div class="postbox">
					
						<h3><span>Choose Your Buttons to Display</span></h3>
						<div class="inside">
							<form name="wpblank_buttons_form2" method="POST" action="">
								<input type="hidden" name="wpblank_buttons_form2_submitted" value="Y" />
								<table class="form-table">
									<tr>
										<td valign="top">
											Enter your CSS to format your Facebook button:
										</td>
										<td valign="top">
											Enter your CSS to format your Twitter button:
										</td>
										<td valign="top">
											Enter your CSS to format your LinkedIn button:
										</td>
									</tr>
									<tr>
										<td><textarea style="width:250px; height: 200px;" name="wp_blank_buttons_fb_css" id="wp_blank_buttons_fb_css"><?php echo $fb_css; ?></textarea><br />
											<a class="blankbutton fb" style="<?php echo $fb_css; ?>" />Share on Facebook</a>
										</td>
										<td><textarea style="width:250px; height: 200px;" name="wp_blank_buttons_tw_css" id="wp_blank_buttons_tw_css" ><?php echo $tw_css; ?></textarea><br />
											<a class="blankbutton tw" style="<?php echo $tw_css; ?>" >Tweet This</a>
										</td>
										<td><textarea style="width:250px; height: 200px;" name="wp_blank_buttons_li_css" id="wp_blank_buttons_li_css"><?php echo $li_css; ?></textarea>
											<a class="blankbutton li"  style="<?php echo $li_css; ?>">Share on LinkedIn</a>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											<fieldset>
												<input class="button-primary" type="submit" name="wpblank_buttons_submit" value="Refresh Buttons" value="Tweet This" name="wp_blank_buttons_fb_css" id="wp_blank_buttons_fb_css" />
											</fieldset>
										</td>
									</tr>									
								</table>
							</form>			
							
							
						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->
			
			<!-- sidebar -->
			
			
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
	</div> <!-- #poststuff -->
	
</div> <!-- .wrap -->
<hr />