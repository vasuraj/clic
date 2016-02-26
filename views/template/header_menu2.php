<style>

.navbar
{
	padding:0px;

}
	
.nav a
{
 font-size: 12px;
 margin-top: 10px;

}

div.clock_area
{

	display: inline-block;
	
width:110px;
height:40px;


}
img#video_icon
{
	width:30px;
	margin-right:20px;
	float:left;
	margin-top: -6px;
}
img#menu_icon
{
	display: block;
	margin:auto;
	width:150px;
	border:3px solid #222;
}
.dropdown-menu li
{
text-align: center;
}


</style>
<script type="text/javascript" src="<?= base_url()?>assets/js/lightbox/html5lightbox.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>



	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/helpers/jquery.fancybox-buttons.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">
v

<script type="text/javascript">
   

$(document).ready(function() {
    $('.popup').fancybox({

    'fitToView' : true,
'autoScale':true,
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
   	'height':1300,
    'width' :9000,
    'fitToView' : true,
    'type': 'iframe',
  
      'transitionIn'    : 'none',
      'transitionOut'   : 'none'

  });
});




  </script>


      <!-- Static navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img id='cic_logo' src="<?php echo base_url(); ?>assets/img/cic-logo.png" alt="">
CLIC |

<?php
      $server=$_SERVER['HTTP_HOST'];
      //echo $server;
      $request_url=$_SERVER['REQUEST_URI'];
      //echo $request_url;

      $full_address=$server.$request_url;
      $encoded_url= base64_encode($full_address);
  ?>



<?php



$old_date_format=Date('d-m-Y');

// 	$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_format);
// 	$new_date_format = $myDateTime->format('F d, Y');

// //echo $new_date_format;

echo str_replace('-','/', $old_date_format);
echo " | ";


	?>
<div class="clock_area">

<div id="retroclockbox_xs"></div>
<script>

$(function(){

	$('#retroclockbox_xs').flipcountdown({size:'xs',am:true});
})
</script>
</div>


</a>

	

          </div>
          <div class="navbar-collapse collapse">
          
            <!-- Left nav -->
            <ul class="nav navbar-nav">
             <li id='home'><a class="nav_icon" href="<?php echo base_url(); ?>"><img style="width:25px; height:25px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/home.png" alt=""></a></li>




<li id='climate'><a class="nav_icon" href="#s1"><img style="width:30px; height:35px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/weather_information.png" alt=""></a>

	<ul class="dropdown-menu">
	<li><a  href="#">Forecast</a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo base_url(); ?>index.php/weather/view_forecast">view records</a></li>
	
	<li><a href="<?php echo base_url(); ?>index.php/weather/insert_forecast">insert new Record </a></li>
	</ul>

	</li>
	<li><a href="#">Recorded</a>

	<ul class="dropdown-menu">

<li><a href="<?php echo base_url(); ?>index.php/weather/view_recorded">view records</a></li>
<li><a href="<?php echo base_url(); ?>index.php/weather/insert_recorded">insert new Record </a></li>
	</ul>


	</li>

	<li><a href="<?php echo base_url(); ?>index.php/advisory/view_advisory">Advisory</a>
	<ul class="dropdown-menu">


	<?php

  $this->db->limit(10,0);
$result_advisory= $this->db->distinct()->select(array('date'))->group_by('date')->order_by('date','desc')->get('adv_main')->result();

//print_r($result_advisory);


//print_r($result_agri);
if(!empty($result_advisory))
{
//echo '<ul>';

foreach ($result_advisory as $advisory_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);

$old_date_format=$advisory_result->date;

$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_format);
$new_date_format = $myDateTime->format('F d, Y');

	//echo $new_date_format;



	echo "<li ><a href='".base_url()."index.php/advisory/view_advisory/".$advisory_result->date."'>".$new_date_format."</a></li>";
	
}
//echo "</ul>";

}
	?>
	<li><a href="<?php echo base_url(); ?>index.php/advisory/insert_advisory">insert advisory</a></li>

	</ul>


	</li>
	</ul>
</li>












<li id='Agriculture'><a class="nav_icon" href="#s2"><img style="width:30px; height:30px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/agri.png" alt=""></a>

 <ul class="dropdown-menu">
	<li><a href="<?php echo base_url(); ?>index.php/agri/view_agri/crop">ప్రధాన పంటలు</a>

	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','crop');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo ' <ul class="dropdown-menu">';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/agri/view_agri/crop/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$agri_result->icon)."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>



	
	</li>

	<li>
