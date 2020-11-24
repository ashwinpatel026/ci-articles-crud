<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
	<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
	<?php echo link_tag('assests/css/sb-admin.css'); ?>
</head>

<?php  $hobby = explode(',',$row['hobby']); ?>


<body class="bg-dark">
	<div class="container">
		<div class="card card-register mx-auto mt-5">
			<div class="card-header">Edit Record </div>
			<div class="card-body">
				<!---- success Message ---->
				<?php if ($this->session->flashdata('success')) { ?>
					<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
				<?php } ?>
				<!---- Error Message ---->
				<?php if ($this->session->flashdata('error')) { ?>
					<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>
				<?php } ?>  
				<form name="efrm" method="post" action="<?= site_url('welcome/update_record/'.$row['id'])?>">
					<div class="form-group">
						<div class="form-label-group">Name:</div>
							<input type="text" name="name" value="<?=$row['name']?>" class="form-control">
							<?php echo form_error('name',"<div style='color:red'>","</div>");?>
					</div>
					<div class="form-group">
 		            	<div class="form-label-group">Email:</div>
             		  		<input type="email" name="email" value="<?=$row['email']?>" class="form-control">
							<?php echo form_error('email',"<div style='color:red'>","</div>");?>
             		</div>

             		<!-- Default unchecked -->
             		<div class="form-group">
             			<div class="form-label-group">Gender</div> 
					<div class="custom-control custom-radio">
					  	<input type="radio"  name="gender" value="male" <?php if($row['gender']=='male') { echo 'checked'; } ?> >
					  <label>Male</label>
					</div>

					<!-- Default checked -->
					<div class="custom-control custom-radio">
					  <input type="radio"  name="gender" value="female" <?php if($row['gender']=='female' OR $row['gender']=='Female') { echo 'checked'; } ?> >
					  <label>Female</label>
					</div>
					<?php echo form_error('gender',"<div style='color:red'>","</div>");?>

					<!--  Hobbie -->
					<div class="form-group">
             		<div class="form-label-group">Hobbie</div> 
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox"  value="cricket" <?php if(in_array('cricket',$hobby)) {echo 'checked'; } ?> name="hobby[]">
						  <label class="form-check-label" for="inlineCheckbox1">cricket</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox"  value="football" <?php if(in_array('football',$hobby)) {echo 'checked'; } ?> name="hobby[]">
						  <label class="form-check-label" for="inlineCheckbox2">football</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox"  value="kabbadi" <?php if(in_array('kabbadi',$hobby)) {echo 'checked'; } ?> name="hobby[]">
						  <label class="form-check-label" for="inlineCheckbox3">kabbadi</label>
						</div>
<?php echo form_error('hobby[]',"<div style='color:red'>","</div>");?>
					</div>

					<!-- Select City  -->	
					<div class="form-group">
						<select class="custom-select" name="city">
					 	 <option value="" selected>--Select City--</option>
					 	 <option value="ahmedabad" <?php if($row['city']=='ahmedabad') { echo 'selected'; } ?> >Ahmedabad</option>
						 <option value="baroda" <?php if($row['city']=='baroda') { echo 'selected'; } ?> >Baroda</option>
					 	 <option value="surat" <?php if($row['city']=='surat') { echo 'selected'; } ?> >Surat</option>
					</select>
					<?php echo form_error('city',"<div style='color:red'>","</div>");?>
             		</div>	

             			<input type="submit" name="submit" class="btn btn-primary btn-block" value="Save">
					    <a class="d-block small" href="<?php echo site_url('welcome'); ?>">Back to Home page</a>

					</div>
				</form>	
			</div>
		</div>
	</div> 
	<script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
</body>
</html>
