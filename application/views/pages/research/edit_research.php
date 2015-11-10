<?php if($this->session->userdata('user_data') != NULL): ?>
<br><div class ="container-fluid">
  <div class="control-group" >

	<div class="panel panel-default">
		<div class="panel-heading">
	   	<h2 class="panel-title"><i class="fa fa-pencil"></i> <strong>Update Research</strong> </h2>
	  	</div>
			<div class="panel-body">
				<?php foreach($research as $res): ?>

				<?php echo form_open('researches/update/'.$res->research_id, 'class="form-horizontal"'); ?>
				
				<div class="form-group">
			    	<label for="Title" class="col-sm-2 control-label">Research Title:</label>
			      	<div class="col-sm-10">
			        	<input type="text" value="<?php echo $res->research_title; ?>" class="form-control" id="title" name="title" placeholder="Title" required>
			      	</div>
			    </div>         

			    <div class="form-group">
			    	<label for="Date-Publish" class="col-sm-2 control-label">Date Published:</label>
			      	<div class="col-sm-10">
			        	<input type="text" value="<?php echo date('m-d-Y', strtotime($res->date)); ?>" class="form-control datepicker" id="date_published" name="date_published" placeholder="Date Published">
			      	</div>
			    </div>
				
				<div class="form-group">
			   		<label class="col-sm-2 control-label">Location</label><hr>
			    
				    <div class="form-group">
						<label for="Location" class="col-sm-2 control-label">Address:</label>
					    <div class="col-sm-10">
					        <input type="text" value="<?php echo $res->location_address; ?>" class="form-control" id="address" name="address" placeholder="Address">
				      	</div>
				    </div>

			      	<div class="form-group">
				    	<label for="City" class="col-sm-2 control-label">City/Municipality:</label>

					    <div class="col-sm-8 control-label">
						    <select class="form-control selectpicker" title="Choose a City/Municipality" name="selected_city_municipality" id="selected_city_municipality"  data-show-subtext="true" data-live-search="true" data-size="5" style="width:500px">
					            <?php foreach($provinces as $province): ?>
						            <?php foreach ($cities_municipalities as $city_municipality): ?>
						            	<?php if ($city_municipality->province_id === $province->province_id): ?>
							              <option <?php if ($city_municipality->city_municipality_id === $res->location_city) echo 'selected'; ?> value="<?php echo $city_municipality->city_municipality_id; ?>" data-subtext="(<?php echo $province->province_name; ?>)">
							                <?php echo $city_municipality->name; ?>
							              </option>
							            <?php endif; ?>
						            <?php endforeach; ?>
					            <?php endforeach; ?>
					          </select><hr>
						</div>
				    </div>
			    </div>

			    
			    <div class="form-group">
			    	<label for="Researcher" class="col-sm-2 control-label">Researcher(s):</label>
			    	<div  class="col-sm-8 control-label">
					    <select multiple title="Select Researcher(s).." class="form-control selectpicker" name="selected_researchers[]" id="selected_researchers" data-live-search="true" data-size="5" multiple 	style="width:500px">
				            <?php foreach ($researchers as $researcher): ?>
				              <option <?php foreach($r_researchers as $rscher) { 
				              				if ($researcher->researcher_id === $rscher->researcher_id) 
				              					echo 'selected'; } ?> 
				              				value="<?php echo $researcher->researcher_id; ?>">
				                <?php echo $researcher->lname.", " .$researcher->fname. " ".$researcher->mname; ?>
				              </option>
				            <?php endforeach; ?>
				          </select>
					</div>
				</div>
				
			    <div class="form-group">
			    	<label for="ImplementingAgency" class="col-sm-2 control-label">Implementing Agency:</label>
			    	<div  class="col-sm-8 control-label">
					    <select multiple title="Select Agencies.." class="form-control selectpicker" name="selected_implement_agency[]" id="selected_implement_agency" data-live-search="true" data-size="5" style="width:500px">
				            <?php foreach ($implementing_agencies as $implement_agency): ?>
				              <option 	<?php foreach($r_implementing_agencies as $imp_agency) { 
				              				if ($implement_agency->agency_id === $imp_agency->agency_id) 
				              					echo 'selected'; } ?> 
				              			value="<?php echo $implement_agency->agency_id; ?>">
				                <?php echo $implement_agency->agency_name; ?>
				              </option>
				            <?php endforeach; ?>
				         </select>
					</div>
				</div>
					

			    <div class="form-group">
			    	<label for="FundingAgency" class="col-sm-2 control-label">Funding Agency:</label>
			    	<div  class="col-sm-8 control-label">
					    <select multiple title="Select Agencies.." class="form-control selectpicker" name="selected_fund_agency[]" id="selected_fund_agency" data-live-search="true" data-size="5" style="width:500px">
				            <?php foreach ($funding_agencies as $fund_agency): ?>
				              <option 	<?php foreach($r_funding_agencies as $fd_agency) { 
				              				if ($fund_agency->agency_id === $fd_agency->agency_id) 
				              					echo 'selected'; } ?> 
				              			value="<?php echo $fund_agency->agency_id; ?>">
				                <?php echo $fund_agency->agency_name; ?>
				              </option>
				            <?php endforeach; ?>
				        </select>
					</div>
				</div>


				<div class="form-group">
			    	<label for="ApprovedBudget" class="col-sm-2 control-label">Approved Budget:</label>
			      	<div class="col-sm-10">
			        	<input type="number" value="<?php echo $res->approved_budget; ?>" step="any" class="form-control" id="approved_budget" name="approved_budget" placeholder="Budget">
			      	</div>
			    </div>

			
				<div class="form-group">
					<label for="Duration" class="col-sm-2 control-label">Duration</label><hr>
			      	<label for="Date-Publish" class="col-sm-2 control-label">Start:</label>
			      	<div class="col-sm-10">
			        	<input type="text" value="<?php echo date('Y-m', strtotime($res->duration_start)); ?>" class="form-control datepicker" id="date_started" name="date_started" placeholder="Date Started">
			      	</div>
			    </div>

			    <div class="form-group">
				  	<label for="Date-Publish" class="col-sm-2 control-label">End:</label>
			      	<div class="col-sm-10">
			        	<input type="text" value="<?php echo date('Y-m', strtotime($res->duration_end)); ?>" class="form-control datepicker" id="date_ended" name="date_ended" placeholder="Date Ended">
			      	</div>
			    </div>
				<hr>

				<div class="form-group">
				  	<label for="Status" class="col-sm-2 control-label">Category:</label>
			      	<div class="col-sm-10">
			      		<select class="form-control selectpicker" id="category" name="category">
			      			<option <?php if (strtolower($res->category) === "rice") echo 'selected'; ?> value="rice">Rice</option>
			      			<option <?php if (strtolower($res->category) === "corn") echo 'selected'; ?> value="corn">Corn</option>
			      			<option <?php if (strtolower($res->category) === "high-valued crops") echo 'selected'; ?> value="high-valued crops">High Valued Crops</option>
			      			<option <?php if (strtolower($res->category) === "others") echo 'selected'; ?> value="others">Others</option>
			      		</select>
			      </div>
			    </div>

				<div class="form-group">
				  	<label for="Status" class="col-sm-2 control-label">Status:</label>
			      	<div class="col-sm-10">
			      		<select class="form-control selectpicker" id="status" name="status">
			      			<option <?php if (strtolower($res->status) === "completed") echo 'selected'; ?> value="completed">Completed</option>
			      			<option <?php if (strtolower($res->status) === "unfinished") echo 'selected'; ?> value="unfinished">Unfinished</option>
			      		</select>
			      </div>
			    </div>


				<label>Abstract:</label>
				<textarea  class="form-control" name="abstract" id="abstract"><?php echo $res->abstract; ?></textarea>
				<br/><br>

				<label>Rationale:</label>
				<textarea class="form-control" name="rationale" id="rationale"><?php echo $res->rationale; ?></textarea>
				<br/><br></p>

				<label>Objectives:</label>
				<textarea class="form-control" name="objectives" id="objectives"><?php echo $res->objectives; ?></textarea>
				<br/><br></p>

				<label>Methodology:</label>
				<textarea class="form-control" name="methodology" id="methodology"><?php echo $res->methodology; ?></textarea>
				<br/><br></p>

				<label>Result and Discussions:</label>
				<textarea class="form-control" name="results_and_discussions" id="results_and_discussions"><?php echo $res->results_and_discussions; ?></textarea>
				<br/><br></p>

				<label>Recommendation(s):</label>
				<textarea class="form-control" name="recommendation" id="recommendation"><?php echo $res->recommendation; ?></textarea>
				<br/><br></p>

				<center><?php echo form_submit('save', 'Save Changes', ' class="btn btn-lg btn-primary"'); ?></center>
				
				<?php echo form_close(); ?>
				<?php endforeach; ?>

		</div>
	</div>
</div>
<br>
<?php else: redirect('home'); ?>
<?php endif; ?>