<?php

class Advisory extends CI_Controller
{
	public $data = array();

	 public function __construct()
       {
       	       	// parent::Controller(); for less then CI 2.x users
            parent::__construct();
            // Your own constructor code

		$this->load->helper('url'); //You should autoload this one ;)
		$this->load->helper('ckeditor');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->library('image_lib');







		
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	'content',
			'path'	=>	'js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"90%",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
					
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Blue',
						'font-weight' 		=> 	'bold'
					)
				),
				
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 		=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);

		
		$this->data['ckeditor_2'] = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	'content_2',
			'path'	=>	'js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'width' 	=> 	"100%",	//Setting a custom width
				'height'=> "230px",	//Setting a custom height
				'toolbar' 	=> 	array(		//Setting a custom toolbar
					

					array('Source'),
					array('-','Save','NewPage','DocProps','Preview','Print','-','Templates'),
					array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),
					array('Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'),

					array('Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat'),
					array('FontSize'),
					array('NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),
					array('Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'),
					array('Styles','Format','Font','FontSize'),
					array('TextColor','BGColor'),
					array('Maximize', 'ShowBlocks','-'),

					
					'/'
				)
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 3' => array (
					'name' 		=> 	'Green Title',
					'element' 	=> 	'h3',
					'styles' => array(
						'color' 			=> 	'Green',
						'font-weight' 		=> 	'bold'
					)
				)
								
			)
		);
$this->load->model('model_advisory');







function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
      return $key;
  }





       }


	function index()
	{
		//
	//	$this->load->model('model_advisory');
	//	$data['info']=$this->model_advisory-> get_last_ten_entries();
		
	//	$this->load->view('view_weather_info',$data);
	}

	function  view_advisory($advisory_date=NULL)
	{
		
ob_start();


       // echo $this->uri->segment(3);
	{
		$data['info']=$this->model_advisory->get_advisory_date($this->uri->segment(3));
	}

   
ob_flush();

$this->load->view('view_advisory_info',$data);
	}













