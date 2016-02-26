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
<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">


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


<style type="text/css">



#success,#duplicate{
margin: auto;

padding:20px 50px;
border:2px solid #050;
color:white;
text-shadow:0px 1px 1px black,
0px -1px 1px #050;
text-align:center;
font-family: arial;
width:500px;
border-radius:20px;
box-shadow:0px 2px 2px  black,
0px 3px 0px #fff;

}


#success
{

background:green;

}

#duplicate
{

background:red;

}





#spnSeconds {

    font-size:18px;
    color:white;
    text-shadow:0px 1px 1px black;
}

#message_area{
display:block;
	margin:auto;
	
}

</style>




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












</head>
<body onload="startTime()">
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

<script>


$(document).ready(function(){
$("#msg_area").hide().fadeIn(2000).delay(2000).fadeOut(1000);
});






</script>


<div class="row" id='header'>

<!-- menu starts here -->


 <div class="col-xs-12" id='header'>
<?php include 'template/header_menu.php';?>
</div>
</div>

<!-- menu ends here -->

<div class="row" id='message_area'>
<div class="row">
<?php
//echo $msg_id;


if($msg_id==1)
{
	$div_id='success';
	$msg='Success Stored in Database';
}
if($msg_id==0)
{
	$div_id='duplicate';
	$msg='Already a entry exist';
}


echo "<div id='msg_area'>";

	echo '<div id="'.$div_id.'"><h2>'.$msg.'</h2>

 <h4>You are going to Redirect to Home page in <span id="spnSeconds">5</span> seconds.</h4> 
<script>

$(document).ready(function () {
    window.setInterval(function () {
        var iTimeRemaining = $("#spnSeconds").html();
        iTimeRemaining = eval(iTimeRemaining);
        if (iTimeRemaining == 1) {
         location.href = "'.base_url().'";
        } else {
            $("#spnSeconds").html(iTimeRemaining - 1);
        }
    }, 1000);
});
</script>
</div>
';
echo "</div>";

	//header( "refresh:5;url=".base_url() );
		

?>
</div>
</div>

</body>
</html>