<a href="<?php echo base_url(); ?>index.php/agri/view_agri/vegetable">కూరగాయలు</a>



	

	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','vegetable');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo ' <ul class="dropdown-menu">';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);



	echo "<li class='nav_title'><a href='".base_url()."index.php/agri/view_agri/vegetable/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$agri_result->icon)."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>



	


	

</li>
<li>
<a href="<?php echo base_url(); ?>index.php/agri/view_agri/fruit">పండ్ల తోటలు</a>


	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','fruit');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo ' <ul class="dropdown-menu">';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/agri/view_agri/fruit/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$agri_result->icon)."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>



	

</li>

<li>
<a href="<?php echo base_url(); ?>index.php/agri/view_agri/millet">చిరుధాన్యాలు

	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','millet');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo ' <ul class="dropdown-menu">';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/agri/view_agri/millet/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$agri_result->icon)."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>


	

</li>

<li>
<a href="<?php echo base_url(); ?>index.php/agri/insert_agri">Insert New </a>
	

</li>


	</ul>

</li>








<li id='NPM'><a href="#s3">NPM</a>

<ul class="dropdown-menu">
	<li><a href="<?php echo base_url(); ?>index.php/npm/view_npm">view</a>

	<?php

$this->db->from('npm');

$this->db->select(array('npm_id','tname','icon'));
//$this->db->where('category','vegetable');


