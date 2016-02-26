<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html lang="en">
<head>

 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

	<meta charset="UTF-8">
	<link rel="shortcut icon" href="assets/img/logo/cic_logo.png" type="image/x-icon" />
	
	<title>Climate Information Center</title>

	<?php  include 'assets/css/template_css.php'; ?>

	<link rel='stylesheet' type="text/css" href="bootstrap3/dist/css/bootstrap.min.css"/>
 	<script type="text/javascript" src="assets/js/jquery/jquery-1.8.2.min.js"></script>

 	
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

	<!--
	<link rel='stylesheet' type="text/css" href="bootstrap3/dist/css/bootstrap-theme.min.css"/>
	
	-->
	<!--

	<link rel="stylesheet" type="text/css" href="assets/css/easyui.css">

	-->

<!--

	<link rel="stylesheet" type="text/css" href="assets/css/skin/icon.css">

	-->

	<link type="text/css" href="assets/css/main_menu/main_menu.css" rel="stylesheet" />
   
  
<!--


	<link type="text/css" href="assets/css/colorbox/colorbox.css" rel="stylesheet" />

<script type="text/javascript" src="assets/js/colorbox/jquery.colorbox-min.js"></script>
	
-->
	
 	

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">
<!--
	<script type="text/javascript" src="assets/js/jquery.easyui.min.js"></script>

		<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
<!--

	<link rel="stylesheet" type="text/css" href="assets/css/shadowbox.css">
	<script type="text/javascript" src="assets/js/shadowbox.js"></script>

-->

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
	
<!--
<link href="<?php echo base_url();?>assets/css/hover_effect/normalize.css" rel="stylesheet" type="text/css" />
-->

<link href="<?php echo base_url();?>assets/css/hover_effect/component.css" rel="stylesheet" type="text/css" />
<!--
<link href="<?php echo base_url();?>assets/js/modernizr.custom.js" rel="stylesheet" type="text/css" />
-->



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


<!--	
	
   
	<script type="text/javascript">
	Shadowbox.init();
	</script>


	-->



<style type="text/css">

img.sb-player
{
	width:800px;
}

@media print { .dontprint { display:none; } }
@media screen { .dontshow { display:none; } }


</style>


<!--

<script>
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('time').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>

-->






</head>
<body >
<!-- <body onload="startTime()">  -->
<div class="row " id='header'>



<!-- menu starts here -->



<div class="col-xs-12 dontprint" id='header' >



<?php include 'header_menu2.php';?>



</div>




<!-- menu ends here -->



 

<script>
/*	
	if (typeof jQuery != 'undefined') {
 
   alert("jQuery library is loaded!");
 
}
else{
 
    alert("jQuery library is not found!");
 
}
*/
</script>