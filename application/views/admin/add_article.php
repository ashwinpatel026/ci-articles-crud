<?php include_once('admin_header.php'); ?>

<div class="container">	
	<?php echo form_open_multipart('admin/store_article'); ?>
	<?php echo form_hidden('user_id',$this->session->userdata('user_id'));
		  echo form_hidden('created_at',date('Y-m-d H:i:s'));
	?>
		  <fieldset>
		    <legend>Add Article</legend>
		      <div class="form-group row">
		        <label for="staticEmail" class="col-sm-2 col-form-label">Article Title</label>
		        <div class="col-sm-10">
		          <?= form_input(['name'=>'title','class'=>'form-control-plaintext','placeholder'=>'Article Title','value'=>set_value('title')]) ?>
		          <?= form_error('title',"<p class='text-danger'>","</p>"); ?>
		         </div>

		      </div>
		      <div class="form-group row">
		        <label for="staticEmail" class="col-sm-2 col-form-label">Article Body</label>
		        <div class="col-sm-10">
		          <?= form_textarea(['name'=>'body','class'=>'form-control-plaintext','placeholder'=>'Article Body','value'=>set_value('body')]) ?>
		          <?= form_error('body',"<p class='text-danger'>","</p>"); ?>
		        </div>
		      </div>
		      <div class="form-group row">
		        <label for="staticEmail" class="col-sm-2 col-form-label">Upload Images</label>
		        <div class="col-sm-10">
		          <?= form_upload(['name'=>'userfile','class'=>'form-control-plaintext']) ?>

		          <?php if(isset($upload_error)) { echo $upload_error; } ?>
		        </div>
		      </div>
		    <?= form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-defualt']) ?>
		    <?= form_submit(['name'=>'submit','value'=>'Add Article','class'=>'btn btn-primary']) ?>
		    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
		  </fieldset>
		</form>	
</div>

<?php include_once('admin_footer.php'); ?>