function  get_advisory_tabs($advisory_id=NULL)
    {
        if($advisory_id!=NULL )
        {
            $data['info']=$this->model_advisory->get_advisory($advisory_id);
        }
  
         else
        {
            echo "u cant access tabs without any key.";
        }

$this->load->view('get_advisory_tabs',$data);
    }









	function  delete_adv_main($advisory_id=null,$return_to=null)
	{
		$this->model_advisory->delete_advisory_main($advisory_id);
		
//echo base64_decode($return_to);

  $path_slice = explode("/", base64_decode($return_to));

// print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;


echo "<center><a style='padding:5px 10px;  background:#eee; ' href '".base_url()."index.php/".$return_to_path."'> return back </a></center>";
			header( 'Location: '.base_url().'/'.$return_to_path) ;
	
		
	}





  function  delete_adv_sub($adv_sub_id=null)
  {
    $return_to=$this->uri->segment(5);
    $this->model_advisory->delete_advisory_sub($adv_sub_id);
    
//echo base64_decode($return_to);

  $path_slice = explode("/", base64_decode($return_to));

//// print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;
echo  "<br>".$return_to_path;

//echo "<center><a style='padding:5px 10px;  background:#eee; ' href '".base_url()."index.php/".$return_to_path."'> return back </a></center>";deheader( 'Location: '.base_url().'/'.$return_to_path) ;
  
header( 'Location: '.base_url().'/'.$return_to_path) ;
    
  }


  



 function insert_advisory()
    {
    	//// print_r($this->data);
     $this->load->view('insert_advisory',$this->data);
    }

     function insert_advisory_sub()
    {
        //// print_r($this->data);
     $this->load->view('insert_advisory_sub',$this->data);
    }


  function insert_advisory_agri()
    {
        //// print_r($this->data);
     $this->load->view('insert_advisory_agri',$this->data);
    }

      function insert_advisory_livestock()
    {
        //// print_r($this->data);
     $this->load->view('insert_advisory_livestock',$this->data);
    }

 function update_adv_agri()
    {
        //// print_r($this->data);
     $this->load->view('update_advisory_agri',$this->data);
    }

  

      function update_adv_livestock()
    {
        //// print_r($this->data);
     $this->load->view('update_advisory_livestock',$this->data);
    }



 function update_adv_main($advisory_id,$return_to)
    {
        //// print_r($this->data);
     $this->load->view('update_advisory_main',$this->data);
    }







       function store_advisory($advisory_id=null)
    {
    	//// print_r($_POST);

     //   echo "<br><br><br>--------------------------------<br>";
 
//// print_r($_FILES);

// echo "<br><br><br>--------------------------------<br>";

    	if($advisory_id!=null)
    	{
    		$this->db->where('advisory_id',$advisory_id);
    		$result= $this->db->update('advisory',$_POST);
    	

        }
    	else
    	{




		$advisory_data['adv_main_id'] =random_string(20);
        $advisory_data['date'] = $_POST['date'];
        $advisory_data['crop'] = random_string(20);
        $advisory_data['vegetable'] = random_string(20);
        $advisory_data['fruit'] = random_string(20);
        $advisory_data['livestock'] =random_string(20);
        

      // print_r($advisory_data);




 $result= $this->db->insert('adv_main',$advisory_data);







   
    }
		
		// print_r($result);

if($result)
		{
		header("Location:".base_url().'index.php/advisory/insert_advisory_sub/'.$advisory_data['adv_main_id'].'/crop');
		}

if(!$result)
		{

		
  $error= $this->db->_error_message();
//echo $error;

   if (strpos($error,'Duplicate entry') !== false) 
   {
  //  echo 'true';
  //  echo 'duplicate';
 //   header("Location:".base_url().'index.php/home/success/0');
	}




			;
		}

	

    }










  function store_advisory_sub($advisory_id=null)
    {
        //// print_r($_POST);

     //   echo "<br><br><br>--------------------------------<br>";
 
//// print_r($_FILES);

// echo "<br><br><br>--------------------------------<br>";

$adv_main_id=$this->uri->segment(3);
$selected_section=$this->uri->segment(4);
$return_to=$this->uri->segment(5);
    $this->db->select(array($selected_section,'date')); 
    $this->db->from('adv_main');   
    $this->db->where("adv_main_id", $adv_main_id);
    $result= $this->db->get()->result();


   

// print_r($_POST);

        $advisory_data['adv_main_id'] =$this->uri->segment(3);
        $advisory_data['adv_sub_id'] = $result[0]->$selected_section;
        $advisory_data['adv_agri_id'] = random_string(20);

        
if($_POST['name']!='')
{
        $advisory_data['name'] = $_POST['name'];
}
else
{
 $advisory_data['name'] = 'none'; 
}
        if(is_array($_POST['name_id']))
        {
          $concate_agri_id='';

          foreach($_POST['name_id'] as $name_id)
          {
$concate_agri_id.=$name_id.'+';

          }
          $advisory_data['name_id']=$concate_agri_id;
          
          }
          else
          {
            $advisory_data['name_id'] = 'none';
          }
        
    
        $advisory_data['advice'] = $_POST['advice'];
        

      // print_r($advisory_data);




$result= $this->db->insert('adv_sub',$advisory_data);

  // print_r($result);

if($result)
        {

        if($selected_section!='livestock') 
        {
     
if($return_to!='')
{
 
    header("Location:".base_url().'index.php/advisory/insert_advisory_agri/'.$advisory_data['adv_main_id'].'/'.$selected_section.'/'.$advisory_data['adv_agri_id'].'/'.$return_to);
  }
  else{


header("Location:".base_url().'index.php/advisory/insert_advisory_agri/'.$advisory_data['adv_main_id'].'/'.$selected_section.'/'.$advisory_data['adv_agri_id']);

  }       
      }else
      {
        header("Location:".base_url().'index.php/advisory/insert_advisory_livestock/'.$advisory_data['adv_main_id'].'/'.$selected_section.'/'.$advisory_data['adv_agri_id']);
      }

        }

if(!$result)
        {

        
  $error= $this->db->_error_message();
//echo $error;

   if (strpos($error,'Duplicate entry') !== false) 
   {
  //  echo 'true';
  //  echo 'duplicate';
 //   header("Location:".base_url().'index.php/home/success/0');
    }




            ;
        }

    

    }





