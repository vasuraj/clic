<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery/jquery-1.8.2.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'bootstrap3/dist/js/bootstrap.min.js'; ?>"></script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.tinycarousel.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>



	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox/html5lightbox.js"></script>


<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_agri_tab_info.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/cic_bootstrap_pagination_style.css'; ?>">

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">


<!-- custome scrollerbar -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom_scroll/jquery.mCustomScrollbar.css">
<script src="<?php echo base_url(); ?>assets/js/custom_scroll/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- custome scrollerbar end here-->


<style>
  
body, html
{

  height:100%;
  width:100%;

}


.fancybox-lock .fancybox-overlay { overflow:hidden; }
</style>

<script>
  

$(function() {            	


$('.slide_delete').click(function(e)
{
	e.preventDefault();
	var button_value= $(this).attr('href')


   BootstrapDialog.confirm('Are you sure?', function(result){
            if(result) 
            {
               // alert(button_value);

                location.href=button_value;
            }
            else 
            {
               // alert('Nope.');
            }
        });
        




      });
});

        </script>



<script>
	

$(function()
	{

var screen_size=$(window).height();

$('.main_list_area').css("height",(screen_size-110));


$( window ).resize(function() {

 var screen_size=$( window ).height();

	$('.main_list_area').css("height",(screen_size-110));
		$('iframe#slides').css("height",(screen_size-150));



});

	});


</script>
    </script>


<script type="text/javascript">
   

$(document).ready(function() {
  var window_height=$(window).height();
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
    'height':(window_height-100),
    'width' :'95%',
    'fitToView' : true,
    'type': 'iframe',
  
      'transitionIn'    : 'none',
      'transitionOut'   : 'none'

  });
});



  </script>



</head>
<body>


<script>
	$(function()
	{

$('li#control a').click(function(e)
	{
		e.preventDefault();
		var button_pressed=$(this).attr('href');
if(button_pressed=='plus')
{

var fontsize=$('#text').css("font-size");

//alert(fontsize);

var newfontsize = parseInt(fontsize.replace(/px/, "")) + 2;
$('#text').css("font-size",newfontsize);

//alert(newfontsize);
}
if((button_pressed=='minus'))
{
var fontsize=$('#text').css("font-size");
	var newfontsize = parseInt(fontsize.replace(/px/, "")) - 2;
$('#text').css("font-size",newfontsize);

}


	});


	});


</script>

<div class="row" >
	<div  class="col-xs-12 dontprint" >
<?php 
if($links==1)
{
	echo "<div id='single_slide'>";

	echo "</div>";
}
echo $this->pagination->create_links();  

?>



<!-- menu ends here -->
<?php

//  ****************************
       // get current addresss where to return after update

//*********************************

$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);



//  ****************************
// get current addresss where to return after update
//*********************************

if(empty($info))

{











}

