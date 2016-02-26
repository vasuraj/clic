
<?php 
$con=mysqli_connect("localhost","root","","scc_mysql");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//echo $_SESSION['description'];


$adv_id = $this->uri->segment(3, 0);
$result=mysqli_query($con,"select adv_crop_id,adv_livestock_id,adv_veg_id,adv_fruit_id from advisory where adv_id='".$adv_id."'");

foreach($result as $adv_details)
{
	$adv_crop_id=$adv_details['adv_crop_id'];
	$adv_livestock_id=$adv_details['adv_livestock_id'];
	$adv_veg_id=$adv_details['adv_veg_id'];
	$adv_fruit_id=$adv_details['adv_fruit_id'];
}


?>
<style>
	#adv_tab {
		
		margin-top:5px;
		background:#280;
		text-decoration: none;
		padding:3px 50px;
		border-radius: 5px;
		border:1px solid gray;
		width:100%;
		color:white;
		box-shadow:0px 1px 1px black,
		0px -1px 1px white;


	}

	#adv_tab:hover {
		background:#2A0;
		


	}

</style>
<a id='adv_tab' href="<?php echo base_url();?>index.php/advisory/adv_crop_details/<?php echo $adv_crop_id; ?>" target='details'>crops</a>




<?php
/*
foreach ($result as $advisory) {
	echo "<a href='<?php echo base_url();?>index.php/advisory/advisory_tabs' target='details'>".$advisory['adv_id']."</a>";
	
}

*/

?> 

