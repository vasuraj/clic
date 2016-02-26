<?php

class Soil extends CI_Controller
{
	public $data = array();


	 public function __construct()
       {
       	       	// parent::Controller(); for less then CI 2.x users
            parent::__construct();
            // Your own constructor code

		$this->load->helper('url'); //You should autoload this one ;)
		$this->load->helper('ckeditor');
    $this->load->helper('file');
        $this->load->library('pagination');
        $this->load->library('upload');
        $this->load->library('image_lib');



$extra_id_array=array();




		
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
$this->load->model('model_soil');
$this->load->model('model_agri');









function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
      return $key;
  }


function unique_random_string($length=null,$table=null,$field_name=null,$extra_id_array=null)

{
//gettting $this instance 
$CI_this =& get_instance();
// echo $length;
// echo $table;
// echo $field_name;
// print_r($extra_id_array);

$key='';
 
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) 
    {
        $key .= $keys[array_rand($keys)];
    }


//echo $key;
//------- select all the id from table and store in array
if(empty($extra_id_array))
{
$CI_this->db->from($table);
$CI_this->db->select($field_name);
$all_id=$CI_this->db->get()->result();

//---------- store all the key in id_array
foreach ($all_id as $id) {
   $extra_id_array[]=$id->$field_name;
}
}
// echo "<br>----extra id array----<br>";
// print_r($extra_id_array);

if($key!='')
{
if(!in_array($key, $extra_id_array))
{
 // echo '<br>------###
 //    #######  returned_key: '.$key.'##########------<br>';
 $extra_id_array[]=$key;
   return $key;
}
else
{
   // echo "<br>-------matching again----------<br>";
    // echo "<br>-------".$length;
    // echo"<br>-------". $table;
    // echo "<br>-------".$field_name;
   return unique_random_string($length,$table,$field_name,$extra_id_array); 
}


}



}








}// end of construct 











	function index()
	{
		//
	//	$this->load->model('model_Soil');
	//	$data['info']=$this->model_Soil-> get_last_ten_entries();
		
	//	$this->load->view('view_weather_info',$data);
	}



function  view_Soil_homepage()
    {
       ob_start(); 

$this->load->view('view_Soil_homepage');
    }



	function  view_Soil($Soil_category=NULL,$Soil_id=null)
	{
		

ob_start();

    // echo $this->uri->segment(3);
	{
		$data['info']=$this->model_Soil->get_category_Soil($this->uri->segment(3),$Soil_id);
	}

   

$this->load->view('view_Soil_info',$data);
	}






function  view_nutrition_difficiency_symptom()
    {
       ob_start(); 
$data['info']=$this->model_agri->get_agri();

$this->load->view('view_nutrition_difficiency_symptom',$data);
    }







function  get_Soil_tabs($Soil_id=NULL)
    {ob_start();
        if($Soil_id!=NULL )
        {
            $data['info']=$this->model_Soil->get_Soil($Soil_id);
        }
  
         else
        {
            echo "u cant access tabs without any key.";
        }

$this->load->view('get_Soil_tabs',$data);


}

function  get_symptom_id($nutrition_name=NULL, $agri_id=null)
    {
        ob_start();
  $query = $this->db->get_where('nutrition_difficiency_symptom',array('nutrition_name'=>$nutrition_name, 'agri_id'=>$agri_id))->result();
   //print_r($query);
  if(!empty($query))
  {
      echo $query[0]->nutrition_difficiency_symptom_id;  

      
  }
  else
  {
    echo "not_available";
  }
 
}




function  delete_Soil($Soil_id=null,$return_to=null)

{
ob_start();
$this->model_soil->delete_Soil($Soil_id);
		
// //echo base64_decode($return_to);

// $path_slice = explode("/", base64_decode($return_to));

// print_r($path_slice);

// $return_to_path='';

// //$return_to_path=implode('/',$path_slice);

// for($i=2;$i<count($path_slice);$i++)
// {

// $return_to_path = $return_to_path.$path_slice[$i]."/";

// }

//echo "<br><br>".$return_to_path;
ob_flush();

echo "<center><a style='padding:5px 10px;  background:#eee; ' href '".base_url()."index.php/".$return_to_path."'> return back </a></center>";
header( 'Location: '.base_url()) ;
	
		
}


 function  delete_Soil_item($soil_item_id=null,$return_to=null)

