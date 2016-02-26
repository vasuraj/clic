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



<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/forms.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/autotab.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/forms/jquery.validationEngine.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">
<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />


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




@media print { .dontprint { display:none; } }
@media screen { .dontshow { display:none; } }


body
{

width:100%;
padding-left:20px;
padding-right:20px;
overflow: auto;
background-image: linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -o-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -moz-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -webkit-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -ms-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);

background-image: -webkit-gradient(
	linear,
	right bottom,
	left top,
	color-stop(0.32, rgb(163,194,199)),
	color-stop(0.66, rgb(132,154,173))
);

}

#form_area
{
background: #cedce7; /* Old browsers */
background: -moz-linear-gradient(top, #cedce7 0%, #91a5a4 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cedce7), color-stop(100%,#91a5a4)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #cedce7 0%,#91a5a4 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #cedce7 0%,#91a5a4 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #cedce7 0%,#91a5a4 100%); /* IE10+ */
background: linear-gradient(to bottom, #cedce7 0%,#91a5a4 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cedce7', endColorstr='#91a5a4',GradientType=0 ); /* IE6-9 */
box-shadow:0px -1px 1px white,
0px 1px 1px black;


}

#form_input
{
	padding:10px;


}


#form_text_area
{
	padding:10px;
}


.btn
{
	float:right;
	margin-top: -35px;

	height:40px;
	
	font-size: 20px;
}

input,option,select
{
	border-radius:2px;
margin:5px;
	border:none;
	box-shadow:-1px -1px 1px #89f;
	height: 25px;
	width:100px;
}

.well
{
	border-radius: 0px;
	height:100px;
	box-shadow:0px 1px 1px #666;
}

</style>
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
	<div  class="col-xs-2 dontprint" id='logo'>
		<img src="<?php echo base_url();?>assets/img/logo/cic_logo.png" alt="cic_logo">
		<span id='logo_text'>CIC</span>
	</div>


<!-- menu starts here -->


 <div class="col-xs-10" id='header'>
<?php include 'template/header_menu2.php';?>
</div>
</div>
<?php 
echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php
$return_to=$this->uri->segment(4);
	 
$selected_advisory=$this->uri->segment(3);
$this->db->select('date');
$this->db->from('adv_main');
$this->db->where('adv_main_id',$selected_advisory);
$selected_adv_info=$this->db->get()->result();




$date_final=$selected_adv_info[0]->date;


echo form_open('advisory/store_update_adv_main/'.$selected_advisory.'/'.$return_to,array('class'=>'well form','enctype'=>'multipart/form-data'));
echo 'Select a date for which you want to enter advisory data:<br>';
echo "<table>";


echo "<tr>";
echo "<td>";
echo form_label('Date','date');
echo "</td>";
echo "<td>";
$data_entry_date_data = array(
              	'name'      => 	'date',
              	'id'        => 	'date',
              	  'value'       => $date_final,
           		'class'		=> 	'datepicker'
              
            );
echo form_input($data_entry_date_data);



echo "</td>";
echo "</tr>";















echo "</table>"; 


echo "</div>";

echo '<div class="col-xs-9" id="form_text_area">';
echo "<input type='submit'  class='btn btn-primary' value='Next'/>";
 // cpoied from bottom

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
 
<?php








echo form_close();



	 ?>
	
<script type="text/javascript">
$(document).ready(function() {

    // assuming the controls you want to attach the plugin to 
    // have the "datepicker" class set
    $('input.datepicker').Zebra_DatePicker();

 });
</script>	

</body>
</html>