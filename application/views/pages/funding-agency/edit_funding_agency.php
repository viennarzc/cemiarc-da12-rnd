<?php if($this->session->userdata('user_data') != NULL): ?>
<div class="container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h2 class="panel-title"><i class="fa fa-pencil"></i> <strong>Update Funding Agency</strong> </h2>
	  </div>
	  
	  <div class="panel-body">
	  		<?php foreach ($funding_agency as $agency): ?>
			  	<?php echo form_open('funding_agencies/update/'.$agency->agency_id, 'class="form-horizontal"'); ?>
					<div class="form-group">
			  		<label for="name"class="col-sm-2 control-label">Name :</label>
				  		<div class="col-sm-10 control-label">
							<?php echo form_input('agency_name', $agency->agency_name, 'class="form-control" placeholder="Agency Name"'); ?><br>
						</div>
					</div>

					<div class="form-group">
			  		<label for="address"class="col-sm-2 control-label">Address :</label>
				  		<div class="col-sm-10 control-label">
							<?php echo form_input('address', $agency->address, 'class="form-control" placeholder="Location Address"'); ?><br>
						</div>
					</div>

					<center><?php echo form_submit('', 'Save Changes', 'class="btn btn-primary btn-lg"'); ?></center>
				<?php echo form_close(); ?>
			<?php endforeach; ?>
		</div>			
	</div>	
</div>
<?php else: redirect('home'); ?>
<?php endif; ?>