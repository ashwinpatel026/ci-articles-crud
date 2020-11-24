<!DOCTYPE html>
<html> 
<head> 
  <title>Codeignier 3 Image Upload with Resize Example from Scratch</title> 
</head>


<body> 
<?php if ($this->session->flashdata('success')) { ?>
					<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
				<?php } ?>
				<!---- Error Message ---->
				<?php if ($this->session->flashdata('error')) { ?>
					<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>
				<?php } ?> 

  <?php echo $error;?> 
  <?php echo form_open_multipart('image-upload/post');?> 
     <input type="file" name="image" size="20" />
     <input type="submit" value="upload" /> 
  </form> 


</body>
</html>