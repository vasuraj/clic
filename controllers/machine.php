<?php

class Machine extends CI_Controller
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
$this->load->model('model_machine');







function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
      return $key;
  }


function unique_random_string($length=null,$table=null,$field_name=null)

{
 $key='';
 
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) 
    {
        $key .= $keys[array_rand($keys)];
    }


echo $key;

//gettting instance 

$CI_this =& get_instance();

if($key!='')
{
$CI_this->db->from($table);
$CI_this->db->select($field_name);
$CI_this->db->where($field_name,$key);
$is_unique=$CI_this->db->get()->result();

echo count($is_unique);

if(empty($is_unique))
{
    echo '<br>------##########  returned_key: '.$key.'##########------<br>';
   return $key;
}
else
{
    echo "<br>-------matching again----------<br>";
print_r($is_unique);
    echo "<br>-------".$length;
    echo"<br>-------". $table;
    echo "<br>-------".$field_name;
   return unique_random_string($length,$table,$field_name);

}
}


}



       }


	function index()
	{
		//
	//	$this->load->model('model_machine');
	//	$data['info']=$this->model_machine-> get_last_ten_entries();
		
	//	$this->load->view('view_weather_info',$data);
	}

	function  view_machine_info($machine_category=NULL,$machine_id=null)
	{
		



   if($machine_category!=null)
   {
   
    $data['info']=$this->model_machine->get_category_machine($machine_category,$machine_id);
   }
   else
	{
		$data['info']=$this->model_machine->get_category_machine($this->uri->segment(3),$machine_id);
	}

   

$this->load->view('view_machine_info',$data);
	}





function view_machine_specification($machine_id)
{
  
$data['info']=$this->model_machine->get_machine_inner_info($machine_id);

 

$this->load->view('view_machine_specification',$data);

}

function view_machine_gallery($machine_id)
{
  
$data['info']=$this->model_machine->get_machine_multimedia($machine_id);

 

$this->load->view('view_machine_gallery',$data);

}


function view_machine_vendor($machine_id)
{
  
$data['info']=$this->model_machine->get_machine_vendor($machine_id);

 

$this->load->view('view_machine_vendor',$data);

}


function  view_machine_inner_info($machine_id=null)
  {
    
 
    $data['info']=$this->model_machine->get_machine_inner_info($machine_id);
 
   
$this->load->view('view_machine_inner_info',$data);
  }











function  get_machine_tabs($machine_id=NULL)
    {
        if($machine_id!=NULL )
        {
            $data['info']=$this->model_machine->get_machine($machine_id);
        }
  
         else
        {
            echo "u cant access tabs without any key.";
        }

$this->load->view('get_machine_tabs',$data);
    }









	function  delete_machine($machine_id=null,$return_to=null)
	{
		$this->model_machine->delete_machine($machine_id);
		
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


echo "<center><a style='padding:5px 10px;  background:#eee; ' href '".base_url()."index.php/".$return_to_path."'> return back </a></center>";
			header( 'Location: '.base_url().'/'.$return_to_path) ;
	
		
	}


  



 function insert_machine()
    {
    	//print_r($this->data);
     $this->load->view('insert_machine',$this->data);
    }

 function insert_machine_multimedia()
{
        //print_r($this->data);
     $this->load->view('insert_machine_multimedia',$this->data);

}

 function insert_machine_address()
{
        //print_r($this->data);
     $this->load->view('insert_machine_address',$this->data);

}

