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

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
  



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



<style type="text/css">
body
{
	overflow: hidden;

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



  $('.fancybox').fancybox({

   'autoScale':true,
   	'height':700,
    'width' : 1300,
    'fitToView' : true,
    'type': 'iframe',
  
      'transitionIn'    : 'none',
      'transitionOut'   : 'none'

  });
});




  </script>



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

//$('section#file_option').css('display','none');

var screen_height=$(window).height();
var screen_width=$(window).width();

//alert(screen_size);
$('ul#main_list_area').css("height",(screen_height-110));
$('iframe#slides').css("height",(screen_height-130));
$('.tab_content_area').css("width",(screen_width-320)).css("margin-left","20px");




$( window ).resize(function() {

 var screen_height=$( window ).height();
 var screen_width=$(window).width();

	$('ul#main_list_area').css("height",(screen_height-110));
		$('iframe#slides').css("height",(screen_height-130));
	
		$('.tab_content_area').css("width",(screen_width-320)).css("margin-left","20px");




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

<!-- menu starts here -->

<div class="row" id='header'>

 <div class="col-xs-12" id='header'>
<?php include 'template/header_menu2.php';?>
</div>

</div>

<div class="row content_area" >
	<section class="col-xs-2 fixed_sidebar_width" >
	

<?php
$total_item= count($info);
	echo "<ul id='main_list_area' class=''>";
	
		if(!empty($info))
		{
			
				echo "<li class='title'>";
if($total_item>1)
			{
echo "<span id='item_in_list'>$total_item</span>";
			}


				echo "NPM</li>";
			
		
		}
		else
		{
			echo "<li class='title'></li>";
		}



$i=1;


		if(isset($info))
			foreach($info as $infodata)
		{


		//echo "<br>".$infodata->npm_id."</br>";

		echo '<li id="main_list" class="content">';


		echo "<div id='file_option_area'>";

	echo "<a class='main_delete' href='".base_url()."index.php/npm/delete_npm/".$infodata->npm_id."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "<a class='main_edit' href='".base_url()."index.php/npm/update_npm/".$infodata->npm_id."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

		echo "</div>";


	

			echo '<a href="'.$infodata->npm_id.'/'.$this->uri->segment(3).'">';


		if($infodata->icon!=null)
		{
				echo '<img id="icon" src="'.base_url().'assets/uploaded/img/thumb_'.str_replace(' ','_',$infodata->icon).'" />';
			}

				echo $infodata->name;

				echo '/'.$infodata->tname;




				
		echo '</a>';
		




		echo '</li>';


				$i++;
				
			
		}
		
		echo '</ul>';
		?>




</section>
<section class="col-xs-10 tab_content_area" >
	

	<div class="row" id='tabs'>

<?php


//print_r($info);

//echo '<br>';
echo '<div id="tab_area">';
echo '<nav class="cl-effect-21">';

if(isset($info[0]))
{

$initial_npm_id=$info[0]->npm_id;
//print_r($info);
}

if(isset($info[0]))
{
foreach($info[0] as $column=>$tab)
{
	
if($column==='npm_id' || $column==='name' || $column==='tname' || $column==='category' || $column==='icon')
{

}


else
{


echo "<li ><a id='".$column."' target='slides' href='".base_url().'index.php/npm/view_slides/'.$info[0]->npm_id.'/'.$tab."/".$column."/pages' >".str_replace('_', ' ', $column)."</a></li>";
}

}
}

echo '</nav>';
echo "</div>";


?>

	</div>

	<div class="row" id='content' >

	




<?php

		
if(isset($info[0]))
	echo "<iframe  name='slides' id='slides' src='".base_url()."assets/blank_iframe_text_pd.html'></iframe>";
	else
		echo "<div id='notification-warning'>No informartion to display</div>";


		?>
	</div>


</section >
</div>


<script>
    (function($){
        $(window).load(function(){
            $(".content").mCustomScrollbar();
        });
    })(jQuery);
</script>

<script>
    (function($){
        

        $(window).load(function(){
$.mCustomScrollbar.defaults.scrollButtons.enable=true;
            $("#main_list_area").mCustomScrollbar({
setWidth: '125%',
autoHideScrollbar: false,
scrollButtons:{ enable: true },
            axis:"y",
           theme:"3d-thick-dark"

              });
        });
    


        $(window).load(function(){
$.mCustomScrollbar.defaults.scrollButtons.enable=true;
            $("body").mCustomScrollbar({
setWidth: '100%',
autoHideScrollbar: false,
scrollButtons:{ enable: true },
            axis:"y",
           theme:"3d-thick-dark"

              });
        });
    


    })(jQuery);
</script>


<script type="text/javascript">


$(document).ready(function() {


//$('section#file_option').css('display','none');

$('li#main_list a').parent().first().addClass("selected");


	$('iframe').attr('src','<?php echo base_url()."index.php/npm/view_slides/".$initial_npm_id."/".$info[0]->slide_id."/slide_id/pages"; ?>');

//alert('code_running');

//****************hide button from tab section starts here*****************

$( "#tabs" ).hide();

var section='default';

//****************hide button from tab section end here *****************


    $('li#main_list a').click(function(e){

    	e.preventDefault();
    	
         $('li#main_list a').parent().removeClass('selected');

         $(this).parent().addClass("selected");

   

         // $("#tabs").replaceWith("<div class='row' id='tabs'>"+$(this).attr('href')+"</div>");

     //ajax request hre

//alert($(this).attr('href'));

$.get( "<?php echo base_url(); ?>index.php/npm/get_npm_tabs/"+$(this).attr('href'), function( data ) {


	 
$( "#tabs" ).html( data );

$("a.slide_id").click();



var text = $("a.slide_id").attr('href');

//****************hide button from tab section starts here*****************

$( "#tabs" ).hide();

var section='default';

//****************hide button from tab section end here *****************


//$('#slides').contents().find('body').html('http://localhost/cic_latest/index.php/npm/view_slides/48fn7z77vlg0tndtoepy/jrhy8yjpnpv8vwtgox53/pages');



$('iframe').attr('src',text+'/'+section);

//alert( "Load was performed." );
});


// ajax request ends here





    });

//ajax request hre

/*
function showTabs(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","http://localhost/cic_latest/index.php/npm/get_npm_tabs/48fn7z77vlg0tndtoepy?q="+str,true);
xmlhttp.send();
}

*/

// ajax request ends here





        
          






});


</script>




</body>
</html>