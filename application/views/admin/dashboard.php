<?php include_once('admin_header.php'); ?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-striped table-bordered" style="width:100%">
			  <thead>
			  	<tr>
                	<td colspan="8" align="center"><h3>Display Records</h3></td>
            	</tr>

            	<tr>
                	<td colspan="8" align="left"><a href="<?= site_url('admin/add_article') ?>"><button type="submit" class="btn btn-primary">Add Article</button></a></td>
            	</tr>
            	<?php if( $error = $this->session->flashdata('feedback') ): ?>           	
				        <div class="alert alert-dismissible alert-primary">
				          <?= $error; ?>
					    </div>
				<?php endif; ?>
			    <tr>
			      <th>Sr.Number</th>
			      <th>Articles Title</th>
			      <th>Action</th>			      
			    </tr>
			  </thead>
			  <tbody>
		  <?php if(count($articles)): 
		  		$count = $this->uri->segment(3,0); 	
		  		 foreach ($articles as $article ) : ?>
				    <tr>
				      <th><?= ++$count; ?></th>
				      <td><?= $article->title; ?></td>
				      <td>
				      	<div class="row">
				      		<div class="col-lg-2">
				      			<?= anchor("admin/edit_article/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?>
				      		</div> 
							<div class="col-lg-2">     
						      	<?=

								form_open('admin/delete_article'),
								form_hidden('article_id',$article->id),
								form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
								form_close();				      	
						      	 ?>
						    </div>  	 
		     			</div>
				    </tr>			     			
			  	<?php  endforeach; ?>
			  	<?php else:	?>
			  		 <tr>
			  		 	<td colspan="3">
			  		 		No Record Found
			  		 	</td>
			  		 </tr>
			  	<?php endif; ?>			    
			  </tbody>
			</table>			
		</div>			
	</div>
	<div>
 </div>
	<?= $this->pagination->create_links(); ?>
</div>

<?php include_once('admin_footer.php'); ?>