function store_advisory_agri($adv_main_id=null)
    {
        //// print_r($_POST);

     //   echo "<br><br><br>--------------------------------<br>";
 
//// print_r($_FILES);

// echo "<br><br><br>--------------------------------<br>";

$adv_main_id=$this->uri->segment(3);
$selected_section=$this->uri->segment(4);
$adv_agri_id=$this->uri->segment(5);
$return_to_what=$this->uri->segment(6);
$return_to=$this->uri->segment(7);


echo $return_to_what;
echo $return_to;
    $this->db->select(array($selected_section,'date')); 
    $this->db->from('adv_main');   
    $this->db->where("adv_main_id", $adv_main_id);
    $result= $this->db->get()->result();


   

 print_r($_POST);
$npm_id='';
$name_id='';
foreach($_POST['npm_id'] as $npm_ids)
{
$npm_id.=$npm_ids."+";
}
foreach($_POST['name_id'] as $name_ids)
{
$name_id.=$name_ids."+";
}


echo "<br>".$npm_id."<br>";
      //  $advisory_data['adv_main_id'] =$this->uri->segment(3);
      //  $advisory_data['adv_sub_id'] = $result[0]->$selected_section;
        $advisory_data['adv_agri_id'] = $adv_agri_id;
        $advisory_data['pest_disease_id'] = random_string(20);
 $advisory_data['category'] = $_POST['category'];
        $advisory_data['name'] = $_POST['name'];
        $advisory_data['name_id'] = $name_id;
        $advisory_data['npm_id'] = $npm_id;
    
        $advisory_data['control_text'] = $_POST['control_text'];
        

  // echo "<br><br><br><br>";   // print_r($advisory_data);

echo $name_id;


 $result= $this->db->insert('adv_agri_pest_disease',$advisory_data);






  
   // // print_r($result);

if($result)
        {

        if($selected_section!='livestock') 
        {

if($return_to_what=='insert_adv_agri_later')
{

  $path_slice = explode("/", base64_decode($return_to));

// print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i].'/';

}


if($return_to_what=='insert_adv_agri_later')
{
  echo "
<script>
window.close();

</script>



  ";

}
//echo $return_to_path;

//header("Location:".base_url().$return_to_path);

header("Location:".base_url()."index.php/advisory/view_advisory");

}
else
{
  
  header("Location:".base_url()."index.php/advisory/view_advisory");
  
 // header("Location:".base_url().'index.php/advisory/insert_advisory_agri/'.$adv_main_id.'/'.$selected_section.'/'.$advisory_data['adv_agri_id']);
}



       
          //echo base_url().'index.php/advisory/insert_advisory_agri/'.$adv_main_id.'/'.$selected_section.'/'.$advisory_data['adv_agri_id'];
      }else
      {
 //       header("Location:".base_url().'index.php/advisory/insert_advisory_livestock/'.$adv_main_id.'/'.$selected_section.'/'.$advisory_data['adv_livestock_id']);
      }

        }

if(!$result)
        {

        
  $error= $this->db->_error_message();
//echo $error;

   if (strpos($error,'Duplicate entry') !== false) 
   {
  //  echo 'true';
 //   header("Location:".base_url().'index.php/home/success/0');
    }




            ;
        }

    

    }




