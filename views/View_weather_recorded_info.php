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

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/cic_bootstrap_pagination_style.css'; ?>">


<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables/jquery.dataTables.js'; ?>"></script>


		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock/jquery.flipcountdown.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flipclock/jquery.flipcountdown.css">
<link href="<?php echo base_url();?>assets/css/main_menu/main_menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">


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
	


@media print { .dontprint { display:none; } }

@media print { 
@media screen { .dontshow { display:none; } }





</style>


<link href="<?php echo base_url();?>assets/css/dataTable/dataTable.css" rel="stylesheet" type="text/css" />




		
		<script>


  $(function() 
  {
   //alert('running');       
  
    $('a.main_delete').click(function(e)
     
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
	
	<div class="row" id='header'>
	


<!-- menu starts here -->


 <div class="col-xs-12 dontprint" id='header'>
<?php include 'template/header_menu2.php';?>
</div>



<?php 
echo $this->pagination->create_links();  

?>
<?php


$starting_record=$this->uri->segment(4);
 session_start(); 
$_SESSION['records']=$info;

//echo anchor_popup(base_url().'index.php/weather/get_forecast_excel', 'Click Me!', $info);
echo "<div id='download_area'>";
echo "<a  id='download' class='print animated bounceInRight dontprint'  href='javascript:window.print()'>Print Records</a>";
echo "<a id='download' class='csv animated bounceInRight dontprint' target='_blank' href='".base_url()."index.php/weather/get_recorded_csv'>download csv </a>";
echo "<a  id='download' class='excel animated bounceInRight dontprint' target='_blank' href='".base_url()."index.php/weather/get_recorded_excel'>download xls</a>";

echo "</div>";
if(!empty($info))
{
	echo "<div id='weather_records'>";

echo '<table cellpadding="0" cellspacing="0" border="0" class="display data-table" >';


echo "<thead>";
echo '<tr   class="animated bounceInLeft" id="title">';
		//echo  '<th>No.</th>';
		echo '<th>Date</th>';
		echo '<th>Description</th>';
		echo '<th>Min-Temp (°C)</td>';
		echo '<th>Max-Temp (°C)</td>';

		echo '<th>Wind Speed (KMPH)</th>';
		echo'<th>Rainfall (mm)</th>';
		echo'<th>Humidity (%)</th>';
			
		echo '<th >Remarks</th>';
		echo '<th class="dontprint" style="max-width:10px;"></th>';
	echo '</tr>';
echo "</thead>";
echo "<tbody>";
$count=0;
foreach($info as $infodata)
{

	$old_recorded_entry_date=$infodata->data_entry_date;

$myDateTime = DateTime::createFromFormat('Y-m-d', $old_recorded_entry_date);
$recorded_entry_date = $myDateTime->format('F d, Y');

$old_date_recorded=$infodata->date;
$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_recorded);
$recorded_date = $myDateTime->format('F d, Y');


	echo '<tr  class="animated bounceInRight">';
		
		echo '<td>'.$recorded_date.'</td>';
		echo '<td>'.str_replace('_', ' ', $infodata->rainfall_description).'</td>';
		echo '<td>'.$infodata->temp_min.'</td>';
		echo '<td>'.$infodata->temp_max.'</td>';

		echo '<td>'.$infodata->wind_max.'</td>';



echo '<td>'.$infodata->rainfall.'</td>';



		echo'<td>'.$infodata->humidity1.'-'.$infodata->humidity2.'%</td>';




		echo '<td>';
		$text = preg_replace('#<p>&nbsp;</p>#i','<p></p>', $infodata->other_info);
echo $text;
echo '</td>';

echo "<td class='dontprint'> <a class='dontprint' href='".base_url()."index.php/weather/insert_recorded/".$infodata->date."/".$encoded_url."'>


<section class='dontprint' id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>

  </a><br>";
  echo "<a class='dontprint main_delete'  href='".base_url()."index.php/weather/delete_recorded/".$infodata->date."/".$encoded_url."'>



<section class='dontprint'  id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section>

</a>




  </td>";
	echo '</tr>';
}
echo "<tbody>";
echo "</table>";
}
else
{


  echo "<div class='widget_notice'>There is no Data available for Recorded weather information

<a id='add_now' href='".base_url()."index.php/weather/insert_recorded'>add now</a>
  </div>";

}

?>


   <script>
     $(document).ready(function() {

var initial_pagination_active=$('a').filter(function(index) { return $(this).text() === "1"; });

initial_pagination_active.parent().click();




} );



           </script>  






  <script>

$(function(){

$("#climate").addClass('active');

});

</script>

           <script type="text/javascript">
  /* API method to get paging information */
  $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
  {
      return {
          "iStart":         oSettings._iDisplayStart,
          "iEnd":           oSettings.fnDisplayEnd(),
          "iLength":        oSettings._iDisplayLength,
          "iTotal":         oSettings.fnRecordsTotal(),
          "iFilteredTotal": oSettings.fnRecordsDisplay(),
          "iPage":          oSettings._iDisplayLength === -1 ?
              0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
          "iTotalPages":    oSettings._iDisplayLength === -1 ?
              0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
      };
  }

  /* Bootstrap style pagination control */
  $.extend( $.fn.dataTableExt.oPagination, {
      "bootstrap": {
          "fnInit": function( oSettings, nPaging, fnDraw ) {
              var oLang = oSettings.oLanguage.oPaginate;
              var fnClickHandler = function ( e ) {
                  e.preventDefault();
                  if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                      fnDraw( oSettings );
                  }
              };

              $(nPaging).addClass('pagination').append(
                  '<ul>'+
                      '<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
                      '<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
                  '</ul>'
              );
              var els = $('a', nPaging);
              $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
              $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
          },

          "fnUpdate": function ( oSettings, fnDraw ) {
              var iListLength = 5;
              var oPaging = oSettings.oInstance.fnPagingInfo();
              var an = oSettings.aanFeatures.p;
              var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

              if ( oPaging.iTotalPages < iListLength) {
                  iStart = 1;
                  iEnd = oPaging.iTotalPages;
              }
              else if ( oPaging.iPage <= iHalf ) {
                  iStart = 1;
                  iEnd = iListLength;
              } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                  iStart = oPaging.iTotalPages - iListLength + 1;
                  iEnd = oPaging.iTotalPages;
              } else {
                  iStart = oPaging.iPage - iHalf + 1;
                  iEnd = iStart + iListLength - 1;
              }

              for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
                  // Remove the middle elements
                  $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                  // Add the new list items and their event handlers
                  for ( j=iStart ; j<=iEnd ; j++ ) {
                      sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                      $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                          .insertBefore( $('li:last', an[i])[0] )
                          .bind('click', function (e) {
                              e.preventDefault();
                              oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                              fnDraw( oSettings );
                          } );
                  }

                  // Add / remove disabled classes from the static elements
                  if ( oPaging.iPage === 0 ) {
                      $('li:first', an[i]).addClass('disabled');
                  } else {
                      $('li:first', an[i]).removeClass('disabled');
                  }

                  if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                      $('li:last', an[i]).addClass('disabled');
                  } else {
                      $('li:last', an[i]).removeClass('disabled');
                  }
              }
          }
      }
  } );

  var oTable = $('.data-table').dataTable({
    "iDisplayStart": 10,
    "aLengthMenu": [[10, 50, 100, -1], [10, 50, 100, 'All']],
    "sPaginationType": "bootstrap"
  });




</script>
 

   <script>
     $(document).ready(function() {

var initial_pagination_active=$('a').filter(function(index) { return $(this).text() === "1"; });

initial_pagination_active.parent().click();




} );



           </script>  


</body>


</html>