{
ob_start();
$this->model_soil->delete_Soil_item($soil_item_id);
        
//echo base64_decode($return_to);

$path_slice = explode("/", base64_decode($return_to));

print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;
ob_flush();
$$return_to=rtrim((base_url().'/'.$return_to_path),'/');
echo "<center><a style='padding:5px 10px;  background:#eee; ' href '".base_url()."index.php/".$return_to_path."'> return </a></center>";
header( 'Location: '.$$return_to) ;
    
        
}

 



 function insert_Soil()
    {
    ob_start();	//print_r($this->data);
     $this->load->view('insert_Soil',$this->data);
    }
 function update_Soil($Soil_id)
    {
      ob_start();  //print_r($this->data);
     $this->load->view('update_Soil',$this->data);
    }


 function insert_soil_type($soil_category=null)
    {
    ob_start(); //print_r($this->data);
    $data['category_id']=$soil_category;
     $this->load->view('insert_soil_type',$this->data);
    }
 function update_soil_type($Soil_category=null)
    {
     ob_start();  //print_r($this->data);
     $data['category_id']=$soil_category;
     $this->load->view('update_soil_trpe',$this->data);
    }




 function insert_Soil_item()
    {
    ob_start(); //print_r($this->data);
     $this->load->view('insert_Soil_item',$this->data);
    }
 function update_Soil_item($Soil_id)
    {
      ob_start();  //print_r($this->data);
     $this->load->view('update_Soil_item',$this->data);
    }




 function insert_nutrition_difficiency_symptom()
    {
    ob_start(); //print_r($this->data);
     $this->load->view('insert_nutrition_difficiency_symptom',$this->data);
    }





function store_nutrition_difficiency_symptom($nutrition_difficiency_symptom_id=null,$return_to=null)
{
      ob_start();
      
//      print_r($_POST);
$extra_id_array=array();
$Soil_data['nutrition_difficiency_symptom_id']=unique_random_string(20,'nutrition_difficiency_symptom','nutrition_difficiency_symptom_id',$extra_id_array);
$Soil_data['nutrition_name']=$_POST['nutrition'];
$Soil_data['agri_id']=$_POST['agri_id'][0];
 $result= $this->db->insert('nutrition_difficiency_symptom',$Soil_data);

ob_flush();
header('Location:'.base_url()."index.php/soil/insert_nutrition_difficiency_symptom");

}


       function store_Soil($Soil_id=null,$return_to=null)
    {
       ob_start();
      //print_r($_POST);
// echo "-------------";
//         //$Soil_data=array();
//         echo "-------".$Soil_id."-------";

        if($Soil_id!=null && $return_to!=null)
        {
            /*
            $this->db->where('Soil_id',$Soil_id);
            $result= $this->db->update('Soil',$_POST);
            */

            echo "update";

            print_r($_POST);
            print_r($_FILES);

echo $return_to;

// update code start here

$extra_id_array=array();

            // $CI_this =& get_instance();

            // $query = $CI_this->db->query('SELECT `Soil_id` FROM Soil where `Soil_id`="'.$key.'" ');

            
            //    $extra_id_array=array();

             $Soil_data['Soil_id'] ='crtu1qpmmi8zdfpe7idk';
              $Soil_data['section_id'] = $this->uri->segment(3);
              
                $Soil_data['name'] = $_POST['name'];
                $Soil_data['tname'] = $_POST['tname'];
               
             // echo "<br>-----------final_data------------</br>";  print_r($Soil_data);
             // echo "<br>----------final_data end-------------</br>";



//---------------------   media file upload starts here

    
        //   Change $_FILES to new vars and loop them
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
  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
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
//echo '<br>------</br>';




  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;

// echo "<br>--------------file type-------------<br>";
// print_r($file_type);
// echo "<br>-----------------------------<br>";


// echo "<br>-------------Soil data--------------<br>";
// print_r($Soil_data);
// echo "<br>-----------------------------<br>";


 $Soil_data['icon']=$upload_data['file_name'];


echo "<br>final data<br>";
print_r($Soil_data);

$this->db->where('section_id',$Soil_data['section_id']);
 $result= $this->db->update('soil',$Soil_data);

}

  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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
    if($result)
        {
        ob_flush();
        header("Location:".base_url());
        }

//update code ends here



        }

        else
        {

$extra_id_array=array();

            // $CI_this =& get_instance();

            // $query = $CI_this->db->query('SELECT `Soil_id` FROM Soil where `Soil_id`="'.$key.'" ');

            
            //    $extra_id_array=array();

             $Soil_data['Soil_id'] ='crtu1qpmmi8zdfpe7idk';
              $Soil_data['section_id'] = unique_random_string(20,'slides','main_id',$extra_id_array);
              
                $Soil_data['name'] = $_POST['name'];
                $Soil_data['tname'] = $_POST['tname'];
               
             // echo "<br>-----------final_data------------</br>";  print_r($Soil_data);
             // echo "<br>----------final_data end-------------</br>";



//---------------------   media file upload starts here

    
        //   Change $_FILES to new vars and loop them
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
  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
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
//echo '<br>------</br>';




  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;

// echo "<br>--------------file type-------------<br>";
// print_r($file_type);
// echo "<br>-----------------------------<br>";


// echo "<br>-------------Soil data--------------<br>";
// print_r($Soil_data);
// echo "<br>-----------------------------<br>";


 $Soil_data['icon']=$upload_data['file_name'];

 $result= $this->db->insert('Soil',$Soil_data);

}

  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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
    if($result)
        {
        ob_flush();
        header("Location:".base_url().'index.php/Soil/insert_soil');
        }
            }





    }







