function store_advisory_livestock($adv_main_id=null)
    {
        //// print_r($_POST);

     //   echo "<br><br><br>--------------------------------<br>";
 
//// print_r($_FILES);

// echo "<br><br><br>--------------------------------<br>";

  $adv_main_id=$this->uri->segment(3);
  $selected_section=$this->uri->segment(4);
  $this->db->select(array($selected_section,'date')); 
  $this->db->from('adv_main');   
  $this->db->where("adv_main_id", $adv_main_id);
  $result= $this->db->get()->result();


   

// print_r($_POST);



      //  $advisory_data['adv_main_id'] =$this->uri->segment(3);
      //  $advisory_data['adv_sub_id'] = $result[0]->$selected_section;
        $advisory_data['adv_livestock_id'] = $this->uri->segment(5);
 
        $advisory_data['name'] = $_POST['name'];
        $advisory_data['name_id'] = 'none';
         $advisory_data['disease_id'] = random_string(20);
    
        $advisory_data['control_text'] = $_POST['control_text'];
        

      // print_r($advisory_data);




$result= $this->db->insert('adv_livestock_disease',$advisory_data);






  
   // print_r($result);

if($result)
        {

              header("Location:".base_url().'index.php/advisory/insert_advisory_livestock/'.$adv_main_id.'/'.$selected_section.'/'.$advisory_data['adv_livestock_id']);
          //echo base_url().'index.php/advisory/insert_advisory_agri/'.$adv_main_id.'/'.$selected_section.'/'.$advisory_data['adv_agri_id'];
      
        }

if(!$result)
        {

        
  $error= $this->db->_error_message();
//echo $error;

   if (strpos($error,'Duplicate entry') !== false) 
   {
  //  echo 'true';
  //  echo 'duplicate';
 //   header("Location:".base_url().'index.php/home/success/0');
    }




            ;
        }

    

    }









  function store_update_adv_main($adv_main_id=null,$return_to=null)
    {
       

ob_start();

        $adv_main_id_id=$this->uri->segment(3);

 



//$final_update_advisory['adv_main_id']=$adv_main_id;
$final_update_advisory['date']=$_POST['date'];


echo "<br><br>";
    // print_r($final_update_advisory); 

$this->db->where('adv_main_id',$adv_main_id);
$result= $this->db->update('adv_main',$final_update_advisory);
        



        //// print_r($result);

if($result)
        {
            echo 'success';

             $path_slice = explode("/", base64_decode($return_to));

// print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i].'/';

}

//echo "<br>*************<br>".$return_to_path;

       header("Location:".base_url().$return_to_path);
       ob_flush();
        }

if(!$result)
        {

        
  $error= $this->db->_error_message();
//echo $error;

   if (strpos($error,'Duplicate entry') !== false) 
   {
  //  echo 'true';
  //  echo 'duplicate';
 //   header("Location:".base_url().'index.php/home/success/0');
    }




          
        }

  
    }
















function delete_slide($slide_id=null,$return_to=null)
{

$result_slide_deleted=$this->db->delete('slides', array('slide_id' => $slide_id));  


    $result_slide_image_deleted=$this->db->delete('slide_img', array('slide_id' => $slide_id));  

    $result_slide_video_deleted=$this->db->delete('slide_video', array('slide_id' => $slide_id));  

    if( $result_slide_deleted && $result_slide_image_deleted && $result_slide_video_deleted)
        {



$path_slice = explode("/", base64_decode($return_to));

// print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{
if(ctype_digit($path_slice[$i]))
{

$return_to_path = $return_to_path.((int)$path_slice[$i]-1)."/";
}
else
{

    $return_to_path = $return_to_path.$path_slice[$i]."/";

}

}

//echo "<br><br>".$return_to_path;

header('Location:'.base_url()."index.php/".$return_to_path);




        }


}












 function update_adv_sub($adv_agri_id=null,$category=null,$return_to=null)
    {



 //       // print_r($_FILES);
ob_start(); 
     

$data['adv_agri_id']=$adv_agri_id;
$data['category']=$category;
$data['return_to']=$return_to;
$data['ckeditor_2']=$this->data['ckeditor_2'];
//// print_r($data);
 $this->load->view('update_advisory_sub',$data);




}





