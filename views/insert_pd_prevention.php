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


 <div class="col-xs-12" id='header'>
<?php 


$return_to=$this->uri->segment(5);
// echo $return_to;
if(!isset($return_to))
{
include 'template/header_menu2.php';
}

?>
</div>
</div>


<!-- menu ends here -->

<div class="row content_area" id='form_area'>




<div class="row">

	<?php

$slide_type=$this->uri->segment(1);
$selected_section=$this->uri->segment(2);
$selected_id=$this->uri->segment(5);
$prevention_to_add=$this->uri->segment(3);

echo $selected_id;
echo $prevention_to_add;
if($slide_type=='agri_pd' )
{



$this->db->from('agri_pd_link');
$this->db->select('pd_npm_id');
$this->db->where('agri_pd_link_id',$selected_id);

$selected_npm_ids=$this->db->get()->result();

$selected_npm_id=$selected_npm_ids[0]->pd_npm_id;
}

if($slide_type=='livestock_pd' )
{



$this->db->from('livestock_pd_link');
$this->db->select(array('pd_prevention_id','pd_treatment_id'));
$this->db->where('livestock_pd_link_id',$selected_id);

$selected_npm_ids=$this->db->get()->result();

$selected_prevention_id=$selected_npm_ids[0]->pd_prevention_id;
$selected_treatment_id=$selected_npm_ids[0]->pd_treatment_id;

}




if($slide_type=='agri_pd' || $slide_type=='livestock_pd')
{

if($selected_section=='insert_pd_prevention')
{
	$selected_section='pd_prevention_id';
}
elseif ($selected_section=='insert_pd_prevention') {
	$selected_section='pd_prevention_id';
}

elseif ($selected_section=='insert_pd_treatment') {
	$selected_section='pd_treatment_id';
}


$sections=array('pd_prevention_id', 'pd_prevention_id', 'pd_treatment_id');
$key=array_search($selected_section,$sections);
}









$slide_text='';

$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);



if($slide_type=='agri_pd')
{

if($this->uri->segment(1)=='agri_pd')
{
	echo form_open('agri_pd/store_agri_pd_slides/'.$prevention_to_add.'/'.$selected_id.'/'.$encoded_url,array('class'=>'form', 'enctype'=>'multipart/form-data'));
}


elseif ($this->uri->segment(1)=='agri_pd' && isset($sections[$key+1])) 
{
	
echo form_open('agri_pd/store_agri_pd_slides/'.$sections[$key].'/'.$selected_id.'/'.$encoded_url,array('class'=>'form', 'enctype'=>'multipart/form-data'));


}

}


if($slide_type=='livestock_pd')
{

if($this->uri->segment(1)=='livestock_pd')
{
	echo form_open('livestock_pd/store_livestock_pd_slides/'.$prevention_to_add.'/fresh/'.$selected_id.'/'.$encoded_url,array('class'=>'form', 'enctype'=>'multipart/form-data'));
}


elseif ($this->uri->segment(1)=='livestock_pd' && isset($sections[$key+1])) 
{
	
echo form_open('livestock_pd/store_livestock_pd_slides/'.$sections[$key].'/fresh/'.$selected_id.'/'.$encoded_url,array('class'=>'form', 'enctype'=>'multipart/form-data'));


}

}



echo "<table>";



echo '<tr><td>
<span class="row">';

echo '<input type="file" name="slide_media_files[]" multiple class="upload" size="20" />';

echo '</span>';
echo '</td>';


if($slide_type=='agri_pd')
{
if($this->uri->segment(1)=='agri_pd')
{
	
echo "<td><a id='next_to' href='".base_url()."index.php/agri_pd/insert_pd_npm/fresh/".$selected_npm_id."'>Next  to link npm</a></td>";
}


elseif ($this->uri->segment(1)=='agri_pd' && isset($sections[$key+1])) 
{
	
echo "<td><a id='next_to' href='".base_url()."index.php/agri_pd/".$sections[$key+1]."/fresh/".$selected_id."'>Next  to ".$sections[$key+1]."</a></td>";

}
}

if($slide_type=='livestock_pd')
{
if($this->uri->segment(1)=='livestock_pd')
{
	
echo "<td><a id='next_to' href='".base_url()."index.php/livestock_pd/insert_pd_prevention/fresh/".$selected_prevention_id."'>Next  to link prevention</a></td>";
}


elseif ($this->uri->segment(1)=='livestock_pd' && isset($sections[$key+1])) 
{
	
echo "<td><a id='next_to' href='".base_url()."index.php/livestock_pd/".$sections[$key+1]."/fresh/".$selected_id."'>Next  to ".$sections[$key+1]."</a></td>";

}
}





echo "</tr></table>"; 



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



if($this->uri->segment(1)=='agri_pd')
{
 echo "<input type='submit' id='submit' value='";

 if($selected_section=="insert_pd_prevention" )
{
echo 'Save prevention';	
}
 elseif($selected_section=="insert_pd_prevention" )
{
echo 'Save prevention';	
}

 elseif($selected_section=="insert_pd_treatment" )
{
echo 'Save prevention';	
}
else
{
echo 'update';		
}
echo  "'/>";
}

if($this->uri->segment(1)=='livestock_pd')
{
 echo "<input type='submit' id='submit' value='";

 if($selected_section=="insert_pd_prevention" )
{
echo 'Save prevention';	
}
 elseif($selected_section=="insert_pd_prevention" )
{
echo 'Save prevention';	
}

 elseif($selected_section=="insert_pd_treatment" )
{
echo 'Save prevention';	
}
else
{
echo 'update';		
}
echo  "'/>";
}



if($this->uri->segment(1)=='agri_pd')
{
 echo "<input type='submit' id='submit' value='";

 if($prevention_to_add=="fresh" )
{
echo 'Save prevention';	
}
else
{
echo 'update prevention';		
}
echo  "'/>";
}


elseif($this->uri->segment(1)=='livestock_pd')
{
 echo "<input type='submit' id='submit' value='";

 if($prevention_to_add=="fresh" )
{
echo 'Save prevention';	
}
else
{
echo 'update prevention';		
}
echo  "'/>";
}


?>




<?php








echo form_close();



	 ?>
	

	

</body>
</html>