if(!empty($info))
{

if(urldecode($this->uri->segment(5))!='slide_id')
{
//echo "<div id='slide_label' class='animated bounceInRight'>".urldecode($this->uri->segment(5))."</div>";
}
}
$poster_image=array();
if(isset($info))
foreach($info as $infodata)
{

	
//print_r($infodata);
  //echo $this->uri->segment('3');

	echo '<div id="slide_content" class="animated bounceInRight easyui-resizable" data-options="minWidth:450,minHeight:330">';
	echo '<div class="row" >';
echo "<div id='zoom_controls'>";
	echo "<li id='control'><a href='plus''>+</a></li>";
	echo "<li id='control'><a href='minus''>-</a></li>";
	echo "</div>";
if(!empty($slide_images) || !empty($slide_videos) )	
{



echo '<section  class="col-xs-2 dontprint" >';



if(!empty($slide_images))
{

	echo '<div id="slider-code">
    <a class="buttons prev" href="#">
	<img src="'.base_url().'assets/img/carasual/prev.png"/></a>
    <div class="viewport">
        <ul class="overview">';


foreach($slide_images as $slide_image)
{
	if(strpos( $slide_image->file_name,'poster'))
	{
		$poster_image[]=$slide_image->file_name;
	}
//echo $slide_image->file_name."<br>";
echo '<li><a data-fancybox-group="gallery"  rel="fancybox-button" href="'.base_url().'assets/uploaded/img/'.$slide_image->file_name.'"  class="img_gallery popup fancybox-button"  title=""><img src="'.base_url().'assets/uploaded/img/thumb_'.$slide_image->file_name.'" /></a></li>';	


}


        echo '</ul>
    </div>
    <a class="buttons next" href="#"><img src="'.base_url().'assets/img/carasual/next.png"/></a>
</div>';

}








$image_counter=1;
//print_r($slide_videos);
if(!empty($slide_videos))
{
	echo '<div id="slider-code2">
    <a class="buttons prev" href="#">

    <img src="'.base_url().'assets/img/carasual/prev.png"/>

    </a>
    <div class="viewport">
        
        <ul class="overview">';

foreach($slide_videos as $slide_video)
{
//echo $slide_image->file_name."<br>";
//	echo base_url().'assets/uploaded/video/'.$slide_video->file_name;

/*
  echo '<li><a data-toggle="tooltip"  title="'.$slide_video->file_name.'" id="video-tooltip" href="'.base_url().'assets/uploaded/video/'.$slide_video->file_name.'" rel="shadowbox[Mixed]"  >

<img style="width:80px; margin:auto;" src="'.base_url().'assets/img/menu_images/video1.png" />

</a></li>';	

*/


  echo '<li><a data-toggle="tooltip"  title="'.$slide_video->file_name.'" id="video-tooltip" href="'.base_url().'assets/uploaded/video/'.$slide_video->file_name.'"  class="html5lightbox"  >

<img  src="'.base_url().'assets/img/menu_images/video'.$image_counter.'.png" />

</a></li>'; 
$image_counter++;

}


       echo ' </ul>
    </div>
    <a class="buttons next" href="#"><img src="'.base_url().'assets/img/carasual/next.png"/></a>
</div>';
}















?>


<?php


echo '</section>';
echo '<section  class="col-xs-10 dontprint" >';


if(!empty($slide_audios))
{
	//print_r($slide_audios);


foreach($slide_audios as $slide_audio)
{
	

	//echo base_url().'assets/uploaded/audio/'.$slide_audio->file_name;
  echo '<div id="audio_files">
  <audio  controls>
  <source src="'.base_url().'assets/uploaded/audio/'.$slide_audio->file_name.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
</div>';
}

//echo $slide_audio->file_name;
  }

 // echo "style mp3 player";
/*
echo  '<div id="jquery_jplayer_1" class="jp-jplayer"></div>
  <div id="jp_container_1" class="jp-audio">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <ul class="jp-controls">
          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
          <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <ul class="jp-toggles">
            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
          </ul>
        </div>
      </div>
      <div class="jp-title">
        <ul>
          <li>Bubble</li>
        </ul>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>';
  */

echo "<div id='file_option_area'>";
echo "<a  class='slide_add' href='".base_url()."index.php/agri/add_slide_form/".$info[0]->main_id."/".$info[0]->sub_id."/".$info[0]->sub_category."/".base64_encode(base_url().'index.php/agri/view_slides/'.$info[0]->main_id.'/'.$info[0]->sub_id.'/'.$info[0]->sub_category.'/pages')."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";
echo "<a class='slide_edit' href='".base_url()."index.php/agri/edit_slide_form/".$info[0]->slide_id."/".$encoded_url."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";
echo "<a class='slide_delete' href='".base_url()."index.php/agri/delete_slide/".$info[0]->slide_id."/".$encoded_url."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "</div>";

				echo "<div id='text'>";

				if(!empty($poster_image))
				{
					if($infodata->text==='')
						{
							echo '<div id="poster_no_text">';
						}
						else
						{
							echo '<div id="poster">';
						}
					foreach ($poster_image as $poster) {
						echo' <a  href="'.base_url().'assets/uploaded/img/'.$poster.'" class="popup" ><img src="'.base_url().'assets/uploaded/img/'.$poster.'" /></a>';	
					}
					echo "</div>";

				}
		echo $infodata->text;


echo "</div>";

		echo '</section>';
echo '</div>';
}
else
{

if(!empty($slide_audios))
{
	//print_r($slide_audios);


foreach($slide_audios as $slide_audio)
{
	

	//echo base_url().'assets/uploaded/audio/'.$slide_audio->file_name;
  echo '<div id="audio_files"><audio  controls><source src="'.base_url().'assets/uploaded/audio/'.$slide_audio->file_name.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></div>';
}

//echo $slide_audio->file_name;
  }


echo "<div id='file_option_area'>";

echo "<a class='slide_add' href='".base_url()."index.php/agri/add_slide_form/".$info[0]->main_id."/".$info[0]->sub_id."/".$info[0]->sub_category."/".$encoded_url."'>
<section  id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";
echo "<a  class='slide_edit'  href='".base_url()."index.php/agri/edit_slide_form/".$info[0]->slide_id."/".$encoded_url."'>
<section  id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";
echo "<a class='slide_delete' href='".base_url()."index.php/agri/delete_slide/".$info[0]->slide_id."/".$encoded_url."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "</div>";

	       echo "<div id='text'>";
      
      
    echo $infodata->text;
echo "</div>";


}

}


