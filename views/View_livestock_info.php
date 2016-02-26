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

var screen_size=$(window).height();

//alert(screen_size);
$('ul#main_list_area').css("height",(screen_size-110));

	$('iframe#slides').css("height",(screen_size-150));

$( window ).resize(function() {

 var screen_size=$( window ).height();

	$('ul#main_list_area').css("height",(screen_size-110));
		$('iframe#slides').css("height",(screen_size-150));



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

<div class="row " id='header'>


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

<div class="row content_area" >

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
This area is for main list in left side
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<section class="col-xs-2">




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
				echo 'livestock';
			
				echo "</li>";
			
		
		}
		else
		{
			echo "<li class='title'>Livestock</li>";
		}



$i=1;


		if(isset($info))
			foreach($info as $infodata)
		{


		//echo "<br>".$infodata->livestock_id."</br>";

		echo '<li id="main_list">';


		echo "<div id='file_option_area'>";

		echo "<a class='main_delete'  href='".base_url()."index.php/livestock/delete_livestock/".$infodata->livestock_id."/".$encoded_url."'>
		<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
		echo "<br><a class='main_edit' href='".base_url()."index.php/livestock/update_livestock/".$infodata->livestock_id."/".$encoded_url."'>
		<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

		echo "</div>";


	
			echo '<a href="'.$infodata->livestock_id.'/'.$this->uri->segment(3).'">';


		if($infodata->icon!=null)
		{
				echo '<img id="icon" style="width:80%; box-shadow:none; padding:5px;" src="'.base_url().'assets/uploaded/img/thumb_'.str_replace(' ','_',$infodata->icon).'" />';
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



		<section class="col-xs-10 " >
			

			<div class="row" id='tabs'>



<?php


//print_r($info);
echo '<div class="tab_info">
	
<div><img height=50 width=50 src="'.base_url().'assets/uploaded/img/thumb_'.$info[0]->icon.'"/>'.$info[0]->name.'/ '.$info[0]->tname.'</div>

</div>';

//echo '<br>';
echo '<div id="tab_area">';
echo '<nav >';

   
/*##########		initial selected section tab using jquery 		#########*/


$initial_click_section='పరిచయం';

/*##########		If information available in perticular category		#########*/

if(isset($info[0]))
{
$initial_intro_id=$info[0]->intro;
$initial_livestock_id=$info[0]->livestock_id;
$category=$this->uri->segment(3);

//print_r($info);
}

if(isset($info[0]))
{
foreach($info[0] as $column=>$tab)
{
	

   
/*##########		skip all the field from database which are not to be display as tab 		#########*/

if($column==='agri_id' || $column==='name' || $column==='tname' || $column==='category' || $column==='icon')
{

}

   
/*##########		skip recpie tab other then millet category 		#########*/


elseif($category!='millet' && $column==='recipe')
{

}

   
/*##########	and display other filed from database as tabs 		#########*/


else
{


   
/*##########		changed the tab's english name to telugu		#########*/


if($column==='intro')
{

	$column='పరిచయం';
	//echo "<a class='".$column." popup fancybox fancybox.iframe' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' >".str_replace('_', ' ', $column)."</a>";
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/intro.jpg' >పరిచయం</a>";

//echo "<a class='".$column." popup fancybox fancybox.iframe' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/blue_blank_icon.png' >పరిచయం</a>";

}

elseif($column==='breeds')
{
	$column='జాతులు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/breeds.jpg' >జాతులు</a>";

}

elseif($column==='selection')
{
	$column='జాతుల ఎంపిక';

	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/selection2.jpg' >జాతుల ఎంపిక</a>";

}

elseif($column==='feed')
{
$column='మేత పోషణ';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/feed.jpg' >మేత/పోషణ</a>";

}

elseif($column==='housing')
{
	$column='గృహ వసతి';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/housing.jpg' >గృహ వసతి</a>";
}

elseif($column==='reproduction_management')
{
	$column='ప్రత్యుత్పతి-యాజమాన్యం';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/reproduction.jpg' >ప్రత్యుత్పతి-యాజమాన్యం</a>";
}

elseif($column==='calf_rearing')
{
	$column='పిల్లల సంరక్షణ';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/calf_rearing.jpg' >పిల్లల సంరక్షణ</a>";
}


elseif($column==='economics')
{
	$column='ఆర్థికఅంశాలు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/".$column.".png' >ఆర్థికఅంశాలు</a>";
}


elseif($column==='other_info')
{
	$column='ఇతర వివరాలు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >ఇతర వివరాలు</a>";
}



}

}
//echo "<a id='pest' target='slides' href='".base_url().'index.php/agri_pd/view_agri_attached_pd/pest/'.$info[0]->agri_id."/pages' >పురుగులు</a>";
 if($info[0]->livestock_id=='oodurhkcl6znouq0wygv')
 {
echo "<a class='pest popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/livestock_pd/view_livestock_attached_pd/disease/'.$info[0]->livestock_id."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/disease.jpg' >తెగుళ్ళు</a>";
}
else
{
echo "<a class='pest popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/livestock_pd/view_livestock_attached_pd/disease/'.$info[0]->livestock_id."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/disease.jpg' >రోగాలు</a>";
}
/*
echo "<a target='_blank' class='slide_edit' href='".base_url()."index.php/agri_pd/link_agri_pd_next/fresh/".$info[0]->agri_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";పురుగులు
*/

// echo "<a id='disease' target='slides' href='".base_url().'index.php/agri_pd/view_agri_attached_pd/Disease/'.$info[0]->agri_id."/pages' >తెగుళ్ళు</a>";

/*
echo "<a target='_blank' class='slide_edit' href='".base_url()."index.php/agri_pd/link_agri_pd_next/fresh/".$info[0]->agri_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

*/
}

echo "</nav>";
echo "</div>";
?>


	</div>

	<div class="row" id='content' >

	




<script>
$(document).ready(function() {


   
/*##########		initial tab will be selected according to value of varaible $initial_click_section #########*/


// alert('<?php echo $initial_click_section; ?>');
	$(".cl-effect-21 a#<?php echo $initial_click_section; ?>").addClass("selected");
	
    $('.cl-effect-21 a').click(function(d)
    {
    	//alert(d.val);
    	 $('a.selected').removeClass('selected')
         $(this).addClass("selected");
     });


});
</script>


		
<?php
		
if(isset($info[0]))
{
		//echo "<iframe name='slides' id='slides' src='".base_url()."assets/blank_iframe_text_agri.html'></iframe>";
}
	else
		echo "<div id='notification' class='animated slideIn'>No informartion to display</div>";


		?>
	</div>


</section >
</div>



<script type="text/javascript">


$(document).ready(function() {



$('li#main_list a').parent().first().addClass("selected");

//alert('code_running');
	



// $('iframe').attr('src','<?php echo base_url()."index.php/livestock/view_slides/".$initial_livestock_id."/".$initial_intro_id."/intro/pages"; ?>');






    $('li#main_list a').click(function(e){
    	e.preventDefault();
    	

         $('.selected').removeClass('selected')

         $(this).parent().addClass("selected");

         // $("#tabs").replaceWith("<div class='row' id='tabs'>"+$(this).attr('href')+"</div>");

     //ajax request hre


$.get( "<?php echo base_url(); ?>index.php/livestock/get_livestock_tabs/"+$(this).attr('href'), function( data ) {
	 
$( "#tabs" ).html( data );

$("a.<?php echo $initial_click_section; ?>").click();





var text = $("a.<?php echo $initial_click_section; ?>").attr('href');

var section='default';




//$('#slides').contents().find('body').html('http://localhost/cic_latest/index.php/livestock/view_slides/48fn7z77vlg0tndtoepy/jrhy8yjpnpv8vwtgox53/pages');



// $('iframe').attr('src',text+'/'+section);

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






</body>
</html>