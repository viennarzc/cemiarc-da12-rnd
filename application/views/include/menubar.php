<div id="wrapper"> 
	
	<div id="sidebar-wrapper">
		<div id="page-content-wrapper" >
			<div id="container-fluid" >			
			<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid ">
					<div id='cssmenu'>
							<ul>
							<li><a href='<?php echo base_url('home/'); ?>'><span>Research and Development Information System</span></a></li>
						   <li><a href='<?php echo base_url('home/'); ?>'><i class="fa fa-university"></i> <span>HOME</span></a></li>
							   <li class='active has-sub'><a href='#'><i class="fa fa-book"></i> <span>RESEARCH</span></a>
							      <ul>
							         <li ><a href='<?php echo base_url('researches/research_list'); ?>'><span class="glyphicon glyphicon glyphicon-list-alt"></span>  <span>List of Research</span></a>
							         </li>
							         <li ><a href='<?php echo base_url('researchers/researcher_list'); ?>'><span class="glyphicon glyphicon glyphicon-list-alt"></span> <span>List of Researcher</span></a>
							         </li>
							         <li ><a href='<?php echo base_url('implementing_agencies/implementing_agency_list'); ?>'><span class="glyphicon glyphicon glyphicon-list-alt"></span> <span>List of Implementing &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Agency</span></a>
							         </li>
							     	 <li ><a href='<?php echo base_url('funding_agencies/funding_agency_list'); ?>'><span class="glyphicon glyphicon glyphicon-list-alt"></span> <span>List of Funding Agency</span></a>
							         </li>
							      </ul>
							   </li>
		<!-- 					   <li><a href='#'><i class="fa fa-phone"></i> <span>CONTACT</span></a></li>
		 -->		   				<?php if($this->session->userdata('user_data') != NULL): ?>
		
							   		<li class='active has-sub'><a href=''><i class="fa fa-user"></i> <span>Administration</span></a>
									      <ul>
									         <li ><a href='<?php echo base_url('researches/research_form/'); ?>'><i class="fa fa-plus-circle"></i> <span>Add Research</span></a>
									         </li>
									         <li ><a href='<?php echo base_url('researchers/researcher_form/'); ?>'><i class="fa fa-plus-circle"></i> <span>Add Researcher</span></a>
									         </li>
									         <li ><a href='<?php echo base_url('implementing_agencies/implementing_agency_form/');?>'><i class="fa fa-plus-circle"></i> <span>Add Implementing &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Agency</span></a>
									         </li>
									     	 <li ><a href='<?php echo base_url('funding_agencies/funding_agency_form/');?>'><i class="fa fa-plus-circle"></i> <span>Add Funding Agency</span></a>
									         </li>
									      </ul>
									</li>
							 	  <li class='last'><a href='<?php echo base_url().'home/Logout/';?>' class='logout-button'><i class="fa fa-unlock"></i> <span >Logout</span></a></li>

					 <?php else: ?> 
							 	<li class='active has-sub' data-toggle="modal" data-target=""><a href='#' class='login-button'><i class="fa fa-lock"></i> <span>Login</span></a>
							 		<ul>
										<?php echo form_open('home/login', 'class="form-horizontal"'); ?>
										<label for="username"  >User Name</label>
										<input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
										<label for="password">Password</label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
										<br>
										<button type="submit" class="btn btn-success form-control" >Submit</button><br>
										<br>

										<?php echo form_close(); ?>
										<br>
							 		</ul>
							 	</li>
	
							 <?php endif; ?> 
							</ul>
					</div>
			</div>
			</nav>

		</div>
<h5><span class="label label-danger"><?php echo $this->session->flashdata('feedback');?></span></h5>

	</div>
</div>
