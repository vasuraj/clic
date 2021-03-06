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


<div class="row " id='header'>

<!-- menu starts here -->


 <div class="col-xs-12" id='header'>
<?php include 'template/header_menu2.php';?>
</div>
</div>


<?php 
echo $this->pagination->create_links();  
$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);


?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 
$selected_nutrition_difficiency_symptom=$this->uri->segment(3);


$agri_linked=array();
if($selected_nutrition_difficiency_symptom!="")
{

$this->db->from('nutrition_difficiency_symptom');
$this->db->where('nutrition_difficiency_symptom_id',$selected_nutrition_difficiency_symptom);
$nutrition_difficiency_symptom_info=$this->db->get()->result();
//print_r($nutrition_difficiency_symptom_info);
$agri_linked=array();
if(!empty($nutrition_difficiency_symptom_info))
{
$nutrition_name=$nutrition_difficiency_symptom_info[0]->nutrition_name;
$agri_id=$nutrition_difficiency_symptom_info[0]->agri_id;

}
}
if(!isset($name))
	{
		$nutrition_name='';
	}

	if(!isset($agri_id))
	{
		$agri_id='';
	}










$final_nutrition='Nitrogen';


$return_to= $this->uri->segment(4);
if(isset($return_to))
{
echo form_open('soil/store_nutrition_difficiency_symptom/'.$selected_nutrition_difficiency_symptom.'/'.$encoded_url,array('class'=>'form','enctype'=>'multipart/form-data'));
}
else
{
echo form_open('soil/store_nutrition_difficiency_symptom/'.$selected_nutrition_difficiency_symptom.'/'.$encoded_url,array('class'=>'form','enctype'=>'multipart/form-data'));

}

echo "<table>";

















echo "<tr>";
echo "<td>";
echo form_label('nutrition','nutrition');
echo "</td>";
echo "<td>";
$nutrition_property = array(
			  'none'=>'--',
'Nitrogen'=>'Nitrogen',
'Magnesium'=>'Magnesium',
'Phosphorous'=>'Phosphorous',
'Potassium'=>'Potassium',

'Calcium'=>'Calcium',
'Sulphur'=>'Sulphur',
'Magnesium'=>'Magnesium',
'Iron'=>'Iron',
'Boron'=>'Boron',
 'Manganese'=>'Manganese',
 'Zinc'=>'Zinc',
'Copper'=>'Copper',
 'Molybdenum'=>'Molybdenum',
'Nickel'=>'Nickel',
'Chlorine'=>'Chlorine',

              'other'=>'other'
            );

echo form_dropdown('nutrition',$nutrition_property,$final_nutrition);


echo ' Difficiency in';


$this->db->from('agri');
$this->db->select(array('agri_id','name','tname','icon'));
$result_agri=$this->db->get()->result();



echo '<tr><td>';
echo form_label('select crops','agri_id');
echo '</td>';
echo "<td>";

foreach($result_agri as $agri_record)
{

//echo $agri_record->agri_id;

echo "<div id='link_box'>
<img  src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$agri_record->icon)."' />

<input type='radio' ";


echo "name='agri_id[]' id='agri_id' value='".$agri_record->agri_id."'";




if(in_array($agri_record->agri_id,$agri_linked))
{
  echo "checked";
}

echo ">";

echo $agri_record->name.'/ '.$agri_record->tname;

echo "</div>";

}
echo "</td>";
echo "</tr>";




/*



echo '<tr><td>';
echo form_label('Subsidy link','subsidy_link');
echo '</td><td>';
echo '<span class="row">';


echo '<input type="file" style="width:auto;" name="subsidy_link[]"  class="upload"  />';


echo '</span>';
echo '</td></tr>';


*/







echo "</table>"; 





echo "</div>";

//echo '<div class="col-xs-9" id="form_text_area">';

//echo '<textarea name="other_info" id="content_2" ><p>'.trim($other_info).'</p></textarea>';
//echo display_ckeditor($ckeditor_2);

 ?>

<?php
// echo '<textarea name="content_2" id="content_2" >';

// if($selected_nutrition_difficiency_symptom!='')
// {
// echo $nutrition_difficiency_symptom_info[0]->notes;
// }
// echo '</textarea>';

//  echo display_ckeditor($ckeditor_2); 
// echo '</textarea> ';
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
	

	<script>
$(function(){

$("#home").addClass('active');

});

</script>


</body>
</html>