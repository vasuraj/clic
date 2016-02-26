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
<style type="text/css">


@media print { .dontprint { display:none; } }
@media screen { .dontshow { display:none; } }


body
{

width:100%;
padding-left:20px;
padding-right:20px;
overflow: auto;
background-image: linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -o-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -moz-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -webkit-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);
background-image: -ms-linear-gradient(right bottom, rgb(163,194,199) 32%, rgb(132,154,173) 66%);

background-image: -webkit-gradient(
	linear,
	right bottom,
	left top,
	color-stop(0.32, rgb(163,194,199)),
	color-stop(0.66, rgb(132,154,173))
);

}

#form_area
{
background: #cedce7; /* Old browsers */
background: -moz-linear-gradient(top, #cedce7 0%, #91a5a4 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cedce7), color-stop(100%,#91a5a4)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #cedce7 0%,#91a5a4 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #cedce7 0%,#91a5a4 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #cedce7 0%,#91a5a4 100%); /* IE10+ */
background: linear-gradient(to bottom, #cedce7 0%,#91a5a4 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cedce7', endColorstr='#91a5a4',GradientType=0 ); /* IE6-9 */
box-shadow:0px -1px 1px white,
0px 1px 1px black;


}

#form_input
{
	padding:10px;


}


#form_text_area
{
	padding:10px;
}


.btn
{
	float:right;
	margin: 20px;
	margin-bottom: 5px;
	height:40px;
	
	font-size: 20px;
}

.btn-warning
{
background:;
}

input,option,select
{
	border-radius:2px;
margin:5px;
	border:none;
	box-shadow:-1px -1px 1px #89f;
	height: 25px;
	min-width:100px;
}

.well
{
	border-radius: 0px;
	
	box-shadow:0px 1px 1px #666;

}

</style>
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


<div class="row" id='header'>
	<div  class="col-xs-2 dontprint" id='logo'>
		<img src="<?php echo base_url();?>assets/img/logo/cic_logo.png" alt="cic_logo">
		<span id='logo_text'>CIC</span>
	</div>


<!-- menu starts here -->


 <div class="col-xs-10" id='header'>
<?php include 'template/header_menu.php';?>
</div>
</div>


<!-- menu ends here -->

<div class="row" id='form_area'>


<span class="row">

	
</span>


<div class="row">

	<?php
	$selected_agri=$this->uri->segment(3);
$selected_agri_intro=$this->uri->segment(4);

?>

<a  href='<?php echo base_url();?>index.php/agri/insert_agri_soils/<?php echo $selected_agri; ?>' class="btn btn-warning" >Next to Soils</a>
</div>

	<?php
 


if($selected_agri!='' || $selected_agri!=null)
{
$selected_agri_info=$this->model_agri->get_agri($selected_agri);


//print_r($selected_agri_info);

foreach ($selected_agri_info as $value) {
	


	 	$agri_id =$value->agri_id;
        $name =$value->name;
        $tname = $value->tname;
        $intro = $value->intro;
        $soils =$value->soils;
        $verities = $value->verities;
        $seasonality = $value->seasonality;
        $seed_quantity = $value->seed_quantity;
        $seed_treatment = $value->seed_treatment;
        $sowing  = $value->sowing;
        $water_management  = $value->water_management;
        $weed_management  = $value->weed_management;
        $nutrient_management  = $value->nutrient_management;
        $harvesting  = $value->harvesting;
        $economics  = $value->economics;
        $other_info  = $value->other_info;
       
    //    $this->db->insert('agri', $this);

}
}


if(!isset($name))
	{
		$name='';
	}

	if(!isset($tname))
	{
		$tname='';
	}





echo form_open('agri/store_slide/intro/'.$selected_agri,array('class'=>'form', 'enctype'=>'multipart/form-data'));
echo "<table>";



echo '<tr><td>
<span class="row">';

echo '<input type="file" name="slide_media_files[]" multiple class="upload" size="20" />';

echo '</span>';
echo '</td></tr>';












echo "<tr>";

echo "<td>";

$name = array(
			  'name'        => 'intro_id',
              'id'          => 'intro_id',
              'hidden'	=> 'hidden',
              'value'	=>	$intro,
             
              'size'        => '10',
              'style'       => 'width:400px; text-align:center;',
            );
echo form_input($name);

echo "</td>";
echo "</tr>";










echo "</table>"; 



//echo '<div class="col-xs-9" id="form_text_area">';

echo '<textarea  class="validate[required,custom[number]]"" name="text" id="content_2" ><p>'.$selected_agri_intro.'</p></textarea>';
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
 <input type='submit' class="btn btn-primary" value='save in intro'/>
<?php








echo form_close();



	 ?>
	

	

</body>
</html>