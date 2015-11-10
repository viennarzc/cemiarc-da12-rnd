<?php if($this->session->userdata('user_data') != NULL): ?>
<div class="container-fluid">	
	<div class="control-group" >

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h2 class="panel-title"><i class="fa fa-pencil"></i> <strong>Update Researcher</strong> </h2>
	  </div>
	  <div class="panel-body">
	  	<br>
	  		<div class="form-group">
	  			<label for="Designation"class="col-sm-2 control-label">Designation:</label>
	  				<div class="col-sm-10 control-label">
					  	<?php foreach ($researcher as $rscher): ?>
						    <?php echo form_open('researchers/update_researcher/'.$rscher->researcher_id, 'class="form-horizontal"'); ?>
						    	<select class="form-control" name="designation" id="designation">
						    		<?php foreach ($designations as $designation): ?>
								              <option <?php if ($rscher->designation === $designation->designation_id) echo 'selected'; ?> value="<?php echo $designation->designation_id; ?>">
								                <?php echo $designation->type; ?>
								              </option>
									<?php endforeach; ?>
								</select><br><br>
					</div>
			</div>	
		
			 	<div class="form-group">
			  		<label for="fname"class="col-sm-2 control-label">First Name :</label>
		  				<div class="col-sm-10 control-label">
	        				<input type="text"  value="<?php echo $rscher->fname; ?>" class="form-control" id="fname" name="fname" placeholder="First Name" required>
							<?php //echo form_input('fname', $rscher->fname, 'class="form-control" placeholder="First Name" required=""'); ?><br>
						</div>
				</div>	
			
				<div class="form-group">
		  			<label for="mname"class="col-sm-2 control-label">Middle Name :</label>
				  		<div class="col-sm-10 control-label">
	        				<input type="text"  value="<?php echo $rscher->mname; ?>" class="form-control" id="mname" name="mname" placeholder="Middle Name" required>
							<?php //echo form_input('mname', $rscher->mname, 'class="form-control" placeholder="Middle Name" required=""'); ?><br>
						</div>
				</div>	
	

				<div class="form-group">
			  		<label for="lname"class="col-sm-2 control-label">Last Name :</label>
				  		<div class="col-sm-10 control-label">
	        				<input type="text"  value="<?php echo $rscher->lname; ?>" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
						<?php //echo form_input('lname', $rscher->lname, 'class="form-control" placeholder="Last Name" required=""'); ?><br>
						</div>
				</div>	

 				<div class="form-group">
		  			<label for="gender"class="col-sm-2 control-label">Gender :</label>
				  		<div class="col-sm-10 control-label">
							<input class="  radio-inline " type="radio" name="sex" id="sex" value="male"	 <?php echo set_value('sex', $rscher->sex) === 'male' ? "checked" : ""; ?>/> Male <br>
							<input class="  radio-inline " type="radio" name="sex" id="sex" value="female" <?php echo set_value('sex', $rscher->sex) === 'female' ? "checked" : ""; ?>/ > Female <br><br>	
 						</div>
				</div>	

				<div class="form-group">
			  		<label for="status"class="col-sm-2 control-label">Marital Status :</label>
				  		<div class="col-sm-10 control-label">
							<select class="form-control" name="marital_status" id="marital_status">
								<option value="single">Single</option>
								<option value="married">Married</option>
								<option value="widowed">Widowed</option>
								<option value="separated">Separated</option>
							</select><br><br>
						</div>
				</div>	

				<div class="form-group">
			  		<label for="address"class="col-sm-2 control-label">Address :</label>
				  		<div class="col-sm-10 control-label">
							<?php echo form_input('address', $rscher->address, 'class="form-control" placeholder="Address"'); ?><br>
						</div>
				</div>	
			


				<div class="form-group">
			  		<label for="office"class="col-sm-2 control-label">Office :</label>
		  				<div class="col-sm-10 control-label">
							<?php echo form_input('company_office', $rscher->company_office, 'class="form-control" placeholder="Company Office"'); ?><br>
						</div>
				</div>	
				
				<div class="form-group">
			  		<label for="Contact"class="col-sm-2 control-label">Contact Number :</label>
		  				<div class="col-sm-10 control-label">
							<?php echo form_input('contact_number', $rscher->contact_number, 'class="form-control" placeholder="Contact Number (Mobile)"'); ?><br>
						</div>
				</div>	

				<div class="form-group">
			  		<label for="email"class="col-sm-2 control-label">Email Address :</label>
		  				<div class="col-sm-10 control-label">
							<input class="form-control" value="<?php echo $rscher->email; ?>" type="email" id="email" name="email" placeholder="Email" required><br>
						</div>
				</div>	
							

				<center><?php echo form_submit('addResearcher', 'Save Changes', 'class="btn btn-primary btn-lg"'); ?></center>
			<?php echo form_close(); ?>
		<?php endforeach; ?>
	  
	  </div>
	</div>
</div>
<?php else: redirect('home'); ?>
<?php endif; ?>