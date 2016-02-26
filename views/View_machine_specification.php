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
<link rel="stylesheet" href="<?php echo base_url().'assets/css/attached_link.css'; ?>" type="text/css">


  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
  



<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />




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



<script type="text/jaavascript">
   

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



  $('.fancybox').fancybox({

    'autoDimensions'  : true,
    'height' : 400,
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
<style>


</style>


</head>
<body>

	<?php
			$server=$_SERVER['HTTP_HOST'];
			//echo $server;
			$request_url=$_SERVER['REQUEST_URI'];
			//echo $request_url;

			$full_address=$server.$request_url;
			$encoded_url= base64_encode($full_address);



$machine_id=$info->machine_id;
$name= $info->name;
$tname=$info->tname;
$icon=$info->icon;
$category=$info->category;
$powered=$info->powered;
$agri_id=explode('+',$info->agri_id);
$other_crops=$info->other_crops;
$notes=$info->notes;
$subsidy_link=$info->subsidy_link;
$machine_image=$info->machine_img;



echo "<a  class='slide_update' href='".base_url()."index.php/machine/insert_machine/".$machine_id."/".$encoded_url."'>
<section   id='file_option_links'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";


?>
	<!--

	<img id='machine_icon' src="<?php // echo base_url().'assets/uploaded/img/'.$icon; ?>" alt="" />
	

	-->

	<table id='specification'>

		<tr>
			<!-- <td>Category:</td>  -->
			<td>దేనికోసం:</td>

			<td><?php

if($category=='sowing')
{
	 echo "విత్తుకోవడం/ నాట్లువేయడం"; 
}

elseif ($category=='tillage') {
	
 echo "నేల తయారీ"; 
}
	
elseif ($category=='weeding') {
	
 echo "కలుపు తీయడం"; 
}


elseif ($category=='harvesting') {
	
 echo "పంటకోత"; 
}


elseif ($category=='pesticid_application') {
	
 echo "పురుగుమందుల పిచికారి"; 
}


elseif ($category=='fertilizer_application') {
	
 echo "ఎరువు వేయడం"; 
}



elseif ($category=='other') {
	
 echo "ఇతరములకు"; 
}






			 ?></td>
		</tr>
		<tr>
			<!-- <td>Powered :</td>-->

			<td>ఎలా పనిచేస్తుంది :</td>
			<td><?php 

if ($powered=='motor') {
	
 echo "మోటార్"; 
}

elseif ($powered=='bullock') {
	
 echo "ఎద్దులు"; 
}


elseif ($powered=='manual') {
	
 echo "చేతి పని"; 
}

elseif ($powered=='other') {
	
 echo "ఇతరములకు"; 
}



			


			?></td>
		</tr>
		<tr>
		<!--	<td>Use in :</td> -->

				<td>ఏ పంటలకు :</td>
			<td id='crops_link'><?php 

			foreach($agri_id as $agri_id)
			{

 	$this->db->select(array('agri_id','category','name','tname','icon')); 
 	$this->db->from('agri');   
   $this->db->where('agri_id',$agri_id);
   $result_agri_id= $this->db->get()->result();


if(!empty($result_agri_id))
{


echo "<a target='_blank' href='".base_url()."index.php/agri/view_agri/".$result_agri_id[0]->category."/".$result_agri_id[0]->agri_id."'><img id='crops_icon' src='".base_url()."assets/uploaded/img/".str_replace(' ','_',$result_agri_id[0]->icon)."' alt='' /></a>";

						//	echo $agri_id;


			} 
		}
			if($other_crops!="")
			{
			echo "<section id='crops_icon_text'>".$other_crops."</section>";

}


			?></td>
		</tr>
		<tr>
			<!-- <td>subsidy</td>-->

			<td>రాయితీ సదుపాయం :</td>
			<td><?php 


			if($subsidy_link!="")
			{
			echo "<a href='".base_url().'assets/uploaded/document/'.$subsidy_link."'>Download Document</a>";
			}
			else
			{
				//echo "No subsidy available";
				echo "రాయితీ సదుపాయం లేదు";
			}

			?></td>
		</tr>
		
	</table>

	<div id='notes'>
	<div><font color='#369'>వివరాలు :</font></div>
<?php

echo $notes;

?>


	</div>





</body>
</html>