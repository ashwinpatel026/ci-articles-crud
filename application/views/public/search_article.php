<?php include('public_header.php'); ?>

<div class="container">
	<h1>Search Result</h1>
	<hr>
	<table class="table">
		<thead>
			<tr>
				<td>Sr.no</td>
				<td>Article Title</td>	
				<td>Published On</td>		
			</tr>
		</thead>
		<tbody>
			
			<?php if(count($articles)): 
			$count = $this->uri->segment(3,0);	
			 foreach($articles as $article): ?>	
			<tr>
				<td><?= ++$count; ?></td>
				<td><?= $article->title ?></td>
				<td><?= "Date" ?></td>
			</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<tr>
			  	<td colspan="3">
			  		No Record Found
			  	</td>
			</tr>	

		<?php endif; ?>
		</tbody>
	</table>					
</div>

	
<?php include('public_footer.php'); ?>