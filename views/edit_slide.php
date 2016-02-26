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

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'; ?>" type="text/css"/>






<link rel="stylesheet" href="<?php echo base_url().'assets/css/cic_form.css'; ?>" type="text/css">


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/sm/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="<?php echo base_url();?>assets/css/sm/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

<!-- #main-menu config - instance specific stuff not covered in the theme -->
<style type="text/css">

body
{
background:none;
}

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


<!-- menu ends here -->

<div class="row" id='form_area'>



<div class="row content_area">

	<?php
	$selected_slide_id=$this->uri->segment(3);
	$return_to=$this->uri->segment(4);

	//echo $selected_slide_id;


//echo $return_to;


    $this->db->from('slides');   
    $this->db->where('slide_id', $selected_slide_id);
   	$result= $this->db->get()->result();


   	$this->db->from('slide_img');   
    $this->db->where('slide_id', $selected_slide_id);
   	$result_image= $this->db->get()->result();

   	 	$this->db->from('slide_video');   
    $this->db->where('slide_id', $selected_slide_id);
   	$result_video= $this->db->get()->result();

	 	$this->db->from('slide_audio');   
    $this->db->where('slide_id', $selected_slide_id);
   	$result_audio= $this->db->get()->result();

  
 // print_r($result_image);  

 //  echo '<div id="crop_label" >'.$name.'/'.$tname.'</div>';

  //  echo $selected_agri_sub_id;

$slide_text=$result[0]->text;



 




echo form_open('agri/update_agri_slide/'.$result[0]->main_id.'/'.$result[0]->sub_id.'/'.$selected_slide_id.'/'.$return_to,array('class'=>'form', 'enctype'=>'multipart/form-data'));
echo "<table>";


if(!empty($result_image))
{echo "<tr >";
	echo "<td> Delete image </td>";
foreach ($result_image as $img) {
echo "<td id='image_box'>";
	echo "<input type='checkbox' name='image_to_delete[]' value='".$img->img_id."'>


	<img  

	style ='width:70px; height:70px; margin-top:10px;' 


	src='".base_url()."/assets/uploaded/img/".$img->file_name."'>";
echo "</td>";

}

echo "</tr>";
}







if(!empty($result_video))
{
	echo "<tr>";
	echo "<td> Delete video</td>";
foreach ($result_video as $video) {
echo "<td id='video_box'>";
	echo "<input type='checkbox' name='video_to_delete[]' value='".$video->video_id."'>";

echo '<video width="240" height="200" controls>
  <source src="'.base_url().'/assets/uploaded/video/'.$video->file_name.'" type="video/mp4">
  
Your browser does not support the video tag.
</video> ';
	
	//echo $video->file_name;
echo "</td>";

}
echo "</tr>";

}










if(!empty($result_audio))
{
	echo "<tr>";
	echo "<td> Delete audio</td>";
foreach ($result_audio as $audio) {
echo "<td id='audio_box'>";
	echo "<input type='checkbox' name='audio_to_delete[]' value='".$audio->audio_id."'>";


 echo '
  <audio  controls>
  <source src="'.base_url().'assets/uploaded/audio/'.$audio->file_name.'" type="audio/mpeg">
Your browser does not support the audio element.
</audio>';



	//echo $video->file_name;
echo "</td>";

}
echo "</tr>";

}







echo '<tr><td>Upload New Multimedia files</td><td>
<span class="row">';

echo '<input type="file" name="slide_media_files[]" multiple class="upload" size="20" />';

echo '</span>';
echo '</td></tr>';






echo "</table>"; 



//echo '<div class="col-xs-9" id="form_text_area">';

echo '<textarea  class="validate[required,custom[number]]"" name="text" id="content_2" >'.$slide_text.'</textarea>';
echo display_ckeditor($ckeditor_2);

 ?>

<?php
//echo '<textarea name="content_2" id="content_2" ><p>Example data</p></textarea>';
// echo display_ckeditor($ckeditor_2); 
//echo '</textarea> ';
?>



<script type="text/javascript">

 $(document).ready(function(){
        $("form.form").validationEngine('attach');
       });
//$(".form").validationEngine('validate');




</script>
<?php

//echo "</div>";

?>
 <input type='submit' id='submit' value='Update'/>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>