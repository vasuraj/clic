<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
	
<?php echo $this->uri->segment(1);  ?>

</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


<?php

	//include 'assets/css/template_css.php'; 
 ?>
	<link rel='stylesheet' type="text/css" href="<?php echo base_url().'bootstrap3/dist/css/bootstrap.css'; ?>"/>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery/jquery-1.8.2.min.js'; ?>"></script>



<script type="text/javascript" src="<?php echo base_url().'assets/js/zoomooz/jquery.zoomooz.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'bootstrap3/dist/js/bootstrap.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.tinycarousel.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/shadowbox.js'; ?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.confirmon.min.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.confirmon.css'; ?>" type="text/css">

<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url().'assets/css/shadowbox.css'; ?>" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.min.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/advisory_tabs_info.css'; ?>">

<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-dialog.css'; ?>" type="text/css">


<style>
	

#notification
{


	margin:auto;
	margin-top:50px;
	width:400px;
	padding:60px;
	text-align:center;
	border-radius:10px;
	color:#fff;
	font-weight: bold;
	border:1px solid #fff;
	box-shadow: 0px 1px 1px #555;
	font-size: 16px;
	background:rgba(0,0,0,0.2);
	text-shadow:0px 1px 1px #000;


}


a#notification_button
{

background: #c7e89d; /* Old browsers */
background: -moz-linear-gradient(top,  #c7e89d 1%, #7dcc78 45%, #41a048 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#c7e89d), color-stop(45%,#7dcc78), color-stop(100%,#41a048)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* IE10+ */
background: linear-gradient(to bottom,  #c7e89d 1%,#7dcc78 45%,#41a048 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c7e89d', endColorstr='#41a048',GradientType=0 ); /* IE6-9 */

display: block;
margin:auto;
margin-top: 10px;
padding:3px 0px;
border-radius:30px;
width:150px;
text-decoration: none;
color:#033;
font-weight: 100;


box-shadow: 0px 1px 1px #050;

}

a#notification_button:hover
{

background: #bdefa2; /* Old browsers */
background: -moz-linear-gradient(top,  #bdefa2 0%, #8aea8f 46%, #4fc157 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bdefa2), color-stop(46%,#8aea8f), color-stop(100%,#4fc157)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* IE10+ */
background: linear-gradient(to bottom,  #bdefa2 0%,#8aea8f 46%,#4fc157 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bdefa2', endColorstr='#4fc157',GradientType=0 ); /* IE6-9 */

}

div.notification_red
{
	background:red;
}


</style>
<script>


  $(function() 
  {
   //alert('running');       
  
    $('a.main_delete').click(function(e)
     
    {
  e.preventDefault();
  // alert('clicked');
	


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




 <script>
  $(function() {
    $( document ).tooltip();
  });
  </script>

</head>
<body>



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
$adv_main_id=$this->uri->segment(3);
$adv_sub_id=$this->uri->segment(4);

$sub_category=$this->uri->segment(5);

if(empty($collected_agri_info))
{
	if($sub_category=='veg')
	{
		$sub_category='vegetable';
	}
	echo "<div class='animated bounceInDown ' id='notification'><sapn >No informartion entered in ".$sub_category."
<p><a id='notification_button' href='".base_url()."index.php/advisory/insert_advisory_sub/".$adv_main_id."/".$sub_category."/".$encoded_url."'>enter now</a>


</span></div>";
}

// print_r($collected_agri_info);

//  ****************************
// get current addresss where to return after update
//*********************************

//print_r($collected_agri_info);

foreach( $collected_agri_info as $collected_agri_record)
{
	$selected_section=$this->uri->segment(5);

$new_agri_name=$collected_agri_record[2];

if(isset($collected_agri_record[3]))
{
$agri_ids=$collected_agri_record[3];
}

if(isset($collected_agri_record[5]))
{
$agri_pest_disease_records=$collected_agri_record[5];
}

if($selected_section=='veg')
{
	$selected_section='vegetable';
}


if($selected_section!='livestock')
{

	echo "<div id='adv_agri_box' class='animated bounceInDown '>";

echo "<div id='title'>";

if($new_agri_name!='none')
{
echo "<div id='no_id_title'>".$new_agri_name."</div>";
}


if($agri_ids!='none')
{
	

	$collected_agri_id=explode('+', $agri_ids);

	//print_r( $collected_agri_record);
//print_r($collected_agri_info);
foreach ($collected_agri_id  as $agri_attached_id) {
if($agri_attached_id!='')
{		
//echo $agri_attached_id;
$this->db->from('agri');
$this->db->select(array('name','tname','icon'));
$this->db->where('agri_id',$agri_attached_id);
$agri_result=$this->db->get()->result();



echo "<div id='attached_agri_box'>";

echo "<a  title='".$agri_result[0]->name."/ ".$agri_result[0]->tname."' target='_blank' href='".base_url()."index.php/agri/view_agri/".$selected_section."/".$agri_attached_id."'/>";
echo "<img src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ', '_',$agri_result[0]->icon)."' /></a>";

echo "	</div>	";
}


	}
echo "</div>";

}

//print_r($collected_agri_record);

$adv_auto_id=$collected_agri_record[0];
$adv_agri_id=$collected_agri_record[1];

//echo $adv_auto_id;

//print_r($collected_agri_record);


echo "<div id='file_option_area'>";

echo "<a class='main_add' target='_blank' href='".base_url()."index.php/advisory/insert_advisory_agri/".$adv_main_id."/".$selected_section."/".$adv_agri_id.'/insert_adv_agri_later/'.$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";
if(isset($adv_auto_id))
{
echo "<a class='main_delete'  href='".base_url()."index.php/advisory/delete_adv_sub/".$adv_auto_id."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
}

echo "<a   class='main_edit' href='".base_url()."index.php/advisory/update_adv_sub/".$adv_agri_id."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";
echo "</div>";
echo '<div class="zoomViewport">
    <div class="zoomContainer">';
//echo '<div class="zoomTarget" id="advice" data-scalemode="width" data-nativeanimation="true">'. str_replace('<p></p>', '', $collected_agri_record[4]);
    echo '<div  id="advice" >'. str_replace('<p>&nbsp;</p>','',(str_replace('<p></p>', '', $collected_agri_record[4])));

echo "</div>";


echo '  </div>
</div>';
/*
echo "<div style='color:#222;'>";

print_r($agri_ids);

echo"</div>";
*/


if(!empty($agri_pest_disease_records))
{
foreach ($agri_pest_disease_records as $agri_pest_disease_record) 
{

$agri_pest_disease_category=$agri_pest_disease_record[2];
$agri_pest_disease_name=$agri_pest_disease_record[3];

	if(count($agri_pest_disease_records)==1)
	{
		echo "<section id='adv_agri_pest_disease_box_single'>";
	}
	else
	{
		echo "<section id='adv_agri_pest_disease_box_multiple'>";
	}
	

//print_r($agri_pest_disease_record[4]);

$category=array();
if(is_array($agri_pest_disease_record[4]))
{
foreach($agri_pest_disease_record[4] as $pd_id)
{

$this->db->from('agri_pd');
$this->db->select('category');
$this->db->where('pd_id',$pd_id);
$pd_category=$this->db->get()->result();
foreach ($pd_category as $pd_category_single) {
//print_r($pd_category_single);
$category[]=$pd_category_single->category;
}


//print_r($pd_category);

}
}
if($agri_pest_disease_category=='none' && $agri_pest_disease_name=='none')
{
	$agri_pest_disease_category='';
	$agri_pest_disease_name='';

}

if(is_array($agri_pest_disease_record[4]))
{
if(in_array('pest', $category) && in_array('disease', $category))
{
	$agri_pest_disease_category="pest and disease";
}
else if(in_array('pest', $category))
{
	$agri_pest_disease_category="Pest";

}
else if(in_array('disease', $category))
{
	$agri_pest_disease_category="Disease";
	
}

}

echo "<div id='pest_disease_name'>";
//echo $agri_pest_disease_record[0].': ';
echo "<div id='pest_disease_category'>".$agri_pest_disease_category."</div>".$agri_pest_disease_name;


if(is_array($agri_pest_disease_record[4]))
{
	foreach($agri_pest_disease_record[4] as $pd_id)
	{


if($pd_id!=='')
{
$this->db->from('agri_pd');
$this->db->select(array('name','tname','category','icon'));
$this->db->where('pd_id',$pd_id);
$pd_result=$this->db->get()->result();



echo "<div id='attached_agri_box'>";

echo "<a  title='".$pd_result[0]->name."/ ".$pd_result[0]->tname."' target='_blank' href='".base_url()."index.php/agri_pd/view_agri_pd/".$pd_result[0]->category."/".$pd_id."'/>";
echo "<img src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ', '_',$pd_result[0]->icon)."' /></a>";

echo "	</div>	";

}

//	echo 'name_id:'.$name_id.'<br>';


	}

}


echo "<div id='file_option_area'>";

echo "<a class='main_delete'  href='".base_url()."index.php/advisory/delete_adv_agri/".$agri_pest_disease_record[1]."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "<a class='main_edit' href='".base_url()."index.php/advisory/update_adv_agri/".$agri_pest_disease_record[1]."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";
echo "</div>";



echo "</div>";


if(!empty($agri_pest_disease_record[5][0]))
{
	/*
	echo '<div id="npm_contol_title">';
	echo 'NPM CONTROL';
echo "</div>";
*/
}








echo "<div id='control_text'>";


if(!empty($agri_pest_disease_record[5]))
{

	echo "<div id='npm'>";
	foreach($agri_pest_disease_record[5] as $npm_id)
	{


if($npm_id!='')
{		
//echo $agri_attached_id;
$this->db->from('npm');
$this->db->select(array('name','tname','icon'));
$this->db->where('npm_id',$npm_id);
$npm_result=$this->db->get()->result();

//print_r($agri_result);
echo "<div id='attached_npm_box'>";
echo "<a title='".$npm_result[0]->name."/ ".$npm_result[0]->tname."' target='_blank' href='".base_url()."index.php/npm/view_npm/".$npm_id."'/>";
echo "<img src='".base_url()."assets/uploaded/img/thumb_".str_replace(' ', '_',$npm_result[0]->icon)."' />";


echo "</a>";
echo "</div>";
}



//echo $npm_id.'<br>';

}
	echo '</div>';

}



echo $agri_pest_disease_record[6].'</div>';


	//echo 'control_text is '.$agri_pest_disease_record[4]."<br>";
	echo "</section>";
}
echo "</div>";

}



echo "</div>";




}





else{

/**************************************************	


code seprate from here for livestock



***************************************************/


//print_r($collected_agri_record);

$adv_auto_id=$collected_agri_record[0];
$adv_livestock_id=$collected_agri_record[1];


echo "<div id='adv_agri_box' class='animated bounceInDown '>";


echo '<div id=title>';

echo $collected_agri_record[2];

echo "<div id='file_option_area'>";

echo "<a class='main_add'  href='".base_url()."index.php/advisory/insert_advisory_livestock/".$adv_main_id."/".$selected_section."/".$adv_livestock_id.'/insert_adv_agri_later/'.$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_add.png'></section></a>";
if(isset($adv_auto_id))
{
echo "<a class='main_delete'  href='".base_url()."index.php/advisory/delete_adv_sub/".$adv_auto_id."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
}

echo "<a class='main_edit' href='".base_url()."index.php/advisory/update_adv_sub/".$adv_livestock_id."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";
echo "</div>";


echo "</div>";


echo '<div class="zoomTarget" id=advice>'.$collected_agri_record[3];

echo "</div>";










//echo count($new_agri_name);

foreach ($collected_agri_record[4] as $livestock_disease_record) 
{

	if(count($collected_agri_record[4])>1)
	{
	echo "<section id='adv_agri_pest_disease_box_multiple'>";
}
else
{
	echo "<section id='adv_agri_pest_disease_box_single'>";
}

echo "<div id='pest_disease_name'>";
//echo $agri_pest_disease_record[0].': ';
echo $livestock_disease_record[0];


if(is_array($livestock_disease_record[1]))
{
	foreach($livestock_disease_record[1] as $name_id)
	{


echo 'name_id:'.$name_id.'<br>';


	}

}


echo "<div id='file_option_area'>";

echo "<a class='main_delete'  href='".base_url()."index.php/advisory/delete_adv_livestock/".$livestock_disease_record[1]."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_delete.png'></section></a>";
echo "<a class='main_edit' href='".base_url()."index.php/advisory/update_adv_livestock/".$livestock_disease_record[1]."/".$selected_section."/".$encoded_url."'>
<section id='file_option'><img src='".base_url()."assets/img/file_option/document_edit.png'></section></a>";
echo "</div>";




/*

if(is_array($agri_pest_disease_name))
{
	echo "<div id='npm'>";
	foreach($agri_pest_disease_name as $npm_id)
	{

if($npm_id!='')
{
echo $npm_id.'<br>';
}

	}
	echo '</div>';

}



*/



echo "<div id='control_text'>".$livestock_disease_record[3].'</div>';


	//echo 'control_text is '.$agri_pest_disease_record[4]."<br>";
	echo "</section>";
}














echo "</div>";














}


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
//Shadowbox2.init();

</script>

<script type="text/javascript">

//$('#video-tooltip').tooltip();
</script>
</div>
</div>

</body>
</html>