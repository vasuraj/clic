<style type="text/css">




</style>



<?php


//print_r($info);

//echo '<br>';
echo '<div id="tab_area">';
echo '<ul id="tab">';
foreach($info[0] as $column=>$tab)
{
	
if($column==='npm_id' || $column==='name' || $column==='tname' || $column==='category' || $column==='icon')
{

}


else
{
echo "<li ><a target='slides' class='".$column."' href='".base_url().'index.php/npm/view_slides/'.$info[0]->npm_id.'/'.$tab."/".$column."/pages'>".str_replace('_', ' ', $column)."</a></li>";
}

}

echo '</ul>';
echo '</div>';



?>
<script>
$(document).ready(function() {



       
 
	
    $('#tabs li a').click(function(d){
    	
         $('li.selected').removeClass('selected')
         $(this).parent('li').addClass("selected");
     });




});
</script>