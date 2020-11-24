<?php include_once('admin_header.php'); ?>

<div class="container">	
	<?php echo form_open("admin/update_article/{$article->id}"); ?>
		  <fieldset>
		    <legend>Edit Article</legend>
		      <div class="form-group row">
		        <label for="staticEmail" class="col-sm-2 col-form-label">Article Title</label>
		        <div class="col-sm-10">
		          <?= form_input(['name'=>'title','class'=>'form-control-plaintext','placeholder'=>'Article Title','value'=>set_value('title',$article->title)]) ?>
		          <?= form_error('title',"<p class='text-danger'>","</p>"); ?>
		         </div>

		      </div>
		      <div class="form-group row">
		        <label for="staticEmail" class="col-sm-2 col-form-label">Article Body</label>
		        <div class="col-sm-10">
		          <?= form_textarea(['name'=>'body','class'=>'form-control-plaintext','placeholder'=>'Article Body','value'=>set_value('body',$article->body)]) ?>
		          <?= form_error('body',"<p class='text-danger'>","</p>"); ?>
		        </div>
		      </div>
		    <?= form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-defualt']) ?>
		    <?= form_submit(['name'=>'submit','value'=>'Edit Article','class'=>'btn btn-primary']) ?>
		    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
		  </fieldset>
		</form>	
</div>

<?php include_once('admin_footer.php'); ?>