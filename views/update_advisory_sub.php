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


<style>
	
html, body
{
	background:none;
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



</div>
<?php 
echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 




$adv_sub_info=$this->model_advisory->get_adv_sub($adv_agri_id);


//print_r($adv_sub_info);

if($adv_sub_info[0]->name!='none')
{
$name=$adv_sub_info[0]->name;
}
else
{
	$name='';
}

$name_id=array();

$advice=$adv_sub_info[0]->advice;


$name_id=explode('+',$adv_sub_info[0]->name_id);




echo form_open('advisory/store_update_advisory_sub/'.$adv_agri_id.'/'.$category.'/'.$return_to,array('class'=>'form','enctype'=>'multipart/form-data'));





echo "<table style='margin-top:30px;'>";



echo "<tr>";
echo "<td>";
echo form_label('New Crop','name');
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


$this->db->from('agri');
$this->db->select(array('agri_id','name','tname','icon'));
$this->db->where('category',$category);
$result_agri=$this->db->get()->result();


if(!empty($result_agri))
{
echo "<tr>";
echo "<td>";
echo form_label($category.'s from database','name_id');
echo "</td>";
echo "<td>";




//print_r($result_agri);
//print_r($name_id);
foreach($result_agri as $agri_record)
{

	//print_r($agri_record);
	echo "<div id='link_box'>";
	echo "<img src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ', '_',$agri_record->icon)."' />";
	//echo $agri_record->agri_id;
echo "<input type='checkbox' name='name_id[]' ";

if(in_array($agri_record->agri_id,$name_id))
{
	echo 'checked=checked';
	echo $agri_record->agri_id;
}

echo " value='".$agri_record->agri_id."'>";



echo $agri_record->name."<br>";
echo $agri_record->tname;
echo '</input>';
echo "</div>";
}


echo "</td>";
echo "</tr>";

}



echo '<tr><td>';
echo form_label('Advice','advice');
echo '</td><td>';
echo '<span class="row">';

echo '<textarea name="advice" id="content_2" ><p>'.trim($advice).'</p></textarea>';
echo display_ckeditor($ckeditor_2);
echo '</textarea> ';

echo '</span>';
echo '</td></tr>';








echo "</table>"; 


echo "</div>";

echo '<div class="col-xs-9" id="form_text_area">';
echo "<input id='submit' type='submit' value='update'>";

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
	<!--

<script type="text/javascript">
$(document).ready(function() {

    // assuming the controls you want to attach the plugin to 
    // have the "datepicker" class set
    $('input.datepicker').Zebra_DatePicker();

 });
</script>	

-->
</body>
</html>