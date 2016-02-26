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




<style type="text/css">


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
	margin: 20px;
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
	height:340px;
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

	 
$selected_livestock=$this->uri->segment(3);
$return_to=$this->uri->segment(4);



$selected_livestock_info=$this->model_livestock->get_livestock($selected_livestock);

//print_r($selected_livestock_info);


foreach ($selected_livestock_info as $value) {
	 
        $name =$value->name;
       $tname = $value->tname;
         $icon = $value->icon;
       $category = $value->category;
      
     
     //   $this->db->insert('livestock', $this);
	
}







if(!isset($name))
	{
		$name='';
	}

	if(!isset($tname))
	{
		$tname='';
	}




$final_category=$category;


echo form_open('livestock/store_updated_livestock/'.$selected_livestock.'/'.$return_to,array('class'=>'well form','enctype'=>'multipart/form-data'));
echo "<table>";



echo "<tr>";
echo "<td></td><td>";

if(isset($icon))
{
	echo "<img STYLE='margin-left:4px; BORDER:5px solid #ddd; box-shadow:0px -1px 4px black;' src='".base_url()."assets/uploaded/img/thumb_".$icon."'>";
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
			              
              'all'=>'all'
            );

echo form_dropdown('category',$category_option_data,$category);
echo "</td>";
echo "</tr>";

echo '<tr><td>';


echo form_label('Upload Icon','name');
echo '</td><td>';

echo '<span class="row">';

echo '<input type="file" style="width:auto;" name="slide_media_files[]"  class="upload "  />';

echo '</span>';
echo "<FONT STYLE='color:#369; text-shadow:0px -1px 0px BLUE;'>IF YOU WANT TO UPDATE ICON UPLOAD HERE</FONT>";
echo '<input type="reset" value="Reset"/>';
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
 <input type='submit'  class="btn btn-primary" value='UPDATE'/>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>