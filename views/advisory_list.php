<style>
	#adv_list {
		
		text-decoration: none;
		padding:3px;
		text-align: center;
		border-radius: 2px;
		border:2px solid #0033aa;
		width:98%;
		color:#ddd;
		text-shadow:0px 1px 1px black;
		font-weight:bold;
		height:20px;
		box-shadow:0px 1px 1px black,
		0px -1px 1px white;
		margin-top:5px;
		display: inline-block;




background: rgb(125,185,232); /* Old browsers */
background: -moz-linear-gradient(top, rgba(125,185,232,1) 0%, rgba(32,124,202,1) 6%, rgba(41,137,216,1) 14%, rgba(30,87,153,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(125,185,232,1)), color-stop(6%,rgba(32,124,202,1)), color-stop(14%,rgba(41,137,216,1)), color-stop(100%,rgba(30,87,153,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(125,185,232,1) 0%,rgba(32,124,202,1) 6%,rgba(41,137,216,1) 14%,rgba(30,87,153,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(125,185,232,1) 0%,rgba(32,124,202,1) 6%,rgba(41,137,216,1) 14%,rgba(30,87,153,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(125,185,232,1) 0%,rgba(32,124,202,1) 6%,rgba(41,137,216,1) 14%,rgba(30,87,153,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(125,185,232,1) 0%,rgba(32,124,202,1) 6%,rgba(41,137,216,1) 14%,rgba(30,87,153,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#1e5799',GradientType=0 ); /* IE6-9 */

	}
	#list_img
	{
		width:100%;
		text-align:center;
		border-radius: 3px;
		border:3px solid #222;
	}

	#adv_list:hover {
		background:#369;
		


	}

</style>
<?php 
/*
$con=mysqli_connect("localhost","root","","scc_mysql");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//echo $_SESSION['description'];
$result=mysqli_query($con,"select * from advisory order by adv_date desc limit 5");


foreach ($result as $advisory) {

	$adv_date_temp=explode('-',$advisory['adv_date']);
	$adv_date=mktime(0, 0, 0,(int)$adv_date_temp[1],(int)$adv_date_temp[2],(int)$adv_date_temp[0]);
	echo "<a id='adv_list' href='<?php base_url();?>advisory_tabs/".$advisory['adv_id']."' target='tabs'>".date('d-F-Y',$adv_date)."</a>";
	
}

*/


?> 


<a id='adv_list' href='<?php base_url();?>advisory_tabs14' target='tabs'>8 August 2013</a>
<a id='adv_list' href='<?php base_url();?>advisory_tabs13' target='tabs'>2 August 2013</a>
<a id='adv_list' href='<?php base_url();?>advisory_tabs12' target='tabs'>23 July 2013</a>
<a id='adv_list' href='<?php base_url();?>advisory_tabs11' target='tabs'>18 June 2013</a>