function insert_machine_subsidy()
{
        //print_r($this->data);
     $this->load->view('insert_machine_subsidy',$this->data);

}


 function update_machine($machine_id)
    {
        //print_r($this->data);
     $this->load->view('update_machine',$this->data);
    }







       function store_machine($machine_id=null,$return_to=null)
    {

      ob_start();
    	//print_r($_POST);


      /*
       echo "<br><br><br>--------------------------------<br>";
 
        print_r($_FILES['icon']);

        echo "<br><br><br>--------------------------------<br>";
*/


   $machine_data=array();
   $attached_agri_id="";
   $stored_machine_id='';

    	if($machine_id!=null && $return_to!=null)
    	{
      //  print_r($_POST);

           foreach ($_POST['agri_id'] as $agri_id) 
        {
            $attached_agri_id=$attached_agri_id.$agri_id.'+';
           
        }
        $_POST['agri_id']=$attached_agri_id;

        $_POST['notes'] = $_POST['content_2'];
unset($_POST['content_2']);

        //print_r($_POST);


    		$this->db->where('machine_id',$machine_id);
    		$this->db->update('machine',$_POST);
  
$path_slice = explode("/", base64_decode($return_to));

//print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br>*************<br>".$return_to_path;

ob_flush();
       header("Location:".base_url().$return_to_path);


        }
    	else
    	{


          foreach ($_POST['agri_id'] as $agri_id) 
        {
            $attached_agri_id=$attached_agri_id.$agri_id.'+';
           
        }
            

  $machine_data['machine_id'] = unique_random_string(20,'slides','main_id');
        $machine_data['name'] = $_POST['name'];
        $machine_data['tname'] = $_POST['tname'];
        $machine_data['category'] = $_POST['category'];
        $machine_data['powered'] = $_POST['Powered'];

        $machine_data['agri_id'] = $attached_agri_id;
        $machine_data['other_crops'] = $_POST['other_crops'];
        $machine_data['notes'] = $_POST['content_2'];

        $machine_data['address_id'] =unique_random_string(20,'slides','main_id');

     $machine_data['subsidy_link']='';
      

   //   print_r($machine_data);










//icon file upload starts here



    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['icon'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {


          //      echo $v.'<br>';
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
               $i++;   
            }
        }



unset($_FILES['icon']);
 //   echo "<br>--------details-----<br>";
  //  print_r($_FILES['icon']);
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {


 //upload config setting..............

$file_type= $file['type'][0];



   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' => 'gif|jpg|png|bmp|mp4|flv|mp3',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 


 
   
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


//print_r($upload_data);
//echo '<br>------</br>';





$main_id=$machine_id;
/*
echo "<br>--------------file type-------------<br>";
print_r($file_type);
echo "<br>-----------------------------<br>";


echo "<br>-------------machine data--------------<br>";
print_r($machine_data);
echo "<br>-----------------------------<br>";
*/
//echo "inserting";
 $machine_data['icon']=$upload_data['file_name'];


// print_r($machine_data);


$this->db->insert('machine',$machine_data);
$stored_machine_id = $this->db->insert_id(); 



//echo 'img_upload_id='.$img_id;




                
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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here









   
    }
		

ob_flush();

           // echo "okey to go";
	header("Location:".base_url()."index.php/machine/insert_machine_subsidy/". $machine_data['machine_id']."/fresh");




}


/********************************************************************************************
      
//    update machine database with subsidy 
      
********************************************************************************************/



     function store_machine_subsidy($machine_id=null)
{
      ob_start();

      /*
        print_r($_POST);

       echo "<br><br><br>--------------------------------<br>";
 
        print_r($_FILES['subsidy']);

        echo "<br><br><br>--------------------------------<br>";


*/
   $machine_data=array();
   $attached_agri_id="";
   $stored_machine_id='';

     $machine_data['subsidy_link']='';
      

   //   print_r($machine_data);










//icon file upload starts here



    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['subsidy'] as $key=>$val)
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



unset($_FILES['subsidy']);
   // echo "<br>--------details-----<br>";
  //  print_r($_FILES['icon']);
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {

 //upload config setting..............



   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/document/',
            'allowed_types' => 'pdf',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 

//echo "ddddd";
//print_r($upload_conf);
 
   
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

//echo "upload_data info <br>";
//print_r($upload_data);
//echo '<br>------</br>';





$main_id=$machine_id;

/*

echo "<br>-------------machine data--------------<br>";
print_r($machine_data);
echo "<br>-----------------------------<br>";
*/
//echo "inserting";
 $machine_data['subsidy_link']=$upload_data['file_name'];

/*
 print_r($machine_data);
 echo $machine_id;
*/
 $this->db->where('machine_id',$machine_id);
 $this->db->update('machine',$machine_data);


 $stored_machine_id = $this->db->insert_id(); 


 echo "stored_machine_id: ".$stored_machine_id;

//echo 'img_upload_id='.$img_id;







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

//print_r($data['error']);
//print_r($data['success']);

if(empty($data['error']))
        {

   ob_flush();
       header("Location:".base_url()."index.php/machine/insert_machine_multimedia/". $machine_id."/fresh");

        }

else
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

    

   
/*##########         end of machine subsidy updation         #########*/



  function store_updated_machine($machine_id=null,$return_to=null)
    {
      ob_start();
        $machine_id=$this->uri->segment(3);

      //  echo $machine_id;

      //  print_r($_POST);
     //   print_r($_FILES);

        $final_icon=$_POST['previous_icon'];


//print_r($_FILES['machine_multimedia_files']);


        if($_FILES['machine_multimedia_files']['name'][0]==='')
        {
          
        }
        else
        {
            $final_icon=$_FILES['machine_multimedia_files']['name'][0];






        // Change $_FILES to new vars and loop them
        foreach($_FILES['machine_multimedia_files'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {


             //   echo $v.'<br>';
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
               $i++;   
            }
        }



unset($_FILES['machine_multimedia_files']);
    
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


//print_r($upload_data);
//echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$machine_id;



 $machine_data['icon']=$upload_data['file_name'];

 //$result= $this->db->insert('machine',$machine_data);



 //$img_id = $this->db->insert_id(); 

//echo 'img_upload_id='.$img_id;


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






        }



 $update_machine_data = $this->db->get_where('machine',array('machine_id'=>$machine_id))->result();

echo "<br>";

print_r($update_machine_data);

    $final_update_machine=array();

$final_update_machine['machine_id']=$machine_id;
$final_update_machine['name']=$_POST['name'];
$final_update_machine['tname']=$_POST['tname'];
$final_update_machine['category']=$_POST['category'];


$final_update_machine['icon']=$final_icon;
$final_update_machine['intro']=$update_machine_data[0]->intro;
$final_update_machine['soils']=$update_machine_data[0]->soils;
$final_update_machine['varieties
']=$update_machine_data[0]->varieties
;
$final_update_machine['seasonality']=$update_machine_data[0]->seasonality;
$final_update_machine['seed_quantity']=$update_machine_data[0]->seed_quantity;
$final_update_machine['seed_treatment']=$update_machine_data[0]->seed_treatment;
$final_update_machine['sowing']=$update_machine_data[0]->sowing;
$final_update_machine['water_management']=$update_machine_data[0]->water_management;
$final_update_machine['weed_management']=$update_machine_data[0]->weed_management;
$final_update_machine['nutrient_management']=$update_machine_data[0]->nutrient_management;
$final_update_machine['harvesting']=$update_machine_data[0]->harvesting;
$final_update_machine['economics']=$update_machine_data[0]->economics;
$final_update_machine['other_info']=$update_machine_data[0]->other_info;
/*
echo "<br><br>";
    print_r($final_update_machine); 
*/
$this->db->where('machine_id',$machine_id);
$result= $this->db->update('machine',$final_update_machine);
        



 







   
  
        
        //print_r($result);

if($result)
        {
           // echo 'success';

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

    $this->data['section']=$section;
        //print_r($this->data);
      $this->load->view('insert_slide',$this->data);
    }

    function add_slide_form($main_id=null, $sub_id=null, $sub_category=null, $return_to=null)
    {

    $this->data['main_id']=$main_id;

    $this->data['sub_id']=$sub_id;

    $this->data['sub_category']=$sub_category;

    $this->data['return_to']=$return_to;
        //print_r($this->data);
      $this->load->view('add_slide',$this->data);
    }


    function edit_slide_form($section=null)
    {

    $this->data['section']=$section;
        //print_r($this->data);
      $this->load->view('edit_slide',$this->data);
    }



 function store_added_machine_slides($selected_section=null, $machine_id=null, $sub_id=null,$return_to=null)
    {

        print_r($_POST);

     
            $text= $_POST['text'];





 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($machine_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $machine_slide_data['main_id'] =$machine_id;
        $machine_slide_data['sub_id'] = $sub_id;
    $machine_slide_data['sub_category']=$selected_section;
        $machine_slide_data['text'] = $text;
        
    

    $result_slide_text= $this->db->insert('slides',$machine_slide_data);

     $slide_id = $this->db->insert_id();  



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here

//echo  $slide_id;


    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['machine_multimedia_files'] as $key=>$val)
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



unset($_FILES['machine_multimedia_files']);
    
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
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}
else if($file_type=='video/mp4' || $file_type=='video/avi')
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


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$machine_id;

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

if($file_type=='video/mp4' || $file_type=='video/avi' || $file_type=='video/flv')
{
$slide_data=array();

$main_id=$machine_id;

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

$main_id=$machine_id;

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

header('Location:'.base_url()."index.php/".$return_to_path);


//  header("Location:machine/add_slide_form/9hu70nsygf705spkif0c/ug3qb1draqlv93plej2p/intro/aHR0cDovLzE5Mi4x");
 // header("Location:".base_url().'index.php/machine/insert_slide_form/'.$selected_section.'/'.$machine_id);


}
else

{
     //  echo "There is a problem";

}




}




 function store_machine_slides($selected_section=null, $machine_id=null, $sub_id=null,$slide_id=null)
    {
ob_start(); 
        print_r($_POST);

     
            $text= $_POST['text'];





 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($machine_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $machine_slide_data['main_id'] =$machine_id;
        $machine_slide_data['sub_id'] = $sub_id;
    $machine_slide_data['sub_category']=$selected_section;
        $machine_slide_data['text'] = $text;
        
    

    $result_slide_text= $this->db->insert('slides',$machine_slide_data);

     $slide_id = $this->db->insert_id();  



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here

//echo  $slide_id;


    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['machine_multimedia_files'] as $key=>$val)
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



unset($_FILES['machine_multimedia_files']);
    
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
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}
else if($file_type=='video/mp4' || $file_type=='video/avi' || $file_type=='video/mp4')
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


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$machine_id;

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

if($file_type=='video/mp4' || $file_type=='video/avi')
{
$slide_data=array();

$main_id=$machine_id;

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

$main_id=$machine_id;

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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
  //  echo "There is no problem everything stored with success";
 
ob_flush();


 header("Location:".base_url().'index.php/machine/insert_slide_form/'.$selected_section.'/'.$machine_id);

}
else

{
     //  echo "There is a problem";

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

print_r($path_slice);

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












 function update_machine_slide($machine_id=null, $sub_id=null,$slide_id=null,$return_to=null)
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


echo $machine_id."<br>";
echo $sub_id."<br>";
echo $image_id."<br>";

 $result=$this->db->delete('slide_img', array('main_id' => $machine_id,'img_id' => $image_id, ));  

}
}


if(!empty($_POST['video_to_delete']))
{
foreach ($_POST['video_to_delete'] as $video_id) {

$result=$this->db->delete('slide_video', array('main_id' => $machine_id, 'sub_id' => $sub_id,'video_id' => $video_id, ));  

}

}


 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($machine_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $machine_slide_data['main_id'] =$machine_id;
        $machine_slide_data['sub_id'] = $sub_id;

    $machine_slide_data['slide_id'] = $slide_id;
        $machine_slide_data['text'] = $text;
        


$this->db->where('slide_id', $slide_id);
$result_slide_text=$this->db->update('slides', $machine_slide_data); 
    
    $slide_id = $this->db->insert_id();  

 



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here
//echo '<br>---------new--------<br>';
//echo  $slide_id_selected;
//echo '<br>-----------------<br>';
//print_r($_FILES['machine_multimedia_files']);
//echo '<br>-----------------<br>';
    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['machine_multimedia_files'] as $key=>$val)
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



unset($_FILES['machine_multimedia_files']);
    
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {


 //upload config setting..............

$file_type= $file['type'];

//echo "file type is ".$file_type;


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
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

    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$machine_id;

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

$main_id=$machine_id;

$slide_data['main_id']=$main_id;
$slide_data['sub_id']=$sub_id;
$slide_data['slide_id']=$slide_id_selected;
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

$main_id=$machine_id;

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




header('Location:'.base_url()."index.php/".$return_to_path);

//   $this->load->view('view_machine');


}


else

{
//       echo "There is a problem";

}




}




//---------- delete machine image ----------------//
function delete_machine_img($machine_id,$img_id,$return_to)
{

ob_start();
//echo $return_to;

if(isset($return_to))
{





   $return_to=base64_decode($return_to);


$path_slice = explode("/", $return_to);


$return_to_path='';

for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}




$return_to_path=rtrim($return_to_path,"/");

//echo base_url()."index.php/".$return_to_path;




if($machine_id != "" && $img_id != "")
{


 $result=$this->db->delete('slide_img', array('main_id' => $machine_id,'img_id' => $img_id, ));  

}

ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);
//   $this->load->view('view_machine');
}




}



