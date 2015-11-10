<?php if($this->session->userdata('user_data') != NULL): ?>
<br>
<div class="container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h2 class="panel-title"><i class="fa fa-plus-square"></i> <strong> Funding Agency</strong> </h2>
	  </div>
	  
	  <div class="panel-body">
	  	<?php echo form_open('funding_agencies/add_funding_agency', 'class="form-horizontal"'); ?>
			<div class="form-group">
	  		<label for="name"class="col-sm-2 control-label">Name :</label>
		  		<div class="col-sm-10 control-label">
					<?php echo form_input('agency_name', NULL, 'class="form-control" placeholder="Agency Name" required'); ?><br>
				</div>
			</div>

			<div class="form-group">
	  		<label for="address"class="col-sm-2 control-label">Address :</label>
		  		<div class="col-sm-10 control-label">
					<?php echo form_input('address', NULL, 'class="form-control" placeholder="Location Address"'); ?><br>
				</div>
			</div>

			<center><?php echo form_submit('', 'Add Agency', 'class="btn btn-primary btn-large"'); ?></center>
		<?php echo form_close(); ?>
	</div>
</div>
<?php else: redirect('home'); ?>
<?php endif; ?>

