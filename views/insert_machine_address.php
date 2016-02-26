  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.10.2.min.js'; ?>"></script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'; ?>" type="text/css"/>


<link rel="stylesheet" href="<?php echo base_url().'assets/css/cic_form.css'; ?>" type="text/css">


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/sm/sm-core-css.css" rel="stylesheet" type="text/css" />

<!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
<link href="<?php echo base_url();?>assets/css/sm/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />



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


<div class="row " id='header'>

<!-- menu starts here -->


 <div class="col-xs-12" id='header'>
<?php include 'template/header_menu2.php';?>
</div>
</div>
<?php 
echo $this->pagination->create_links();  

?>

<!-- menu ends here -->

<div class="row content_area" id='form_area'>

<div class="col-xs-12" id='form_input'>
	<?php

	 
$selected_machine=$this->uri->segment(3);
$vendor_address_id =$this->uri->segment(4);

if(strlen($vendor_address_id)==20)
{
$return_to=$this->uri->segment(5);

$this->db->from('machine_vendor');
$this->db->where('machine_vendor_id',$vendor_address_id);
$result_address=$this->db->get()->result();

//print_r($result_address);


$address1=$result_address[0]->address1;
$address2=$result_address[0]->address2;
$landmark=$result_address[0]->landmark;
$state=$result_address[0]->state;

$district=$result_address[0]->district;
$city=$result_address[0]->city;
$pincode=$result_address[0]->pincode;

$contact=$result_address[0]->contact;
$email=$result_address[0]->website;
$note=$result_address[0]->note;


}
//echo $selected_machine;


if(!isset($name))
	{
		$name='';
	}

	if(!isset($tname))
	{
		$tname='';
	}


  if(!isset($address1))
  {
    $address1='';
  }


  if(!isset($address2))
  {
    $address2='';
  }

    if(!isset($landmark))
  {
    $landmark='';
  }


    if(!isset($city))
  {
    $city='';
  }

   if(!isset($pincode))
  {
    $pincode='';
  }

     if(!isset($other_crops))
  {
    $other_crops='';
  }

       if(!isset($notes))
  {
    $notes='';
  }

      if(!isset($email))
  {
    $email='';
  }



      if(!isset($website))
  {
    $website='';
  }

    if(!isset($contact))
  {
    $contact='';
  }


    if(!isset($note))
  {
    $note='';
  }













$final_state='Andhra_Pradesh';
$final_powered='motor';


if(strlen($vendor_address_id)==20)
{

echo form_open('machine/store_machine_vendor/'.$selected_machine.'/'.$vendor_address_id.'/'.$return_to,array('class'=>'form','enctype'=>'multipart/form-data'));

}
else
{

echo form_open('machine/store_machine_vendor/'.$selected_machine,array('class'=>'form','enctype'=>'multipart/form-data'));


}


echo "<table>";








echo "<tr>";
echo "<td>";
echo form_label('Vendor address','address1');
echo "</td>";
echo "<td>";
$address1_info = array(
        'name'        => 'address1',
              'id'    => 'address1',
              'value' =>  $address1,
              'class' => 'validate[required]',
              'size'  => '10',
              'style' => 'width:500px; text-align:left; padding-left:20px;',
            );
echo form_input($address1_info);
echo "</td>";
echo "<td>";

echo "<a id='next_to' href='".base_url()."index.php/machine/insert_machine' />add new Machine</a>";

echo "</td>";
echo "</tr>";


echo "<tr><td>";
echo form_label('','address2');
echo "</td>";
echo "<td>";
$address2_info = array(
        'name'        => 'address2',
              'id'    => 'address2',
              'value' =>  $address2,
              'class' => '',
              'size'  => '10',
              'style' => 'width:500px; text-align:left; padding-left:20px;',
            );
echo form_input($address2_info);

echo "</td>";
echo "</tr>";


echo "<tr><td>";
echo form_label('landmark','landmark');
echo "</td>";
echo "<td>";
$landmark_info = array(
        'name'        => 'landmark',
              'id'    => 'landmark',
              'value' =>  $landmark,
              'class' => 'validate[required]',
              'size'  => '10',
              'style' => 'width:500px; text-align:left; padding-left:20px;',
            );
echo form_input($landmark_info);

echo "</td>";
echo "</tr>";




echo "<tr>";
echo "<td>";
echo form_label('State','state');
echo "</td>";
echo "<td>";

$state_option_data = array(
        'none'=>'--',
        'Andhra_Pradesh'=>'Andhra Pradesh',
        'telangana'=>'telangana',
        'Tamilnadu'=>'Tamilnadu',


              'other'=>'other'
            );

echo form_dropdown('state',$state_option_data,$final_state);
echo "<span style='margin-left:20px; font-weight:bold;'>District</span>";