function delete_machine_video($machine_id,$img_id,$return_to)
{

ob_start();
//echo $return_to;

if(isset($return_to))
{





   $return_to=base64_decode($return_to);


$path_slice = explode("/", $return_to);


$return_to_path='';

for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}




$return_to_path=rtrim($return_to_path,"/");

//echo base_url()."index.php/".$return_to_path;




if($machine_id != "" && $img_id != "")
{


 $result=$this->db->delete('slide_video', array('main_id' => $machine_id,'video_id' => $img_id, ));  

}

ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);
//   $this->load->view('view_machine');
}




}





/********************************************************************************************
      
//    store multimedia files for machine start here 
      
********************************************************************************************/







 function store_machine_multimedia($machine_id=null,$return_to=null)
    {

    //       print_r($_FILES);
    ob_start(); 
    
      
//$machine_id=$this->uri->segment(3);
/*
echo '<br>-----------------<br>';
print_r($_POST['image_to_delete']);
echo '<br>-----------------<br>';
*/
/*
if(!empty($_POST['image_to_delete']))
{
foreach ($_POST['image_to_delete'] as $image_id) {


echo $machine_id."<br>";
echo $sub_id."<br>";
echo $image_id."<br>";

 $result=$this->db->delete('slide_img', array('main_id' => $machine_id,'img_id' => $image_id, ));  

}
}


if(!empty($_POST['video_to_delete']))
{
foreach ($_POST['video_to_delete'] as $video_id) {

$result=$this->db->delete('slide_video', array('main_id' => $machine_id, 'sub_id' => $sub_id,'video_id' => $video_id, ));  

}

}

*/
 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($machine_id!=null)
        {



        // insert slide text in slids database.......code start here



        $machine_slide_data['main_id'] =$machine_id;
       

 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here
//echo '<br>---------new--------<br>';
//echo  $slide_id_selected;
//echo '<br>-----------------<br>';
//print_r($_FILES['machine_multimedia_files']);
//echo '<br>-----------------<br>';

        // Change $_FILES to new vars and loop them
        foreach($_FILES['machine_multimedia_files'] as $key=>$val)
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



unset($_FILES['machine_multimedia_files']);
    
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {


 //upload config setting..............

$file_type= $file['type'];

echo "file type is ".$file_type;


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' => 'gif|jpg|png|mp4|flv|mp3}avi',
            'max_size'      => '100000',
            'overwrite' =>  'TRUE'
            ); 
}


