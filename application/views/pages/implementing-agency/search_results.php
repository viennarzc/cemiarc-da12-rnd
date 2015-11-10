<div class="container-fluid">
	<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
			<thead class="text-info text-center">
				<tr>
					<th><center><h4>IMPLEMENTING AGENCIES</h4></center></th>
				</tr>
			</thead>
			<tbody>
				  <?php if (!isset($results)): ?>
	              	<p><strong>There are no Implementing Agencies available.</strong></p>
			      <?php else: ?>
			      	<?php foreach ($results as $result): ?>
		        		<tr>
			          		<td>
			          			<h4><span class="fa fa-users"></span> <?php echo anchor('implementing_agencies/implementing_agency_individual/'.$result->agency_id, $result->agency_name); ?></h2>
						    </td>
	        			</tr>
	        		<?php endforeach; ?>
      			<?php endif; ?>			
			</tbody>
	</table>
</div>