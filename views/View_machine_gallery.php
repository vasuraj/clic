<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


	<?php	include 'assets/css/template_css.php'; 	?>

	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>
	
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.10.2.min.js'; ?>"></script>

	<link rel="stylesheet" href="<?php  echo base_url().'assets/css/default.css'; ?>" type="text/css">
	<!--
	<script type="text/javascript" src="<?php// echo base_url().'assets/js/jquery.reveal.js'; ?>"></script>

	<link rel="stylesheet" href="<?php // echo base_url().'assets/css/model_window.css'; ?>" type="text/css">
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_agri_main_info.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/machine_inner_info.css'; ?>">

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">
<!-- <link rel="stylesheet" href="<?php echo base_url().'assets/css/attached_link.css'; ?>" type="text/css"> -->


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox/html5lightbox.js"></script>



	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
	

<!-- <link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" /> -->
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


<script type="text/javascript">
   

$(document).ready(function() {

	
    $('.popup').fancybox({

    'fitToView' : false,
    'transitionIn'    : 'none',
      'transitionOut'   : 'none'

      });



  $(".popup").fancybox({
       helpers: {
          title : {
            type : 'outside'
          },
          overlay : {
            speedOut : 0
          }
        }
      });


/*
  $('.img_gallery').fancybox({

    

      });


*/
  $(".img_gallery").fancybox({

  	'fitToView' : true,
    'transitionIn'    : 'none',
      'transitionOut'   : 'none',
       helpers: {
          title 	: {  type : 'outside'     },
         
          overlay 	: { speedOut : 0         },
           buttons	: {}
        }
      });



  $('.fancybox').fancybox({

    'autoDimensions'  : true,
    'height' : 550,
     'fitToView' : true,
    'type': 'iframe',
  
      'transitionIn'    : 'none',
      'transitionOut'   : 'none'

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



</head>
<body>

	<?php
			$server=$_SERVER['HTTP_HOST'];
			//echo $server;
			$request_url=$_SERVER['REQUEST_URI'];
			//echo $request_url;

			$full_address=$server.$request_url;
			$encoded_url= base64_encode($full_address);



// print_r($info);

//print_r($info);

//print_r($info[0]);



?>
	

	
<?php

$machine_id=$this->uri->segment(3);

echo "<div id='image_gallery'>";
echo "<div id='title'>IMAGES</div>";
echo "<a class='main_add'  href='".base_url()."/index.php/machine/insert_machine_multimedia/".$machine_id.'/'.$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";

echo "<hr>";
foreach ($info['machine_image'] as $image_info) {
	

echo '<li>';
echo "<a class='main_add' href='".base_url()."/index.php/machine/delete_machine_img/".$machine_id.'/'.$image_info->img_id.'/'.$encoded_url."'>
<section ><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";


echo '<a data-fancybox-group="gallery"  rel="fancybox-button" href="'.base_url().'assets/uploaded/img/'.$image_info->file_name.'"  class="img_gallery"  title=""><img src="'.base_url().'assets/uploaded/img/thumb_'.$image_info->file_name.'" /></a></li>';	


}
echo "</div>";

?>


  
<?php
echo "<div id='image_gallery'>";
echo "<div id='title'>VIDEO</div>";
echo "<a class='main_add'  href='".base_url()."/index.php/machine/insert_machine_multimedia/".$machine_id.'/'.$encoded_url."'>
<section id='file_option'><img id='video_icon' src='".base_url()."assets/img/file_option/document_add.png'></section></a>";

echo "<hr>";
foreach ($info['machine_video'] as $video_info) {
  

//echo '<li><a data-fancybox-group="gallery"  rel="fancybox-button" href="'.base_url().'assets/uploaded/img/'.$video_info->file_name.'"  class="img_gallery"  title=""><img src="'.base_url().'assets/uploaded/img/thumb_'.$image_info->file_name.'" /></a></li>';  


echo '<li>';
echo "<a class='main_add' href='".base_url()."/index.php/machine/delete_machine_video/".$machine_id.'/'.$video_info->video_id.'/'.$encoded_url."'>
<section ><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";



echo '<a data-toggle="tooltip"  title="'.$video_info->file_name.'" id="video-tooltip" href="'.base_url().'assets/uploaded/video/'.$video_info->file_name.'" class="html5lightbox"  >

<img class="video_icon" src="'.base_url().'assets/img/menu_images/video1.png" />

</a></li>'; 

}
echo "</div>";

?>




</body>
</html>