function store_update_advisory_sub($adv_agri_id=null, $category=null, $return_to=null)
{

// print_r($_POST);
$name_id='';
if(is_array($_POST['name_id']))
{

  $name_id=implode('+',$_POST['name_id']);
}

if($_POST['name']!='')
{
$updated_data['name']=$_POST['name'];
}
else
{
  $updated_data['name']='none';
}


$updated_data['name_id']=$name_id;
$updated_data['advice']=$_POST['advice'];

// print_r($updated_data);




$this->db->where('adv_agri_id',$adv_agri_id);
$result= $this->db->update('adv_sub',$updated_data);
      


//$this->db->insert('adv_sub',$updated_data);

// ***************************
//return to path extract
//****************************


$path_slice = explode("/", base64_decode($return_to));

//// print_r($path_slice);

$return_to_path='';



for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}



//$return_to_path=rtrim('/',$return_to_path);




// ***************************
// return to path extract end here
// ***************************

header('Location:'.base_url().'index.php/'.$return_to_path);
ob_flush();
}












function store_update_advisory_agri($pest_disease_id=null, $category=null, $return_to=null)
{

ob_start();
// print_r($_POST);

echo '<br>--------------------------------<br>';

$npm_id='';
if(is_array($_POST['npm_id']))
{

  $npm_id=implode('+',$_POST['npm_id']);
}

$name_id='';
foreach($_POST['name_id'] as $name_ids)
{
$name_id.=$name_ids."+";
}


$updated_data['category']=$_POST['category'];


if($_POST['name']!='')
{
$updated_data['name']=$_POST['name'];
}
else
{
  $updated_data['name']='none';
}




$updated_data['npm_id']=$npm_id;
$updated_data['name_id']=$name_id;
$updated_data['control_text']=$_POST['control_text'];

// print_r($updated_data);



$this->db->where('pest_disease_id',$pest_disease_id);
$result= $this->db->update('adv_agri_pest_disease',$updated_data);
     


//$this->db->insert('adv_sub',$updated_data);

// ***************************
//return to path extract
//****************************


$path_slice = explode("/", base64_decode($return_to));

//// print_r($path_slice);

$return_to_path='';



for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}



echo $return_to_path;



// ***************************
// return to path extract end here
// ***************************

header('Location:'.base_url()."index.php/".$return_to_path);
ob_flush();
}












function store_update_advisory_livestock($disease_id=null, $return_to=null)
{

ob_start();
// print_r($_POST);

echo '<br>--------------------------------<br>';

if($_POST['name']!='')
{
$updated_data['name']=$_POST['name'];
}
else
{
  $updated_data['name']='none';
}




$updated_data['control_text']=$_POST['control_text'];

// print_r($updated_data);



$this->db->where('disease_id',$disease_id);
$result= $this->db->update('adv_livestock_disease',$updated_data);
     


//$this->db->insert('adv_sub',$updated_data);

// ***************************
//return to path extract
//****************************


$path_slice = explode("/", base64_decode($return_to));

//// print_r($path_slice);

$return_to_path='';



for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}



echo $return_to_path;



// ***************************
// return to path extract end here
// ***************************

header('Location:'.base_url()."index.php/".$return_to_path);
ob_flush();
}











function  delete_adv_agri($pest_disease_id=null,$selected_section=null, $return_to=null )
{


ob_start();
echo $pest_disease_id;
echo $selected_section;
echo $return_to;



$result_adv_agri_deleted=$this->db->delete('adv_agri_pest_disease', array('pest_disease_id' => $pest_disease_id));






// ***************************
//return to path extract
//****************************


$path_slice = explode("/", base64_decode($return_to));

//// print_r($path_slice);

$return_to_path='';



for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}



echo $return_to_path;



// ***************************
// return to path extract end here
// ***************************


header('Location:'.base_url()."index.php/".$return_to_path);
ob_flush();




}






