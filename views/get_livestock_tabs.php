<?php


//print_r($info);
echo '<div class="tab_info">
	
<div><img height=50 width=50 src="'.base_url().'assets/uploaded/img/thumb_'.$info[0]->icon.'"/>'.$info[0]->name.'/ '.$info[0]->tname.'</div>

</div>';

//echo '<br>';
echo '<div id="tab_area">';
echo '<nav >';

   
/*##########		initial selected section tab using jquery 		#########*/


$initial_click_section='పరిచయం';

/*##########		If information available in perticular category		#########*/

if(isset($info[0]))
{
$initial_intro_id=$info[0]->intro;
$initial_livestock_id=$info[0]->livestock_id;
$category=$this->uri->segment(3);

//print_r($info);
}

if(isset($info[0]))
{
foreach($info[0] as $column=>$tab)
{
	

   
/*##########		skip all the field from database which are not to be display as tab 		#########*/

if($column==='agri_id' || $column==='name' || $column==='tname' || $column==='category' || $column==='icon')
{

}

   
/*##########		skip recpie tab other then millet category 		#########*/


elseif($category!='millet' && $column==='recipe')
{

}

   
/*##########	and display other filed from database as tabs 		#########*/


else
{


   
/*##########		changed the tab's english name to telugu		#########*/


if($column==='intro')
{

	$column='పరిచయం';
	//echo "<a class='".$column." popup fancybox fancybox.iframe' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' >".str_replace('_', ' ', $column)."</a>";
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/intro.jpg' >పరిచయం</a>";

//echo "<a class='".$column." popup fancybox fancybox.iframe' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->agri_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/blue_blank_icon.png' >పరిచయం</a>";

}

elseif($column==='breeds')
{
	$column='జాతులు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/breeds.jpg' >జాతులు</a>";

}

elseif($column==='selection')
{
	$column='జాతుల ఎంపిక';

	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/selection2.jpg' >జాతుల ఎంపిక</a>";

}

elseif($column==='feed')
{
$column='మేత/పోషణ';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/feed.jpg' >మేత/పోషణ</a>";

}

elseif($column==='housing')
{
	$column='గృహ వసతి';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/housing.jpg' >గృహ వసతి</a>";
}

elseif($column==='reproduction_management')
{
	$column='ప్రత్యుత్పతి-యాజమాన్యం';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/reproduction.jpg' >ప్రత్యుత్పతి-యాజమాన్యం</a>";
}

elseif($column==='calf_rearing')
{
	$column='పిల్లల సంరక్షణ';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/calf_rearing.jpg' >పిల్లల సంరక్షణ</a>";
}


elseif($column==='economics')
{
	$column='ఆర్థికఅంశాలు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/".$column.".png' >ఆర్థికఅంశాలు</a>";
}


elseif($column==='other_info')
{
	$column='ఇతర వివరాలు';
	echo "<a class='".$column." popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/agri/view_slides/'.$info[0]->livestock_id.'/'.$tab."/".$column."/pages' ><img src='".base_url()."assets/img/tab_icon/".$column.".png' >ఇతర వివరాలు</a>";
}



}

}
//echo "<a id='pest' target='slides' href='".base_url().'index.php/agri_pd/view_agri_attached_pd/pest/'.$info[0]->agri_id."/pages' >పురుగులు</a>";
 if($info[0]->livestock_id=='oodurhkcl6znouq0wygv')
 {
echo "<a class='pest popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/livestock_pd/view_livestock_attached_pd/disease/'.$info[0]->livestock_id."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/disease.jpg' >తెగుళ్ళు</a>";
}
else
{
echo "<a class='pest popup fancybox fancybox.iframe animated bounceInRight' target='slides' href='".base_url().'index.php/livestock_pd/view_livestock_attached_pd/disease/'.$info[0]->livestock_id."/pages' ><img src='".base_url()."assets/img/tab_icon/livestock/disease.jpg' >రోగాలు</a>";
}
/*
echo "<a target='_blank' class='slide_edit' href='".base_url()."index.php/agri_pd/link_agri_pd_next/fresh/".$info[0]->agri_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";పురుగులు
*/

// echo "<a id='disease' target='slides' href='".base_url().'index.php/agri_pd/view_agri_attached_pd/Disease/'.$info[0]->agri_id."/pages' >తెగుళ్ళు</a>";

/*
echo "<a target='_blank' class='slide_edit' href='".base_url()."index.php/agri_pd/link_agri_pd_next/fresh/".$info[0]->agri_id."'>
<section   id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";

*/
}

echo "</nav>";
echo "</div>";
?>