function store_soil_item($Soil_id=null,$soil_item_id=null)
    {
       ob_start();

        if($soil_item_id!=null)
        {
           echo "update";

           $extra_id_array=array();


             $Soil_data['soil_section_id'] =$Soil_id;
             $Soil_data['soil_sub_section_id'] =$soil_item_id;

              
              $Soil_data['name'] = $_POST['name'];
              $Soil_data['tname'] = $_POST['tname'];
               
             // echo "<br>-----------final_data------------</br>";  print_r($Soil_data);
             // echo "<br>----------final_data end-------------</br>";



//---------------------   media file upload starts here

    
        //   Change $_FILES to new vars and loop them
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
  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
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
//echo '<br>------</br>';




  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;

// echo "<br>--------------file type-------------<br>";
// print_r($file_type);
// echo "<br>-----------------------------<br>";


// echo "<br>-------------Soil data--------------<br>";
// print_r($Soil_data);
// echo "<br>-----------------------------<br>";


 $Soil_data['icon']=$upload_data['file_name'];

$this->db->where('soil_sub_section_id',$soil_item_id);
 $result= $this->db->update('soil_section',$Soil_data);

}

  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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
    if($result)
        {
        ob_flush();
        header("Location:".base_url().'index.php/Soil/insert_soil_item/'.$Soil_id);
        }
        }

        else
        {

$extra_id_array=array();

            // $CI_this =& get_instance();

            // $query = $CI_this->db->query('SELECT `Soil_id` FROM Soil where `Soil_id`="'.$key.'" ');

            
            //    $extra_id_array=array();

             $Soil_data['soil_section_id'] =$Soil_id;
             $Soil_data['soil_sub_section_id'] =unique_random_string(20,'soil_section','soil_sub_section_id',$extra_id_array);

              
              $Soil_data['name'] = $_POST['name'];
              $Soil_data['tname'] = $_POST['tname'];
               
             // echo "<br>-----------final_data------------</br>";  print_r($Soil_data);
             // echo "<br>----------final_data end-------------</br>";



//---------------------   media file upload starts here

    
        //   Change $_FILES to new vars and loop them
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
  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
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
//echo '<br>------</br>';




  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;

// echo "<br>--------------file type-------------<br>";
// print_r($file_type);
// echo "<br>-----------------------------<br>";


// echo "<br>-------------Soil data--------------<br>";
// print_r($Soil_data);
// echo "<br>-----------------------------<br>";


 $Soil_data['icon']=$upload_data['file_name'];

 $result= $this->db->insert('soil_section',$Soil_data);

}

  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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
    if($result)
        {
        ob_flush();
        header("Location:".base_url().'index.php/Soil/insert_soil_item/'.$Soil_id);
        }
          




          }
    }








  function store_updated_Soil($Soil_id=null,$return_to=null)
    {ob_start();
        $Soil_id=$this->uri->segment(3);

      //  echo $Soil_id;

      //  print_r($_POST);
     //   print_r($_FILES);

        $final_icon=$_POST['previous_icon'];


//print_r($_FILES['slide_media_files']);


        if($_FILES['slide_media_files']['name'][0]==='')
        {
          
        }
        else
        {
            $final_icon=$_FILES['slide_media_files']['name'][0];






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
    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
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


print_r($upload_data);
//echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;



 $Soil_data['icon']=$upload_data['file_name'];

 //$result= $this->db->insert('Soil',$Soil_data);



 //$img_id = $this->db->insert_id(); 

//echo 'img_upload_id='.$img_id;


}





                
                 if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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






        }



 $update_Soil_data = $this->db->get_where('Soil',array('Soil_id'=>$Soil_id))->result();

