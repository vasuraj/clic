<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.confirmon.min.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.confirmon.css'; ?>" type="text/css">

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_agri_tab_info.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/cic_bootstrap_pagination_style.css'; ?>">


<script>
            $(function() {
            	


	$('.slide_delete').click(
function(e)
{
	e.preventDefault();
	//alert('hi');
}
		);

            
                $('.slide_delete').confirmOn({
                    questionText: 'This action cannot be undone, are you sure?',
                    textYes: 'Yes, I\'m sure',
                    textNo: 'No, I\'m not sure'
                },'click', function() {
                    var button_value= $(this).attr('href');
                  //  alert(button_value);

                   location.href=button_value;
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

//print_r($info);

$poster_image=array();
if(isset($info))
foreach($info as $infodata)
{

	


	echo '<div id="slide_content" class="animated bounceInRight " >';
	echo '<div class="row" >';
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
echo '<li><a  href="'.base_url().'assets/uploaded/img/'.$slide_image->file_name.'" rel="shadowbox" ><img src="'.base_url().'assets/uploaded/img/thumb_'.$slide_image->file_name.'" /></a></li>';	
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
echo '<li><a data-toggle="tooltip"  title="'.$slide_video->file_name.'" id="video-tooltip" href="'.base_url().'assets/uploaded/video/'.$slide_video->file_name.'" rel="shadowbox[Mixed]" >

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
						echo' <a  href="'.base_url().'assets/uploaded/img/'.$poster.'" rel="shadowbox" ><img src="'.base_url().'assets/uploaded/img/'.$poster.'" /></a>';	
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

//$('#video-tooltip').tooltip();
</script>
</div>

</div>

</body>
</html>