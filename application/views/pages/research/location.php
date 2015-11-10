<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title"><strong>REGION XII</strong> </h2>
		</div>
		
		<div class="panel-body">
			<table class="table table-striped table-bordered" id="location" name="location" width="100%" cellspacing="0">
				<thead class="text-info text-center">
					<tr>
						<th>Province</th>
						<th>City/Municipality</th>
						<th><center><h4>RESEARCHES</h4></center></th>
						<th>Period Started</th>
						<th>Period Ended</th>
						<th>Duration</th>
					</tr>
				</thead>
				<tbody>
					<?php $temp_prov = 0; ?>
					<?php $temp_city_muni = 0; ?>
					<?php foreach($location_researches as $loc_res): ?>
						<tr>
							<td><strong><?php echo $loc_res->province_name; ?></strong></td>
							<td><?php echo $loc_res->name; ?></td>
							<td><h5><strong><span class="fa fa-book"></span> <?php echo anchor('researches/research_individual/'.$loc_res->research_id, $loc_res->research_title); ?></strong></h5></td>
							<td><?php echo date('F, Y', strtotime($loc_res->duration_start)); ?></td>
							<td><?php echo date('F, Y', strtotime($loc_res->duration_end)); ?></td>

							<?php $duration = abs(strtotime($loc_res->duration_end) - strtotime($loc_res->duration_start)); ?>
								<?php $years = floor($duration / (365*60*60*24)); ?>
								<?php $months = floor(($duration - $years * 365*60*60*24) / (30*60*60*24)); ?>
								<?php //$days = floor(($duration - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
							<td><?php echo $years . " year(s) " . $months . " month(s)"; ?></td>
						</tr>

					<?php $temp_prov = $loc_res->province_id; ?>
					<?php $temp_city_muni = $loc_res->city_municipality_id; ?>

					<?php endforeach; ?>
				</tbody>
			</table> 
		</div>
	</div>
</div>