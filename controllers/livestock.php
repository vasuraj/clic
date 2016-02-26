<?php

class Livestock extends CI_Controller
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
$this->load->model('model_livestock');







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
	//	$this->load->model('model_livestock');
	//	$data['info']=$this->model_livestock-> get_last_ten_entries();
		
	//	$this->load->view('view_weather_info',$data);
	}

	function  view_livestock($livestock_category=NULL,$livestock_id=null)
	{
		
ob_start();


       // echo $this->uri->segment(3);
	{
		$data['info']=$this->model_livestock->get_category_livestock($this->uri->segment(3),$livestock_id);
	}

   

$this->load->view('view_livestock_info',$data);
	}













function  get_livestock_tabs($livestock_id=NULL)
    {
        ob_start();
        if($livestock_id!=NULL )
        {
            $data['info']=$this->model_livestock->get_livestock($livestock_id);
        }
  
         else
        {
            echo "u cant access tabs without any key.";
        }

$this->load->view('get_livestock_tabs',$data);
    }









	function  delete_livestock($livestock_id=null,$return_to=null)
	{ob_start();
		$this->model_livestock->delete_livestock($livestock_id);
		
//echo base64_decode($return_to);

  $path_slice = explode("/", base64_decode($return_to));

print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);


     for($i=2;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}$return_to_path=rtrim($return_to_path,'/');

//echo "<br><br>".$return_to_path;

ob_flush();


