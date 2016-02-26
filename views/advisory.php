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
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.confirmon.min.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.confirmon.css'; ?>" type="text/css">


<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">




<script>


            $(function() {
           	

	$('.main_delete').click(
function(e)
{
	e.preventDefault();
	//selected_delete_link = $(this).attr('href');
	//alert(selected_delete_link) ;  



//alert($(this).attr('href'));

$('.current_selected').removeClass('current_selected');

$(this).addClass('current_selected');


 
//var text_link=$('.current_selected').attr('href');
//alert(text_link);



//alert($(this).attr('class'));


       var v=window.confirm('Are you sure?');
//alert(v);

if (v == true) {
              //  alert($(this).attr('href'));
            
location.href=$(this).attr('href');

            }
            else
            {
            	//alert('aborted');
            };

               
          
                
            });
});



        </script>












</head>
<body>

<!-- menu starts here -->

<div class="row" id='header'>
	<div class="col-xs-2" id='logo'>
		<img src="<?php echo base_url();?>assets/img/logo/cic_logo.png" alt="cic_logo">
		<span id='logo_text'>CIC</span>
	</div>


 <div class="col-xs-10" id='header'>
<?php include 'template/header_menu.php';?>
</div>

</div>

<?php



include "/includes/content_advisory.php";

//include "/includes/sidebar.php";



//include "includes/footer.php";


?>