else if($file_type=='video/mp4' || $file_type=='video/flv'|| $file_type=='video/x-flv'  || $file_type=='video/avi' || $file_type=='application/octet-stream')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/video/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '100000',

            'overwrite' =>  'TRUE'
            ); 

}


else if($file_type=='audio/mp3' || $file_type=='audio/mpeg')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/audio/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '100000',

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

    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{

  echo 'http://localhost:1234/phpmyadmin/';
$slide_data=array();

$main_id=$machine_id;

//echo "<br>------------</br>";
//echo $slide_id;
//echo "<br>------------</br>";

$slide_data['main_id']=$main_id;
$slide_data['sub_id']='--';
$slide_data['slide_id']='--';
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
 
else if($file_type=='video/mp4' || $file_type=='video/flv' || $file_type=='video/x-flv' || $file_type=='video/avi' || $file_type=='application/octet-stream')
{
echo '--------------------';

$slide_data=array();

$main_id=$machine_id;

$slide_data['main_id']=$main_id;
$slide_data['sub_id']='--';
$slide_data['slide_id']='--';
 $slide_data['file_name']=$upload_data['file_name'];
 $slide_data['file_type']=$upload_data['file_type'];
 $slide_data['file_path']=$upload_data['file_path'];
 $slide_data['full_path']=$upload_data['full_path'];
 $slide_data['file_ext']=$upload_data['file_ext'];



 $result= $this->db->insert('slide_video',$slide_data);
   $video_id = $this->db->insert_id();  

print_r($slide_data);
//echo 'video_upload_id='.$video_id;

    
}


if($file_type=='audio/mp3' || $file_type=='audio/mpeg')
{
$slide_data=array();

$main_id=$machine_id;

$slide_data['main_id']=$main_id;
$slide_data['sub_id']='--';
$slide_data['slide_id']='--';
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





if(isset($return_to))
{
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
echo base_url()."index.php/".$return_to_path;
echo "<center><div class='animated bounceInDown ' id='notification'><sapn >Return back
<p><a id='notification_button' href='".base_url()."index.php/".$return_to_path."'>click here</a>


</span></div></center>";




//----------header('Location:'.base_url()."index.php/".$return_to_path);
//   $this->load->view('view_machine');
}
else
{

 //------------header('Location:'.base_url()."index.php/machine/insert_machine_address/".$machine_id);  

}





}



/********************************************************************************************
      
//    machine address store to db 
      
********************************************************************************************/



function store_machine_vendor($machine_id=null,$vendor_address_id=null, $return_to=null)
{
  ob_start();

if(isset($vendor_address_id) && isset($return_to))
{
//echo "this";



$machine_vendor['machine_id']=$machine_id;
$machine_vendor['address1']=$_POST['address1'];
$machine_vendor['address2']=$_POST['address2'];
$machine_vendor['landmark']=$_POST['landmark'];
$machine_vendor['state']=$_POST['state'];
$machine_vendor['district']=$_POST['District'];
$machine_vendor['city']=$_POST['city'];
$machine_vendor['pincode']=$_POST['pincode'];
$machine_vendor['contact']=$_POST['contact'];
$machine_vendor['email']=$_POST['email'];
$machine_vendor['website']=$_POST['website'];
$machine_vendor['note']=$_POST['note'];

if($machine_vendor['district']=="-1")
{
  $machine_vendor['district']='ALL';
}

//print_r($machine_vendor);

$this->db->where('machine_vendor_id',$vendor_address_id);
$result_slide_text=$this->db->update('machine_vendor', $machine_vendor); 
    
    $slide_id = $this->db->insert_id();  






if(isset($return_to))
{
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

$return_to_path=rtrim($return_to_path,"//");
//echo base_url()."index.php/".$return_to_path;
/*
echo "<center><div class='animated bounceInDown ' id='notification'><sapn >Return back
<p><a id='notification_button' href='".base_url()."index.php/".$return_to_path."'>click here</a>


</span></div></center>";

echo base_url()."index.php/".$return_to_path;
*/
ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);
//   $this->load->view('view_machine');
}
else
{

ob_flush();
header('Location:'.base_url()."index.php/machine/insert_machine_address/".$machine_id);  

}









}
else
{
$machine_vendor['machine_vendor_id']=unique_random_string(20,'machine_vendor','machine_vendor_id');
$machine_vendor['machine_id']=$machine_id;
$machine_vendor['address1']=$_POST['address1'];
$machine_vendor['address2']=$_POST['address2'];
$machine_vendor['landmark']=$_POST['landmark'];
$machine_vendor['state']=$_POST['state'];
$machine_vendor['district']=$_POST['District'];
$machine_vendor['city']=$_POST['city'];
$machine_vendor['pincode']=$_POST['pincode'];
$machine_vendor['contact']=$_POST['contact'];
$machine_vendor['email']=$_POST['email'];
$machine_vendor['website']=$_POST['website'];
$machine_vendor['note']=$_POST['note'];

$this->db->insert('machine_vendor',$machine_vendor);

header('Location:'.base_url()."index.php/machine/insert_machine_address/".$machine_id.'/fresh');
}





}











