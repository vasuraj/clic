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



</head>
<body>

	<?php
			$server=$_SERVER['HTTP_HOST'];
			//echo $server;
			$request_url=$_SERVER['REQUEST_URI'];
			//echo $request_url;

			$full_address=$server.$request_url;
			$encoded_url= base64_encode($full_address);



//print_r($info);



?>
	

	
<?php
$machine_id =$this->uri->segment(3);

echo "<a class='main_add'  href='".base_url()."index.php/machine/insert_machine_address/".$machine_id.'/'.$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";

foreach ($info[0] as $vendor_info) {
echo "<div id='vendor_address'>";

//print_r($vendor_info);

 $machine_vendor_id=$vendor_info->machine_vendor_id;
 $machine_id =$vendor_info->machine_id;
 $address1=$vendor_info->address1;
$address2=$vendor_info->address2;
$landmark=$vendor_info->landmark;
$state=$vendor_info->state;
$district=$vendor_info->district;
$city=$vendor_info->city;
$pincode=$vendor_info->pincode;
$contact=$vendor_info->contact;
$email=$vendor_info->email;
$website=$vendor_info->website;
$note=$vendor_info->note;

if($district=="-1")
{
 $district="<font color='#999'>వివరాలు తెలియవు</font>" ;
}

if($landmark=="")
{
 $landmark="<font color='#999'>వివరాలు తెలియవు</font>" ;
}


if($city=="")
{
 $city="<font color='#999'>వివరాలు తెలియవు</font>" ;
}


if($pincode=="")
{
 $pincode="<font color='#999'>వివరాలు తెలియవు</font>" ;
}


if($contact=="")
{
 $contact="<font color='#999'>వివరాలు తెలియవు</font>" ;
}


if($email=="")
{
 $email="<font color='#999'>వివరాలు తెలియవు</font>" ;
}
if($website=="")
{
 $website="<font color='#999'>వివరాలు తెలియవు</font>" ;
}

echo "<a  class='slide_update' href='".base_url()."index.php/machine/insert_machine_address/".$machine_id."/". $machine_vendor_id.'/'.$encoded_url."'>
<section   id='file_option_links'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

echo "<a  class='slide_delete' href='".base_url()."index.php/machine/delete_machine_address/".$machine_id."/". $machine_vendor_id.'/'.$encoded_url."'>
<section   id='file_option_links'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";






echo "<table>";

echo "<tr>";



//echo "<td>Address: </td>";
echo "<td>చిరునామ: </td>";


echo "<td>".$address1." ".$address2."</td>";

echo "</tr>";

echo "<tr>";
//echo "<td>Landmark: </td>";
echo "<td>గుర్తించు వివరాలు: </td>";


echo "<td>".$landmark."</td>";

echo "</tr>";

echo "<tr>";
//echo "<td>State: </td>";

echo "<td>రాష్ట్రము: </td>";


echo "<td>";
if($state=='Andhra_Pradesh')
{
  echo "ఆంధ్ర ప్రదేశ్";
}
elseif($state=='telangana')
{
  echo "తెలంగాణ";
}

elseif($state=='other')
{
  echo "ఇతర రాష్ట్రము";
}

echo "</td>";

echo "</tr>";


echo "<tr>";
//echo "<td>District: </td>";

echo "<td>జిల్లా: </td>";


echo "<td>".$district."</td>";

echo "</tr>";


echo "<tr>";
//echo "<td>City: </td>";

echo "<td>పట్టణం: </td>";


echo "<td>".$city."</td>";

echo "</tr>";

echo "<tr>";
//echo "<td>Pincode: </td>";

echo "<td>పిన్ కోడ్ నెంబర్: </td>";


echo "<td>".$pincode."</td>";

echo "</tr>";




echo "<tr>";
//echo "<td>Phone Number: </td>";

echo "<td>ఫోన్ నెంబర్: </td>";


echo "<td>".$contact."</td>";

echo "</tr>";



echo "<tr>";
//echo "<td>Email: </td>";
echo "<td>ఈ -మెయిల్: </td>";


echo "<td>".$email."</td>";

echo "</tr>";



echo "<tr>";
//echo "<td>Website: </td>";

echo "<td>వెబ్సైటు: </td>";


echo "<td>".$website."</td>";

echo "</tr>";


echo "</table>";
echo "</div>";



}

?>


	





</body>
</html>