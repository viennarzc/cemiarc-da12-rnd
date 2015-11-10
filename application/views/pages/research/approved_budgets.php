<div class="container-fluid">
		<div class="panel panel-default">
		    <div class="panel-heading">
		    <h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> <strong>List of Approved Budget</strong> </h2>
		    </div>
				<div class="panel-body">

					<table class="table table-striped table-bordered" id="approved_budgets" name="approved_budgets" width="100%" cellspacing="0">
							<thead class="text-info text-center">
								<tr>
									<th><center><h4>RESEARCHES</h4></center></th>
									<th>Approved Budget</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($research_budgets as $budget): ?>
									<tr>
										<td><h5><strong><span class="fa fa-book"></span> <?php echo anchor('researches/research_individual/'.$budget->research_id, $budget->research_title); ?></strong></h5></td>
										<td>Php <strong><em><?php echo number_format($budget->approved_budget, 2); ?></em></strong></td>	
									</tr>
								<?php endforeach; ?>				
							</tbody>
					</table>
				</div>			
		</div>
</div>