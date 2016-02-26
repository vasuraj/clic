<style>
	
@media print { .dontprint { display:none; } }
@media screen { .dontshow { display:none; } }


div.clock_area
{

	display: inline-block;
	
width:110px;
height:40px;
margin-bottom: -10px;

}


</style>
<div class='container'>
<ul id="nav" >

<li id="no_hover" ><a href="#">
<img id='cic_logo' src="<?php echo base_url(); ?>assets/img/cic-logo.png" alt="">
CLIC | 

<?php



$old_date_format=Date('Y-m-d');

	$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_format);
	$new_date_format = $myDateTime->format('F d, Y');

echo $new_date_format;
echo " | ";


	?>
<div class="clock_area">

<div id="retroclockbox_xs"></div>
<script>

$(function(){

	$('#retroclockbox_xs').flipcountdown({size:'xs',am:true});
})
</script>
</div>
	


</a></li>


<li id='home'><a  href="<?php echo base_url(); ?>">Home</a></li>
<li id='climate'><a href="#s1">Climate</a>
<span id="s1"></span>

	<ul class="subs">
	<li><a  href="#">Forecast</a>
	<ul>
	<li><a href="<?php echo base_url(); ?>index.php/weather/view_forecast"><img src="<?php echo base_url(); ?>assets/img/menu_icon/single_table.png">view records</a></li>
	<!--
	<li><a href="<?php echo base_url(); ?>index.php/weather/view_forecast/pages"><img src="<?php echo base_url(); ?>assets/img/menu_icon/multiple_table.png">view by page</a></li>

	-->
	<li><a href="<?php echo base_url(); ?>index.php/weather/insert_forecast"><img src="<?php echo base_url(); ?>assets/img/menu_icon/add_record.png">insert new Record </a></li>
	</ul>

	</li>
	<li><a href="#">Recorded</a>


<ul>
	<li><a href="<?php echo base_url(); ?>index.php/weather/view_recorded"><img src="<?php echo base_url(); ?>assets/img/menu_icon/single_table.png">view records</a></li>
	
<!--
	<li><a href="<?php echo base_url(); ?>index.php/weather/view_recorded/pages"><img src="<?php echo base_url(); ?>assets/img/menu_icon/multiple_table.png">view by page</a></li>
	-->

	<li><a href="<?php echo base_url(); ?>index.php/weather/insert_recorded"><img src="<?php echo base_url(); ?>assets/img/menu_icon/add_record.png">insert new Record </a></li>
	</ul>


	</li>

	<li><a href="<?php echo base_url(); ?>index.php/advisory/view_advisory">Advisory</a>
<ul>

	<?php

  $this->db->limit(10,0);
$result_advisory= $this->db->distinct()->select(array('date'))->group_by('date')->order_by('date','desc')->get('adv_main')->result();

//print_r($result_advisory);


//print_r($result_agri);
if(!empty($result_advisory))
{
//echo '<ul>';

foreach ($result_advisory as $advisory_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);

$old_date_format=$advisory_result->date;

$myDateTime = DateTime::createFromFormat('Y-m-d', $old_date_format);
$new_date_format = $myDateTime->format('F d, Y');

	//echo $new_date_format;



	echo "<li><a href='".base_url()."index.php/advisory/view_advisory/".$advisory_result->date."'><img src='".base_url()."assets/img/menu_icon/advisory.png' >".$new_date_format."</a></li>";
	
}
//echo "</ul>";

}
	?>
	<li><a href="<?php echo base_url(); ?>index.php/advisory/insert_advisory"><img src="<?php echo base_url(); ?>assets/img/menu_icon/add_advisory.png">insert advisory</a></li>

	</ul>


	</li>
	</ul>

</li>

<li id='Agriculture'><a href="#s2">Agriculture</a>
<span id="s2"></span>
<ul class="subs">
	<li><a href="<?php echo base_url(); ?>index.php/agri/view_agri/crop"><img src="<?php echo base_url(); ?>assets/img/main_icon/crop.png">Crops</a>

	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','crop');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo '<ul>';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/agri/view_agri/crop/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$agri_result->icon."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>



	
	</li>

	<li>
<a href="<?php echo base_url(); ?>index.php/agri/view_agri/vegetable"><img src="<?php echo base_url(); ?>assets/img/main_icon/vegetable.png">Vegetables</a>



	

	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','vegetable');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo '<ul>';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);



	echo "<li><a href='".base_url()."index.php/agri/view_agri/vegetable/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$agri_result->icon."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>



	


	

</li>
<li>
<a href="<?php echo base_url(); ?>index.php/agri/view_agri/fruit"><img src="<?php echo base_url(); ?>assets/img/main_icon/fruit.png">Fruits</a>


	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','fruit');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo '<ul>';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/agri/view_agri/fruit/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$agri_result->icon."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>



	

</li>

<li>
<a href="<?php echo base_url(); ?>index.php/agri/view_agri/millet"><img src="<?php echo base_url(); ?>assets/img/main_icon/crop.png">Millet</a>

	

<?php

