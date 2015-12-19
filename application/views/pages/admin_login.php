<div class="container-fluid" style="padding:1% 0 10% 30% ;" >
      <div class="col-sm-5 col-md-6" >
            <?php echo form_open('home/login', 'class="form-horizontal"'); ?>
            <div class="form-group"  >
                <label for="username">User Name</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
            </div>
            <button type="submit" class="btn btn-primary form-control">Submit</button>
            <?php echo form_close(); ?>
        </div>
</div>