echo '
<select name="District" id="District" class="wdth" onchange="callChangefunc(this.id)"><option value="-1">ALL</option>
<option value="Adilabad">Adilabad</option>
<option value="Anantapur">Anantapur</option>
<option value="Chittoor">Chittoor</option>
<option value="East Godavari">East Godavari</option>
<option value="Guntur">Guntur</option>
<option value="Hyderabad">Hyderabad</option>
<option value="Kadapa">Kadapa</option>
<option value="Karimnagar">Karimnagar</option>
<option value="Khammam">Khammam</option>
<option value="Krishna">Krishna</option>
<option value="Kurnool">Kurnool</option>
<option value="Mahabubnagar">Mahabubnagar</option>
<option value="Medak">Medak</option>
<option value="Nalgonda">Nalgonda</option>
<option value="Nizamabad">Nizamabad</option>
<option value="Prakasam">Prakasam</option>
<option value="Ranga Reddy">Ranga Reddy</option>
<option value="S.P.S Nellore">S.P.S Nellore</option>
<option value="Srikakulam">Srikakulam</option>
<option value="Visakhapatnam">Visakhapatnam</option>
<option value="Vizianagaram">Vizianagaram</option>
<option value="Warangal">Warangal</option>
<option value="West Godavari">West Godavari</option>
</select>';














echo "</td>";
echo "</tr>";





echo "<tr><td>";
echo form_label('city','city');
echo "</td>";
echo "<td>";
$city_info = array(
        'name'        => 'city',
              'id'    => 'city',
              'value' =>  $city,
              'class' => 'validate[required]',
              'size'  => '10',
              'style' => 'width:300px; text-align:left; padding-left:20px;',
            );
echo form_input($city_info);


echo "<span style='margin-left:20px; font-weight:bold;'>Pincode</span>";

$pincode_info = array(
        'name'        => 'pincode',
              'id'    => 'pincode',
              'value' =>  $pincode,
              'class' => 'validate[required]',
              'size'  => '10',
              'style' => 'width:103px; text-align:left; margin-left:20px;',
            );
echo form_input($pincode_info);

echo "</td>";


echo "</tr>";





echo "<tr><td>";
echo form_label('Contact No(+91)','contact');
echo "</td>";
echo "<td>";
$contact_info = array(
        'name'        => 'contact',
              'id'    => 'contact',
              'value' =>  $contact,
              'class' => 'validate[required]',
              'size'  => '10',
              'style' => 'width:500px; text-align:left; padding-left:20px;',
            );
echo form_input($contact_info);

echo "</td>";
echo "</tr>";



echo "<tr><td>";
echo form_label('email','email');
echo "</td>";
echo "<td>";
$email_info = array(
        'name'        => 'email',
              'id'    => 'email',
              'value' =>  $email,
              'class' => 'validate[required]',
              'size'  => '10',
              'style' => 'width:500px; text-align:left; padding-left:20px;',
            );
echo form_input($email_info);

echo "</td>";
echo "</tr>";




echo "<tr><td>";
echo form_label('website','website');
echo "</td>";
echo "<td>";
$website_info = array(
        'name'        => 'website',
              'id'    => 'website',
              'value' =>  $website,
              'class' => 'validate[required]',
              'size'  => '10',
              'style' => 'width:500px; text-align:left; padding-left:20px;',
            );
echo form_input($website_info);

echo "</td>";
echo "</tr>";




echo "<tr><td>";
echo form_label('Note','note');
echo "</td>";
echo "<td>";
$note_info = array(
        'name'        => 'note',
              'id'    => 'note',
              'value' =>  $note,
              'class' => '',
              'size'  => '10',
              'style' => 'width:500px; text-align:left; padding-left:20px;',
            );
echo form_textarea($note_info);

echo "</td>";
echo "</tr>";






echo "</table>"; 





echo "</div>";

//echo '<div class="col-xs-9" id="form_text_area">';

//echo '<textarea name="other_info" id="content_2" ><p>'.trim($other_info).'</p></textarea>';
//echo display_ckeditor($ckeditor_2);

 ?>

<?php
//echo '<textarea name="content_2" id="content_2" ><p>Example data</p></textarea>';
 //echo display_ckeditor($ckeditor_2); 
//echo '</textarea> ';
?>



<script type="text/javascript">

 $(document).ready(function(){
        $("form.form").validationEngine('attach');
       });
//$(".form").validationEngine('validate');

/*
$(document).ready(function() {
     $('input.btn.btn-primary').attr('disabled','disabled');
     $('input[type="text"]').keyup(function() {
        if($(this).val() != '') {
           $('input.btn.btn-primary').removeAttr('disabled');
        }
        else {
        $('input.btn.btn-primary').attr('disabled','disabled');
        }
     });
 });
*/

</script>
<?php

//echo "</div>";

?>
 <input type='submit' id='submit' value='save'/>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>