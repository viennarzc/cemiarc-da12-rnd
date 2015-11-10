<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> <strong>List of Researcher</strong> </h2>
		</div>
		
		<div class="panel-body">

			<table class="table table-striped table-bordered" id="list" name="list" width="100%" cellspacing="0">
				<thead class="text-info text-center">
					<tr>
						<th><center><h4>RESEARCHERS</h4></center></th>
					</tr>
				</thead>
				<tbody>
					 <?php if (!isset($researchers)): ?>
				     	<p><strong>There are no researchers available.</strong></p>
				     <?php else: ?>
				     	<?php foreach ($researchers as $researcher): ?>
			        		<tr>
				          		<td>
				          			<h4><span class="glyphicon glyphicon glyphicon-user"></span> <?php echo anchor('researchers/researcher_individual/'.$researcher->researcher_id, $researcher->lname.", ".$researcher->fname." ".substr($researcher->mname, 0, 1).".", 'class="data-toggle="modal" data-target="#researcherModal""'); ?></h4>
							          <ul>
							            <li><strong><em>Address: </em></strong><?php echo $researcher->address; ?></li>
							            <li><strong><em>Gender: </em></strong><?php echo $researcher->sex; ?></li>
							            <li><strong><em>Company/Office: </em></strong><?php echo $researcher->company_office; ?></li>
							            <li><strong><em>Contact Number: </em></strong>  <?php echo $researcher->contact_number; ?></li>
							          	<u><?php echo anchor('researchers/researcher_individual/'.$researcher->researcher_id, 'More..'); ?></u>
							          </ul>
							    </td>
		        			</tr>
		        		<?php endforeach; ?>
	      			<?php endif; ?>			
				</tbody>
			</table>
		</div>
</div>