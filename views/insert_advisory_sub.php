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


<link rel="stylesheet" href="<?php echo base_url().'assets/css/cic_form.css'; ?>" type="text/css">


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/sm/sm-core-css.css" rel="stylesheet" type="text/css" />

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

<?php

$return_to=$this->uri->segment(5);


if($return_to=='')
{

echo "<div class='col-xs-12' id='header'>";
include 'template/header_menu2.php';
echo "</div>";
}


 ?>


<?php 
echo "</div>";




?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 
$adv_main_id=$this->uri->segment(3);
$selected_section=$this->uri->segment(4);




 $path_slice = explode("/", base64_decode($return_to));

//print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}






$sections=array('crop', 'vegetable', 'fruit', 'livestock');

$adv_main_info=$this->model_advisory->get_adv_main($adv_main_id);

$this->db->select(array($selected_section,'date')); 
    $this->db->from('adv_main');   
    $this->db->where("adv_main_id", $adv_main_id);
   	$result= $this->db->get()->result();


$date=$result[0]->date;


$myDateTime = DateTime::createFromFormat('Y-m-d', $date);
$date_final = $myDateTime->format('F d, Y');



//print_r($result);

$key=array_search($selected_section,$sections);

if(!isset($name))
	{
		$name='';
	}

	if(!isset($advice))
	{
		$advice='';
	}


if($selected_section !='crop')
{
$final_category=$selected_section;
}
else{
$final_category='crop';
}


echo form_open('advisory/store_advisory_sub/'.$adv_main_id.'/'.$selected_section,array('class'=>'form','enctype'=>'multipart/form-data'));



echo 'insert informatioin in advisory for Date: <b>'.$date_final.'</b>';
echo "<table>";



echo "<tr>";
echo "<td>";
echo form_label('New '.$selected_section,'name');
echo "</td>";
echo "<td>";
$name = array(
			  'name'        => 'name',
              'id'          => 'name',
              'value'	=>	$name
            );
echo form_input($name);



if($selected_section!='livestock')
{

		echo "<a  id='next_to' href='".base_url()."index.php/advisory/insert_advisory_sub/".$adv_main_id."/".$sections[$key+1]."' >next to ".$sections[$key+1]."</a>";
	echo "<a id='next_to'  href='".base_url().$return_to_path."'  >back to advisory</a></td>";
}
else
{
echo "<a id='next_to'  href='".base_url()."index.php/advisory/insert_advisory'  >Next To New Date</a></td>";	
}


echo "</tr>";


$this->db->from('agri');
$this->db->select(array('agri_id','name','tname','icon'));
$this->db->where('category',$final_category);
$result_agri=$this->db->get()->result();


if(!empty($result_agri))
{
echo "<tr>";
echo "<td>";
echo form_label($final_category.'s from database','name_id');
echo "</td>";
echo "<td>";




//print_r($result_agri);

foreach($result_agri as $agri_record)
{

	//print_r($agri_record);
	echo "<div id='link_box'>";
	echo "<img src='".base_url()."assets/uploaded/img/thumb_".str_replace(" ","_",$agri_record->icon)."' />";
echo "<input type='checkbox' name='name_id[]' value='".$agri_record->agri_id."'>";



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
 <input type='submit'  id='submit' value='save in <?php echo $selected_section;?>'/>
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