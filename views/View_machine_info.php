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
<link rel="stylesheet" href="<?php echo base_url().'assets/css/attached_link.css'; ?>" type="text/css">


  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
  

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">


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






<script type="text/javascript">
   

$(document).ready(function() {
    $('.popup').fancybox({

    'fitToView' : true,
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

var screen_width=$(window).width();
var screen_height=$(window).height();

$( window ).resize(function() {
var screen_width=$(window).width();
var screen_height=$(window).height();

});
  

  $('.fancybox').fancybox({

  
    'width' :(screen_width-200),

     'fitToView' : true,
    'type': 'iframe',
   'scrolling': 'no',
  'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'preload'   : true,


  });

   $('.fancybox').fancybox({

   'autoScale':true,
    'height':1000,
    'width' : 1300,
    
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
	?>
	
	

<!-- ********************************************************************************************

Header section starts here

*************************************************************************************************-->

<div class="row" id='header'>


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
logo section starts here
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
logo section en here
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->



<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
navigation menu starts here
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

	 <div class="col-xs-12" id='header'>

			<?php include 'template/header_menu2.php';?>

	</div>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
navigation menu ends here
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

</div>
<!-- ********************************************************************************************

header section ends here

*************************************************************************************************-->









<!-- ********************************************************************************************

content area starts here

*************************************************************************************************-->

<div class="row" >
<?php
//print_r($info);

foreach ($info as $machine_data) {

if(!empty($machine_data))
{

$machine_id=$machine_data->machine_id;
$icon=$machine_data->icon;
$name=$machine_data->name;
$tname=$machine_data->tname;


echo "<div  class='col-md-3 col-sm-6  animated flipInY'>";
echo "<div id='machine_box' class='machine_box '>";


//print_r($agri_pd_attched_record);

echo "<div >";


echo "<a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/machine/view_machine_inner_info/".$machine_id."'>";
/*
echo "<a href='".base_url()."assets/uploaded/img/".$agri_pd_info[0]->icon."' rel='shadowbox[Mixed]' >

<img   src='".base_url()."assets/uploaded/img/thumb_".$agri_pd_info[0]->icon."' />

</a></div>";

*/

echo '<div id="machine_title">'.$name.'/'.$tname.'</div>';
echo "

<img  id='machine_icon' src='".base_url()."assets/uploaded/img/".$icon."' />";



echo "</a>";
echo "</div>";
echo "<div class='file_option_area_links'>";

echo "<a  class='slide_update' href='".base_url()."index.php/machine/insert_machine/".$machine_id."/".$encoded_url."'>
<section   id='file_option_links'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

echo "<a  class='slide_delete' href='".base_url()."index.php/machine/delete_machine/".$machine_id."/".$encoded_url."'>
<section   id='file_option_links'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "</div>";
echo "</div>";
echo "</div>";
	
}
}
?>






</div>



<script type="text/javascript">


$(document).ready(function() {



$('.main_list a').parent().parent().first().addClass("selected");

//alert('code_running');


// temp disabled
//	$('iframe').attr('src','<?php echo base_url()."index.php/machine/view_slides/".$initial_machine_id."/".$initial_intro_id."/intro/pages"; ?>');


    $('.main_list a').click(function(e){
    	e.preventDefault();
    	

         $('.selected').removeClass('selected')

         $(this).parent().parent().addClass("selected");

         // $("#tabs").replaceWith("<div class='row' id='tabs'>"+$(this).attr('href')+"</div>");

     //ajax request hre


$.get( "<?php echo base_url(); ?>index.php/machine/get_machine_tabs/"+$(this).attr('href'), function( data ) {
	 
// $( "#tabs" ).html( data );

// $("a.intro").click();



var text = $("a.intro").attr('href');

var section='default';




//$('#slides').contents().find('body').html('http://localhost/cic_latest/index.php/machine/view_slides/48fn7z77vlg0tndtoepy/jrhy8yjpnpv8vwtgox53/pages');



//$('iframe').attr('src',text+'/'+section);

//alert( "Load was performed." );
});


// ajax request ends here





    });



});









</script>



<script>
    (function($){
        

        $(window).load(function(){
$.mCustomScrollbar.defaults.scrollButtons.enable=true;
            $(".machine_box").mCustomScrollbar({

autoHideScrollbar: true,
scrollButtons:{ enable: true },
            axis:"y",
           theme:"dark-thin"

              });
        });
    



    })(jQuery);
</script>





</body>
</html>