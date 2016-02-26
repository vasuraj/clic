<?php
include 'template/header.php';
?>

<script type="text/javascript" src="<?php echo base_url().'bootstrap3/dist/js/bootstrap.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">




<script>


  $(function() 
  {

/*
  $( "#forecast_panel" ).animate({
    
    
    left:0
  }, 2000, function() {



    $(".advisory_label a").show().animate({
    
    height:29
   
    },600, function() {


     

      });


    



});

*/




   //  alert('running');       
    $('.main_delete').click(function(e)
      
        {
  e.preventDefault();
  //alert('clicked');
  


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

//*******************************************
//change in wather icon on hover [starts] here
//*******************************************


 $('#weather_info tr').mouseover(function(e)
 {



 });







//*******************************************
//change in wather icon on hover [ends] here
//*******************************************






  });



    </script>




<!--

<script type="text/javascript">
    $(document).ready(function() {

 $('a.popup').colorbox();


    });
-->

</script>



<script type="text/javascript">
   

$(document).ready(function() {
    $('.popup').fancybox({

    'fitToView' :true,
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

var screen_width=$(window).width();
var screen_height=$(window).height();

$( window ).resize(function() {
var screen_width=$(window).width();
var screen_height=$(window).height();

});
  



  $('.fancybox').fancybox({

   
    'width' :(screen_width-200),

     'fitToView' : true,
    'type': 'iframe',
   'scrolling': 'no',
  'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'preload'   : true,


  });
});




  </script>

<!--
\
  <style type="text/css">
    
    .fancybox-custom .fancybox-skin {
      box-shadow: 0 0 50px #222;
    }


    </style>

    -->

<?php
      $server=$_SERVER['HTTP_HOST'];
      //echo $server;
      $request_url=$_SERVER['REQUEST_URI'];
      //echo $request_url;

      $full_address=$server.$request_url;
      $encoded_url= base64_encode($full_address);
  ?>
  

<div  class="row ">
  <div class="col-md-5 animated bounceInLeft" id='forecast_panel'>

  <?php

  $latest_weather_forecast_info=$this->model_weather->get_latest_forecast();

 // $latest_weather_forecast_info=array();

if(!empty($latest_weather_forecast_info))
{
  ?>
 <span  class='table_label'>
Forecast Weather Information
 </span>
 <!--

   <span class='advisory_label cl-effect-20'>
<a href="<?php// base_url(); ?>index.php/advisory/view_advisory">Advisory</a>
 </span>
-->
  <nav  class="advisory_label cl-effect-21">
          <a  style='color:#fff;' href="<?php base_url(); ?>index.php/advisory/view_advisory"><span data-hover="Advisory">Advisory</span></a>
    </nav>

<table id='weather_info' class='weather_info'>

<tr class='title'>
  

<td></td>
<td>Min-Temp (°C)</td>
<td>Max Temp (°C)</td>
<td>Min Wind (KMPH)</td>
<td>Max Wind (KMPH)</td>
<td></td>

</tr> 

<?php
foreach($latest_weather_forecast_info as $latest_weather_forecast_records)
{
  $old_date_forecast=$latest_weather_forecast_records->date;

$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_forecast);
$date_forecast = $myDateTime->format('F d, Y');



if($old_date_forecast==date('Y-m-d'))
{

echo "<tr class='current_day'>";

}
else
{

  echo "<tr>";
}

  echo "<td  id='weather_info_cloud_icon'><img src='assets/img/weather/selected/".$latest_weather_forecast_records->rainfall_description.".png'/>


<p>".$date_forecast."</p>


  </td>";



  echo "<td>".$latest_weather_forecast_records->temp_min_min."-".$latest_weather_forecast_records->temp_min_max."</td>";
  echo "<td>".$latest_weather_forecast_records->temp_max_min."-".$latest_weather_forecast_records->temp_max_max."</td>";
  echo "<td>".$latest_weather_forecast_records->wind_min_min."-".$latest_weather_forecast_records->wind_min_max."</td>";
  echo "<td>".$latest_weather_forecast_records->wind_max_min."-".$latest_weather_forecast_records->wind_max_max."</td>";
  echo "<td> <a  class='main_edit'  href='".base_url()."index.php/weather/insert_forecast/".$latest_weather_forecast_records->date."/".$encoded_url."'>

<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a><br>";
  echo "<a  class='main_delete'  href='".base_url()."index.php/weather/delete_forecast/".$latest_weather_forecast_records->date."/".$encoded_url."'>

<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>

  </a></td>";

  echo "</h>";
  
}

?>




  
</table>
 <span class='more_info'>
  <!--  <button class="punch"><a href='<?php // echo base_url(); ?>index.php/weather/view_forecast/pages'>View More</a></button>

  -->



        <nav class="cl-effect-20">
          <a  href="<?php echo base_url(); ?>index.php/weather/view_forecast"><span data-hover="View More">View More</span></a>
            </nav>
      

 </span>

<?php


}
else
{
  echo "<div class='widget_notice'>There is no Data available for forecast weather information

<a id='add_now' href='".base_url()."index.php/weather/insert_forecast/'>add now</a>
  </div>";
}


?>




<?php

  $latest_weather_recorded_info=$this->model_weather->get_recorded_home();
  

if(!empty($latest_weather_recorded_info))
{
?>

 <span class='table_label'>
Recorded Weather Information
 </span>
 
<table id='weather_info' class='weather_info'
>
 <tr class='title'>
  


<td></td>
<td>Min-Temp (°C)</td>
<td>Max Temp (°C)</td>
<td>Wind Speed(KMPH)</td>

<td>Rainfall</td>
<td>Humidity</td>
<td></td>

</tr> 
<?php
foreach($latest_weather_recorded_info as $latest_weather_recorded_records)
{

$old_date_recorded=$latest_weather_recorded_records->date;

$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_recorded);
$date_recorded = $myDateTime->format('F d, Y');


echo "<tr>";
 
  echo "<td id='weather_info_cloud_icon'><img src='assets/img/weather/selected/".$latest_weather_recorded_records->rainfall_description.".png'/>

<p>".$date_recorded."</p>

  </td>";
  echo "<td>".$latest_weather_recorded_records->temp_min;
  echo "<td>".$latest_weather_recorded_records->temp_max;
  echo "<td>".$latest_weather_recorded_records->wind_max."</td>";
  
  echo "<td >".$latest_weather_recorded_records->rainfall." mm</td>";
  echo "<td >".$latest_weather_recorded_records->humidity1."-".$latest_weather_recorded_records->humidity2." % </td>";
  echo "<td> <a class='main_edit' href='".base_url()."index.php/weather/insert_recorded/".$latest_weather_recorded_records->date."/".$encoded_url."'>


<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>

  </a><br>";
  echo "<a  class='main_delete'  href='".base_url()."index.php/weather/delete_recorded/".$latest_weather_recorded_records->date."/".$encoded_url."'>



<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>




  </a></td>";
  echo "</tr>";
  
}


?>        


</table>
 <span class='more_info'>


   <nav class="cl-effect-20">
          <a href='<?php echo base_url(); ?>index.php/weather/view_recorded'><span data-hover="View More">View More</span></a>
            </nav>
      
 </span>


<?php

}
else
{
  echo "<div class='widget_notice'>There is no Data available for Recorded weather information

<a id='add_now' href='".base_url()."index.php/weather/insert_recorded'>add now</a>
  </div>";
}

?>


  </div>
  <div class="col-md-5">

 <div class="row">

<div id='rainfall_graph' class="row animated bounceInDown">


<table>
<tr class='title_plus'>
  <td >Rainfall graph
  
<?php




echo "<a  class='main_edit' href='".base_url()."index.php/weather/edit_rainfall_graph' id='graph_edit' >
<section style='float:right; padding-top:10px; margin-right:10px; box-shadow:none; width:10px; height:10px;' id='file_option'><img  src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";


/*
echo "<a  href='".base_url()."index.php/agri/view_slides/d6w9z57rtt1hu5nm0svj/lnvqsagd869kxetdci6e/%E0%B0%B5%E0%B0%BF%E0%B0%A4%E0%B1%8D%E0%B0%A4%E0%B0%A8%20%E0%B0%B6%E0%B1%81%E0%B0%A6%E0%B1%8D%E0%B0%A7%E0%B0%BF/pages' class='popup fancybox fancybox.iframe' id='graph_edit' >
<section style='float:right; padding-top:10px; margin-right:10px; box-shadow:none; width:10px; height:10px;' id='file_option'><img  src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

*/


?>
</td>
</tr>

<tr >
<td>
<a   class='fancybox' href="<?php echo base_url().'assets/img/rainfall_graph/rainfall_graph.html'; ?>"><img   id='graph_image' src="<?php echo 'assets/img/rainfall_graph/rainfall_graph.png'; ?>"></a>
</td></tr>
</table>


</div>
</div>


<?php

  $current_forecast_info=$this->model_weather->get_forecast(date('Y-m-d'));
// print_r($current_forecast_info);

if(!empty($current_forecast_info))
{

foreach ($current_forecast_info as $forecast_text) 
{
  
  $current_forecast_text=$forecast_text->other_info;

}
 
}
  

?>
<div id='weather_forecast_text' class="row animated bounceInUp">
<table >
<tr class='title_plus'><td >Weather Forecast</td></tr>

<tr id='weather_forecast_text_info'><td >

 <?php  

 if(isset($current_forecast_text))
 {

 $text= trim($current_forecast_text);
$text = preg_replace('#<p>&nbsp;</p>#i','<p></p>', $text);
echo $text;

 //echo  preg_replace('/^\p{Z}+|\p{Z}+$/u', '', $current_forecast_text);
  //echo trim();
 }
 else 
 {
   echo "<FONT COLOR='#111'>There is no information available for Today.</FONT>";
  }  


   ?>
    </td>
</tr>


</table>
 </div>


  </div>

  <div  class="col-md-2">

<div id='icons_area' >



<nav class="cl-effect-21 main_icon">
    
    <a class="animated bounceInRight" href='<?php echo base_url(); ?>index.php/agri/view_agri/crop'><span data-hover="Crops"><img src="<?php echo base_url(); ?>assets/img/main_icon/crop.png">పంటలు</span></a>
    <a class="animated bounceInRight" href='<?php echo base_url(); ?>index.php/agri/view_agri/fruit'><span data-hover="Fruit"><img src="<?php echo base_url(); ?>assets/img/main_icon/fruit.png">పండ్ల తోటలు</span></a>
    <a class="animated bounceInRight" href='<?php echo base_url(); ?>index.php/agri/view_agri/vegetable'><span data-hover="Vegetable"><img src="<?php echo base_url(); ?>assets/img/main_icon/vegetable.png">కూరగాయలు</span></a>
    <a class="animated bounceInRight" href='<?php echo base_url(); ?>index.php/livestock/view_livestock/all'><span data-hover="Vegetable"><img src="<?php echo base_url(); ?>assets/img/main_icon/livestock.png">పశు సంపద</span></a>
    <a class="animated bounceInRight" href='<?php echo base_url(); ?>index.php/npm/view_npm'><span data-hover="Vegetable"><img src="<?php echo base_url(); ?>assets/img/main_icon/npm.png">ఎన్. పి. యం</span></a>

 <!--   

    <a href='<?php //echo base_url(); ?>index.php/agri/view_agri/millet'><span data-hover="millet">చిరుదాన్యాలు</span></a>
    <a href='<?php //echo base_url(); ?>index.php/livestock/view_livestock/all'><span data-hover="Livestock">పశు సంపద</span></a>
    <a href='<?php //echo ase_url(); ?>index.php/npm/view_npm'><span data-hover="NPM">ఎన్. పి. యం</span></a>
 
-->
  </nav>






</div>
  </div>

</div>

<!--
<script type="text/javascript">

$(function(){

$('.icon').mouseover(

function()
{

$('.animated').removeClass('animated tada');

$(this).addClass('animated tada');




}


  );


});

</script>

-->

    

<script>
$(function(){

$("#home").addClass('active');

});

</script>

<?php 
//include 'template/footer.php';
?>