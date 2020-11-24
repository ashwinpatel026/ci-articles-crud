<?php include('public_header.php'); ?>

<div class="container">
	<h1>All Article</h1>
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
				<td><?= anchor("client/article/{$article->id}",$article->title) ?></td>
				<td><?= date('d M y H:i:s',strtotime($article->created_at)) ?></td>
			</tr>
		<?php endforeach; endif; ?>
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>					
</div>

	
<?php include('public_footer.php'); ?>