function  delete_adv_livestock($disease_id=null,$selected_section=null, $return_to=null )
{


ob_start();
echo $disease_id;
echo $selected_section;
echo $return_to;



$result_adv_livestock_deleted=$this->db->delete('adv_livestock_disease', array('disease_id' => $disease_id));






// ***************************
//return to path extract
//****************************


$path_slice = explode("/", base64_decode($return_to));

//// print_r($path_slice);

$return_to_path='';



for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}



echo $return_to_path;



// ***************************
// return to path extract end here
// ***************************


header('Location:'.base_url()."index.php/".$return_to_path);
ob_flush();




}







/*


       function store_advisory_intro($advisory_id=null)
    {
        // print_r($_POST);

         $intro_id= $_POST['intro_id'];
            $intro_text= $_POST['text'];


 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($advisory_id!=null && $intro_id !=null)
        {



// insert slide text in slids database.......code start here



    $advisory_intro_data['main_id'] =$advisory_id;
        $advisory_intro_data['sub_id'] = $intro_id;
    
        $advisory_intro_data['text'] = $intro_text;
        
    

    $result_slide_text= $this->db->insert('slides',$advisory_intro_data);

     $slide_id = $this->db->insert_id();  



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here

echo  $slide_id;


    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['slide_media_files'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {


                echo $v.'<br>';
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
               $i++;   
            }
        }



unset($_FILES['slide_media_files']);
    
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {


 //upload config setting..............

$file_type= $file['type'];
    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' => 'gif|jpg|png|bmp|mp4|flv|mp3',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}
else if($file_type=='video/mp4' or $file_type=='video/flv')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/video/',
            'allowed_types' => 'gif|jpg|png|bmp|mp4|flv|mp3',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


else if($file_type=='audio/mp3')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/audio/',
            'allowed_types' => 'gif|jpg|png|bmp|mp4|flv|mp3',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


 
   
 //upload config setting ends here..............

        $this->upload->initialize( $upload_conf);

            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error 
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();


// print_r($upload_data);
echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$advisory_id;
$sub_id=$intro_id;
$slide_data['main_id']=$main_id;
$slide_data['sub_id']=$sub_id;
$slide_data['slide_id']=$slide_id;
 $slide_data['file_name']=$upload_data['file_name'];
 $slide_data['file_type']=$upload_data['file_type'];
 $slide_data['file_path']=$upload_data['file_path'];
 $slide_data['full_path']=$upload_data['full_path'];
 $slide_data['file_ext']=$upload_data['file_ext'];
 $slide_data['img_width']=$upload_data['image_width'];
 $slide_data['img_height']=$upload_data['image_height'];


 $result= $this->db->insert('slide_img',$slide_data);



 $img_id = $this->db->insert_id(); 

echo 'img_upload_id='.$img_id;


}

else if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/avi')
{
$slide_data=array();

$main_id=$advisory_id;
$sub_id=$intro_id;
$slide_data['main_id']=$main_id;
$slide_data['sub_id']=$sub_id;
$slide_data['slide_id']=$slide_id;
 $slide_data['file_name']=$upload_data['file_name'];
 $slide_data['file_type']=$upload_data['file_type'];
 $slide_data['file_path']=$upload_data['file_path'];
 $slide_data['full_path']=$upload_data['full_path'];
 $slide_data['file_ext']=$upload_data['file_ext'];



 $result= $this->db->insert('slide_video',$slide_data);
   $video_id = $this->db->insert_id();  


echo 'video_upload_id='.$video_id;

    
}


if($file_type=='audio/mp3')
{
$slide_data=array();

$main_id=$advisory_id;
$sub_id=$intro_id;
$slide_data['main_id']=$main_id;
$slide_data['sub_id']=$sub_id;
$slide_data['slide_id']=$slide_id;
 $slide_data['file_name']=$upload_data['file_name'];
 $slide_data['file_type']=$upload_data['file_type'];
 $slide_data['file_path']=$upload_data['file_path'];
 $slide_data['full_path']=$upload_data['full_path'];
 $slide_data['file_ext']=$upload_data['file_ext'];



 $result= $this->db->insert('slide_audio',$slide_data);

 $audio_id = $this->db->insert_id();  


echo 'audio_upload_id='.$audio_id;

    
}


                
                 if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
           
{
                // set the resize config
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                    'width'         => 100,
                    'height'        => 100
                    );

                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $success[] = $upload_data;
                }
            }
            }
        }

        // see what we get
        if(count($error > 0))
        {
            $data['error'] = $error;
        }
        else
        {
            $data['success'] = $upload_data;

       }

       // // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
    echo "There is no problem everything stored with success";
header("Location:".base_url().'index.php/advisory/insert_advisory_intro/'.$advisory_id);

}
else

{
       echo "There is a problem";

}


        }






*/








