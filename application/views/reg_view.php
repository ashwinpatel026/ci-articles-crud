<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<?php echo link_tag('assests/css/sb-admin.css'); ?>

</head>
<body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">

		<!---- Success Message ---->
		<?php if ($this->session->flashdata('success')) { ?>
				<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
		</div>
		<?php } ?>
		<!---- Error Message ---->
		<?php if ($this->session->flashdata('error')) { ?>
				<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>

		<?php } ?>  


<form name="efrm" method="post" action="<?= site_url('welcome/add_record')?>">
					<div class="form-group">
 		            <div class="form-label-group">Name:</div>
             		   <input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control">
<?php echo form_error('name',"<div style='color:red'>","</div>");?>
					</div>

					<div class="form-group">
 		            <div class="form-label-group">Email:</div>
             		   <input type="email" name="email" value="<?php echo set_value('email');?>" class="form-control">
<?php echo form_error('email',"<div style='color:red'>","</div>");?>
             		</div>

             		<!-- Default unchecked -->
             		<div class="form-group">
             			<div class="form-label-group">Gender</div> 
					<div class="custom-control custom-radio">
					  	<input type="radio" class="custom-control-input" id="defaultUnchecked" name="gender" value="male" <?php echo set_radio('gender', 'male'); ?>>
					  <label class="custom-control-label" for="defaultUnchecked">Male</label>
					</div>

					<!-- Default checked -->
					<div class="custom-control custom-radio">
					  <input type="radio" class="custom-control-input" id="defaultChecked" name="gender" value="female" <?php echo set_radio('gender', 'female'); ?>>
					  <label class="custom-control-label" for="defaultChecked">Female</label>
					</div>
<?php echo form_error('gender',"<div style='color:red'>","</div>");?>
					</div>

					<div class="form-group">
             		<div class="form-label-group">Hobbie</div> 
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox"  value="cricket" <?php echo set_checkbox('hobby[]', 'cricket'); ?> name="hobby[]">
						  <label class="form-check-label" for="inlineCheckbox1">cricket</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox"  value="football" <?php echo set_checkbox('hobby[]', 'football'); ?> name="hobby[]">
						  <label class="form-check-label" for="inlineCheckbox2">football</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox"  value="kabbadi" <?php echo set_checkbox('hobby[]', 'kabbadi'); ?> name="hobby[]">
						  <label class="form-check-label" for="inlineCheckbox3">kabbadi</label>
						</div>
						<?php echo form_error('hobby[]',"<div style='color:red'>","</div>");?>
					</div>

					<div class="form-group">
						<select class="custom-select" name="city">
					 	 <option value="" selected>--Select City--</option>
					 	 <option value="ahmedabad">Ahmedabad</option>
						 <option value="baroda">Baroda</option>
					 	 <option value="surat">Surat</option>
					</select>
					<?php echo form_error('city',"<div style='color:red'>","</div>");?>
             		</div>

             		<input type="submit" name="submit" class="btn btn-primary btn-block" value="Add Record">
					<a class="d-block small" href="<?php echo site_url('welcome'); ?>">Back to Home page</a>
				</div>
			</div>
		</div>	
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
 </form>
</body>
</html>