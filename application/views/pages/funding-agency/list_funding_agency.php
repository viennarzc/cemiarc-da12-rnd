<div class="container-fluid">
	<div class="panel panel-default">
		  <div class="panel-heading">
		    <h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> <strong>List of Funding Agency</strong> </h2>
		  </div>
				  <div class="panel-body">
							<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
									<thead class="text-info text-center">
										<tr>
											<th><center><h4>FUNDING AGENCIES</h4></center></th>
										</tr>
									</thead>
									<tbody>
										  <?php if (!isset($funding_agencies)): ?>
							              	<p><strong>There are no Funding Agencies available.</strong></p>
									      <?php else: ?>
									      	<?php foreach ($funding_agencies as $agency): ?>
								        		<tr>
									          		<td>
									          			<h4><span class="fa fa-building"></span> <?php echo anchor('funding_agencies/funding_agency_individual/'.$agency->agency_id, $agency->agency_name); ?></h2>
												    </td>
							        			</tr>
							        		<?php endforeach; ?>
						      			<?php endif; ?>			
									</tbody>
							</table>
				</div>
	
	</div>