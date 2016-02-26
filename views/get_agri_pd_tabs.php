<style type="text/css">




</style>



<?php


//print_r($info);

//echo '<br>';
echo '<div id="tab_area">';
echo '<ul id="tab">';

$pd_id=$this->uri->segment(3);
//echo $pd_id;


$sub_id=$info[0]->intro;
//echo $sub_id;
foreach($info[0] as $column=>$tab)
{
	
if($column==='pd_id' || $column==='sname'|| $column==='name' || $column==='tname' || $column==='category' || $column==='icon')
{

}


elseif($column=='static_page_link')
{
echo "<li ><a target='_blank' class='".$column."' href='".base_url().'information/new folder/'.$tab."' >".str_replace('_', ' ', $column)."</a></li>";
}
else
{
echo "<li ><a target='slides' class='".$column."' href='".base_url().'index.php/agri/view_slides/'.$pd_id.'/'.$sub_id.'/'.$column."/pages' >".str_replace('_', ' ', $column)."</a></li>";	
}
}

echo '</ul>';
echo '</div>';



?>
<script>
$(document).ready(function() {



       
	
    $('#tab li a.intro').click(function(d){
    	
         $('li.selected').removeClass('selected')
         $(this).parent('li').addClass("selected");
     });



});
</script>