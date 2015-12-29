<br>
<center>
	<div class="_footer">
		<h5>&copy Department of Agriculture Research and Development Information System 2014</h5>
		<p><small>by <em><u>Team Ninja</u></em></small></p>
	</div>
</center>

	<script src="<?php echo base_url('assets/js/jquery-2.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/summernote.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
 	<script type="text/javascript" src="<?php echo base_url('assets/js/script.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-latest.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-select/dist/js/bootstrap-select.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-datatables/media/js/jquery.dataTables.js');?>"></script>	

	<script type="text/javascript">
		function skema(value) {
			alert(value);
		}
	</script>
 	
 	<script type="text/javascript">
		$('#date_published').datepicker({
			format: "mm-dd-yyyy",
			todayHiglight: true
		}); 

		$('#date_started').datepicker({
			format: "yyyy-mm",
			viewMode: "months", 
    		minViewMode: "months",
    		todayHiglight: true
		});

		$('#date_ended').datepicker({
			format: "yyyy-mm",
			viewMode: "months", 
    		minViewMode: "months",
    		todayHiglight: true
		});
	</script>


	<script type="text/javascript">
		$('#abstract').summernote({
			height: 300
		});
		$('#rationale').summernote({
			height: 300
		});
		$('#objectives').summernote({
			height: 300
		});
		$('#methodology').summernote({
			height: 300
		});
		$('#results_and_discussions').summernote({
			height: 300
		});
		$('#recommendation').summernote({
		height: 300
		});	
	</script>

	<script type="text/javascript">
	  $(window).on('load', function () {
	    $('select').selectpicker();
	  });

	   $(document).ready(function() {
        $('#location').dataTable( {
        } );

        $('#approved_budgets').dataTable( {
        } );

        $('#statuses').dataTable( {
        } );

        $('#list').dataTable( {
        } );
    } );
	</script>

	<script type="text/javascript">
		<?php if ($this->session->flashdata('notification')): ?>
			alert('<?php echo $this->session->flashdata("notification"); ?>');
		<?php endif; ?>
	</script>
		<script type="text/javascript">
		<?php if ($this->session->flashdata('check')): ?>
			alert('<?php echo $this->session->flashdata("check"); ?>');
		<?php endif; ?>
	</script>
	<script type="text/javascript">
		<?php if ($this->session->flashdata('feedback')): ?>
			alert('<?php echo $this->session->flashdata("feedback"); ?>');
		<?php endif; ?>
	</script>

	<script type="text/javascript">
		<?php if ($this->session->flashdata('check_name')): ?>
			alert('<?php echo $this->session->flashdata("check_name"); ?>');
		<?php endif; ?>
	</script>

  		 <!-- text Area -->
<!-- include libries(jQuery, bootstrap, fontawesome) -->
</body>
</html>