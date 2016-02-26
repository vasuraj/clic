<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

  include 'assets/css/template_css.php'; 
 ?>
  <link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery/jquery-1.8.2.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'bootstrap3/dist/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/zebra_datepicker.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.tinycarousel.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/shadowbox.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.easyui.min.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url().'assets/css/shadowbox.css'; ?>" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/view_agri_tab_info.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/cic_bootstrap_pagination_style_green.css'; ?>">


<link rel="stylesheet" href="<?php echo base_url().'assets/css/attached_link.css'; ?>" type="text/css">


  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fancybox/jquery.fancybox.css" media="screen" />
  




<script type="text/javascript">
   

$(document).ready(function() {
    $('.popup').fancybox({

    'fitToView' : true,

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
    'height':1000,
    'width' : 1300,
    'fitToView' : true,
    'type': 'iframe',
  
      'transitionIn'    : 'none',
      'transitionOut'   : 'none'

  });
});




  </script>


<script>
  

$(function() {              


$('.slide_delete').click(function(e)
{
  e.preventDefault();
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

<div class="row" >
  <div  class="col-xs-12 dontprint" >
<?php

// echo $this->pagination->create_links();  

?>



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



if(!empty($livestock_pd_attched))
{
echo '<div class=" easyui-resizable" data-options="minWidth:450,minHeight:330" >';
echo '<div class="row" >';


echo '<section  class="col-xs-12" >';
echo "<div class='title'>";


//echo $this->uri->segment(3);


echo "<div id='file_option_area'>";
echo "<a target='_blank' class='slide_add' href='".base_url()."index.php/livestock_pd/link_livestock_pd_next/fresh/".$this->uri->segment(4)."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";
echo "</div>";

echo "</div>";



foreach($livestock_pd_attched as $livestock_pd_attched_record)
{

/*

echo "<div id='file_option_area'>";

echo "<a class='slide_add' href='".base_url()."index.php/livestock/add_slide_form/".$info[0]->main_id."/".$info[0]->sub_id."/".$info[0]->sub_category."/".$encoded_url."'>
<section  id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";
echo "<a  class='slide_edit'  href='".base_url()."index.php/livestock/edit_slide_form/".$info[0]->slide_id."/".$encoded_url."'>
<section  id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";
echo "<a class='slide_delete' href='".base_url()."index.php/livestock/delete_slide/".$info[0]->slide_id."/".$encoded_url."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "</div>";

*/

  //print_r($livestock_pd_attched_record);


$livestock_pd_link_id=$livestock_pd_attched_record->livestock_pd_link_id;



$livestock_id=$livestock_pd_attched_record->livestock_id;
$category=$livestock_pd_attched_record->category;
$pd_id=$livestock_pd_attched_record->pd_id;
$pd_symptom_id=$livestock_pd_attched_record->pd_symptom_id;
$pd_prevention_id=$livestock_pd_attched_record->pd_prevention_id;
$pd_treatment_id=$livestock_pd_attched_record->pd_treatment_id;


      $livestock_pd_info = $this->db->get_where('livestock_pd',array('pd_id'=>$pd_id))->result();
      
    //  print_r($livestock_pd_info[0]);


foreach ($livestock_pd_info as $livestock_pd_info_single) {

//print_r($livestock_pd_info_single);

$pd_intro_id=$livestock_pd_info_single->intro;

}

//echo $pd_intro_id;
echo "<div id='attached_link_box' class='animated flipInY'>";

echo "<div class='file_option_area_links'>";




echo "<a  target='_blank' class='slide_delete' href='".base_url()."index.php/livestock_pd/delete_livestock_pd_link/".$livestock_pd_link_id."/".$encoded_url."'>
<section   id='file_option_links'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "</div>";

//print_r($livestock_pd_attched_record);

echo "<div id='icon'>";

$livestock_id=$livestock_pd_attched_record->livestock_id;
$category=$livestock_pd_attched_record->category;
$pd_id=$livestock_pd_attched_record->pd_id;
$pd_symptom_id=$livestock_pd_attched_record->pd_symptom_id;
$pd_prevention_id=$livestock_pd_attched_record->pd_prevention_id;
$pd_treatment_id=$livestock_pd_attched_record->pd_treatment_id;

$pd_intro_id=$livestock_pd_info_single->intro;

echo "<a class='popup fancybox fancybox.iframe' href='".base_url()."index.php/livestock_pd/view_livestock_pd_attached_tabs/".$pd_id."/".$livestock_id."/".$category."/".$pd_intro_id."/".$pd_symptom_id."/".$pd_prevention_id."'>";
/*
echo "<a href='".base_url()."assets/uploaded/img/".$livestock_pd_info[0]->icon."' rel='shadowbox[Mixed]' >

<img   src='".base_url()."assets/uploaded/img/thumb_".$livestock_pd_info[0]->icon."' />

</a></div>";

*/


echo "

<img   src='".base_url()."assets/uploaded/img/thumb_".$livestock_pd_info[0]->icon."' />";


echo $livestock_pd_info[0]->tname;
echo "</a>";
echo "</div>";





//echo $livestock_pd_info[0]->name."<br>";
//echo "(".$livestock_pd_attched_record->pd_stage.")";
/*

echo "<div id='file_option_area' >";


echo "<a target='_blank' class='slide_add' href='".base_url()."index.php/livestock_pd/update_pd_stage/".$livestock_pd_attched_record->livestock_pd_link_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit_2.png'></section></a>";
echo "</div>";
*/
//echo $livestock_pd_info[0]->tname;
//echo $livestock_pd_info[0]->sname;


/*
echo "<a  class='link_button popup fancybox fancybox.iframe' id='symptom' href='".base_url()."index.php/livestock_pd/view_livestock_pd_symptom/".$livestock_pd_attched_record->pd_symptom_id."/pages'   >
Symptom</a>";

echo "<a class='link_button' id='symptom' target='pd_info' href='".base_url()."index.php/livestock_pd/view_livestock_pd_symptom/".$livestock_pd_attched_record->pd_symptom_id."/pages'>Symptom</a>";
echo "<a  class='link_button' id='prevention' target='pd_info' href='".base_url()."index.php/livestock_pd/view_livestock_pd_control/".$livestock_pd_attched_record->pd_prevention_id."'>Control</a>";

      echo "</div>";
      */
    
echo "</a>";

echo "</div>";

}
echo "</section>";

/*
echo '<section  class="col-xs-8 dontprint" >';

echo "<iframe name='pd_info' id='pd_info' src='".base_url()."assets/blank_iframe_text_pd.html'>Click on the link </iframe>";

echo '</section>';
*/
echo "</div>";

}
else
{

echo "<div id='notification' class='animated bounceInDown'>";

echo "No information to display";

echo "<a target='_blank' id='notification_button' href='".base_url()."index.php/livestock_pd/link_livestock_pd'>";

echo 'Link Now';


echo "</a>";

echo "</div>";


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


</script>

<script type="text/javascript">

//$('#video-tooltip').tooltip();
</script>
</div>

</div>

</body>
</html>