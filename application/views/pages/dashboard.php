<div style="background-imange" ></div>
<div class="container-fluid">
	<div class="row" >
	
		<div class="col-sm-6 col-md-4" >
			<div class="thumbnail"><br>
			<img class="image-st" src="<?php echo base_url('assets/image/book.png');?>" alt=""><br>
				<center>
					<h3>BROWSE</h3><hr>	
						<div class="caption">
							<div class = "caption-container"><a href="researches/by_location/">Location</a><br></div>
							<div class = "caption-container"><a href="researches/by_abstract/">Abstracts</a><br></div>
							<div class = "caption-container"><a href="researches/by_results_and_discussions/">Results and Discussions</a><br></div>
							<div class = "caption-container"><a href="researches/by_recommendation/">Recommendations</a><br></div>
							<div class = "caption-container"><a href="researches/by_aprroved_budget/">Approved Budget</a><br></div>
							<div class = "caption-container"><a href="researches/by_status/">Status</a><br></div>
						</div><br><br>
				</center>
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail"><br>
			<img class="image-st" src="<?php echo base_url('assets/image/search.png');?>" alt=""><br>
				<center>
					<h3>SEARCH</h3><hr>
						<div class="caption-mid">
						<?php echo form_open('home/search'); ?>
							<select name="search_filter" id="search_filter" class="form-control selectpicker" >
								<option value="research">Research</option>
								<option value="researcher">Researcher</option>
								<option value="implementing_agency">Implementing Agency</option>
								<option value="funding_agency">Funding Agency</option>
							</select><br>
							<input class="form-control" name="search_key" id="search_key" type="text" placeholder="Search.." ><br>
						<button type="submit" class="btn btn-success btn-sm btn-block" type="button"><span class="submit-text">Go!</span></button>
						<br>
						<?php echo form_close(); ?>  
						</div>
				</center>
			</div>
		</div>

		<div class="col-sm-6 col-md-4">
			<div class="thumbnail"><br>
			<img class="image-st" src="<?php echo base_url('assets/image/about.png');?>" alt=""><br>
				<center>
					<h3>ABOUT US</h3><hr>
						<address>Republic of the Philippines<br>
						<strong>Department of Agriculture - RFO XII<br>
						<h4>CENTRAL MINDANAO INTEGRATRED AGRICULTURAL
						RESEARCH CENTER</h4></strong>
						Amas, Kidapawan City<br>
						<abbr title="Phone">Tel/Fax No:</abbr> (064) 278-7036
						</address>
						<br><br>
						<address>
						<strong>Department of Agriculture - RFU XII<br> </strong>
						
						CSA Bldg., Corner Zulueta Street<br>
						General Santos Drive, Koronadal City<br>
						<abbr title="Phone">Tel/Fax No:</abbr> (083) 520-0460 <br>
						E-mail Add: ored_da12@yahoo.com						
						</address>
				</center>	  
		</div>
	</div>
</div>
