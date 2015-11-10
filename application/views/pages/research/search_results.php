<div class="container-fluid">
	<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
			<thead class="text-info text-center">
				<tr>
					<th><center><h4>RESEARCHES</h4></center></th>
					<th><h5>Date Published: </h5></th>
				</tr>
			</thead>
			<tbody>
				<?php if (!isset($results)): ?>
	         		<p><strong>There are no researches available.</strong></p>
	      		<?php else: ?>
	        		<?php foreach ($results as $result): ?>
		        		<tr>
			          		<td><h5><strong><span class="fa fa-book"></span>	<?php echo anchor('researches/research_individual/'.$result->research_id, $result->research_title); ?></strong></h5></td>
			         		<td><p><?php echo date('F j, Y', strtotime($result->date)); ?></p></td>
	        			</tr>
	        		<?php endforeach; ?>
      			<?php endif; ?>			
			</tbody>
	</table>
</div>