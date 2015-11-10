<div class="container-fluid">
	<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
			<thead class="text-info text-center">
				<tr>
					<th><center><h4>RESEARCHERS</h4></center></th>
				</tr>
			</thead>
			<tbody>
				 <?php if (!isset($results)): ?>
			     	<p><strong>There are no researchers available.</strong></p>
			     <?php else: ?>
			     	<?php foreach ($results as $result): ?>
		        		<tr>
			          		<td>
			          			<h4><span class="glyphicon glyphicon glyphicon-user"></span> <?php echo anchor('researchers/researcher_individual/'.$result->researcher_id, $result->lname.", ".$result->fname." ".substr($result->mname, 0, 1).".", 'class="data-toggle="modal" data-target="#researcherModal""'); ?></h4>
						          <ul>
						            <li><strong><em>Address: </em></strong><?php echo $result->address; ?></li>
						            <li><strong><em>Gender: </em></strong><?php echo $result->sex; ?></li>
						            <li><strong><em>Company/Office: </em></strong><?php echo $result->company_office; ?></li>
						            <li><strong><em>Contact Number: </em></strong>  <?php echo $result->contact_number; ?></li>
						          </ul>
						    </td>
	        			</tr>
	        		<?php endforeach; ?>
      			<?php endif; ?>			
			</tbody>
	</table>
</div>