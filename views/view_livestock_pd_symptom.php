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
<script type="text/javascript" src="<?php echo base_url().'assets/js/zebra_datepicker.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.tinycarousel.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.jplayer.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.easyui.min.js'; ?>"></script>


		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>



	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox/html5lightbox.js"></script>


<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">



<link rel="stylesheet" href="<?php echo base_url().'assets/css/shadowbox.css'; ?>" type="text/css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_agri_tab_info.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/cic_bootstrap_pagination_style.css'; ?>">

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">
<style>
  
body, html
{
  background: none;
}

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
    'height' : 650,
     'fitToView' : true,
    'type': 'iframe',
  
      'transitionIn'    : 'none',
      'transitionOut'   : 'none'

  });


    $(".fancybox-button").fancybox({

    closeBtn    : false,
    helpers   : {
      title : { type : 'inside' },
      buttons : {}
    }
  });







});




  </script>



</head>
<body>

<div class="row" >
	<div  class="col-xs-12 dontprint" >
<?php 
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



$poster_image=array();

//print_r($info);

if(isset($info))
foreach($info as $infodata)
{

	

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
    <a class="buttons prev" href="#"><img src="'.base_url().'assets/img/carasual/prev.png"/></a>
    <div class="viewport">
        <ul class="overview">';


foreach($slide_images as $slide_image)
{
	if(strpos( $slide_image->file_name,'poster'))
	{
		$poster_image[]=$slide_image->file_name;
	}
//echo $slide_image->file_name."<br>";
echo '<li><a data-fancybox-group="gallery" href="'.base_url().'assets/uploaded/img/'.$slide_image->file_name.'" rel="fancybox-button" class="img_gallery fancybox-button" ><img src="'.base_url().'assets/uploaded/img/thumb_'.$slide_image->file_name.'" /></a></li>';	
}


        echo '</ul>
    </div>
    <a class="buttons next" href="#"><img src="'.base_url().'assets/img/carasual/next.png"/></a>
</div>';

}









//print_r($slide_videos);
if(!empty($slide_videos))
{
	echo '<div id="slider-code2">
    <a class="buttons prev" href="#"><img src="'.base_url().'assets/img/carasual/prev.png"/></a>
    <div class="viewport">
        <ul class="overview">';

foreach($slide_videos as $slide_video)
{
//echo $slide_image->file_name."<br>";
//	echo base_url().'assets/uploaded/video/'.$slide_video->file_name;
echo '<li><a data-toggle="tooltip"  title="'.$slide_video->file_name.'" id="video-tooltip" href="'.base_url().'assets/uploaded/video/'.$slide_video->file_name.'" class="html5lightbox"  >

<img style="width:80px; margin:auto;margin-left:15px;" src="'.base_url().'assets/img/menu_images/video1.png" />

</a></li>';	
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
  echo '<div id="audio_files"><audio  controls><source src="'.base_url().'assets/uploaded/audio/'.$slide_audio->file_name.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio></div>';
}

//echo $slide_audio->file_name;
  }



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
						echo' <a  href="'.base_url().'assets/uploaded/img/'.$poster.'" class="popup"  ><img src="'.base_url().'assets/uploaded/img/'.$poster.'" /></a>';	
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

<script type="text/javascript">

</script>

<script type="text/javascript">

//$('#video-tooltip').tooltip();
</script>
</div>

</div>

</body>
</html>