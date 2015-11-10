<div class="container-fluid">
		<div class="panel panel-default">
				  <div class="panel-heading">
				    <h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> <strong>List of Recommendation</strong> </h2>
				  </div>
						<div class="panel-body">
	
							<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
									<thead class="text-info text-center">
										<tr>
											<th><center><h4>RESEARCHES</h4></center></th>
										</tr>
									</thead>
									<tbody>
										<?php if(!isset($researches)): ?>
											<p>This page was accessed incorrectly.</p>
										<?php else: ?>
							        		<?php foreach($researches as $research): ?>
								        		<tr>
									          		<td><h4><span class="fa fa-book"></span> <?php echo anchor('researches/research_individual/'.$research->research_id, $research->research_title); ?></h4><br>
													<strong><small>Recommendation:</small></strong><br>
													<p><?php echo $research->recommendation; ?></p><br>
													<small><?php echo anchor('researches/research_individual/'.$research->research_id, 'Read More...'); ?></small></td>
							        			</tr>
							        		<?php endforeach; ?>
						      			<?php endif; ?>			
									</tbody>
							</table>
						</div>
		</div>
</div>