function delete_machine_address($machine_id=null,$vendor_address_id=null, $return_to=null)
{
  ob_start();

if(isset($vendor_address_id) && isset($return_to))
{


$result=$this->db->delete('machine_vendor', array('machine_id' => $machine_id,'machine_vendor_id' => $vendor_address_id ));  





if(isset($return_to))
{
   $return_to=base64_decode($return_to);




$path_slice = explode("/", $return_to);

//print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;

$return_to_path=rtrim($return_to_path,"//");
echo base_url()."index.php/".$return_to_path;
echo "<center><div class='animated bounceInDown ' id='notification'><sapn >Return back
<p><a id='notification_button' href='".base_url()."index.php/".$return_to_path."'>click here</a>


</span></div></center>";

echo base_url()."index.php/".$return_to_path;

ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);
//   $this->load->view('view_machine');
}
else
{

header('Location:'.base_url()."index.php/machine/insert_machine_address/".$machine_id);  

}









}




}











/*


       function store_machine_intro($machine_id=null)
    {
        print_r($_POST);

         $intro_id= $_POST['intro_id'];
            $intro_text= $_POST['text'];


 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($machine_id!=null && $intro_id !=null)
        {



// insert slide text in slids database.......code start here



    $machine_intro_data['main_id'] =$machine_id;
        $machine_intro_data['sub_id'] = $intro_id;
    
        $machine_intro_data['text'] = $intro_text;
        
    

    $result_slide_text= $this->db->insert('slides',$machine_intro_data);

     $slide_id = $this->db->insert_id();  



 // insert slide text in slids database.......code ends here           


  //    echo  $slide_id;




//media file upload starts here

echo  $slide_id;


    
        // Change $_FILES to new vars and loop them
        foreach($_FILES['machine_multimedia_files'] as $key=>$val)
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



unset($_FILES['machine_multimedia_files']);
    
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


print_r($upload_data);
echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$machine_id;
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

$main_id=$machine_id;
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

$main_id=$machine_id;
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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
    echo "There is no problem everything stored with success";
header("Location:".base_url().'index.php/machine/insert_machine_intro/'.$machine_id);

}
else

{
       echo "There is a problem";

}


        }






*/