echo "<center><a style='padding:5px 10px;  background:#eee; ' href '".base_url()."index.php/".$return_to_path."'> return back </a></center>";
			header( 'Location: '.base_url().'/'.$return_to_path) ;
	
		
	}


  



 function insert_livestock()
    {ob_start();
    	//print_r($this->data);
     $this->load->view('insert_livestock',$this->data);
    }
 function update_livestock($livestock_id)
    {ob_start();
        //print_r($this->data);
     $this->load->view('update_livestock',$this->data);
    }







       function store_livestock($livestock_id=null)
    {

        ob_start();
    	//print_r($_POST);

     //   echo "<br><br><br>--------------------------------<br>";
 
//print_r($_FILES);

// echo "<br><br><br>--------------------------------<br>";

    	if($livestock_id!=null)
    	{
    		$this->db->where('livestock_id',$livestock_id);
    		$result= $this->db->update('livestock',$_POST);
    	

        }
    	else
    	{




		$livestock_data['livestock_id'] =random_string(20);
        $livestock_data['name'] = $_POST['name'];
        $livestock_data['tname'] = $_POST['tname'];
        $livestock_data['category'] = $_POST['category'];
     
        $livestock_data['intro'] = random_string(20);
        $livestock_data['breeds'] = random_string(20);
        $livestock_data['selection'] = random_string(20);
        $livestock_data['feed'] = random_string(20);
        $livestock_data['housing'] = random_string(20);
        $livestock_data['reproduction_management'] = random_string(20);
        $livestock_data['calf_rearing'] = random_string(20);
        $livestock_data['economics '] = random_string(20);
        $livestock_data['other_info '] = random_string(20);
      

      print_r($livestock_data);








//media file upload starts here



    
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

$main_id=$livestock_id;



 $livestock_data['icon']=$upload_data['file_name'];


echo "<br>---------------------------------<br>";
print_r($livestock_data);
echo "<br>---------------------------------<br>";

 $result= $this->db->insert('livestock',$livestock_data);



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

       // print_r($data);
        
       // $this->load->view('upload',$data);



//media files upload ends here









   
    }
		
		//print_r($result);

if($result)
		{
            ob_flush();


		header("Location:".base_url().'index.php/livestock/insert_slide_form/intro/'.$livestock_data['livestock_id']);
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


  function store_updated_livestock($livestock_id=null,$return_to=null)
    {ob_start();
        $livestock_id=$this->uri->segment(3);

      //  echo $livestock_id;

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


print_r($upload_data);
//echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$livestock_id;



 $livestock_data['icon']=$upload_data['file_name'];

 //$result= $this->db->insert('livestock',$livestock_data);



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



 $update_livestock_data = $this->db->get_where('livestock',array('livestock_id'=>$livestock_id))->result();

echo "<br>";

print_r($update_livestock_data);

    $final_update_livestock=array();

$final_update_livestock['livestock_id']=$livestock_id;
$final_update_livestock['name']=$_POST['name'];
$final_update_livestock['tname']=$_POST['tname'];
$final_update_livestock['category']=$_POST['category'];





$final_update_livestock['icon']=$final_icon;

     
        $livestock_data['intro'] = $update_livestock_data[0]->intro;
        $livestock_data['breeds'] = $update_livestock_data[0]->breeds;
        $livestock_data['selection'] = $update_livestock_data[0]->selection;
        $livestock_data['feed'] = $update_livestock_data[0]->feed;
        $livestock_data['housing'] = $update_livestock_data[0]->housing;
        $livestock_data['reproduction_management'] = $update_livestock_data[0]->reproduction_management;
        $livestock_data['calf_rearing'] = $update_livestock_data[0]->calf_rearing;
        $livestock_data['economics '] = $update_livestock_data[0]->economics;
        $livestock_data['other_info '] = $update_livestock_data[0]->other_info;

echo "<br><br>";
    print_r($final_update_livestock); 

$this->db->where('livestock_id',$livestock_id);
$result= $this->db->update('livestock',$final_update_livestock);
        



 







   
  
        
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

}$return_to_path=rtrim($return_to_path,'/');

$return_to_path=rtrim($return_to_path,'/');

//echo "<br>*************<br>".$return_to_path;
ob_flush();



        header("Location:".base_url().$return_to_path);
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



 function store_added_livestock_slides($selected_section=null, $livestock_id=null, $sub_id=null,$return_to=null)
    {
ob_start();
        print_r($_POST);

     
            $text= $_POST['text'];





 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($livestock_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $livestock_slide_data['main_id'] =$livestock_id;
        $livestock_slide_data['sub_id'] = $sub_id;
    $livestock_slide_data['sub_category']=$selected_section;
        $livestock_slide_data['text'] = $text;
        
    

    $result_slide_text= $this->db->insert('slides',$livestock_slide_data);

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

$main_id=$livestock_id;

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

$main_id=$livestock_id;

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

$main_id=$livestock_id;

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

ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);


//  header("Location:livestock/add_slide_form/9hu70nsygf705spkif0c/ug3qb1draqlv93plej2p/intro/aHR0cDovLzE5Mi4x");
 // header("Location:".base_url().'index.php/livestock/insert_slide_form/'.$selected_section.'/'.$livestock_id);


}
else

{
     //  echo "There is a problem";

}




}




 function store_livestock_slides($selected_section=null, $livestock_id=null, $sub_id=null,$slide_id=null)
    {
ob_start(); 
        print_r($_POST);

     
            $text= $_POST['text'];





 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($livestock_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $livestock_slide_data['main_id'] =$livestock_id;
        $livestock_slide_data['sub_id'] = $sub_id;
    $livestock_slide_data['sub_category']=$selected_section;
        $livestock_slide_data['text'] = $text;
        
    

    $result_slide_text= $this->db->insert('slides',$livestock_slide_data);

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

$main_id=$livestock_id;

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

$main_id=$livestock_id;

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

$main_id=$livestock_id;

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


 header("Location:".base_url().'index.php/livestock/insert_slide_form/'.$selected_section.'/'.$livestock_id);

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

ob_flush();

header('Location:'.base_url()."index.php/".$return_to_path);




        }


}












 function update_livestock_slide($livestock_id=null, $sub_id=null,$slide_id=null,$return_to=null)
    {

 //       print_r($_FILES);
ob_start(); 
     
            $text= $_POST['text'];

$slide_id_selected=$this->uri->segment(5);

//echo '<br>-----------------<br>';
//rint_r($slide_id);
//echo '<br>-----------------<br>';

if(!empty($_POST['image_to_delete']))
{
foreach ($_POST['image_to_delete'] as $image_id) {

 $result=$this->db->delete('slide_img', array('main_id' => $livestock_id, 'sub_id' => $sub_id,'img_id' => $image_id, ));  

}
}


if(!empty($_POST['video_to_delete']))
{
foreach ($_POST['video_to_delete'] as $video_id) {

 $result=$this->db->delete('slide_video', array('main_id' => $livestock_id, 'sub_id' => $sub_id,'video_id' => $video_id, ));  

}

}


 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($livestock_id!=null && $sub_id !=null)
        {



// insert slide text in slids database.......code start here



    $livestock_slide_data['main_id'] =$livestock_id;
        $livestock_slide_data['sub_id'] = $sub_id;

    $livestock_slide_data['slide_id'] = $slide_id;
        $livestock_slide_data['text'] = $text;
        


$this->db->where('slide_id', $slide_id);
$result_slide_text=$this->db->update('slides', $livestock_slide_data); 
    
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

$main_id=$livestock_id;

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

$main_id=$livestock_id;

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

$main_id=$livestock_id;

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

echo "<style>
#notification-warning 
{
    font-weight:bold;
    text-transform:uppercase;
    width:200px;
    margin:auto;
    border-radius:5px;
    display:inline-block;

}

    .error {
        background:#ffecec url('images/error.png') no-repeat 10px 50%;
        border:1px solid #f5aca6;
    }
    .success {
        background:#e9ffd9 url('images/success.png') no-repeat 10px 50%;
        border:1px solid #a6ca8a;
    }
    .warning {
        background:#fff8c4 url('images/warning.png') no-repeat 10px 50%;
        border:1px solid #f2c779;
    }
    .notice {
        background:#e3f7fc url('images/notice.png') no-repeat 10px 50%;
        border:1px solid #8ed9f6;

    }


a.btn-neavyblue
{
    text-decoration:none;
    color:white;
    text-shdaow:0px 1px 1px white,
    0px -1px 1px black; 
    background:#369;
    padding:5px 10px;

}
    </style>";

echo "<center><div class='notice animated bounceInDown ' id='notification-warning'><sapn >Return back
<p><a class='btn btn-neavyblue' href='".base_url()."index.php/".$return_to_path."'>click here</a>


</span></div></center>";


ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);

//   $this->load->view('view_livestock');


}
else

{
//       echo "There is a problem";

}




}