echo "<br>";

print_r($update_Soil_data);

    $final_update_Soil=array();

$final_update_Soil['Soil_id']=$Soil_id;
$final_update_Soil['section_id']=$_POST['section_id'];
$final_update_Soil['name']=$_POST['name'];
$final_update_Soil['tname']=$_POST['tname'];
$final_update_Soil['icon']=$final_icon;


echo "<br><br>";
    print_r($final_update_Soil); 

$this->db->where('Soil_id',$Soil_id);
$result= $this->db->update('Soil',$final_update_Soil);
        



 
echo $result;






   
  
        
        //print_r($result);

if($result)
        {
            echo 'success';

             $path_slice = explode("/", base64_decode($return_to));

print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br>*************<br>".$return_to_path;
ob_flush();
       header("Location:".base_url().'/'.$return_to_path);
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













function insert_slide_form($section=null)
    {
ob_start();
    $this->data['section']=$section;
        //print_r($this->data);
      $this->load->view('insert_slide',$this->data);
    }

    function add_slide_form($main_id=null, $sub_id=null, $sub_category=null, $return_to=null)
    {
ob_start();
    $this->data['main_id']=$main_id;

    $this->data['sub_id']=$sub_id;

    $this->data['sub_category']=$sub_category;

    $this->data['return_to']=$return_to;
        //print_r($this->data);
      $this->load->view('add_slide',$this->data);
    }


    function edit_slide_form($section=null)
    {
ob_start();
    $this->data['section']=$section;
        //print_r($this->data);
      $this->load->view('edit_slide',$this->data);
    }



 function store_added_Soil_slides($selected_section=null, $Soil_id=null, $sub_id=null,$return_to=null)
    {
ob_start();
        print_r($_POST);

     
            $text= $_POST['text'];





 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($Soil_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $Soil_slide_data['main_id'] =$Soil_id;
        $Soil_slide_data['sub_id'] = $sub_id;
    $Soil_slide_data['sub_category']=$selected_section;
        $Soil_slide_data['text'] = $text;
        
    

    $result_slide_text= $this->db->insert('slides',$Soil_slide_data);

     $slide_id = $this->db->insert_id();  



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here

//echo  $slide_id;


    
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
  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}
else if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/avi' || $file_type=='application/octet-stream')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/video/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


else if($file_type=='audio/mp3')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/audio/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


 
   
 //upload config setting ends here..............
if(!empty($upload_conf))
{
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


print_r($upload_data);
//echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;

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

//echo 'img_upload_id='.$img_id;


}

if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/avi' || $file_type=='application/octet-stream')
{
$slide_data=array();

$main_id=$Soil_id;

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


//echo 'video_upload_id='.$video_id;

    
}


if($file_type=='audio/mp3')
{
$slide_data=array();

$main_id=$Soil_id;

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


//echo 'audio_upload_id='.$audio_id;

    
}


                
                 if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
   // echo "There is no problem everything stored with success";

  //echo base64_decode($return_to);


  $path_slice = explode("/", base64_decode($return_to));

print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;
ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);


//  header("Location:Soil/add_slide_form/9hu70nsygf705spkif0c/ug3qb1draqlv93plej2p/intro/aHR0cDovLzE5Mi4x");
 // header("Location:".base_url().'index.php/Soil/insert_slide_form/'.$selected_section.'/'.$Soil_id);


}
else

