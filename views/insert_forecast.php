<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery/jquery-1.8.2.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/zebra_datepicker.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/cic_form.css'; ?>" type="text/css">


<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">

 <link rel="stylesheet" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'; ?>" type="text/css"/>
<!-- SmartMenus core CSS (required) -->
<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="<?php echo base_url();?>assets/css/sm/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/forms.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/autotab.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/jquery.validationEngine.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">
<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />



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

<?php

$return_to=$this->uri->segment(4);

$actual_return_to=base64_decode($return_to);

//echo $actual_return_to;
?>


</head>
<body>
<!-- 

***************************************************
check if jquery loaded and display message 
***************************************************

-->
	<script type="text/javascript">
if (typeof jQuery != 'undefined') {
 
  // alert("jQuery library is loaded!");
 
}else{
 
  // alert("jQuery library is not found!");
 
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
<?php 
echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div id='form_label'>

Insert Weather Forecast Information (from Advisory)

</div>
<div class="col-xs-4" id='form_input'>
	<?php
if(isset($_POST))
{
	//print_r($_POST);
}
	 
$selected_date=$this->uri->segment(3);
if($selected_date!='' || $selected_date!=null)
{
$selected_date_info=$this->model_weather->get_forecast($selected_date);


foreach ($selected_date_info as $value) {
	$data_entry_date= $value->data_entry_date;

	 $date= $value->date;

	 $rainfall_description= $value->rainfall_description;
	 $temp_min_min= $value->temp_min_min;

	 $temp_min_max= $value->temp_min_max;

	 $temp_max_min= $value->temp_max_min;

	 $temp_max_max= $value->temp_max_max;

	 $wind_min_min= $value->wind_min_min;

	$wind_min_max= $value->wind_min_max;

	 $wind_max_min= $value->wind_max_min;

	 $wind_max_max= $value->wind_max_max;

	

	 $other_info= trim($value->other_info);
	# code...
}
}

if(isset($selected_date_info))
	{
		$data_entry_date_final=$data_entry_date;
	}
	else
	{
		$data_entry_date_final=date('Y-m-d');
	}


	if(isset($selected_date_info))
	{



		$date_final=$date;

		$old_forecast_entry_date=$date_final;

$myDateTime = DateTime::createFromFormat('Y-m-d', $old_forecast_entry_date);
$date_final_format = $myDateTime->format('F d, Y');
	}
	else
	{
		$date_final=date('Y-m-d');

$old_forecast_entry_date=$date_final;

$myDateTime = DateTime::createFromFormat('Y-m-d', $old_forecast_entry_date);
$date_final_format = $myDateTime->format('F d, Y');
	}

if(isset($selected_date_info))
	{
		$final_rainfall_description=$rainfall_description;
	}
	else
	{
		$final_rainfall_description='none';
	}


if(isset($selected_date_info))
	{
		$temp_min_min=$temp_min_min;
	}
	else
	{
		$temp_min_min='';
	}

if(!isset($selected_date_info))
	{
		$temp_min_min='';
	}

	if(!isset($selected_date_info))
	{
		$temp_min_max='';
	}

	if(!isset($selected_date_info))
	{
		$temp_max_min='';
	}

	if(!isset($selected_date_info))
	{
		$temp_max_max='';
	}
if(!isset($selected_date_info))
	{
		$wind_min_min='';
	}

	if(!isset($selected_date_info))
	{
		$wind_min_max='';
	}
	if(!isset($selected_date_info))
	{
		$wind_max_min='';
	}
	if(!isset($selected_date_info))
	{
		$wind_max_max='';
	}

	if(!isset($selected_date_info))
	{
		$rainfall='0';
	}

	if(!isset($selected_date_info))
	{
		$humidity='0';
	}

	if(!isset($selected_date_info))
	{
		$other_info='';
	}

echo form_open('weather/store_forecast/'.$selected_date.'/'.$return_to,array('class'=>'form'));

echo "<table>";

echo "<tr>";
echo "<td>";
echo form_label('Entry Date','data_entry_date');
echo "</td>";
echo "<td>";
echo "<h5 style='color:#5e8184; text-shadow:0px 1px 1px white,0px -1px 0px #369;'>"
.$date_final_format."</h5>";



$data_entry_date_data = array(
              'name'   => 'data_entry_date',
              'id'     => 'data_entry_date',
              'value'  => $data_entry_date_final,
             'class'=> 'datepicker',
             'hidden'=>'hidden'
              
            );
echo form_input($data_entry_date_data);
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>";
echo form_label('Date','date');
echo "</td>";
echo "<td>";
$data_entry_date_data = array(
              'name'        => 'date',
              'id'          => 'date',
              'value'       => $date_final,
             	'class'	=> 'datepicker'
              
            );
echo form_input($data_entry_date_data);

?>





<?php
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>";
echo form_label('Description','description');
echo "</td>";
echo "<td>";
$description_option_data = array(
			  'none'=>'--',
              'rainy'=>'rainy',
              'cloudy'=>'cloudy',
              'heavy_rain'=>'heavy rain',
              'sunny'=>'sunny',
              'other'=>'other'
            );

echo form_dropdown('rainfall_description',$description_option_data,$final_rainfall_description);
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo form_label('Minimum Temprature','min_temp');
echo "</td>";
echo "<td>";
$temp_min_min_data = array(
			  'name'        => 'temp_min_min',
              'id'          => 'temp_min_min',
             'value'	=>	$temp_min_min,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($temp_min_min_data);
echo '-';
$temp_min_max_data = array(
			  'name'        => 'temp_min_max',
              'id'          => 'temp_min_max',
              'value'	=>	$temp_min_max,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($temp_min_max_data);
echo "</td>";
echo "</tr>";








echo "<tr>";
echo "<td>";
echo form_label('Maximum Temprature','min_temp');
echo "</td>";
echo "<td>";
$temp_max_min_data = array(
			  'name'        => 'temp_max_min',
              'id'          => 'temp_max_min',
              'value'	=>	$temp_max_min,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($temp_max_min_data);
echo '-';
$temp_max_max_data = array(
			  'name'        => 'temp_max_max',
              'id'          => 'temp_max_max',
              'value'	=>	$temp_max_max,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($temp_max_max_data);
echo "</td>";
echo "</tr>";










echo "<tr>";
echo "<td>";
echo form_label('Minimum Wind','min_temp');
echo "</td>";
echo "<td>";
$wind_min_min_data = array(
			  'name'        => 'wind_min_min',
              'id'          => 'wind_min_min',
              'value'	=>	$wind_min_min,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($wind_min_min_data);
echo '-';
$wind_min_max_data = array(
			  'name'        => 'wind_min_max',
              'id'          => 'wind_min_max',
              'value'	=>	$wind_min_max,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($wind_min_max_data);
echo "</td>";
echo "</tr>";








echo "<tr>";
echo "<td>";
echo form_label('Maximum Wind','min_temp');
echo "</td>";
echo "<td>";
$wind_max_min_data = array(
			  'name'        => 'wind_max_min',
              'id'          => 'wind_max_min',
              'value'	=>	$wind_max_min,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($wind_max_min_data);
echo '-';
$wind_max_max_data = array(
			  'name'        => 'wind_max_max',
              'id'          => 'wind_max_max',
              'value'	=>	$wind_max_max,
             'class'=> 'validate[required,custom[number]]'
            );
echo form_input($wind_max_max_data);
echo "</td>";
echo "</tr>";











echo "</table>"; 



echo "</div>";

echo '<div class="col-xs-8" id="form_text_area">';

echo '<textarea name="other_info" id="content_2" ><p>'.trim($other_info).'</p></textarea>';
echo display_ckeditor($ckeditor_2);

 ?>

<?php
//echo '<textarea name="content_2" id="content_2" ><p>Example data</p></textarea>';
// echo display_ckeditor($ckeditor_2); 
//echo '</textarea> ';
?>



<script type="text/javascript">
$(document).ready(function() {

    // assuming the controls you want to attach the plugin to 
    // have the "datepicker" class set
    $('input.datepicker').Zebra_DatePicker();
     $("form.form").validationEngine('attach');

//$(".form").validationEngine('validate');


 });





</script>
<?php

echo "</div>";

?>

 <input type='submit'  id='submit' value='Save'/>

 <a href="<?php echo 'http://'.$actual_return_to; ?>"  id='cancel'>Cancel</a>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>