/*


       function store_livestock_intro($livestock_id=null)
    {
        print_r($_POST);

         $intro_id= $_POST['intro_id'];
            $intro_text= $_POST['text'];


 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($livestock_id!=null && $intro_id !=null)
        {



// insert slide text in slids database.......code start here



    $livestock_intro_data['main_id'] =$livestock_id;
        $livestock_intro_data['sub_id'] = $intro_id;
    
        $livestock_intro_data['text'] = $intro_text;
        
    

    $result_slide_text= $this->db->insert('slides',$livestock_intro_data);

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


print_r($upload_data);
echo '<br>------</br>';


    if($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/x-windows-bmp')
{
$slide_data=array();

$main_id=$livestock_id;
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

$main_id=$livestock_id;
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

$main_id=$livestock_id;
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
header("Location:".base_url().'index.php/livestock/insert_livestock_intro/'.$livestock_id);

}
else

{
       echo "There is a problem";

}


        }






*/








function  view_slides($main_id, $sub_id,$sub_category,$page='',$offset=0)

  {
ob_start();
        if($main_id!=NULL && $sub_id!=NULL && $sub_category!=null && $page=='')
        {
        $data['info']=$this->model_livestock->get_livestock_slides($main_id,$sub_id,$sub_category,0,$start);
        
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



$config['base_url'] = base_url().'index.php/livestock/view_slides/'.$main_id.'/'.$sub_id.'/'.$sub_category.'/pages/';


$config['per_page'] = 1;

$data['info']=$this->model_livestock->get_livestock_slides($main_id,$sub_id,$sub_category, $config['per_page'], $start);


if(isset($data['info'][0]->slide_id))
{
$slide_id=$data['info'][0]->slide_id;



$data['slide_images']=$this->model_livestock->get_livestock_slides_image($main_id,$sub_id,$slide_id);
$data['slide_videos']=$this->model_livestock->get_livestock_slides_video($main_id,$sub_id,$slide_id);
$data['slide_audios']=$this->model_livestock->get_livestock_slides_audio($main_id,$sub_id,$slide_id);

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


echo "<div class='animated bounceInDown ' id='notification'><sapn >No informartion entered in ".str_replace('_',' ', $sub_category)."
<p><a id='notification_button' href='".base_url()."index.php/livestock/add_slide_form/".$main_id."/".$sub_id."/".$sub_category."/".$encoded_url."'>enter now</a>


</span></div>";

  } 
$config['total_rows'] =$this->model_livestock->get_livestock_slides_count($main_id,$sub_id);


$this->pagination->initialize($config);


$data['links']=$config['total_rows'];


//print_r($data['info']);

//echo count($config['total_rows']);

        
    }
    else
    {
        $data['info']=$this->model_livestock->get_livestock_slides($main_id,$sub_id,$sub_category,1, $start);


       // $data['info']=$this->model_livestock->get_livestock_slides_image($main_id,$sub_id);
    }



$this->load->view('view_livestock_tabs',$data);
    }










/*
function  update_recorded()
	{
	
		$this->load->view('update_recorded');
	}

*/

}

?>