{
     //  echo "There is a problem";

}




}




 function store_Soil_slides($selected_section=null, $Soil_id=null, $sub_id=null,$slide_id=null)
    {
ob_start(); 
        print_r($_POST);

     
            $text= $_POST['text'];





 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($Soil_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $Soil_slide_data['main_id'] =$Soil_id;
        $Soil_slide_data['sub_id'] = $sub_id;
    $Soil_slide_data['sub_category']=$selected_section;
        $Soil_slide_data['text'] = $text;
        
    

    $result_slide_text= $this->db->insert('slides',$Soil_slide_data);

     $slide_id = $this->db->insert_id();  



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here

//echo  $slide_id;


    
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
  if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}
else if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/avi' || $file_type=='application/octet-stream')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/video/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


else if($file_type=='audio/mp3' || $file_type=='audio/mpeg')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/audio/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
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


print_r($upload_data);
//echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;

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

//echo 'img_upload_id='.$img_id;


}

if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/avi' || $file_type=='application/octet-stream')
{
$slide_data=array();

$main_id=$Soil_id;

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


//echo 'video_upload_id='.$video_id;

    
}


if($file_type=='audio/mp3' || $file_type=='audio/mpeg')
{
$slide_data=array();

$main_id=$Soil_id;

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


//echo 'audio_upload_id='.$audio_id;

    
}


                
                 if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
  //  echo "There is no problem everything stored with success";
 
ob_flush();


 header("Location:".base_url().'index.php/Soil/insert_slide_form/'.$selected_section.'/'.$Soil_id);

}
else

{
     //  echo "There is a problem";

}




}





