<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


	<?php	include 'assets/css/template_css.php'; 	?>

	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>
	
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery/jquery-1.8.2.min.js'; ?>"></script>


	<link rel="stylesheet" href="<?php  echo base_url().'assets/css/default.css'; ?>" type="text/css">
	<!--
	<script type="text/javascript" src="<?php// echo base_url().'assets/js/jquery.reveal.js'; ?>"></script>

	<link rel="stylesheet" href="<?php // echo base_url().'assets/css/model_window.css'; ?>" type="text/css">
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_agri_main_info.css'; ?>">

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">


<link href="<?php echo base_url();?>assets/css/hover_effect/normalize.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/hover_effect/component.css" rel="stylesheet" type="text/css" />


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/sm/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="<?php echo base_url();?>assets/css/sm/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />


		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
	



<!-- #main-menu config - instance specific stuff not covered in the theme -->
<style type="text/css">
html,body{
	
}

	#main-menu {
		position:relative;
		z-index:9999;
		width:auto;
	}
	#main-menu ul {
		width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
	}



#notification
{


	margin:auto;
	margin-top:50px;
	width:400px;
	padding:60px;
	text-align:center;
	border-radius:10px;
	color:#fff;
	font-weight: bold;
	border:1px solid #fff;
	box-shadow: 0px 1px 1px #555;
	font-size: 14px;
	background:rgba(0,0,0,0.2);
	text-shadow:0px 1px 1px #000;


}


a#notification_button
{

background: #c7e89d; /* Old browsers */
background: -moz-linear-gradient(top,  #c7e89d 1%, #7dcc78 45%, #41a048 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#c7e89d), color-stop(45%,#7dcc78), color-stop(100%,#41a048)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* IE10+ */
background: linear-gradient(to bottom,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c7e89d', endColorstr='#41a048',GradientType=0 ); /* IE6-9 */

display: block;
margin:auto;
margin-top: 10px;
padding:3px 0px;
border-radius:30px;
width:150px;
text-decoration: none;
color:#033;
font-weight: 100;


box-shadow: 0px 1px 1px #050;

}

a#notification_button:hover
{

background: #bdefa2; /* Old browsers */
background: -moz-linear-gradient(top,  #bdefa2 0%, #8aea8f 46%, #4fc157 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bdefa2), color-stop(46%,#8aea8f), color-stop(100%,#4fc157)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* IE10+ */
background: linear-gradient(to bottom,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bdefa2', endColorstr='#4fc157',GradientType=0 ); /* IE6-9 */

}

div.notification_red
{
	background:red;
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



<script>
  

$(function() {            	


$('a.main_delete').click(function(e)
{
	e.preventDefault();
	var button_value= $(this).attr('href');


   var result=window.confirm("Are You Sure You Want to Delete?");

  
            if(result == true) 
            {
                //alert(button_value);

                location.href=button_value;
            }
            else 
            {
               // alert('Nope.');
            }
      
        




      });
});

</script>

<script>
	

$(function()
	{

var screen_size=$(window).height();

	$('iframe').css("height",(screen_size));


$( window ).resize(function() {

 var screen_size=$( window ).height();


	$('iframe').css("height",(screen_size));


});

	});


</script>

</head>
<body>

	<?php
			$server=$_SERVER['HTTP_HOST'];
			//echo $server;
			$request_url=$_SERVER['REQUEST_URI'];
			//echo $request_url;

			$full_address=$server.$request_url;
			$encoded_url= base64_encode($full_address);
	?>
	
	

<!-- ********************************************************************************************

Header section starts here

*************************************************************************************************-->

<div class="row col-xs-12" id='header'>

<div class="row">
	
	<?php
	/*
echo $livestock_id;
echo "<br>";
echo $pd_id;
echo "<br>";

echo $category;
echo "<br>";

echo 
echo "<br>";

echo $pd_symptom_id;
echo "<br>";

echo $pd_npm_id;
*/

$this->db->from("livestock_pd");
$this->db->select("intro");
$this->db->where('pd_id',$this->uri->segment(3));
$result_pd_intro_id=$this->db->get()->result();
$pd_intro_id=$result_pd_intro_id[0]->intro;

$pd_symptom_id=$this->uri->segment(7);

$this->db->from('livestock_pd_link');
$this->db->select('pd_treatment_id');
$this->db->where("pd_symptom_id",$pd_symptom_id);
$result_livestock_treatment_id=$this->db->get()->result();
$pd_preventaion_id=$this->uri->segment(8);

$pd_treatment_id=$result_livestock_treatment_id[0]->pd_treatment_id;


echo "<ul id='tiny_nav'>

	<li class='tiny_selected'><a id='basic_information' target='slides' href='".base_url()."index.php/livestock/view_slides/".$pd_id."/".$pd_intro_id."/intro/pages'>Basic Information</a></li>
	<li><a id='symptom' target='slides' href='".base_url()."index.php/livestock_pd/view_livestock_pd_symptom/".$pd_symptom_id."/pages'>Symptom</a></li>
	<li><a id='control' target='slides' href='".base_url()."index.php/livestock_pd/view_livestock_pd_prevention/".$pd_prevention_id."/pages'>Control & treatment</a></li>
	
</ul>";



?>


</div>

<div class="row">
	<?php
	echo "<iframe style='margin-left:2%; width:100%; min-height:450px;'name='slides' id='slides' src='".base_url()."assets/blank_iframe_text_pd.html'></iframe>";
	?>
</div>


</div>


<script>
$(document).ready(function() {

	//$(" li a#slide_id").parent().addClass("selected");
	//alert($('a#basic_information').attr('href'));
	//alert('going to click');
	$("a#basic_information").click();


var text = $("a#basic_information").attr('href');


$('iframe').attr('src',text);


//	alert('clicked');

	//alert($('a#basic_information').val('href'));
    $('#tiny_nav li a').click(function(d)
    {
    	 $('li.tiny_selected').removeClass('tiny_selected')
         $(this).parent('li').addClass("tiny_selected");
     });



   

});
</script>


</body>
</html>