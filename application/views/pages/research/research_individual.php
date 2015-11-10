<div class="container-fluid">
	<?php if(!isset($research)): ?>
		<p>The page was accessed incorrectly.</p>
	<?php else: ?>
		<?php foreach($research as $res): ?>

				<hr><center><h1><?php echo $res->research_title; ?></h1></center><hr>
				
				<div class="data">
					<?php if($this->session->userdata('user_data') != NULL): ?>
						<?php echo anchor('researches/research_form_edit/'.$res->research_id, 'Edit', 'class="btn btn-primary btn-lg" style="float: left;"'); ?><br><br><br>
					<?php endif; ?>	
				</div>
				
				<div class= "data">
					<strong>Date Published: </strong><br><li><?php echo date('F j, Y', strtotime($res->date)); ?></li><br>
				</div>
				
				<div class="data">
					<?php foreach($city_muni_province as $c_m_p): ?>
							<strong>Project Site: </strong><br><li><?php echo ucwords($res->location_address.", ".$c_m_p->name.", ".$c_m_p->province_name); ?></li>
					<?php endforeach; ?><br>
				</div>
				
				<div class= "data">
					<strong>Approved Budget: </strong><br><li>Php <?php echo number_format($res->approved_budget, 2); ?></li><br>
				</div>

				<div class= "data">
					<strong>Duration: </strong><br><li><?php echo date('F Y', strtotime($res->duration_start))." - ".date('F Y', strtotime($res->duration_end)); ?></li><br>
				</div>

				<div class= "data">
					<strong>Researcher(s): </strong><br>
					
					<?php foreach($researchers as $researcher): ?>
						<li><?php echo anchor('researchers/researcher_individual/'.$researcher->researcher_id, $researcher->lname.", ".$researcher->fname." ".substr($researcher->mname, 0, 1).".", 'class="data-toggle="modal" data-target="#researcherModal""'); ?></li>
					<?php endforeach; ?><br>
				</div>

				<div class= "data">
					<strong>Implementing Agency: </strong><br>
					
					<?php foreach($implementing_agencies as $implement_agency): ?>
						<li><?php echo anchor('implementing_agencies/implementing_agency_individual/'.$implement_agency->agency_id, $implement_agency->agency_name); ?></li>
					<?php endforeach; ?><br>
				</div>

				<div class= "data">
					<strong>Funding Agency: </strong><br>
					
					<?php foreach($funding_agencies as $fund_agency): ?>
						<li><?php echo anchor('funding_agencies/funding_agency_individual/'.$fund_agency->agency_id, $fund_agency->agency_name); ?></li>
					<?php endforeach; ?><br>
				</div>

				<div class= "data">
					<strong>Category: </strong><br>
					<li><?php echo ucwords($res->category); ?></li><br>
				</div>

				<div class= "data">
					<strong>Status: </strong><br>
					<li><?php echo ucwords($res->status); ?></li><br>
				</div>
		


				<div class= "data">
					<strong><hr>Abstract:</strong><hr>	
					<p><?php echo $res->abstract; ?></p><br><hr>
				</div>
				
				<div class= "data">
					<strong>Rationale:</strong><br><hr>
					<p><?php echo $res->rationale; ?></p><br><hr>
				</div>
				
				<div class= "data">
					<strong>Objectives:</strong><br><hr>
					<p><?php echo $res->objectives; ?></p><br><hr>
				</div>
				
				<div class= "data">
					<strong>Methodology:</strong><br><hr>
					<p><?php echo $res->methodology; ?></p><br><hr>
				</div>
				
				<div class= "data">
					<strong>Results and Discussions:</strong><br><hr>
					<p><?php echo $res->results_and_discussions; ?></p><br><hr>
				</div>

				<div class= "data">
					<strong>Recommendation(s):</strong><br><hr>
					<p><?php echo $res->recommendation; ?></p><br><hr>
				</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>