?>

<script type="text/javascript">

    $(document).ready(function(){
                
        $('#slider-code').tinycarousel({ axis: 'x', pager: true, interval: true  });
         $('#slider-code2').tinycarousel({ axis: 'x', pager: true, interval: true  });
         


        
    });
</script> 



</div>

</div>

<script>
    (function($){
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
//alert('hi');
// var element  $("#text");
//        element.text(function(index, text) {

//        text=text.replace('వరి', '<a>paddy</a>');
//        // text=text.replace('ప్రధానమైనది', 'middle')
//        // text=text.replace('పంటల్లో', 'second');

// return element.html(text);
//         });

//var thePage = $("#text");
var thePage=$("#text");
if(thePage!=null)
{
  
<?php
 

 $this->db->select(array('tname','agri_id','category'));
 $query = $this->db->get('agri')->result();
 foreach ($query as $query_info) {
  
 
  $tname= trim($query_info->tname);
 $agri_id= $query_info->agri_id;
$category=$query_info->category;

echo "var tname='$tname';";
//echo "alert(tname);";
echo "if(tname=='కంది')
{
 // alert('hi');
}
";



 //echo "thePage.html(thePage.html().replace(/\s$tname/ig, '<a class=\"fancybox\" href=\"".base_url()."index.php/agri/view_agri/$category/$agri_id\" > $tname </a>'));";
 
 }



 $this->db->select(array('tname','livestock_id','category'));
 $query = $this->db->get('livestock')->result();
 foreach ($query as $query_info) {
  
 
  $tname= trim($query_info->tname);
 $livestock_id= $query_info->livestock_id;
$category=$query_info->category;




//echo "alert('$tname');";
 //echo "thePage.html(thePage.html().replace(/$tname/, '<a class=\"fancybox\" href=\"".base_url()."index.php/livestock/view_livestock/$category/$livestock_id\" > $tname</a>'));";
 
 }





//  $this->db->select(array('tname','pd_id','category'));
//  $query = $this->db->get('agri_pd')->result();
//  foreach ($query as $query_info) {
  
 
//   $tname= trim($query_info->tname);
//  $pd_id= $query_info->pd_id;
// $category=$query_info->category;
// //echo "alert('$tname');";
//  echo "thePage.html(thePage.html().replace(/$tname\s/ig, '<a class=\"fancybox\" href=\"".base_url()."index.php/agri_pd/view_agri_pd/$category/$pd_id\" > $tname </a>'));";
 
//  }




?>

}
 // below line to chnage text to link

 //thePage.html(thePage.html().replace(/యాజమాన్యం/ig, '<a class="fancybox" href="<?= base_url(); ?>index.php/agri/view_agri/millet/21az1x4vtlq7981gemif">సజ్జ</a>')); 


    });

  </script>


</body>
</html>