function  view_slides($main_id, $sub_id,$sub_category,$page='',$offset=0)

  {

        if($main_id!=NULL && $sub_id!=NULL && $sub_category!=null && $page=='')
        {
        $data['info']=$this->model_machine->get_machine_slides($main_id,$sub_id,$sub_category,0,$start);
        
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
$config['first_link'] = FALSE;
$config['last_link'] = FALSE;



$config['base_url'] = base_url().'index.php/machine/view_slides/'.$main_id.'/'.$sub_id.'/'.$sub_category.'/pages/';


$config['per_page'] = 1;

$data['info']=$this->model_machine->get_machine_slides($main_id,$sub_id,$sub_category, $config['per_page'], $start);


if(isset($data['info'][0]->slide_id))
{
$slide_id=$data['info'][0]->slide_id;



$data['slide_images']=$this->model_machine->get_machine_slides_image($main_id,$sub_id,$slide_id);
$data['slide_videos']=$this->model_machine->get_machine_slides_video($main_id,$sub_id,$slide_id);
$data['slide_audios']=$this->model_machine->get_machine_slides_audio($main_id,$sub_id,$slide_id);

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



echo "<div class='animated bounceInDown ' id='notification'><sapn >No informartion entered in ".$sub_category."
<p><a id='notification_button' href='".base_url()."index.php/machine/add_slide_form/".$main_id."/".$sub_id."/".$sub_category."/".$encoded_url."'>enter now</a>


</span></div>";




  }  
$config['total_rows'] =$this->model_machine->get_machine_slides_count($main_id,$sub_id);


$this->pagination->initialize($config);





//print_r($data['info']);

//echo count($config['total_rows']);

        
    }
    else
    {
        $data['info']=$this->model_machine->get_machine_slides($main_id,$sub_id,$sub_category,1, $start);


       // $data['info']=$this->model_machine->get_machine_slides_image($main_id,$sub_id);
    }



$this->load->view('view_machine_tabs',$data);
    }










/*
function  update_recorded()
	{
	
		$this->load->view('update_recorded');
	}

*/

}

?>