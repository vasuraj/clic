<style type="text/css">




</style>

	<?php
$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);
?>
	

<?php


//print_r($info);

//echo '<br>';
echo '<div id="tab_area">';
echo '<ul id="tab">';

//	print_r($info[0]);
foreach($info[0] as $column=>$tab)
{
	
if($column==='adv_main_id' || $column==='date' )
{

}


else
{
echo "<li ><a target='slides' class='".$column."' href='".base_url().'index.php/advisory/view_advisory_sub_info/'.$info[0]->adv_main_id.'/'.$tab."/".$column."/pages'>".str_replace('_', ' ', $column)."</a>";

echo "<a  class='main_add'  href='".base_url()."index.php/advisory/insert_advisory_sub/".$info[0]->adv_main_id."/".$column."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";

echo "</li>";
}

}

echo '</ul>';
echo '</div>';



?>
<script>
$(document).ready(function() {



       
 
	
    $('#tab li a').click(function(d){
    	
         $('li.selected').removeClass('selected')
         $(this).parent('li').addClass("selected");
     });




});
</script>