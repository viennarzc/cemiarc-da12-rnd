<br>
<div class="container-fluid">
	<div class="data">
		<?php if(!$implementing_agencies): ?>
			<p>This page was accessed incorrectly.</p>
		<?php else: ?>
			<?php foreach($implementing_agencies as $agency): ?>
				<h3><?php echo ucwords($agency->agency_name); ?></h3>

				<?php if ($this->session->userdata('user_data') != NULL): ?>
					<?php echo anchor('implementing_agencies/implementing_agency_form_edit/'.$agency->agency_id, 'Edit', 'class="btn btn-primary btn-lg"'); ?>
				<?php endif; ?><br><br>
				
				<strong><em>Address: </em></strong><?php echo $agency->address; ?>
			<?php endforeach; ?>
			<hr>
			<div style="margin-left:10%;">
					<h4><strong>Research(es): </strong></h4>
					<?php foreach($researches as $res): ?>
						<?php echo anchor('researches/research_individual/'.$res->research_id, ucwords($res->research_title)); ?><br>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
	</div>
</div>