<br><div class="container-fluid">
<div class="data">
	<?php if(!isset($researcher)): ?>
		<p>The page was accessed incorrectly.</p>
	<?php else: ?>
		<?php foreach ($researcher as $resr): ?>
			<h3><?php echo ucwords($resr->lname.", ".$resr->fname." ".$resr->mname); ?></h3>
			
			<?php if ($this->session->userdata('user_data') != NULL): ?>
					<?php echo anchor('researchers/researcher_form_edit/'.$resr->researcher_id, 'Edit', 'class="btn btn-primary btn-lg"'); ?><br><br>
			<?php endif; ?>
			
			<?php foreach ($designations as $designation): ?> 
				<?php if ($designation->designation_id === $resr->designation): ?>
					<p><strong>Designation:	</strong><?php echo $designation->type; ?></p>
				<?php endif; ?>
			<?php endforeach; ?>

			<p><strong>Gender:	</strong><?php echo ucfirst($resr->sex); ?></p>
			<p><strong>Marital Status:	</strong><?php echo ucwords($resr->marital_status); ?></p>
			<address><p><strong>Address:	</strong><?php echo ucwords($resr->address); ?></p></address>
			<p><strong>Office:	</strong><?php echo ucwords($resr->company_office); ?></p>
			<p><strong>Email:	</strong><?php echo ($resr->email); ?></p>
			<p><strong>Contact #:	</strong><?php echo ($resr->contact_number); ?></p>

			<br><br><hr>
			<div style="margin-left:10%;">
			<h4><strong>Research(es): </strong></h4>
			<?php foreach ($researches as $res): ?>
				<?php echo anchor('researches/research_individual/'.$res->research_id, $res->research_title, 'refresh'); ?><br>
			<?php endforeach; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
</div>
</div>