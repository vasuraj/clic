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

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'; ?>" type="text/css"/>


		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">


<link rel="stylesheet" href="<?php echo base_url().'assets/css/cic_form.css'; ?>" type="text/css">


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url().'bootstrap3/dist/js/bootstrap.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">



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

<?php $return_to=$this->uri->segment(7); 
 $return_to_what=$this->uri->segment(6); 

//echo $return_to_what;

if($return_to=='' || $return_to=='crop' || $return_to=='vegetable' || $return_to=='fruit'
 || $return_to=='livestock')
{



echo "<div class='col-xs-12' id='header'>";
include 'template/header_menu2.php';
echo "</div>";
}


 ?>

</div>





<?php 

//echo $return_to;
//echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 
$adv_main_id=$this->uri->segment(3);
$selected_section=$this->uri->segment(4);
$adv_agri_id=$this->uri->segment(5);



if($this->uri->segment(6)!='')
{
	$final_category=$this->uri->segment(6);
}
else
{
$final_category='pest';
}


$sections=array('crop', 'vegetable', 'fruit', 'livestock');

$adv_main_info=$this->model_advisory->get_adv_main($adv_main_id);

$this->db->select(array($selected_section,'date')); 
    $this->db->from('adv_main');   
    $this->db->where("adv_main_id", $adv_main_id);
   	$result= $this->db->get()->result();


$date=$result[0]->date;

$this->db->select(array('name','name_id')); 
    $this->db->from('adv_sub');   
    $this->db->where("adv_agri_id", $adv_agri_id);
   	$result_agri= $this->db->get()->result();

$agri_name=$result_agri[0]->name;
$agri_id=$result_agri[0]->name_id;




$myDateTime = DateTime::createFromFormat('Y-m-d', $date);
$date_final = $myDateTime->format('F d, Y');



// print_r($result);

$key=array_search($selected_section,$sections);

if(!isset($name))
	{
		$name='';
	}

	if(!isset($advice))
	{
		$advice='';
	}


$this->db->select(array('npm_id','name','tname','icon')); 
    $this->db->from('npm');   
   
   	$result_npm= $this->db->get()->result();

 $this->db->select(array('pd_id','name','tname','icon')); 
 $this->db->from('agri_pd');   
   
   	$result_agri_pd= $this->db->get()->result();

   //	print_r($result_npm);

if($return_to_what!='insert_adv_agri_later')
{
echo form_open('advisory/store_advisory_agri/'.$adv_main_id.'/'.$selected_section.'/'.$adv_agri_id,array('class'=>'form','enctype'=>'multipart/form-data'));
}
else
{
echo form_open('advisory/store_advisory_agri/'.$adv_main_id.'/'.$selected_section.'/'.$adv_agri_id.'/'.$return_to_what.'/'.$return_to,array('class'=>'form','enctype'=>'multipart/form-data'));
}
if($return_to!='' || $return_to!='crop' || $return_to!='vegetable' || $return_to!='fruit'
 || $return_to!='livestock')
{
	if($return_to_what!='insert_adv_agri_later')
{
	if($sections[$key+1]=='veg')
	{
	$sections[$key+1]='vegetable';	
	}
	echo "<a  href='".base_url()."index.php/advisory/insert_advisory_sub/".$adv_main_id."/".$sections[$key+1]."' id='next_to'  >next to ".$sections[$key+1]."</a>";	
}}
else
{

}
if($return_to_what!='insert_adv_agri_later')
{
echo "<a  href='".base_url()."index.php/advisory/insert_advisory_sub/".$adv_main_id."/".$sections[$key]."' id='next_to' > back to new ".$sections[$key]."</a>";
}

echo 'insert informatioin about <b>'.$agri_name.'</b> in advisory for Date: <b>'.$date_final.'</bl>';
echo "<table >";









echo "<tr>";
echo "<td>";
echo form_label('Pest/Disease','name_id');
echo "</td>";
echo "<td>";

foreach($result_agri_pd as $agri_pd_record)
{


echo "<div id='link_box'>
<img  src='".base_url()."assets/uploaded/img/thumb_".$agri_pd_record->icon."' />

<input type='checkbox' name='name_id[]' id='pd_checkbox' value='".$agri_pd_record->pd_id."'/>";

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
echo "Select a category and write new pest/ disease name in field below if not in above list <br>";

$category_option_data = array(
			  'none'=>'--',
			  'pest'=>'pest',
              'disease'=>'disease',
                        
              'other'=>'other'
            );

echo form_dropdown('category',$category_option_data,$final_category);
echo "</td>";
echo "</tr>";









echo "<tr>";
echo "<td>";
echo form_label('Name','name');
echo "</td>";
echo "<td>";
$name = array(
			  'name'        => 'name',
              'id'          => 'name',
              'value'	=>	$name,
             'class'=> 'validate[required]'
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

<input type='checkbox' name='npm_id[]' id='npm_id' value='".$npm_record->npm_id."'/>";

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
       // $("form.form").validationEngine('attach');
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
 <input type='submit'  id='submit' value='save' />
<?php








echo form_close();



	 ?>
	
<script type="text/javascript">
$(document).ready(function() {

    // assuming the controls you want to attach the plugin to 
    // have the "datepicker" class set
    //	here not needed so deactivated
    //$('input.datepicker').Zebra_DatePicker();

var submit_button=$('input#submit');

//var pd_checkbox=$('input#pd_checkbox:checked');
//alert(pd_checkbox.length);
//var di = $('input#pd_checkbox');

$('form').submit(function(e){
e.preventDefault();
var pd_checkbox=$('input#pd_checkbox[type=checkbox]:checked');
var selected_category=$( "select[name=category] option:selected" ).text();
pd_checkbox_checked=pd_checkbox.length;
//alert(pd_checkbox_checked+'box checkd');

if (pd_checkbox.length > 0)
{
 $("form").unbind('submit'); 

}
else if(pd_checkbox.length == 0 && ($('input#name').val()=='' || selected_category=='--'))
{
	//BootstrapDialog.alert('Either select a pest/disease from list or enter a new pest/disease name and category');
  //alert('either select a pest/disease from list or enter a new pest/disease name and category');


  var $textAndPic = $('<div style="text-align:center;"></div>');
        $textAndPic.append('Either select a pest/disease from list or enter a new pest/disease name and category<br>');
        $textAndPic.append('<img  style="margin:10px; box-shadow:0px 5px 5px -3px #888;      	border-radius:5px;" src="<?php echo base_url(); ?>assets/img/dialog/pd_name_category.png" />');
        
        BootstrapDialog.show({
            title: 'Guess who that is',
            message: $textAndPic,
            buttons: [ {
                label: 'I will do that',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }]
        });
}
else
{
	$("form").unbind('submit');
	submit_button.click();
}



var npm_checkbox=$('input#npm_id[type=checkbox]:checked');
npm_checkbox_checked=npm_checkbox.length;





});


 });
</script>	

</body>
</html>