function  view_advisory_sub_info($adv_main_id,$adv_sub_id,$selected_section)

  {

if($selected_section!='livestock')
{



$collected_agri_info=array();

    $this->db->select(array('agri_auto_id','adv_agri_id','name','name_id','advice')); 
    $this->db->from('adv_sub');   
    $this->db->where("adv_sub_id", $adv_sub_id);
    $result= $this->db->get()->result();


foreach($result as $agri_sub_info)
{

//echo $agri_sub_info->name;
//echo $agri_sub_info->name_id;
//echo $agri_sub_info->advice;


  $this->db->select(array('adv_agri_id','pest_disease_id','category','name','name_id','npm_id','control_text')); 
  $this->db->from('adv_agri_pest_disease');   
  $this->db->where("adv_agri_id", $agri_sub_info->adv_agri_id);
  $result_agri= $this->db->get()->result();


$collected_agri_sub_info=array();

$collected_agri_sub_info[]=$agri_sub_info->agri_auto_id;
$collected_agri_sub_info[]=$agri_sub_info->adv_agri_id;
$collected_agri_sub_info[]=$agri_sub_info->name;
$collected_agri_sub_info[]=$agri_sub_info->name_id;
$collected_agri_sub_info[]=$agri_sub_info->advice;

/*
echo '<br >agri_result';
// print_r($result_agri);

echo 'end<br>';

*/
$final_pest_disease_info=array();
/*
echo '<br>---------before each loop on result agri pest disease info--------<br>';
// print_r($final_pest_disease_info);
echo '<br>---------end here--------<br>';
*/
foreach ($result_agri as $adv_agri_info) 

{
/*
echo '<br>---------inside each loop on result agri -------<br>';
// print_r($adv_agri_info);
echo '<br>---------inside each loop end here--------<br>';
*/
$temp_agri_pest_disease_info=array();

$p_d_adv_agri_id=$adv_agri_info->adv_agri_id;
$p_d_pest_disease_id=$adv_agri_info->pest_disease_id;
$p_d_category=$adv_agri_info->category;
$p_d_name=$adv_agri_info->name;
$p_d_name_id=$adv_agri_info->name_id;
$p_d_npm_id=$adv_agri_info->npm_id;
$p_d_control_text=$adv_agri_info->control_text;

if($p_d_name_id!='none')
{

$p_d_name_id=explode('+',$p_d_name_id);

}

if($p_d_npm_id!='none')
{

$p_d_npm_id=explode('+',$p_d_npm_id);

}



//echo $p_d_category."<br>";
//echo $p_d_name."<br>";
/*
if(is_array($p_d_npm_id))
{
  // print_r($p_d_npm_id);
}

if(is_array($p_d_name_id))
{
  // print_r($p_d_name_id);
}

*/
$temp_agri_pest_disease_info[]=$p_d_adv_agri_id;
$temp_agri_pest_disease_info[]=$p_d_pest_disease_id;
$temp_agri_pest_disease_info[]=$p_d_category;
$temp_agri_pest_disease_info[]=$p_d_name;
$temp_agri_pest_disease_info[]=$p_d_name_id;
$temp_agri_pest_disease_info[]=$p_d_npm_id;
$temp_agri_pest_disease_info[]=$p_d_control_text;

$final_pest_disease_info[]=$temp_agri_pest_disease_info;

}

/*
echo '<br>---------final pest disease info--------<br>';
// print_r($final_pest_disease_info);
echo '<br>---------end here--------<br>';
*/
$collected_agri_sub_info[]=$final_pest_disease_info;

$collected_agri_info[]=$collected_agri_sub_info;

}

// echo '<br><br><hr>----------------start--------------------<br><br>';
//// print_r($collected_agri_info);


$data['collected_agri_info']=$collected_agri_info;

//// print_r($data['collected_agri_info']);
$this->load->view('view_advisory_tabs',$data);






}





else
{


 $collected_livestock_info=array();

    $this->db->select(array('agri_auto_id','adv_agri_id','adv_sub_id','name','name_id','advice')); 
    $this->db->from('adv_sub');   
    $this->db->where("adv_sub_id", $adv_sub_id);
    $result= $this->db->get()->result();


foreach($result as $livestock_sub_info)
{

//echo $livestock_sub_info->name;
//echo $livestock_sub_info->name_id;
//echo $livestock_sub_info->advice;


  $this->db->select(array('name','disease_id','name_id','control_text')); 
  $this->db->from('adv_livestock_disease');   
  $this->db->where("adv_livestock_id", $livestock_sub_info->adv_agri_id);
  $result_livestock= $this->db->get()->result();


$collected_livestock_sub_info=array();


$collected_livestock_sub_info[]=$livestock_sub_info->agri_auto_id;


$collected_livestock_sub_info[]=$livestock_sub_info->adv_agri_id;
$collected_livestock_sub_info[]=$livestock_sub_info->name;

$collected_livestock_sub_info[]=$livestock_sub_info->advice;



//// print_r($livestock_sub_info);

/*
echo '<br >livestock_result';
// print_r($result_livestock);

echo 'end<br>';

*/
$final_pest_disease_info=array();
/*
echo '<br>---------before each loop on result livestock pest disease info--------<br>';
// print_r($final_pest_disease_info);
echo '<br>---------end here--------<br>';
*/
foreach ($result_livestock as $adv_livestock_info) 

{

/*
echo '<br>---------inside each loop on result livestock -------<br>';
// print_r($adv_livestock_info);
echo '<br>---------inside each loop end here--------<br>';
*/
$temp_livestock_pest_disease_info=array();


$p_d_name=$adv_livestock_info->name;
$p_d_id=$adv_livestock_info->disease_id;
$p_d_name_id=$adv_livestock_info->name_id;

$p_d_control_text=$adv_livestock_info->control_text;

if($p_d_name_id!='none')
{

$p_d_name_id=explode('+',$p_d_name_id);

}

//echo $p_d_category."<br>";
//echo $p_d_name."<br>";
/*
if(is_array($p_d_npm_id))
{
  // print_r($p_d_npm_id);
}

if(is_array($p_d_name_id))
{
  // print_r($p_d_name_id);
}

*/

$temp_livestock_pest_disease_info[]=$p_d_name;
$temp_livestock_pest_disease_info[]=$p_d_id;
$temp_livestock_pest_disease_info[]=$p_d_name_id;

$temp_livestock_pest_disease_info[]=$p_d_control_text;


$final_pest_disease_info[]=$temp_livestock_pest_disease_info;

}

/*
echo '<br>---------final pest disease info--------<br>';
// print_r($final_pest_disease_info);
echo '<br>---------end here--------<br>';
*/
$collected_livestock_sub_info[]=$final_pest_disease_info;

$collected_livestock_info[]=$collected_livestock_sub_info;

}

// echo '<br><br><hr>----------------start--------------------<br><br>';
//// print_r($collected_livestock_info);


$data['collected_agri_info']=$collected_livestock_info;

//// print_r($data['collected_livestock_info']);
$this->load->view('view_advisory_tabs',$data);
}


    



}










/*
function  update_recorded()
	{
	
		$this->load->view('update_recorded');
	}

*/

}


function add_adv_sub()
{


  $this->load->view('insert_advisory_sub');
}