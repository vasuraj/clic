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



<!-- menu ends here -->

<div class="row" id='form_area'>

<div class="col-xs-12" id='form_input'>







	<?php

//  ****************************
       // get current addresss where to return after update

//*********************************

$encoded_url=$this->uri->segment(5);




// print_r($collected_agri_info);

//  ****************************
// get current addresss where to return after update
//*********************************


	 
$adv_agri_id=$this->uri->segment(3);
$selected_section=$this->uri->segment(4);

$return_to=$encoded_url;


$adv_agri_info=$this->model_advisory->get_adv_agri($adv_agri_id);


$final_category=$adv_agri_info[0]->category;
$name=$adv_agri_info[0]->name;

$npm_id=explode('+',$adv_agri_info[0]->npm_id);

$advice=$adv_agri_info[0]->control_text;
// print_r($adv_agri_info);


$this->db->select(array('npm_id','name','tname','icon')); 
    $this->db->from('npm');   
   
   	$result_npm= $this->db->get()->result();

     $this->db->select(array('pd_id','name','tname','icon')); 
 $this->db->from('agri_pd');   
   
    $result_agri_pd= $this->db->get()->result();

         $this->db->select(array('name_id')); 
 $this->db->from('adv_agri_pest_disease'); 
 $this->db->where('pest_disease_id',$adv_agri_id);
   
    $result_agri_linked_pd= $this->db->get()->result();

//echo $adv_agri_id;

$linked_id=$result_agri_linked_pd[0]->name_id;

//echo $linked_id;

$linked_id_explode=explode('+', $linked_id);

//print_r($linked_id_explode);



   //	print_r($result_npm);


echo form_open('advisory/store_update_advisory_agri/'.$adv_agri_id.'/'.$selected_section.'/'.$return_to,array('class'=>'form','enctype'=>'multipart/form-data'));

echo "<table style='margin-top:30px;'>";




echo "<tr>";
echo "<td>";
echo form_label('Pest/Disease','name_id');
echo "</td>";
echo "<td>";

foreach($result_agri_pd as $agri_pd_record)
{

echo "<div id='link_box'>
<img  src='".base_url()."assets/uploaded/img/thumb_".$agri_pd_record->icon."' />

<input type='checkbox' name='name_id[]' id='name_id[]' value='".$agri_pd_record->pd_id."'";

if(in_array($agri_pd_record->pd_id, $linked_id_explode))
{
  echo "checked";
}

echo "/>";

echo $agri_pd_record->name.'/ '.$agri_pd_record->tname;

echo "</div>";

}
echo "</td>";
echo "</tr>";






echo "<tr>";
echo "<td>";
echo form_label('Category','category');
echo "</td>";
echo "<td>";
$category_option_data = array(
			  'none'=>'--',
			  'pest'=>'pest',
              'disease'=>'disease',
                        
              'other'=>'other'
            );

echo form_dropdown('category',$category_option_data,$final_category);
echo "</td>";
echo "</tr>";








echo '<br>';

echo "<td>";
echo form_label('Name','name');
echo "</td>";
echo "<td>";
$name = array(
			  'name'        => 'name',
              'id'          => 'name',
              'value'	=>	$name,
            
              'size'        => '10',
              'style'       => 'width:400px; text-align:left; padding-left:20px;',
            );
echo form_input($name);

echo "</td>";
echo "</tr>";



echo "<tr>";
echo "<td>";
echo form_label('npm','npm_id');
echo "</td>";
echo "<td>";


foreach($result_npm as $npm_record)
{


echo "<div id='link_box'>
<img  src='".base_url()."assets/uploaded/img/thumb_".$npm_record->icon."' />

<input type='checkbox' name='npm_id[]'";


if(in_array($npm_record->npm_id, $npm_id))
{
	echo 'checked=checked';
}

echo  "id='npm_id' 



value='".$npm_record->npm_id."'/>";

echo $npm_record->name.'/ '.$npm_record->tname;

echo "</div>";

}
echo "</td>";
echo "</tr>";









echo '<tr><td>';
echo form_label('control','control_text');
echo '</td><td>';
echo '<span class="row">';

echo '<textarea name="control_text" id="content_2" ><p>'.trim($advice).'</p></textarea>';
echo display_ckeditor($ckeditor_2);
echo '</textarea> ';

echo '</span>';
echo '</td></tr>';








echo "</table>"; 


echo "</div>";

echo '<div class="col-xs-9" id="form_text_area">';

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
 <input type='submit' id='submit'  value='save' />
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