function delete_slide($slide_id=null,$return_to=null)
{
ob_start();
$result_slide_deleted=$this->db->delete('slides', array('slide_id' => $slide_id));  


    $result_slide_image_deleted=$this->db->delete('slide_img', array('slide_id' => $slide_id));  

    $result_slide_video_deleted=$this->db->delete('slide_video', array('slide_id' => $slide_id)); 
/*
    $result_slide_deleted=true; 
    $result_slide_image_deleted=true; 
    $result_slide_video_deleted =true;
*/
    if( $result_slide_deleted && $result_slide_image_deleted && $result_slide_video_deleted)
        {



$path_slice = explode("/", base64_decode($return_to));

print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{


if(ctype_digit($path_slice[$i]) && $path_slice[$i-1]=='pages')
{

$return_to_path = $return_to_path.((int)$path_slice[$i]-1)."/";
}

else
{

    $return_to_path = $return_to_path.$path_slice[$i]."/";

}

}

// echo "<br><br>".$return_to_path;
ob_flush();


header('Location:'.base_url()."index.php/".$return_to_path);




        }


}












 function update_Soil_slide($Soil_id=null, $sub_id=null,$slide_id=null,$return_to=null)
    {

 //       print_r($_FILES);
ob_start(); 
     
            $text= $_POST['text'];

$slide_id_selected=$this->uri->segment(5);
/*
echo '<br>-----------------<br>';
print_r($_POST['image_to_delete']);
echo '<br>-----------------<br>';
*/

if(!empty($_POST['image_to_delete']))
{
foreach ($_POST['image_to_delete'] as $image_id) {


echo $Soil_id."<br>";
echo $sub_id."<br>";
echo $image_id."<br>";

 $result=$this->db->delete('slide_img', array('main_id' => $Soil_id,'img_id' => $image_id, ));  

}
}


if(!empty($_POST['video_to_delete']))
{
foreach ($_POST['video_to_delete'] as $video_id) {

$result=$this->db->delete('slide_video', array('main_id' => $Soil_id, 'sub_id' => $sub_id,'video_id' => $video_id, ));  

}

}

if(!empty($_POST['audio_to_delete']))
{
foreach ($_POST['audio_to_delete'] as $audio_id) {

$result=$this->db->delete('slide_audio', array('main_id' => $Soil_id, 'sub_id' => $sub_id,'audio_id' => $audio_id, ));  

}

}


 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($Soil_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $Soil_slide_data['main_id'] =$Soil_id;
        $Soil_slide_data['sub_id'] = $sub_id;

    $Soil_slide_data['slide_id'] = $slide_id;
        $Soil_slide_data['text'] = $text;
        


$this->db->where('slide_id', $slide_id);
$result_slide_text=$this->db->update('slides', $Soil_slide_data); 
    
    $slide_id = $this->db->insert_id();  

 



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here
//echo '<br>---------new--------<br>';
//echo  $slide_id_selected;
//echo '<br>-----------------<br>';
//print_r($_FILES['slide_media_files']);
//echo '<br>-----------------<br>';
    
        // Change $_FILES to new vars and loop them
    print_r($_FILES['slide_media_files']); 
        foreach($_FILES['slide_media_files'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {

                //echo $v.'<br>';
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

echo "file type is ".$file_type;


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' => 'gif|jpg|png|mp4|flv|mp3}avi',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}


else if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/avi' || $file_type=='application/octet-stream')
{
//echo utf8_encode($file['name']);



   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/video/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


else if($file_type=='audio/mp3' || $file_type=='audio/mpeg')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/audio/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


 
   
 //upload config setting ends here..............

if(isset($upload_conf))
{
        $this->upload->initialize($upload_conf);

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


//print_r($upload_data);
//echo '<br>------</br>';
//echo "<br><br><br><br><br>**************************************<br>video is of type ".$file_type."<br><br><br><br><br>**************************************<br>";

    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;

//echo "<br>------------</br>";
//echo $slide_id;
//echo "<br>------------</br>";

$slide_data['main_id']=$main_id;
$slide_data['sub_id']=$sub_id;
$slide_data['slide_id']=$slide_id_selected;
 $slide_data['file_name']=$upload_data['file_name'];
 $slide_data['file_type']=$upload_data['file_type'];
 $slide_data['file_path']=$upload_data['file_path'];
 $slide_data['full_path']=$upload_data['full_path'];
 $slide_data['file_ext']=$upload_data['file_ext'];
 $slide_data['img_width']=$upload_data['image_width'];
 $slide_data['img_height']=$upload_data['image_height'];


 $result= $this->db->insert('slide_img',$slide_data);



 $img_id = $this->db->insert_id(); 

//echo 'img_upload_id='.$img_id;


}
 
else if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/avi' || $file_type=='application/octet-stream')
{


$slide_data=array();

$main_id=$Soil_id;

$slide_data['main_id']=$main_id;
$slide_data['sub_id']=$sub_id;
$slide_data['slide_id']=$slide_id_selected;
 $slide_data['file_name']=$upload_data['file_name'];
 $slide_data['file_type']=$upload_data['file_type'];
 $slide_data['file_path']=$upload_data['file_path'];
 $slide_data['full_path']=$upload_data['full_path'];
 $slide_data['file_ext']=$upload_data['file_ext'];


print_r($slide_data);
 $result= $this->db->insert('slide_video',$slide_data);
   $video_id = $this->db->insert_id();  


//echo 'video_upload_id='.$video_id;

    
}


if($file_type=='audio/mp3' || $file_type=='audio/mpeg')
{
$slide_data=array();

$main_id=$Soil_id;

$slide_data['main_id']=$main_id;
$slide_data['sub_id']=$sub_id;
$slide_data['slide_id']=$slide_id_selected;
 $slide_data['file_name']=$upload_data['file_name'];
 $slide_data['file_type']=$upload_data['file_type'];
 $slide_data['file_path']=$upload_data['file_path'];
 $slide_data['full_path']=$upload_data['full_path'];
 $slide_data['file_ext']=$upload_data['file_ext'];



 $result= $this->db->insert('slide_audio',$slide_data);

 $audio_id = $this->db->insert_id();  
//echo "<br><br><br><br><br>";

//echo 'audio_upload_id='.$audio_id;

    
}


                
                 if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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

        // code end here if file is ther to upload
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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
   // echo "There is no problem everything stored with success";
   $return_to=base64_decode($return_to);

 //redirect(base64_decode($return_to), 'refresh');

/*
    $complete_path=base64_decode($return_to);

$base_url=base_url();
$new_base_url=split('http://',$base_url );

$delete_from_address= $new_base_url[1].'index.php/';



    $split_path=split($delete_from_address, $complete_path);
echo $split_path[1];

*/



$path_slice = explode("/", $return_to);

//print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{


$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;
ob_flush();

$return_to_path=rtrim($return_to_path,"//");

echo "<center><div class='animated bounceInDown ' id='notification'><sapn >Return back
<p><a id='notification_button' href='".base_url()."index.php/".$return_to_path."'>click here</a>


</span></div></center>";


ob_flush();

header('Location:'.base_url()."index.php/".$return_to_path);

//   $this->load->view('view_Soil');


}


else

{
//       echo "There is a problem";

}




}































/*


       function store_Soil_intro($Soil_id=null)
    {
        print_r($_POST);

         $intro_id= $_POST['intro_id'];
            $intro_text= $_POST['text'];


 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($Soil_id!=null && $intro_id !=null)
        {



// insert slide text in slids database.......code start here



    $Soil_intro_data['main_id'] =$Soil_id;
        $Soil_intro_data['sub_id'] = $intro_id;
    
        $Soil_intro_data['text'] = $intro_text;
        
    

    $result_slide_text= $this->db->insert('slides',$Soil_intro_data);

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
    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
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


print_r($upload_data);
echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$Soil_id;
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

$main_id=$Soil_id;
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

$main_id=$Soil_id;
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


                
                 if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp')
           
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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
    echo "There is no problem everything stored with success";
header("Location:".base_url().'index.php/Soil/insert_Soil_intro/'.$Soil_id);

}
else

{
       echo "There is a problem";

}


        }






*/








function  view_slides($main_id, $sub_id,$sub_category,$page='',$offset=0)

  {ob_start();

        if($main_id!=NULL && $sub_id!=NULL && $sub_category!=null && $page=='')
        {
        $data['info']=$this->model_Soil->get_Soil_slides($main_id,$sub_id,$sub_category,0,$start);
        
    }
    elseif($main_id!=NULL && $sub_id!=NULL && $page==='pages')
    {


 


$start=$this->uri->segment(7);
$config['uri_segment']=7;
$this->load->library('pagination');




$config['full_tag_open'] = '<div class="pagination dontprint pagination-small pagination-centered"><ul>';
$config['full_tag_close'] = '</ul></div>';
$config['prev_link'] = '&lt; Prev';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = 'Next &gt;';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['num_links'] = 10;
$config['first_link'] = FALSE;
$config['last_link'] = FALSE;



$config['base_url'] = base_url().'index.php/Soil/view_slides/'.$main_id.'/'.$sub_id.'/'.$sub_category.'/pages/';


$config['per_page'] = 1;

$data['info']=$this->model_Soil->get_Soil_slides($main_id,$sub_id,$sub_category, $config['per_page'], $start);


if(isset($data['info'][0]->slide_id))
{
$slide_id=$data['info'][0]->slide_id;



$data['slide_images']=$this->model_Soil->get_Soil_slides_image($main_id,$sub_id,$slide_id);
$data['slide_videos']=$this->model_Soil->get_Soil_slides_video($main_id,$sub_id,$slide_id);
$data['slide_audios']=$this->model_Soil->get_Soil_slides_audio($main_id,$sub_id,$slide_id);

//print_r($data['slide_audios']);
  }
  else{

    //  ****************************
       // get current addresss where to return after update

//*********************************

$server=$_SERVER['HTTP_HOST'];
//echo $server;
$request_url=$_SERVER['REQUEST_URI'];
//echo $request_url;

$full_address=$server.$request_url;
$encoded_url= base64_encode($full_address);



//  ****************************
// get current addresss where to return after update
//*********************************



echo "<div class='animated bounceInDown ' id='notification'><sapn >No informartion entered 
<p><a id='notification_button' href='".base_url()."index.php/Soil/add_slide_form/".$main_id."/".$sub_id."/".$sub_category."/".$encoded_url."'>enter now</a>
</span></div>";







  }  
$config['total_rows'] =$this->model_Soil->get_Soil_slides_count($main_id,$sub_id);


$this->pagination->initialize($config);

$data['links']=$config['total_rows'];



//print_r($data['info']);

//echo count($config['total_rows']);

        
    }
    else
    {
        $data['info']=$this->model_Soil->get_Soil_slides($main_id,$sub_id,$sub_category,1, $start);


       // $data['info']=$this->model_Soil->get_Soil_slides_image($main_id,$sub_id);
    }



$this->load->view('view_Soil_tabs',$data);
    }










/*
function  update_recorded()
	{
	
		$this->load->view('update_recorded');
	}

*/

}

?>