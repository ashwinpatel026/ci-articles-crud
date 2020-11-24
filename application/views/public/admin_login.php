<?php include('public_header.php'); ?>

<div class="container">
	<?php echo form_open('login/admin_login'); ?>
  <fieldset>
    <legend>Admin Login</legend>
    <?php if( $error = $this->session->flashdata('login_failed') ): ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="alert alert-dismissible alert-danger">
          <?= $error; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">UserName</label>
        <div class="col-sm-10">
          <?= form_input(['name'=>'username','class'=>'form-control-plaintext','placeholder'=>'UserName','value'=>set_value('username')]) ?>
          <?= form_error('username',"<p class='text-danger'>","</p>"); ?>
         </div>

      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <?= form_password(['name'=>'password','class'=>'form-control-plaintext','placeholder'=>'Password','value'=>set_value('password')]) ?>
          <?= form_error('password',"<p class='text-danger'>","</p>"); ?>
        </div>
      </div>
    <?= form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-defualt']) ?>
    <?= form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']) ?>
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  </fieldset>
</form>

</div>

<?php include('public_footer.php'); ?>