$this->db->from('agri');

$this->db->select(array('agri_id','tname','icon'));
$this->db->where('category','millet');


$result_agri=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_agri))
{
echo '<ul>';

foreach ($result_agri as $agri_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/agri/view_agri/millet/".$agri_result->agri_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$agri_result->icon."'/>".$agri_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>


	

</li>
<!--
<li>
<a href="<?php echo base_url(); ?>index.php/agri/insert_agri">Insert New </a>
	

</li>

-->
	</ul>

</li>




<li id='NPM'><a href="#s3">NPM</a>
<span id="s3"></span>
<ul class="subs">
	<li><a href="<?php echo base_url(); ?>index.php/npm/view_npm">NPM</a>

	<?php

$this->db->from('npm');

$this->db->select(array('npm_id','tname','icon'));
//$this->db->where('category','vegetable');


$result_npm=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_npm))
{
echo '<ul>';

foreach ($result_npm as $npm_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/npm/view_npm/".$npm_result->npm_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".str_replace('','_',$npm_result->icon)."'/>".$npm_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>

	
		

</li>



	<li><a href="<?php echo base_url(); ?>index.php/npm/insert_npm">insert</a></li>


</ul>
</li>







	<li id='livestock' ><a href="#s4">livestock</a>
	<span id="s4"></span>
	<ul class="subs">
	<li><a href="<?php echo base_url(); ?>index.php/livestock/view_livestock/all">View livestock</a>


<?php

$this->db->from('livestock');

$this->db->select(array('livestock_id','tname','icon'));
//$this->db->where('category','vegetable');


$result_livestock=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_livestock))
{
echo '<ul>';

foreach ($result_livestock as $livestock_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/livestock/view_livestock/all/".$livestock_result->livestock_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$livestock_result->icon."'/>".$livestock_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>






	</li>
	
		<li><a href="<?php echo base_url(); ?>index.php/livestock/insert_livestock">insert</a></li>


		<li><a href="<?php echo base_url(); ?>index.php/livestock_pd/view_livestock_pd/Disease">Disease</a>


		<ul>
		
	
		<li><a href="<?php echo base_url(); ?>index.php/livestock_pd/insert_livestock_pd">insert Disease</a></li>
	
		<li><a href="<?php echo base_url(); ?>index.php/livestock_pd/link_livestock_pd">link to livestock</a></li>

		</ul>	



		</li>
	
	
	</ul>	


</li>
















<li ><a href="#s5">Plant Protection</a>
<span id="s5"></span>
<ul class="subs"> 


<li ><a href="<?php echo base_url(); ?>index.php/agri_pd/view_agri_pd/pest">pest</a>


<?php

$this->db->from('agri_pd');

$this->db->select(array('pd_id','tname','icon'));
$this->db->where('category','pest');
//$this->db->where('category','vegetable');


$result_pd=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_pd))
{
echo '<ul>';

foreach ($result_pd as $pd_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/agri_pd/view_agri_pd/pest/".$pd_result->pd_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$pd_result->icon."'/>".$pd_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>




</li>
<li ><a href="<?php echo base_url(); ?>index.php/agri_pd/view_agri_pd/disease">disease</a>


<?php

$this->db->from('agri_pd');

$this->db->select(array('pd_id','tname','icon'));
$this->db->where('category','disease');
//$this->db->where('category','vegetable');


$result_pd=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_pd))
{
echo '<ul>';

foreach ($result_pd as $pd_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/agri_pd/view_agri_pd/disease/".$pd_result->pd_id."'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$pd_result->icon."'/>".$pd_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>


</li>	

<li><a href="<?php echo base_url(); ?>index.php/agri_pd/insert_agri_pd">insert pest/disease</a></li>
<li><a href="<?php echo base_url(); ?>index.php/agri_pd/link_agri_pd">link to Agriculture</a></li>

		

	
	</ul>

</li>



<li ><a href="#s6">Machine</a>

<span id="s6"></span>
<ul class="subs"> 

<li ><a href="<?php echo base_url(); ?>index.php/machine/view_machine_info">view machine</a>


<?php

$this->db->from('machine');

$this->db->select(array('machine_id','tname','icon'));

//$this->db->where('category','vegetable');


$result_machine=$this->db->get()->result();

//print_r($result_agri);
if(!empty($result_machine))
{
echo '<ul>';

foreach ($result_machine as $machine_result) {
	
	//	print_r($agri_result);
	//	print_r($agri_result);


	echo "<li><a href='".base_url()."index.php/machine/view_machine_info'><img id='menu_icon' src='".base_url()."assets/uploaded/img/thumb_".$machine_result->icon."'/>".$machine_result->tname."</a></li>";
	
}
echo "</ul>";

}
	?>






</li>
<li ><a href="<?php echo base_url(); ?>index.php/machine/insert_machine">insert machine</a></li>	


	
	</ul>


</li>


	<li ><a href="<?php echo base_url(); ?>index.php/agri/view_agri/technique/oodurhkcl6znouq0wygv">SRI</a></li>



</ul>

	</div>
