<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
    	<h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> <strong>List of Implementing Agency</strong> </h2>
  		</div>
				<div class="panel-body">

					<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
							<thead class="text-info text-center">
								<tr>
									<th><center><h4>IMPLEMENTING AGENCIES</h4></center></th>
								</tr>
							</thead>
							<tbody>
								  <?php if (!isset($implementing_agencies)): ?>
					              	<p><strong>There are no Implementing Agencies available.</strong></p>
							      <?php else: ?>
							      	<?php foreach ($implementing_agencies as $agency): ?>
						        		<tr>
							          		<td>
							          			<h4><span class="fa fa-users"></span> <?php echo anchor('implementing_agencies/implementing_agency_individual/'.$agency->agency_id, $agency->agency_name); ?></h2>
										    </td>
					        			</tr>
					        		<?php endforeach; ?>
				      			<?php endif; ?>			
							</tbody>
					</table>
				</div>
</div>