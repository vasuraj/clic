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


 <div class="col-xs-12" id='header'>
<?php include 'template/header_menu2.php';?>
</div>
</div>


<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div id='form_label'>
<?php
	$slide_type=$this->uri->segment(1);
	$selected_id=$this->uri->segment(4);
	$selected_section=$this->uri->segment(3);



//echo $slide_type;


if($slide_type=='agri')
{


$sections=array('intro', 'soils', 'varieties', 'seasonality', 'seed_quantity', 'seed_treatment',


 	'sowing', 'water_management', 'weed_management', 'nutrient_management', 'harvesting', 'economics',
 	'other_info');
}

if($slide_type=='livestock')
{


$sections=array('intro', 'breeds', 'selection', 'feed', 'housing', 'reproduction_management',


 	'calf_rearing', 'economics',
 	'other_info');
}



elseif($slide_type=='npm')
{


$sections=array('slide_id');
}


	$key=array_search($selected_section,$sections);
	
	

	


	$this->db->select(array('name','tname',$selected_section)); 
    $this->db->from($slide_type);   
    $this->db->where($slide_type."_id", $selected_id);
   	$result= $this->db->get()->result();

    $selected_id_sub_id= $result[0]->$selected_section;

    $name=$result[0]->name;
    $tname=$result[0]->tname;

  

  //  echo $selected_id_sub_id;

$slide_text='';






if(!isset($name))
	{
		$name='';
	}

	if(!isset($tname))
	{
		$tname='';
	}





echo "Insert information in ".$selected_section." section for ".$name."/".$tname;


	?>


</div>
<span class="row">
</span>


<div class="row">

	<?php

	

echo form_open($slide_type.'/store_'.$slide_type.'_slides/'.$selected_section.'/'.$selected_id.'/'.$selected_id_sub_id,array('class'=>'form', 'enctype'=>'multipart/form-data'));
echo "<table>";

echo "<tr><td>";
 //echo '<div id="type_label" >'.$name.'/'.$tname.'</div>';
echo "</td>";


echo "<td>";
if(isset($sections[$key+1]))
{
echo "<a href='".base_url()."index.php/".$slide_type."/insert_slide_form/".$sections[$key+1]."/".$selected_id."' id='next_to' >Next to ".$sections[$key+1]."</a>
</div>";
}
else
{
echo "<a href='".base_url()."index.php/".$slide_type."/insert_".$slide_type."' id='next_to' >Next to New ".$slide_type."</a>
</div>";	
}
echo "</td></tr>";


echo '<tr><td>
<span class="row">';

echo '<input type="file" name="slide_media_files[]" multiple class="upload" size="20" />';

echo '</span>';
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

//echo $sections[$key]; ?>
 <input type='submit'id='submit' value='save in <?php if($sections[$key]=="slide_id" )
 {
echo 'npm';	
}
else
{
echo $sections[$key];		
}



 ?>'/>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>