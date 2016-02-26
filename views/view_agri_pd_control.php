<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.10.2.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'bootstrap3/dist/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/zebra_datepicker.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.tinycarousel.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/shadowbox.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.confirmon.min.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.confirmon.css'; ?>" type="text/css">

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url().'assets/css/shadowbox.css'; ?>" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_agri_tab_info.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/cic_bootstrap_pagination_style_green.css'; ?>">


<style>
	#control_text
	{
	background: #d9e3e7; /* Old browsers */
background: -moz-linear-gradient(top,  #d9e3e7 0%, #8fa6c1 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d9e3e7), color-stop(100%,#8fa6c1)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #d9e3e7 0%,#8fa6c1 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #d9e3e7 0%,#8fa6c1 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #d9e3e7 0%,#8fa6c1 100%); /* IE10+ */
background: linear-gradient(to bottom,  #d9e3e7 0%,#8fa6c1 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d9e3e7', endColorstr='#8fa6c1',GradientType=0 ); /* IE6-9 */

text-align: justify;
	padding:0px 50px 30px 0px;
	color:#000;
	font-size:20px;
	font-weight: bold;
	text-shadow:0px 1px 1px #fff;


		margin-left:5px;
		width:100%;
		padding:20px 30px;
		box-shadow:0px 2px 5px -2px #000;
		border-radius:2px;
		
	}


#attached_npm_box
{
	margin:auto;

	border:1px solid #eee;
font-size: 20px;
	color:#fff;
	width:240px;
	display:inline-block;
	text-align:center;
	margin:5px;
	box-shadow:0px 1px 1px #888;
padding:10px;
	vertical-align: top;



	background: #d9e3e7; /* Old browsers */
background: -moz-linear-gradient(top,  #d9e3e7 0%, #8fa6c1 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d9e3e7), color-stop(100%,#8fa6c1)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #d9e3e7 0%,#8fa6c1 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #d9e3e7 0%,#8fa6c1 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #d9e3e7 0%,#8fa6c1 100%); /* IE10+ */
background: linear-gradient(to bottom,  #d9e3e7 0%,#8fa6c1 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d9e3e7', endColorstr='#8fa6c1',GradientType=0 ); /* IE6-9 */



}

#attached_npm_box img
{
	height:100px;
	width:100px;
	margin:5px;
	border:2px solid #222;
	box-shadow: 0px 1px 1px #8aa;
}


#attached_npm_box a
{
	
text-decoration:none;
font-weight:bold;
color:#123;

}

#attached_npm_box h4
{

border-bottom:1px solid #eee;
border-top:1px solid #eee;

background:#095;
line-height: 35px;

box-shadow:0px -1px 1px #c8d7dc,
0px 1px 1px #c8d7dc;
color:#fff;

}



#poster
{
	width:50%;
	float:right;
	margin-left:20px;
}
#poster img
{
	width:100%;
	
	border:3px solid #eee;


}

#poster_no_text
{
	width:50%;
	margin:auto;

}
#poster_no_text img
{
	width:100%;
	
	border:3px solid #eee;

}

</style>
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




<script>
	$(function()
	{

$('li#control a').click(function(e)
	{
		e.preventDefault();
		var button_pressed=$(this).attr('href');
if(button_pressed=='plus')
{

var fontsize=$('#control_text').css("font-size");

//alert(fontsize);

var newfontsize = parseInt(fontsize.replace(/px/, "")) + 2;
$('#control_text').css("font-size",newfontsize);

//alert(newfontsize);
}
if((button_pressed=='minus'))
{
var fontsize=$('#control_text').css("font-size");
	var newfontsize = parseInt(fontsize.replace(/px/, "")) - 2;
$('#control_text').css("font-size",newfontsize);

}


	});


	});


</script>



</head>
<body>

<div class="row" >
	<div  class="col-xs-12 dontprint" >




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


if(!empty($info))
{



echo "<div id='file_option_area'>";
echo "<a target='_blank' class='slide_add' href='".base_url()."index.php/agri_pd/update_pd_npm/update/".$info[0]->pd_npm_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit_2.png'></section></a>";
echo "</div>";


foreach ($info as $control_record) {

	//echo $control_record->npm_attached;

$npm_attached_array=explode('+', $control_record->npm_attached);

//print_r($npm_attached_array);


foreach($npm_attached_array as $npm_attached_record)
{
	
if($npm_attached_record!=null){
	//echo "<a href='".base_url()."index.php/npm/view_npm/".$npm_attached_record."'/>here</a>";

$this->db->from('npm');
$this->db->select(array('npm_id','name','tname','category','icon'));
$this->db->where('npm_id',$npm_attached_record);
$npm_info=$this->db->get()->result();



echo "<div id='attached_npm_box'>";



echo "<a target='_blank' href='".base_url()."index.php/npm/view_npm/".$npm_info[0]->npm_id."'>";

echo "<img src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ','_',$npm_info[0]->icon)."'>";

echo "<h4>".$npm_info[0]->name."</h4>";

echo $npm_info[0]->tname;




echo "</a>";
//print_r($npm_info);

echo "</div>";



}



	
}
echo "<div id='control_text'>";
echo "<div id='zoom_controls'>";
	echo "<li id='control'><a href='plus''>+</a></li>";
	echo "<li id='control'><a href='minus''>-</a></li>";
	echo "</div>";



echo $control_record->control_text;
	echo "</div>";
}
}
else
{

echo "<div class='animated bounceInDown ' id='notification'><sapn >No informartion entered 
<p><a id='notification_button' href='".base_url()."index.php/agri_pd/insert_pd_npm/fresh/".$this->uri->segment(3)."'>enter now</a>


</span></div>";

}

?>

<script type="text/javascript">

    $(document).ready(function(){
                
        $('#slider-code').tinycarousel({ axis: 'x', pager: true, interval: true  });
         $('#slider-code2').tinycarousel({ axis: 'x', pager: true, interval: true  });
         


        
    });
</script> 

<script type="text/javascript">
Shadowbox.init();
Shadowbox2.init();

</script>

<script type="text/javascript">

//$('#video-tooltip').tooltip();
</script>
</div>

</div>

</body>
</html>