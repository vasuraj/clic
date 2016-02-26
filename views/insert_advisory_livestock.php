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
<?php 
echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 
$adv_main_id=$this->uri->segment(3);
$selected_section=$this->uri->segment(4);
$adv_livestock_id=$this->uri->segment(5);


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
    $this->db->where("adv_agri_id", $adv_livestock_id);
   	$result_livestock= $this->db->get()->result();

$livestock_name=$result_livestock[0]->name;
$livestock_id=$result_livestock[0]->name_id;




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

   //	print_r($result_npm);


echo form_open('advisory/store_advisory_livestock/'.$adv_main_id.'/'.$selected_section.'/'.$adv_livestock_id,array('class'=>'form','enctype'=>'multipart/form-data'));

echo 'insert informatioin about <b>'.$livestock_name.'</b> in advisory for Date: <b>'.$date_final.'</bl>';


echo "<table style='margin-top:30px;'>";

/*
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


*/






echo "<tr>";
echo "<td>";
echo form_label('Name','name');
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


echo "<a id='next_to' href='".base_url()."index.php/advisory/insert_advisory_sub/".$adv_main_id."/".$sections[$key]."' class='btn btn-success' > back to new ".$sections[$key]."</a>";


echo "</td>";


echo "</tr>";


/*
echo "<tr>";
echo "<td>";
echo form_label('npm','npm_id');
echo "</td>";
echo "<td>";

foreach($result_npm as $npm_record)
{


echo "<div style='width:80px;height:230px; overflow:hidden; border:1px solid gray;  display:inline-block;

margin:5px; '>
<img style='margin:auto; width:80px;height:70px;' src='".base_url()."assets/uploaded/img/thumb_".$npm_record->icon."' />

<input type='checkbox' name='npm_id[]' id='npm_id' value='".$npm_record->npm_id."'/>";

echo $npm_record->name.'/ '.$npm_record->tname;

echo "</div>";

}
echo "</td>";
echo "</tr>";

*/







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
 <input type='submit'  id='submit' value='save' />
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

