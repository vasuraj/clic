<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.10.2.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/zebra_datepicker.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'; ?>" type="text/css"/>



<link rel="stylesheet" href="<?php echo base_url().'assets/css/cic_form.css'; ?>" type="text/css">


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/sm/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="<?php echo base_url();?>assets/css/sm/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

<!-- #main-menu config - instance specific stuff not covered in the theme -->
<style type="text/css">

body
{
background:none;
}

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




<!-- menu ends here -->

<div class="row" id='form_area'>



<div class="row content_area">

	<?php
//	$main_id=$this->uri->segment(3);
//	$sub_id=$this->uri->segment(4);
//	$sub_

	
				$slide_text='';


//  ****************************
       // get current addresss where to return after update

//*********************************

$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);



//  ****************************
// get current addresss where to return after update
//*********************************





echo form_open('agri/store_added_agri_slides/'.$sub_category.'/'.$main_id.'/'.$sub_id.'/'.$encoded_url,array('class'=>'form', 'enctype'=>'multipart/form-data'));
echo "<table>";



echo '<tr><td>
<span class="row">';




echo '<input type="file" name="slide_media_files[]" multiple class="upload" size="20" />';

echo '</span>';
echo '</td><td>';

?>
<!--

 <input type='submit' id='next_to' value='save <?php
/*  if($sub_category!='--')
  	{
  		echo 'in '.$sub_category; 
  	}
 

 */ ?>  '/>

-->

<?php

echo '</td></tr>';






echo "</table>"; 



//echo '<div class="col-xs-9" id="form_text_area">';

echo '<textarea  class="validate[required,custom[number]]"" name="text" id="content_2" >'.$slide_text.'</textarea>';
echo display_ckeditor($ckeditor_2);

 ?>

<?php
//echo '<textarea name="content_2" id="content_2" ><p>Example data</p></textarea>';
// echo display_ckeditor($ckeditor_2); 
//echo '</textarea> ';
?>



<script type="text/javascript">

 $(document).ready(function(){
        $("form.form").validationEngine('attach');
       });
//$(".form").validationEngine('validate');




</script>
<?php

//echo "</div>";

?>







<?php 

$path_slice = explode("/", base64_decode($encoded_url));



$return_to_path='';

$path_slice = explode("/", base64_decode($path_slice[8]));

//$return_to_path=implode('/',$path_slice);


for($i=5;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}


//echo "<br><br>".$return_to_path;


//echo base64_decode($return_to);


$return_to_path = 'agri/view_slides/'.$return_to_path;
//echo '<br>'.$return_to_path;

$final_return_path=$return_to_path;

$string_occurance = substr_count($return_to_path,'agri/view_slides/');

if($string_occurance>1)
{
	
	
	$path_slice2 = explode("/", $return_to_path);
$return_to_path='';
$return_to_path_updated='';
	for($i=2;$i<count($path_slice2);$i++)
{

$return_to_path_updated = $return_to_path_updated.$path_slice2[$i]."/";

}


$final_return_path=$return_to_path_updated;
//echo '<br>updated_path: '.$return_to_path_updated;
	
} 
?>




<?php





echo "<button type='submit' id='submit' value='submit'>save</button>";




  if($sub_category!='--')
  	{
  		
  		$target_location=base_url()."index.php/".$final_return_path;
	

	
		if(substr_count($target_location,'npm/view_slides/'))
{
	echo "<a id='submit' href='".str_replace('agri/view_slides/','', $target_location)."'>Return</a>";
}
else
{
	echo "<a id='submit' href='".$target_location."'>Return</a>";	
}

  	


  	}



echo form_close();



	 ?>
	

	

</body>
</html>