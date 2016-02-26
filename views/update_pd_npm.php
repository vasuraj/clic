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
<link href="<?php echo base_url();?>assets/css/sm/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />
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


#type_label
{
float:left;
 margin-left:18px;
 margin-top:-5px;
color:white;
font-size:20px;
padding:5px 20px;
;
box-shadow:0px 1px 1px white,
2px 0px 1px black;
border-radius:0px 0px 10px 10px;


 background: #d0e4f7; /* Old browsers */
background: -moz-linear-gradient(top, #d0e4f7 0%, #56a3ad 11%, #05606b 50%, #204e56 79%, #35515b 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d0e4f7), color-stop(11%,#56a3ad), color-stop(50%,#05606b), color-stop(79%,#204e56), color-stop(100%,#35515b)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #d0e4f7 0%,#56a3ad 11%,#05606b 50%,#204e56 79%,#35515b 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #d0e4f7 0%,#56a3ad 11%,#05606b 50%,#204e56 79%,#35515b 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #d0e4f7 0%,#56a3ad 11%,#05606b 50%,#204e56 79%,#35515b 100%); /* IE10+ */
background: linear-gradient(to bottom, #d0e4f7 0%,#56a3ad 11%,#05606b 50%,#204e56 79%,#35515b 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d0e4f7', endColorstr='#35515b',GradientType=0 ); /* IE6-9 */
}

#type_label:after
{
content : url(../images/bon-end.png);

}


#npm_box{
	width:80px;height:230px; overflow:hidden; border:1px solid gray;  display:inline-block;

margin:5px;
}
#npm_box img{
	margin:auto; width:80px;height:70px;
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


<!-- menu starts here -->


 <div class="col-xs-12" id='header'>
<?php include 'template/header_menu2.php';?>
</div>
</div>


<!-- menu ends here -->

<div class="row" id='form_area'>


<span class="row">

	
</span>


<div class="row">

	<?php




	$npm_to_add=$this->uri->segment(3);
	$selected_npm_id=$this->uri->segment(4);


	$this->db->select(array('npm_attached','control_text')); 
    $this->db->from('agri_pd_npm');
    $this->db->where('pd_npm_id',$selected_npm_id) ;  
   	$result_pd_control= $this->db->get()->result();
	

	$npm_attacted=explode('+',$result_pd_control[0]->npm_attached);

	$control_text=$result_pd_control[0]->control_text;


//print_r($npm_attacted);
//echo $control_text;

//print_r($result_pd_control);



	$this->db->select(array('npm_id','name','tname','icon')); 
    $this->db->from('npm');   
   
   	$result_npm= $this->db->get()->result();

//$selected_npm_ids=$this->db->get()->result();

//$selected_npm_id=$selected_npm_ids[0]->pd_npm_id;


$slide_text='';

$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);








echo form_open('agri_pd/store_update_pd_npm/'.$npm_to_add.'/'.$selected_npm_id,array('class'=>'form well', 'enctype'=>'multipart/form-data'));

echo "<table>";




echo "<tr>";
echo "<td>";
echo form_label('npm','npm_id');
echo "</td>";
echo "<td>";

foreach($result_npm as $npm_record)
{


echo "<div id='npm_box'>
<img  src='".base_url()."assets/uploaded/img/thumb_".$npm_record->icon."' />

<input type='checkbox' name='npm_id[]' id='npm_id' ";

if( in_array($npm_record->npm_id, $npm_attacted))
{
	echo "checked='true'";
}


echo "value='".$npm_record->npm_id."'/>";

echo $npm_record->name.'/ '.$npm_record->tname;

echo "</div>";

}
echo "</td>";
echo "</tr>";








echo "</table>"; 



//echo '<div class="col-xs-9" id="form_text_area">';

echo '<textarea  class="validate[required,custom[number]]"" name="control_text" id="content_2" >'.$control_text.'</textarea>';
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

//echo $sections[$key]; ?>


 <input type='submit' class="btn btn-primary" value=' 


<?php if($npm_to_add=="fresh" )

{
echo 'Save NPM';	
}
else
{
echo 'update NPM';		
}
 ?>

 '/>


<?php








echo form_close();



	 ?>
	

	

</body>
</html>