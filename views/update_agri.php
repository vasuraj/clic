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
	#main-menu {
		position:relative;
		z-index:9999;
		width:auto;
	}
	#main-menu ul {
		width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
	}
</style>




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


<div class="row" id='header'>


<!-- menu starts here -->


 <div class="col-xs-10" id='header'>
<?php include 'template/header_menu2.php';?>
</div>
</div>
<?php
//	echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 
$selected_agri=$this->uri->segment(3);
$return_to=$this->uri->segment(4);



$selected_agri_info=$this->model_agri->get_agri($selected_agri);

//print_r($selected_agri_info);


foreach ($selected_agri_info as $value) {
	 
        $name =$value->name;
       $tname = $value->tname;
         $icon = $value->icon;
       $category = $value->category;
      
     
     //   $this->db->insert('agri', $this);
	
}







if(!isset($name))
	{
		$name='';
	}

	if(!isset($tname))
	{
		$tname='';
	}




$final_category='crop';


echo form_open('agri/store_updated_agri/'.$selected_agri.'/'.$return_to,array('class'=>'form','enctype'=>'multipart/form-data'));
echo "<table>";



echo "<tr>";
echo "<td></td><td>";

if(isset($icon))
{
	echo "<img STYLE='margin-left:4px; BORDER:5px solid #ddd; box-shadow:0px -1px 4px black;' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$icon)."'>";
}
echo "</td></tr>";

//print_r($query_image);


echo "<input type='text' name='previous_icon' hidden value='".$icon."' />";




echo "<tr>";
echo "<td>";
echo form_label('English Name','name');
echo "</td>";
echo "<td>";
$name = array(
			  'name'        => 'name',
              'id'          => 'name',
              'value'	=>	$name,
             'class'=> 'validate[required]',
              'size'        => '10',
              'style'       => 'width:400px; text-align:left; padding-left:20px;',
            );
echo form_input($name);

echo "</td>";
echo "</tr>";



echo "<tr>";
echo "<td>";
echo form_label('Telugu Name','tname');
echo "</td>";
echo "<td>";
$name = array(
			  'name'        => 'tname',
              'id'          => 'tname',
              'value'	=>	$tname,
              'class'=> 'validate[required]',
              'size'        => '10',
              'style'       => 'width:400px; text-align:left; padding-left:20px;',
            );
echo form_input($name);

echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>";
echo form_label('Category','category');
echo "</td>";
echo "<td>";
$category_option_data = array(
			  'none'=>'--',
			  'crop'=>'crop',
              'fruit'=>'fruit',
              'vegetable'=>'vegetable',
               'millet'=>'millet',
             
              'other'=>'other'
            );

echo form_dropdown('category',$category_option_data,$category);
echo "</td>";
echo "</tr>";

echo '<tr><td>';


echo form_label('Upload Icon','name');
echo '</td><td>';

echo '<span class="row">';
echo "<FONT STYLE='color:#369; text-shadow:0px -1px 0px BLUE;'>IF YOU WANT TO UPDATE ICON UPLOAD HERE</FONT>";
echo '<input type="file" style="width:auto;" name="slide_media_files[]"  class="upload "  />';

echo '</span>';

echo '<input type="reset" id="submit" value="Reset"/>';
echo '</td></tr>';



echo "</table>"; 

echo "</div>";

//echo '<div class="col-xs-9" id="form_text_area">';

//echo '<textarea name="other_info" id="content_2" ><p>'.trim($other_info).'</p></textarea>';
//echo display_ckeditor($ckeditor_2);

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
 <input type='submit'  id='submit' value='UPDATE'/>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>