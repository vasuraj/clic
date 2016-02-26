<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery/jquery-1.8.2.min.js'; ?>"></script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.confirmon.min.js'; ?>"></script> 



<script type="text/javascript" src="<?php echo base_url().'bootstrap3/dist/js/bootstrap.min.js'; ?>"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">

<link rel="stylesheet" href="<?php  echo base_url().'assets/css/default.css'; ?>" type="text/css">
<!--


<script type="text/javascript" src="<?php// echo base_url().'assets/js/jquery.reveal.js'; ?>"></script>

<link rel="stylesheet" href="<?php // echo base_url().'assets/css/model_window.css'; ?>" type="text/css">
-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_adv_main_info.css'; ?>">

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
  

  <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    
<link href="<?php echo base_url();?>assets/css/sm_bootstrap/jquery.smartmenus.bootstrap.css" rel="stylesheet" type="text/css" />



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/css/sm_bootstrap/jquery.smartmenus.bootstrap.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/sm/jquery.smartmenus.min.js"></script>

    <!-- SmartMenus jQuery Bootstrap Addon -->
    


    <!-- ******************smart menu end here ********************************** -->

	<script>


  $(function() 
  {
   //alert('running');       
  
    $('a.main_delete').click(function(e)
     
    {
  e.preventDefault();
  // alert('clicked');
	


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



</head>
<body>

<?php
$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);


?>


<div class="row">

	 <div class="col-xs-12" id='header'>

			<?php include 'template/header_menu2.php';?>

	</div>

</div>



<div class="row content_area" >
		
	<section class="col-xs-2 '" >
	
		<div class="row main_list" >
<?php

echo "<table id='weather_info'>";

//print_r($info);
if(!empty($info))
{
echo '<tr class="title" >';
		
		echo '<td>Advisory Date</td>';
	
		
	//	echo '<td class="dontprint" style="max-width:10px;"></td>';
	echo '</tr>';
echo '</table>';
}
echo '</div>';


echo '<div class="row adv_main_list_area animated flipInY" >';


$i=1;


if(isset($info))
	foreach($info as $infodata)
{



//echo "<br>".$infodata->adv_main_id."</br>";

echo "<table id='weather_info'>";

	echo '<tr >';
		
		
		echo '<td>';


		echo "<div id='file_option_area'>";

echo "<a class='main_delete'  href='".base_url()."index.php/advisory/delete_adv_main/".$infodata->adv_main_id."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "<a class='main_edit' href='".base_url()."index.php/advisory/update_adv_main/".$infodata->adv_main_id."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

echo "</div>";


echo '<div class="adv_main_list">

	<a href="'.$infodata->adv_main_id.'">';


	$old_date_format=$infodata->date;

	$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_format);
	$new_date_format = $myDateTime->format('F d, Y');

		echo $new_date_format;

	

		
echo '</a>
</div>';




echo '</td>';


		$i++;
		
	echo '</tr>';
}
echo "</table>";
echo '</div>';
?>
</section>



<section class="col-xs-10 " >
	

	<div class="row" id='tabs'>

<?php


//print_r($info);

//echo '<br>';
echo '<div id="tab_area">';
echo '<ul id="tab">';

if(isset($info[0]))
{
$initial_adv_main_id=$info[0]->adv_main_id;
$initial_crop_id=$info[0]->crop;


//print_r($info);
}
if(isset($initial_adv_main_id))
{
$this->db->from('adv_main');
$this->db->select(array('crop','vegetable','fruit','livestock'));
$this->db->where('adv_main_id',$initial_adv_main_id);
$adv_ids=$this->db->get()->result();
}


//print_r($adv_ids);
if(isset($info[0]))
{

echo "<li ><a id='crop' target='slides' href='".base_url().'index.php/advisory/view_advisory_sub_info/'.$info[0]->adv_main_id."/".$adv_ids[0]->crop."/crop/pages' >Crops</a>";

echo "<a  class='main_add'  href='".base_url()."index.php/advisory/insert_advisory_sub/".$initial_adv_main_id."/crop/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";

echo "</li>";
echo "<li ><a id='veg' target='slides' href='".base_url().'index.php/advisory/view_advisory_sub_info/'.$info[0]->adv_main_id."/".$adv_ids[0]->vegetable."/vegetable/pages' >Vegetables</a>";

echo "<a  class='main_add'  href='".base_url()."index.php/advisory/insert_advisory_sub/".$initial_adv_main_id."/vegetable/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";


echo "</li>";
echo "<li ><a id='fruit' target='slides' href='".base_url().'index.php/advisory/view_advisory_sub_info/'.$info[0]->adv_main_id."/".$adv_ids[0]->fruit."/fruit/pages' >Fruit</a>";

echo "<a  class='main_add'  href='".base_url()."index.php/advisory/insert_advisory_sub/".$initial_adv_main_id."/fruit/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";


echo "</li>";
echo "<li ><a id='livestock' target='slides' href='".base_url().'index.php/advisory/view_advisory_sub_info/'.$info[0]->adv_main_id."/".$adv_ids[0]->livestock."/livestock/pages' >Livestock</a>";

echo "<a  class='main_add'  href='".base_url()."index.php/advisory/insert_advisory_sub/".$initial_adv_main_id."/livestock/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";


echo "</li>";


}

echo '</ul>';
echo "</div>";


?>

	</div>

	<div class="row" id='content' >

	



<script>
$(document).ready(function() {

	$("li a#crop").parent().addClass("selected");
	
    $('#tab li a').click(function(d)
    {
    	 $('li.selected').removeClass('selected')
         $(this).parent('li').addClass("selected");
     });


});

</script>

<?php
		
if(isset($info[0]))
		echo "<iframe name='slides' src='".base_url()."assets/blank_iframe_text_agri.html' id='slides' src='none'></iframe>";
	else
		echo "<div id='notification-warning'>No informartion to display</div>";


		?>
	</div>


</section >
</div>



<script type="text/javascript">

$(document).ready(function() {



$('.adv_main_list a').parent().parent().first().addClass("selected");


	$('iframe').attr('src','<?php echo base_url()."index.php/advisory/view_advisory_sub_info/".$initial_adv_main_id."/".$initial_crop_id."/crop"; ?>');

//alert('code_running');




    $('.adv_main_list a').click(function(e){
    	e.preventDefault();
    	

         $('.selected').removeClass('selected')

         $(this).parent().parent().addClass("selected");

         // $("#tabs").replaceWith("<div class='row' id='tabs'>"+$(this).attr('href')+"</div>");

     //ajax request hre
//alert($(this).attr('href'));

//alert('<?php echo base_url(); ?>index.php/advisory/get_advisory_tabs/'+$(this).attr('href'));
$.get( "<?php echo base_url(); ?>index.php/advisory/get_advisory_tabs/"+$(this).attr('href'), function( data ) {
	 
$( "#tabs" ).html( data );

//alert('okey till here');

$("a.crop").click();



var text = $("a.crop").attr('href');

var section='default';




//$('#slides').contents().find('body').html('http://localhost/cic_latest/index.php/advisory/view_advisory_sub_info/48fn7z77vlg0tndtoepy/jrhy8yjpnpv8vwtgox53/pages');



$('iframe').attr('src',text+'/'+section);

//alert( "Load was performed." );
});


// ajax request ends here





    });



});









</script>


<script type="text/javascript">


$(document).ready(function() {


});

</script>






</body>
</html>