$result_npm=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_npm))
{
echo '<ul class="dropdown-menu">';

foreach ($result_npm as $npm_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/npm/view_npm/".$npm_result->npm_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$npm_result->icon)."'/>".$npm_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>

	
		

</li>



	<li><a href="<?php echo base_url(); ?>index.php/npm/insert_npm">insert</a></li>


</ul>
</li>










	<li id='livestock' ><a class="nav_icon" href="#s7"><img style="width:35px; height:35px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/livestock.png" alt=""></a>
	<ul class="dropdown-menu">
	<li><a href="<?php echo base_url(); ?>index.php/livestock/view_livestock/all">View</a>


<?php

$this->db->from('livestock');

$this->db->select(array('livestock_id','tname','icon'));
//$this->db->where('category','vegetable');


$result_livestock=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_livestock))
{
echo '<ul class="dropdown-menu">';

foreach ($result_livestock as $livestock_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/livestock/view_livestock/all/".$livestock_result->livestock_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$livestock_result->icon)."'/>".$livestock_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>






	</li>
	
		<li><a href="<?php echo base_url(); ?>index.php/livestock/insert_livestock">insert</a></li>


		<li><a href="<?php echo base_url(); ?>index.php/livestock_pd/view_livestock_pd/Disease">Disease</a>


		<ul class="dropdown-menu">
		
	<li><a href="<?php echo base_url(); ?>index.php/livestock_pd/view_livestock_pd/disease">view Disease</a>

	
	
<?php

$this->db->from('livestock_pd');

$this->db->select(array('pd_id','tname','icon','category'));
//$this->db->where('category','vegetable');


$result_livestock_pd=$this->db->get()->result();


if(!empty($result_livestock_pd))
{
echo '<ul class="dropdown-menu">';

foreach ($result_livestock_pd as $livestock_pd_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/livestock_pd/view_livestock_pd/".$livestock_pd_result->category."/".$livestock_pd_result->pd_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$livestock_pd_result->icon)."'/>".$livestock_pd_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>


		

	</li>
	
		<li ><a href="<?php echo base_url(); ?>index.php/livestock_pd/insert_livestock_pd">insert Disease</a></li>
	
		<li ><a href="<?php echo base_url(); ?>index.php/livestock_pd/link_livestock_pd">link to livestock</a></li>

		</ul>	



		</li>
	
	
	</ul>	


</li>













<li ><a  class="nav_icon" href="#s5"><img style="width:30px; height:35px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/pest_management.png" alt=""></a>
	<ul class="dropdown-menu">
		
	<li ><a href="<?php echo base_url(); ?>index.php/agri_pd/view_agri_pd/pest">పురుగులు</a>


<?php

$this->db->from('agri_pd');

$this->db->select(array('pd_id','tname','icon'));
$this->db->where('category','pest');
//$this->db->where('category','vegetable');


$result_pd=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_pd))
{
echo '	<ul class="dropdown-menu">
		
	';

foreach ($result_pd as $pd_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/agri_pd/view_agri_pd/pest/".$pd_result->pd_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$pd_result->icon)."'/>".$pd_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>




</li>
<li ><a href="<?php echo base_url(); ?>index.php/agri_pd/view_agri_pd/disease">తెగుళ్ళు</a>


<?php

$this->db->from('agri_pd');

$this->db->select(array('pd_id','tname','icon'));
$this->db->where('category','disease');
//$this->db->where('category','vegetable');


$result_pd=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_pd))
{
echo '	<ul class="dropdown-menu">
		
	';

foreach ($result_pd as $pd_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title'><a href='".base_url()."index.php/agri_pd/view_agri_pd/disease/".$pd_result->pd_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$pd_result->icon)."'/>".$pd_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>


</li>	

<li><a href="<?php echo base_url(); ?>index.php/agri_pd/insert_agri_pd">insert pest/disease</a></li>
<li><a href="<?php echo base_url(); ?>index.php/agri_pd/link_agri_pd">link to Agriculture</a></li>

		

	
	</ul>

</li>
























<li ><a  class="nav_icon"  href="#s6"><img style="width:30px; height:35px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/machine.png" alt=""></a>

<ul class="dropdown-menu">
<li ><a href="<?php echo base_url(); ?>index.php/machine/view_machine_info">view machine</a>


<?php

$this->db->from('machine');

$this->db->select(array('machine_id','tname','icon'));

//$this->db->where('category','vegetable');


$result_machine=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_machine))
{
echo '<ul class="dropdown-menu">';

foreach ($result_machine as $machine_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li class='nav_title' ><a href='".base_url()."index.php/machine/view_machine_info'><img id='menu_icon' src='".base_url()."assets/uploaded/img/".str_replace(' ','_',$machine_result->icon)."'/>".$machine_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>






</li>
<li ><a href="<?php echo base_url(); ?>index.php/machine/insert_machine">insert machine</a></li>	


	
	</ul>


</li>


	<li ><a href="<?php echo base_url(); ?>index.php/agri/view_agri/technique/oodurhkcl6znouq0wygv">శ్రీ వరి</a></li>


<li><a href="#"><img style="width:30px; height:30px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/movies.png" alt=""></a>

<?php 
echo '<ul class="dropdown-menu">';

$path=$dir    = './assets/movies';

$category_group=array();
$file_group=array();


$sub_category_group=array();
$sub_file_group=array();
$results = scandir($path);

foreach ($results as $result) {
    if ($result === '.' or $result === '..') continue;

    if (is_dir($path . '/' . $result)) {
$category_group[]=$result;
    }
}


//print_r($category_group);





foreach($category_group as $category)
{

$results = scandir($path.'/'.$category);


foreach ($results as $result) {
    if ($result === '.' or $result === '..') continue;

    
$file_group[$category][]=$result;
    
}



//echo $category;
//print$file_group
echo '<li><a>';
echo $category.'</a>';
echo '<ul class="dropdown-menu">';
foreach ($file_group[$category] as $file_name) {


if(strpos($file_name,'.flv'))
	{
		echo '<li class="movie_list"><a data-toggle="tooltip"  title="'.str_replace('.mp4','',(str_replace('.flv','',$file_name))).' movie" id="video-tooltip" href="'.base_url().'assets/movies/'.$category.'/'.$file_name.'"  class="html5lightbox"  >

<img id="video_icon" src="'.base_url().'assets/img/video_icon.png" />'.str_replace('.mp4','',(str_replace('.flv','',$file_name))).'</a></li>'; 
}
else
{

$sub_results = scandir($path.'/'.$category.'/'.$file_name);


foreach ($sub_results as $sub_result) {
    if ($sub_result === '.' or $sub_result === '..') continue;

    
$sub_file_group[$file_name][]=$sub_result;
    
}


// echo "<br>-------------------";
// print_r($sub_file_group);
// echo "-------------------<br>";


//print_r($sub_file_group);
	//echo "directory";


	// sub directory
if($file_name!='')
{
echo '<li><a>';
echo $file_name.'</a>';
$sub_category=$file_name;
echo '<ul class="dropdown-menu">';

foreach ($sub_file_group[$file_name] as $file_name) {


if(strpos($file_name,'.flv'))
	{
		echo '<li class="movie_list" ><a data-toggle="tooltip"  title="'.str_replace('.mp4','',(str_replace('.flv','',$file_name))).' movie" id="video-tooltip" href="'.base_url().'assets/movies/'.$category.'/'.$sub_category.'/'.$file_name.'"  class="html5lightbox"  >

<img id="video_icon" src="'.base_url().'assets/img/video_icon.png" />'.str_replace('.mp4','',(str_replace('.flv','',$file_name))).'</a></li>'; 
}
else
{
	
// what to do.



}


}
echo '</ul></li>';
}


	// end sub directory code



}


}
echo '</ul></li>';



$file_group=array();
}





echo '</li>';


?>


 </ul>
       

	   
	   
	   
	   
	   
	   
	   
	   
	   
	   

	   <li><a href="#s7">నేలలు</a>


<?php



echo '	<ul class="dropdown-menu">';

	echo "<li><a href='#'>soil type</a>";

	echo '<ul class="dropdown-menu">';
	echo "<li><a href='#'>Based on Depth</a>";


$this->db->from('soil_section');
$this->db->select(array('soil_sub_section_id','tname','name','icon'));
$this->db->where('soil_section_id','5qley8ci4l6ir522d9n8');


$result_soil_sub_section=$this->db->get()->result();
echo '	<ul class="dropdown-menu">';
//print_r($result_agri);
if(!empty($result_soil_sub_section))
{


foreach ($result_soil_sub_section as $soil_sub_section_result) {
	
	//print_r($soil_sub_section_result);


	echo "<li>";
 echo "<div class='nav_file_option' >
 <a class='main_edit' href='".base_url()."index.php/soil/insert_soil_item/5qley8ci4l6ir522d9n8/".$soil_sub_section_result->soil_sub_section_id."/".$encoded_url."'>

<img src='".base_url()."assets/img/file_option/document_edit.png'></a>";
 
  echo "<a  class='main_delete'  href='".base_url()."index.php/soil/delete_soil_item/".$soil_sub_section_result->soil_sub_section_id."/".$encoded_url."'>



<img src='".base_url()."assets/img/file_option/document_delete.png'</a>




  </div>";
	echo "<a class='fancybox' href='".base_url()."index.php/agri/view_slides/5qley8ci4l6ir522d9n8/".$soil_sub_section_result->soil_sub_section_id."/soil_info/pages'><img src='".base_url()."assets/uploaded/img/thumb_".$soil_sub_section_result->icon."' alt=''><br>".$soil_sub_section_result->name."</a>";






	echo "</li>";
	
}

}


echo "<li><a href='".base_url()."index.php/soil/insert_soil_item/5qley8ci4l6ir522d9n8'>add new type</a></li>";

echo "</ul>";
	echo "</li>";



	echo "<li><a href='#'>Based on structure</a>";


$this->db->from('soil_section');
$this->db->select(array('soil_sub_section_id','tname','name','icon'));
$this->db->where('soil_section_id','1hu70nsygf705spkif0c');


$result_soil_sub_section=$this->db->get()->result();
echo '	<ul class="dropdown-menu">';
//print_r($result_agri);
if(!empty($result_soil_sub_section))
{


foreach ($result_soil_sub_section as $soil_sub_section_result) {
	
	//print_r($soil_sub_section_result);


	echo "<li>";
 echo "<div class='nav_file_option' >
 <a class='main_edit' href='".base_url()."index.php/soil/insert_soil_item/1hu70nsygf705spkif0c/".$soil_sub_section_result->soil_sub_section_id."/".$encoded_url."'>

<img src='".base_url()."assets/img/file_option/document_edit.png'></a>";
 
  echo "<a  class='main_delete'  href='".base_url()."index.php/soil/delete_soil_item/".$soil_sub_section_result->soil_sub_section_id."/".$encoded_url."'>



<img src='".base_url()."assets/img/file_option/document_delete.png'</a>




  </div>";
	echo "<a class='fancybox' href='".base_url()."index.php/agri/view_slides/5qley8ci4l6ir522d9n8/".$soil_sub_section_result->soil_sub_section_id."/soil_info/pages'><img src='".base_url()."assets/uploaded/img/thumb_".$soil_sub_section_result->icon."' alt=''><br>".$soil_sub_section_result->name."</a>";






	echo "</li>";
	
}

}


echo "<li><a href='".base_url()."index.php/soil/insert_soil_item/1hu70nsygf705spkif0c'>add new type</a></li>";

echo "</ul>";



	echo "</li>";
	echo '</ul>';
	echo '</li>';



	

//echo "<li><a class='fancybox' href='".base_url()."index.php/soil/view_nutrition_difficiency_symptom'><img  id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_brinjal_land_preperation_poster.jpg' alt=''><br>Nutrition Difficiency Symptom</a></li>";

$this->db->from('soil');
$this->db->where('soil_id','crtu1qpmmi8zdfpe7idk');
$this->db->select(array('section_id','tname','name','icon'));


$result_soil=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_soil))
{

foreach ($result_soil as $soil_result) {
	echo "<li>";
 echo "<div class='nav_file_option' >
 <a class='main_edit' href='".base_url()."index.php/soil/update_soil/".$soil_result->section_id."/".$encoded_url."'>

<img src='".base_url()."assets/img/file_option/document_edit.png'></a>";
 
  echo "<a  class='main_delete'  href='".base_url()."index.php/soil/delete_soil/".$soil_result->section_id."/".$encoded_url."'>



<img src='".base_url()."assets/img/file_option/document_delete.png'</a>




  </div>";

	echo "<a   class='fancybox' href='".base_url()."index.php/agri/view_slides/".$soil_result->section_id."/".$soil_sub_section_result->soil_sub_section_id."/soil_info/pages' >";

if(isset($soil_result->icon) && $soil_result->icon!='')
{
	echo "<img id='menu_icon' src='".base_url()."assets/uploaded/img/".$soil_result->icon."'/>";

}
	echo $soil_result->name."</a>";


$this->db->from('soil_section');
$this->db->select(array('soil_sub_section_id','tname','name','icon'));
$this->db->where('soil_section_id',$soil_result->section_id);


$result_soil_sub_section=$this->db->get()->result();

// for custom sub module of soil

if(true)
{
if(!empty($result_soil_sub_section))
{
echo '	<ul class="dropdown-menu">';
//print_r($result_agri);

foreach ($result_soil_sub_section as $soil_sub_section_result) {
	
	//print_r($soil_sub_section_result);


	echo "<li>";
 echo "<div class='nav_file_option' >
 <a class='main_edit' href='".base_url()."index.php/soil/insert_soil_item/".$soil_result->section_id."/".$soil_sub_section_result->soil_sub_section_id."/".$encoded_url."'>

<img src='".base_url()."assets/img/file_option/document_edit.png'></a>";
 
  echo "<a  class='main_delete'  href='".base_url()."index.php/soil/delete_soil_item/".$soil_sub_section_result->soil_sub_section_id."/".$encoded_url."'>



<img src='".base_url()."assets/img/file_option/document_delete.png'</a>




  </div>";
	echo "<a class='fancybox' href='".base_url()."index.php/agri/view_slides/".$soil_result->section_id."/".$soil_sub_section_result->soil_sub_section_id."/soil_info/pages'><img src='".base_url()."assets/uploaded/img/thumb_".$soil_sub_section_result->icon."' alt=''><br>".$soil_sub_section_result->name."</a>";






	echo "</li>";
	
}

echo "<li>



<a href='".base_url()."index.php/soil/insert_soil_item/".$soil_result->section_id."'>add new item</a>";
echo "</li>";


echo "</ul>";
}



}	// end if condition for custom soil module


echo "</li>";

	
}

}



echo "<li><a href='".base_url()."index.php/soil/insert_soil'>add new section</a></li>";
//echo "<li><a  href='".base_url()."index.php/soil/insert_nutrition_difficiency_symptom'>Insert Nutrition Difficiency</a></li>";

echo "</ul> ";
	?>


	
	
	<!-- starting fisheries module -->





	   <li><a class="nav_icon" href="#s7"><img style="width:35px; height:35px;" src="<?php echo base_url(); ?>assets/img/navbar_icon/fisheries.png" alt=""></a>
<?php
echo '<ul class="dropdown-menu">';
echo "<li><a href='#'>Resource management </a>";
echo '<ul class="dropdown-menu">';


	echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/4vfgmfbfpsc7t27lnvqs/xu6e7rzq3b2xrpyiog1c/tank_and_pond_info/pages'>Tank & Ponds</a></li>";




	echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/4vfgmfbfpsc7t27lnvqs/hul6e69n6t0xdfosjrem/reservoirs_info/pages'>reservoirs</a></li>";


echo '</ul>';
echo '</li>';





echo "<li><a href='#'>Management Practices </a>";
echo '<ul class="dropdown-menu">';

	echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/0am5afl0j9fitg3t94cw/seed_info/pages'>seed</a></li>";
	echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/agd869kxetdci6eh2rtu/seed_stocking 	_info/pages'>seed stocking</a></li>";
	echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/kn1wb95ddf30lsq4cmla/feed_info/pages'>Feed & management</a></li>";
	echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/9f6eg1jh7aejydlovnzo/Disease_info/pages'>Disease and control mesure</a></li>";
	echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/qzo24qijf5nmpaxno7il/Harvesting_info/pages'>Harvesting</a></li>";

echo '</ul>';
echo '</li>';


echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/qzo24qijf5nmpaxno7ia/marketing/pages'>Marketing</a></li>";
echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/qzo24qijf5nmpaxno7ib/value_addition_info/pages'>Value addition</a></li>";
echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/qzo24qijf5nmpaxno7ic/infrastructure_info/pages'>Infrastructure</a></li>";
echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/qzo24qijf5nmpaxno7id/schemes_info/pages'>Govt. schemes</a></li>";
echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/qzo24qijf5nmpaxno7ie/institution_info/pages'>Institutions</a></li>";
echo "<li><a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/agri/view_slides/yp7vzmki26yj4f56tx0r/qzo24qijf5nmpaxno7if/Economics_info/pages'>Economics</a></li>";

	?>


<li><a href="<?php base_url();?>index.php/fisheries/view_fish_type_info">చేపల రకాలు</a>

<ul class="dropdown-menu">
<li ><a href="<?php echo base_url(); ?>index.php/fisheries/view_fish_type_info">view fish types</a>


<?php

$this->db->from('fish_type');

$this->db->select(array('fish_type_id','tname','icon'));


$result_fish_type=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_fish_type))
{
echo '<ul class="dropdown-menu">';

foreach ($result_fish_type as $fish_type_result) {


	echo "<li>";
	
	 echo "<div class='nav_file_option' >
 <a class='main_edit' href='".base_url()."index.php/fisheries/insert_fish/".$fish_type_result->fish_type_id."/".$encoded_url."'>

<img src='".base_url()."assets/img/file_option/document_edit.png'></a>";
 
  echo "<a  class='main_delete'  href='".base_url()."index.php/fisheries/delete_fish_type/".$fish_type_result->fish_type_id."/".$encoded_url."'>



<img src='".base_url()."assets/img/file_option/document_delete.png'</a>




  </div>";
	
	echo "<a class='popup fancybox fancybox.iframe'  href='".base_url()."index.php/agri/view_slides/".$fish_type_result->fish_type_id."/".$fish_type_result->fish_type_id."/fish_type_info/pages'><img id='menu_icon' src='".base_url()."assets/uploaded/img/".str_replace(' ','_',$fish_type_result->icon)."'/>".$fish_type_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>






</li>
<li ><a href="<?php echo base_url(); ?>index.php/fisheries/insert_fish">insert fish Type</a></li>	


	
	</ul>


</li>

	
	


	
	
<!-- end fisheris module-->	
	
     
    
 
          </div><!--/.nav-collapse -->
        </div><!--/.container -->
      </div>





    <div class="container" style="margin-top:70px;">

  
    </div> <!-- /container -->

<script>
	
var window_width=$(window).width();

if(window_width<=1024)
{
	$('.navbar-nav li a.nav_icon').css('padding','7px');
	//alert(window_width)
}


$(window).resize(function(){

var window_width=$(window).width();

if(window_width<=1024)
{
	$('.navbar-nav li a.nav_icon').css('padding','7px');
	//alert(window_width)
}
else
{
	$('.navbar-nav li a.nav_icon').css('padding','7px 20px');
}


});

//alert(window_width);


</script>


