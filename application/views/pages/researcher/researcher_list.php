<div class="container-fluid"><br>

<?php echo form_open('home/search', 'class="form-horizontal"'); ?>
            <div class="col-lg-5" style="float:right; padding-right:5%;">
              <div class="input-group input-append" >
                <input type="text" name="search_key" id="search_key" class="form-control" placeholder="Search " >
                <span class="input-group-btn">
                  <select name="search_filter" id="search_filter" class="form-control selectpicker" >
                  <span class="caret">
                          <option value="research" selected>Research</option>
                          <option value="researcher">Researcher</option>
                          <option value="implementing_agency">Implementing Agency</option>
                          <option value="funding_agency">Funding Agency</option>
                  </span>
                  </select>
                  <button class="btn btn-inverse" type="submit"><i class="fa fa-search"></i></button>
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        <?php echo form_close(); ?>

<br><br><br>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Researcher List</h2>
  </div>
  <div class="panel-body">
         <div class="data">
      <?php if (!isset($researchers)): ?>
          <p><strong>There are no researchers available.</strong></p>
      <?php else: ?>
        <?php foreach ($researchers as $researcher): ?>
          <h4><span class="glyphicon glyphicon glyphicon-user"></span> <?php echo anchor('researchers/researcher_individual/'.$researcher->researcher_id, $researcher->lname.", ".$researcher->fname." ".substr($researcher->mname, 0, 1).".", 'class="data-toggle="modal" data-target="#researcherModal""'); ?></h2>
          <ul>
            <li><strong><em>Address: </em></strong><?php echo $researcher->address; ?></li>
            <li><strong><em>Gender: </em></strong><?php echo $researcher->sex; ?></li>
            <li><strong><em>Company/Office: </em></strong><?php echo $researcher->company_office; ?></li>
            <li><strong><em>Contact Number: </em></strong>  <?php echo $researcher->contact_number; ?></li>
          </ul>
          <p><?php echo anchor('researchers/researcher_individual/'.$researcher->researcher_id, 'View', 'class="btn btn-info"'); ?></p>
          <hr>
        <?php endforeach; ?>
      <?php endif; ?>
      <center><?php echo $pages; ?></center>
      </div>
  </div>
</div>





<!-- need pagination -->