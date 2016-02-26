<style type="text/css">




</style>



<?php

echo '<div class="tab_info">
	
<div><img height=50 width=50 src="'.base_url().'assets/uploaded/img/thumb_'.$info[0]->icon.'"/>'.$info[0]->name.'/ '.$info[0]->tname.'</div>

</div>';


// print_r($info);


//echo '<br>';
echo '<div id="tab_area">';
  echo '<nav >';
//echo '<ul id="tab">';
  
$initial_click_section='పరిచయం';



foreach($info[0] as $column=>$tab)
{
	
	//echo $column;
	//echo $this->uri->segment(4);
if($column==='agri_id' || $column==='name' || $column==='tname' || $column==='category' || $column==='icon')
{

}

elseif($this->uri->segment(4)!='millet' && $column==='recipe')
{

}

else
{


   
/*##########		changed the tab's english name to telugu		#########*/


if($column==='intro')
{

	$column='పరిచయం';
	//echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' >".str_replace('_', ' ', $column)."</a>";
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >పరిచయం</a>";
	
}

elseif($column==='soils')
{
	$column='నేలలు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >నేలలు</a>";

}

elseif($column==='varieties')
{
	$column='విత్తన రకాలు';

	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >విత్తన రకాలు</a>";

}

elseif($column==='seasonality')
{
	$column='విత్తే సమయం';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >విత్తే సమయం</a>";

}

elseif($column==='seed_quantity')
{
	$column='విత్తన మోతాదు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >విత్తన మోతాదు</a>";
}

elseif($column==='seed_treatment')
{
	$column='విత్తన శుద్ధి';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >విత్తన శుద్ధి</a>";
}

elseif($column==='sowing')
{
	$column='విత్తే పద్దతి';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >విత్తే పద్దతి</a>";
}

elseif($column==='water_management')
{
	$column='నీటి యాజమాన్యం';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >నీటి యాజమాన్యం</a>";
}
elseif($column==='weed_management')
{
	$column='కలుపు నివారణ';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >కలుపు నివారణ</a>";
}


elseif($column==='nutrient_management')
{
	$column='ఎరువుల యాజమాన్యం';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >ఎరువుల యాజమాన్యం</a>";
}


elseif($column==='harvesting')
{
	$column='పంట కొత';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >పంట కొత</a>";
}


elseif($column==='economics')
{
	$column='మార్కెటింగ్';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >మార్కెటింగ్</a>";
}


elseif($column==='other_info')
{
	$column='ఇతర వివరాలు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >ఇతర వివరాలు</a>";
}


elseif($column==='recipe')
{
	$column='వంటకాలు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >వంటకాలు</a>";
}
elseif($info[0]->agri_id='d6w9z57rtt1hu5nm0svj')
{

	$column='శ్రీ వరి';
	echo "<a class='animated bounceInRight' target='slides' href='".base_url()."index.php/agri/view_agri/technique/oodurhkcl6znouq0wygv'><img src='".base_url()."assets/img/tab_icon/".$column.".png' >వంటకాలు</a>";

}


}

}
//echo "<a id='pest' target='slides' href='".base_url().'index.php/agri_pd/view_agri_attached_pd/pest/'.$info[0]->agri_id."/pages' >పురుగులు</a>";

//echo $info[0]->agri_id;
 if($info[0]->agri_id=='oodurhkcl6znouq0wygv')
 {
echo "<a class='pest popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url()."index.php/agri_pd/view_agri_attached_pd/pest/d6w9z57rtt1hu5nm0svj/pages' ><img src='".base_url()."assets/img/tab_icon/తెగుళ్ళు.png' >పురుగులు</a>";
}
else
{
echo "<a class='pest popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url()."index.php/agri_pd/view_agri_attached_pd/pest/".$info[0]->agri_id."/pages' ><img src='".base_url()."assets/img/tab_icon/తెగుళ్ళు.png' >పురుగులు</a>";
}

/*
echo "<a target='_blank' class='slide_edit' href='".base_url()."index.php/agri_pd/link_agri_pd_next/fresh/".$info[0]->agri_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";పురుగులు
*/
 if($info[0]->agri_id=='oodurhkcl6znouq0wygv')
 {
echo "<a class='disease popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url()."index.php/agri_pd/view_agri_attached_pd/Disease/d6w9z57rtt1hu5nm0svj/pages' ><img src='".base_url()."assets/img/tab_icon/పురుగులు.png' >తెగుళ్ళు</a>";
}
else
{
echo "<a class='disease popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri_pd/view_agri_attached_pd/Disease/'.$info[0]->agri_id."/pages' ><img src='".base_url()."assets/img/tab_icon/పురుగులు.png' >తెగుళ్ళు</a>";

}
//print_r($info[0]);

 if($info[0]->agri_id=='d6w9z57rtt1hu5nm0svj')
 {

	$column='శ్రీ వరి';
 	echo "<a class='animated bounceInRight' target='_blank' href='".base_url()."index.php/agri/view_agri/technique/oodurhkcl6znouq0wygv'><img src='".base_url()."assets/uploaded/img/thumb_".$info[0]->icon."' >వంటకాలు</a>";

 }



// echo "<a id='disease' target='slides' href='".base_url().'index.php/agri_pd/view_agri_attached_pd/Disease/'.$info[0]->agri_id."/pages' >తెగుళ్ళు</a>";

/*
echo "<a target='_blank' class='slide_edit' href='".base_url()."index.php/agri_pd/link_agri_pd_next/fresh/".$info[0]->agri_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

*/


echo "</nav>";
echo '</div>';



?>

<!--
<script>
$(document).ready(function() {



 
	
    $('#tab_area nav a.intro').click(function(d){
    	
//	alert($(this));
       $('a.selected').removeClass('selected')
         $(this).addClass("selected");
     });




});
</script>

-->


<script>
$(document).ready(function() {


   
/*##########		initial tab will be selected according to value of varaible $initial_click_section #########*/



	$("#tab_area nav a.<?php echo $initial_click_section; ?>").addClass("selected");
	
    $('#tab_area nav a').click(function(d)
    {
    	//alert(d.val);
    	 $('a.selected').removeClass('selected')
         $(this).addClass("selected");
     });


});
</script>