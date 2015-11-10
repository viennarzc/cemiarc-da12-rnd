<div class="container-fluid">
	<div class="panel panel-default">
	    <div class="panel-heading">
	    <h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> <strong>List of Status</strong> </h2>
	    </div>
			<div class="panel-body">

				<table class="table table-striped table-bordered" id="statuses" name="statuses" width="100%" cellspacing="0">
						<thead class="text-info text-center">
							<tr>
								<th><center><h4>RESEARCHES</h4></center></th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($statuses as $status): ?>
								<tr>
									<td><h5><strong><span class="fa fa-book"></span> <?php echo anchor('researches/research_individual/'.$status->research_id, $status->research_title); ?></strong></h5></td>
									<td><strong><?php echo $status->status?></strong></td>	
								</tr>
							<?php endforeach; ?>				
						</tbody>
				</table>

			</div>
	</div>
</div>