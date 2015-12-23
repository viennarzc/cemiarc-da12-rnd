<?php if($this->session->userdata('user_data') != NULL): ?>
<div class="container-fluid">
	<div class="control-group" >
		<div class="panel panel-default">
		  	<div class="panel-heading">
		    	<h2 class="panel-title"><i class="fa fa-plus-square"></i> <strong> Researcher</strong> </h2>
		  	</div>
	  		<div class="panel-body">
			    <?php echo form_open('researchers/add_researcher', 'class="form-horizontal"'); ?>
	  			<div class="col-md-8 col-md-offset-2">
				  	<div class="form-group">
				  		<label for="Designation"class="col-sm-2 control-label">Designation:</label>
				  		<div class="col-sm-10 control-label">
					    	<select  class="form-control" name="designation" id="designation" >
					    		<?php foreach($designations as $designation): ?>
					            	<option value="<?php echo $designation->designation_id; ?>">
					                	<?php echo $designation->type; ?>
					              	</option>
								<?php endforeach; ?>
							</select><br><br>
						</div>
					</div>	
				 	<div class="form-group">
			  			<label for="fname"class="col-sm-2 control-label">First Name :</label>
				  		<div class="col-sm-10 control-label">
			        		<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
							<?php //echo form_input('fname', NULL, 'class="form-control" placeholder="First Name" required=""'); ?><br>
						</div>
					</div>	
					<div class="form-group">
			  		<label for="mname"class="col-sm-2 control-label">Middle Name :</label>
				  		<div class="col-sm-10 control-label">
				  			<input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" required>
							<?php //echo form_input('mname', NULL, 'class="form-control" placeholder="Middle Name" required=""'); ?><br>
						</div>
					</div>	
					<div class="form-group">
			  			<label for="lname"class="col-sm-2 control-label">Last Name :</label>
				  		<div class="col-sm-10 control-label">
				  		<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
						<?php //echo form_input('lname', NULL, 'class="form-control" placeholder="Last Name" required=""'); ?><br>
						</div>
					</div>	
					<div class="form-group">
			  			<label for="gender"class="col-sm-2 control-label">Gender :</label>
				  		<div class="col-sm-2 control-label" style="text-align: left;">
							<?php echo form_radio('sex', 'male', 'class="radio-inline form-control" checked="checked"'); ?> Male
							<?php echo form_radio('sex', 'female', 'class="radio-inline form-control"'); ?> Female
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
							<?php echo form_input('address', NULL, 'class="form-control" placeholder="Address"'); ?><br>
						</div>
					</div>
					<div class="form-group">
			  			<label for="office"class="col-sm-2 control-label">Office :</label>
				  		<div class="col-sm-10 control-label">
							<?php echo form_input('company_office', NULL, 'class="form-control" placeholder="Company Office"'); ?><br>
						</div>
					</div>
					<div class="form-group">
			  			<label for="Contact"class="col-sm-2 control-label">Contact Number :</label>
				  		<div class="col-sm-10 control-label">
							<?php echo form_input('contact_number', NULL, 'class="form-control" placeholder="Contact Number (Mobile)"'); ?><br>
						</div>
					</div>
					<div class="form-group">
			  			<label for="email"class="col-sm-2 control-label">Email Address :</label>
				  		<div class="col-sm-10 control-label">
							<input class="form-control" type="email" id="email" name="email" placeholder="Email" required><br>
						</div>
					</div>
					<center>
						<?php echo form_submit('addResearcher', 'Add Researcher', 'class="btn btn-lg btn-primary" '); ?>
					</center>
				</div>
			<?php echo form_close(); ?>
	  	</div>
	</div>
</div>
<?php else: redirect('home'); ?>
<?php endif; ?>