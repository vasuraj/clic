<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.10.2.min.js'; ?>"></script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'; ?>" type="text/css"/>


<link rel="stylesheet" href="<?php echo base_url().'assets/css/cic_form.css'; ?>" type="text/css">


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/sm/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="<?php echo base_url();?>assets/css/sm/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />




<!-- custome scrollerbar -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom_scroll/jquery.mCustomScrollbar.css">
<script src="<?php echo base_url(); ?>assets/js/custom_scroll/jquery.mCustomScrollbar.concat.min.js"></script>
  




<!-- custome scrollerbar end here-->



<!-- ******************smart menu include filecode ********************************** -->
    
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    
<link href="<?php echo base_url();?>assets/css/sm_bootstrap/jquery.smartmenus.bootstrap.css" rel="stylesheet" type="text/css" />



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/css/sm_bootstrap/jquery.smartmenus.bootstrap.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/sm/jquery.smartmenus.min.js"></script>

    <!-- SmartMenus jQuery Bootstrap Addon -->
    


    <!-- ******************smart menu end here ********************************** -->



<!-- #main-menu config - instance specific stuff not covered in the theme -->
<style type="text/css">
	#main-menu {
		position:relative;
		z-index:9999;
		width:auto;
	}
	#main-menu ul {
		width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
	}
</style>





<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sm/jquery.smartmenus.min.js"></script>

<!-- SmartMenus jQuery init -->
<script type="text/javascript">
	$(function() {
		$('#main-menu').smartmenus({
			subMenusSubOffsetX: 1,
			subMenusSubOffsetY: -8
		});
	});
</script>


		
	

</head>
<body>
<!-- 

***************************************************
check if jquery loaded and display message 
***************************************************

-->

  <?php
      $server=$_SERVER['HTTP_HOST'];
      //echo $server;
      $request_url=$_SERVER['REQUEST_URI'];
      //echo $request_url;

      $full_address=$server.$request_url;

      $selected_machine=$this->uri->segment(3);
$mode=$this->uri->segment(4);


      if($mode=='fresh')
{
      $encoded_url= base64_encode($full_address);
    }
    else
    {
      $encoded_url= $this->uri->segment(4);
    }
  ?>

	<script type="text/javascript">
if (typeof jQuery != 'undefined') {
 
  //  alert("jQuery library is loaded!");
 
}else{
 
 //   alert("jQuery library is not found!");
 
}
</script>

<!-- 

***************************************************
jquery check ends here 
***************************************************

-->


<div class="row " id='header'>

<!-- menu starts here -->


 <div class="col-xs-12" id='header'>
<?php include 'template/header_menu2.php';?>
</div>
</div>
<?php 
echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 



if(!isset($name))
	{
		$name='';
	}

	if(!isset($tname))
	{
		$tname='';
	}


  if(!isset($address1))
  {
    $address1='';
  }


  if(!isset($address2))
  {
    $address2='';
  }

    if(!isset($landmark))
  {
    $landmark='';
  }


    if(!isset($city))
  {
    $city='';
  }

   if(!isset($pincode))
  {
    $pincode='';
  }

     if(!isset($other_crops))
  {
    $other_crops='';
  }

       if(!isset($notes))
  {
    $notes='';
  }

      if(!isset($subsidy_link))
  {
    $subsidy_link='';
  }















$final_category='tillage';
$final_powered='motor';



if($mode=='fresh')
{
echo form_open('machine/store_machine_multimedia/'.$selected_machine,array('class'=>'form','enctype'=>'multipart/form-data'));
}
else {
echo form_open('machine/store_machine_multimedia/'.$selected_machine.'/'.$encoded_url,array('class'=>'form','enctype'=>'multipart/form-data'));

}

echo "<table>";






echo '<tr><td>';
echo form_label('Upload Machine Multimedia Files','machine_multimedia_files');
echo '</td><td>';
echo '<span class="row">';


echo '<input type="file" style="width:auto;" name="machine_multimedia_files[]" multiple="" class="upload validate[required]"  />';


echo '</span>';
echo '</td></tr>';


/*
echo '<tr><td>';
echo form_label('Upload Machine Image/video','images');
echo '</td><td>';
echo '<span class="row">';


echo '<input type="file" style="width:auto;" multiple="" name="slide_media_files[]"  class="upload validate[required]"  />';


echo '</span>';
echo '</td></tr>';



*/

?>


<script type="text/javascript">

 $(document).ready(function(){
        $("form.form").validationEngine('attach');
       });
//$(".form").validationEngine('validate');

/*
$(document).ready(function() {
     $('input.btn.btn-primary').attr('disabled','disabled');
     $('input[type="text"]').keyup(function() {
        if($(this).val() != '') {
           $('input.btn.btn-primary').removeAttr('disabled');
        }
        else {
        $('input.btn.btn-primary').attr('disabled','disabled');
        }
     });
 });
*/

</script>
<?php

//echo "</div>";

?>
 <input type='submit' id='submit' value='save'/>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>