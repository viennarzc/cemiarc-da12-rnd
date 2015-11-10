<div class="container-fluid"><br>

<?php echo form_open('home/search', 'class="form-horizontal"'); ?>
    <div class="col-lg-5" style="float:right; padding-right:5%;">
      <div class="input-group input-append" >
        <input type="text" name="search_key" id="search_key" class="form-control" placeholder="Search" >
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
      <h1 class="panel-title"><span class="glyphicon glyphicon glyphicon-list-alt"></span> Research List </h1>
  </div>
  
  <div class="panel-body">
    <div class="data">
      <?php if (!isset($researches)): ?>
          <p><strong>There are no researches available.</strong></p>
      <?php else: ?>
        <?php foreach ($researches as $research): ?>
          <i class="fa fa-book"></i> <?php echo anchor('researches/research_individual/'.$research->research_id, $research->research_title); ?> 
         <p><strong>Date Published: </strong><?php echo date('F j, Y', strtotime($research->date)); ?></p><hr>
        <?php endforeach; ?>
      <?php endif; ?>
      <center><?php echo $pages; ?></center>
    </div>
  </div>
</div>



