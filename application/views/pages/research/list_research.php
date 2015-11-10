<div class="container-fluid">
		<div class="panel panel-default">
				  <div class="panel-heading">
				    <h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> <strong>List of Research</strong> </h2>
				  </div>
						  <div class="panel-body">
							<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
										<thead class="text-info text-center">
											<tr>
												<th><center><h4>RESEARCHES</h4></center></th>
												<th><h5>Date Published: </h5></th>
											</tr>
										</thead>
										<tbody>
											<?php if (!isset($researches)): ?>
								         		<p><strong>There are no researches available.</strong></p>
								      		<?php else: ?>
								        		<?php foreach ($researches as $research): ?>
									        		<tr>
										          		<td><h5><strong><span class="fa fa-book"></span>	<?php echo anchor('researches/research_individual/'.$research->research_id, $research->research_title); ?></strong></h5></td>
										         		<td><p><?php echo date('F j, Y', strtotime($research->date)); ?></p></td>
								        			</tr>
								        		<?php endforeach; ?>
							      			<?php endif; ?>			
										</tbody>
								</table>
					</div>
		</div>