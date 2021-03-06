<?php

class livestock_pd extends CI_Controller
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
$this->load->model('model_livestock_pd');


function random_string($length)

{
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) 
    {
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
	//	$this->load->model('model_livestock_pd');
	//	$data['info']=$this->model_livestock_pd-> get_last_ten_entries();
		
	//	$this->load->view('view_weather_info',$data);
	}

	
    function  view_livestock_pd($livestock_pd_category=NULL,$livestock_pd_id=null)
	{
		
      // echo $this->uri->segment(3);

      
    $data['info']=$this->model_livestock_pd->get_category_livestock_pd($livestock_pd_category,$livestock_pd_id);
    	

    $this->load->view('view_livestock_pd_info',$data);
       
	}

function view_livestock_pd_attached_tabs($livestock_pd_npm_id=null)
{

   // $data['info']=$this->model_livestock_pd->get_livestock_pd_control($livestock_pd_npm_id);
        
$data['pd_id'] =$this->uri->segment(3);
$data['livestock_id']= $this->uri->segment(4);
$data['category']= $this->uri->segment(5);
$data['causative_organism'] =$this->uri->segment(6);
$data['pd_symptoms_id'] =$this->uri->segment(7);
$data['pd_prevention_id'] =$this->uri->segment(8);
$data['pd_treatment_id']= $this->uri->segment(9);

   $this->load->view('view_livestock_pd_attached_tabs',$data);

}


function view_livestock_pd_control($livestock_pd_npm_id=null)
{

    $data['info']=$this->model_livestock_pd->get_livestock_pd_control($livestock_pd_npm_id);
        


    $this->load->view('view_livestock_pd_control',$data);

}



function  view_livestock_pd_symptom($livestock_pd_symptom_id=null,$page='',$start=0)

  {


        if($livestock_pd_symptom_id!=NULL &&  ($page=='' || !isset($page)))
        {
        
            $data['info']=$this->model_livestock_pd->get_livestock_pd_symptom($livestock_pd_symptom_id,0,$start);
          
        
        }
        
        elseif($livestock_pd_symptom_id!=NULL && $page==='pages')
        {

            $start=$this->uri->segment(5);
            $config['uri_segment']=5;
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

            $config['base_url'] = base_url().'index.php/livestock_pd/view_livestock_pd_symptom/'.$livestock_pd_symptom_id.'/pages/';


            $config['per_page'] = 1;

            
            $data['info']=$this->model_livestock_pd->get_livestock_pd_symptom($livestock_pd_symptom_id,$config['per_page'],$start);


//print_r($data['info']);


                        if(isset($data['info'][0]->slide_id))
                        {
                            $slide_id=$data['info'][0]->slide_id;



                              $data['slide_images']=$this->model_livestock_pd->get_livestock_pd_slides_image($data['info'][0]->slide_id);
                              $data['slide_videos']=$this->model_livestock_pd->get_livestock_pd_slides_video($data['info'][0]->slide_id);
                              $data['slide_audios']=$this->model_livestock_pd->get_livestock_pd_slides_audio($data['info'][0]->slide_id);

                           //print_r($data['slide_audios']);
                        }
                        

                        else
                        {

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

if(isset($main_id) && isset($sub_id) && isset($sub_category))
{
                echo "<div class='notice animated bounceInDown ' id='notification-warning'><sapn >No informartion entered in ".$sub_category."
                <p><a class='btn btn-success' href='".base_url()."index.php/livestock_pd/add_slide_form/".$main_id."/".$sub_id."/".$sub_category."/".$encoded_url."'>enter now</a>


                            </span></div>";
                        }
                        else
                        {

//echo $livestock_pd_symptom_id;
$this->db->from('livestock_pd_link');
$this->db->select('livestock_pd_link_id');
$this->db->where("pd_symptom_id",$livestock_pd_symptom_id);
$result_livestock_pd_link_id=$this->db->get()->result();

if(empty($result_livestock_pd_link_id))
{
$this->db->from('livestock_pd_link');
$this->db->select('livestock_pd_link_id');
$this->db->where("pd_prevention_id",$livestock_pd_symptom_id);
$result_livestock_pd_link_id=$this->db->get()->result();
   
}

if(empty($result_livestock_pd_link_id))
{
$this->db->from('livestock_pd_link');
$this->db->select('livestock_pd_link_id');
$this->db->where("pd_treatment_id",$livestock_pd_symptom_id);
$result_livestock_pd_link_id=$this->db->get()->result();
   
}


$livestock_pd_link_id=$result_livestock_pd_link_id[0]->livestock_pd_link_id;

                        echo "<div class='animated bounceInDown ' id='notification'><sapn >No informartion entered 
<p><a id='notification_button' href='".base_url()."index.php/livestock_pd/insert_pd_symptom/symptom/fresh/".$livestock_pd_link_id."/".$encoded_url."'>enter now</a>


</span></div>";




                        

                        }  
                        //echo $livestock_pd_symptom_id;

     
              
        }
    
       $config['total_rows'] =$this->model_livestock_pd->get_livestock_pd_symptom_count($livestock_pd_symptom_id);

            $this->pagination->initialize($config);



}
else
    {
        
        $data['info']=$this->model_livestock_pd->get_livestock_pd_symptom($livestock_pd_symptom_id,1,0);

    }



        $this->load->view('view_livestock_pd_symptom',$data);
}



function  view_livestock_pd_prevention($livestock_pd_prevention_id=null,$page='',$start=0)

  {


        if($livestock_pd_prevention_id!=NULL &&  $page=='' || !isset($page))
        {
        
            $data['info']=$this->model_livestock_pd->get_livestock_pd_prevention($livestock_pd_prevention_id,0,$start);
          
        
        }
        
        elseif($livestock_pd_prevention_id!=NULL && $page==='pages')
        {

            $start=$this->uri->segment(5);
            $config['uri_segment']=5;
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

            $config['base_url'] = base_url().'index.php/livestock_pd/view_livestock_pd_prevention/'.$livestock_pd_prevention_id.'/pages/';


            $config['per_page'] = 1;

            
            $data['info']=$this->model_livestock_pd->get_livestock_pd_prevention($livestock_pd_prevention_id,$config['per_page'],$start);



                        if(isset($data['info'][0]->slide_id))
                        {
                            $slide_id=$data['info'][0]->slide_id;



                              $data['slide_images']=$this->model_livestock_pd->get_livestock_pd_slides_image($data['info'][0]->slide_id);
                              $data['slide_videos']=$this->model_livestock_pd->get_livestock_pd_slides_video($data['info'][0]->slide_id);
                              $data['slide_audios']=$this->model_livestock_pd->get_livestock_pd_slides_audio($data['info'][0]->slide_id);

                           //print_r($data['slide_audios']);
                        }
                        

                        else
                        {

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

if(isset($main_id) && isset($sub_id) && isset($sub_category))
{
                echo "<div class='notice animated bounceInDown ' id='notification-warning'><sapn >No informartion entered in ".$sub_category."
                <p><a class='btn btn-success' href='".base_url()."index.php/livestock_pd/add_slide_form/".$main_id."/".$sub_id."/".$sub_category."/".$encoded_url."'>enter now</a>


                            </span></div>";
                        }
                        else
                        {

$livestock_pd_prevention_id;
$this->db->from('livestock_pd_link');
$this->db->select('livestock_pd_link_id');
$this->db->where("pd_prevention_id",$livestock_pd_prevention_id);
$result_livestock_pd_link_id=$this->db->get()->result();
if(empty($result_livestock_pd_link_id))
{
$this->db->from('livestock_pd_link');
$this->db->select('livestock_pd_link_id');
$this->db->where("pd_prevention_id",$livestock_pd_prevention_id);
$result_livestock_pd_link_id=$this->db->get()->result();
   
}

if(empty($result_livestock_pd_link_id))
{
$this->db->from('livestock_pd_link');
$this->db->select('livestock_pd_link_id');
$this->db->where("pd_treatment_id",$livestock_pd_prevention_id);
$result_livestock_pd_link_id=$this->db->get()->result();
   
}


$livestock_pd_link_id=$result_livestock_pd_link_id[0]->livestock_pd_link_id;

                        echo "<div class='animated bounceInDown ' id='notification'><sapn >No informartion entered 
<p><a id='notification_button' href='".base_url()."index.php/livestock_pd/insert_pd_prevention/prevention/fresh/".$livestock_pd_link_id."/".$encoded_url."'>enter now</a>


</span></div>";




                        }

                        }  
                        //echo $livestock_pd_prevention_id;

            $config['total_rows'] =$this->model_livestock_pd->get_livestock_pd_prevention_count($livestock_pd_prevention_id);

            $this->pagination->initialize($config);


              
        }
    

    else
    {
        
        $data['info']=$this->model_livestock_pd->get_livestock_pd_prevention($livestock_pd_prevention_id,1,0);

    }



        $this->load->view('view_livestock_pd_prevention',$data);
}






function view_livestock_attached_pd($livestock_pd_category=NULL,$livestock_id=null)
{
    $data['livestock_pd_attched']=$this->model_livestock_pd->get_livestock_pd_attached($livestock_pd_category,$livestock_id);
    $this->load->view('view_livestock_pd_attached',$data);
}


function  get_livestock_pd_tabs($livestock_pd_id=NULL)
{
        if($livestock_pd_id!=NULL )
        {
            
            $data['info']=$this->model_livestock_pd->get_livestock_pd($livestock_pd_id);

        }
      
        else
        {
                echo "u cant access tabs without any key.";
        }

    $this->load->view('get_livestock_pd_tabs',$data);
    }



function  delete_livestock_pd($livestock_pd_id=null,$return_to=null)
{
ob_start();
$this->model_livestock_pd->delete_livestock_pd($livestock_pd_id);
		
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

$return_to_path=rtrim($return_to_path,'/');
$return_to_path=ltrim($return_to_path,'/');

echo base_url().$return_to_path;
ob_flush();

		header( 'Location: '.base_url().$return_to_path) ;
	
		
}






function  delete_livestock_pd_link($livestock_pd_link_id=null,$return_to=null)
{
ob_start();
$result=$this->model_livestock_pd->delete_livestock_pd_link($livestock_pd_link_id);
        
//echo base64_decode($return_to);

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
ob_flush();

header( 'Location: '.base_url().'/'.$return_to_path) ;
    

        
}
  
function insert_livestock_pd()
{
    
    $this->load->view('insert_livestock_pd',$this->data);

}
 

function update_livestock_pd($livestock_pd_id)
{        
     $this->load->view('update_livestock_pd',$this->data);
}



function link_livestock_pd()
{        
     $this->load->view('link_livestock_pd',$this->data);
}



 function link_livestock_pd_next()
    {
          $this->load->view('link_livestock_pd_next',$this->data);
    }

     function insert_pd_symptom()
    {
        
     $this->load->view('insert_pd_symptom',$this->data);
    }

       function insert_pd_prevention()
    {
        
     $this->load->view('insert_pd_prevention',$this->data);
    }

       function insert_pd_treatment()
    {
        
     $this->load->view('insert_pd_treatment',$this->data);
    }


  function insert_pd_npm()
    {
        
     $this->load->view('insert_pd_npm',$this->data);
    }

     function update_pd_npm()
    {
        $this->load->view('update_pd_npm',$this->data);
    }







       function store_livestock_pd($livestock_pd_id=null,$return_to=null)
    {
    
        ob_start();

    	if($livestock_pd_id!=null)
    	{
    	

           // print_r($_POST);

            //  print_r($_FILES);



            $livestock_pd_update_data['name']=$_POST['name'];
            $livestock_pd_update_data['tname']=$_POST['tname'];
            $livestock_pd_update_data['sname']=$_POST['sname'];
             $livestock_pd_update_data['category']='disease';
            $livestock_pd_update_data['causative_organism']=$_POST['causative_organism'];
            $livestock_pd_update_data['diseased_livestock']=$_POST['diseased_livestock'];
           

            echo "<br>-------------------------------<br>";
            print_r($livestock_pd_update_data);
            echo "<br>-------------------------------<br>";


             if($_FILES['static_page_link']['name'] !=null)
             {
               $livestock_pd_update_data['static_page_link']= $_FILES['static_page_link']['name'];
             }

        
        //	$this->db->where('livestock_pd_id',$livestock_pd_id);
    		
        //    $result= $this->db->update('livestock_pd',$_POST);

        if(!empty($_FILES['slide_media_files']['name'][0]))
          {

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

  if($file_type!='text/html'  && ($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp'))
{
    echo "************* Image ***************";
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' => 'gif|jpg|png|gif|bmp|mp4|flv|mp3',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}else
{
 echo "------------ Not a Image-----------";

    $upload_conf='';
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

$main_id=$livestock_pd_id;



 $livestock_pd_update_data['icon']=$upload_data['file_name'];

 



 $img_id = $this->db->insert_id(); 

echo 'img_upload_id='.$img_id;


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

echo "<br>-------------------------------<br>";
print_r($livestock_pd_update_data);
echo "<br>-------------------------------<br>";


$this->db->where('pd_id',$livestock_pd_id);
$result= $this->db->update('livestock_pd',$livestock_pd_update_data);
        
echo "<br>-------------------------------<br>";
print_r($result);
echo "<br>-------------------------------<br>";

if(isset($result))
{
echo "running";


echo "<script type='text/javascript'>

  
              
   //    window.close();
        
   
</script> ";

    

}





        }
    	else
    	{
        print_r($_POST);

		
        $livestock_pd_data['name'] = $_POST['name'];
        $livestock_pd_data['tname'] = $_POST['tname'];
        $livestock_pd_data['sname'] = $_POST['sname'];
        $livestock_pd_data['category'] = 'disease';
       
        $livestock_pd_data['intro'] =random_string(20);
        $livestock_pd_data['causative_organism'] = $_POST['causative_organism'];
 $livestock_pd_data['diseased_livestock'] = $_POST['diseased_livestock'];
       

      print_r($livestock_pd_data);





//$result= $this->db->insert('livestock_pd',$livestock_pd_data);





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

  if($file_type!='text/html'  && ($file_type=='image/jpeg' || $file_type=='image/png' || $file_type=='image/x-png' || $file_type=='image/bmp' || $file_type=='image/gif'|| $file_type=='image/x-windows-bmp'))
{
    echo "************* Image ***************";
   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/img/',
            'allowed_types' => 'gif|jpg|png|bmp|mp4|flv|mp3',
            'max_size'      => '30000',
            'overwrite' =>  'TRUE'
            ); 
}else
{
 echo "------------ Not a Image-----------";

    $upload_conf='';
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

$main_id=$livestock_pd_id;



 $livestock_pd_data['icon']=$upload_data['file_name'];

 $result= $this->db->insert('livestock_pd',$livestock_pd_data);



 $img_id = $this->db->insert_id(); 

echo 'img_upload_id='.$img_id;


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
		
		//print_r($result);

if($result)
		{

ob_flush();

		header("Location:".base_url().'index.php/livestock_pd/insert_livestock_pd');
		



        }

if(!$result)
		{

	ob_flush();	
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

function update_pd_stage($livestock_pd_link_id=null)
{

 
$this->load->view('update_pd_stage',$livestock_pd_link_id);

}


function store_update_pd_stage($livestock_pd_link_id=null)
{

  ob_start();
//print_r($_POST);

$final_update_livestock_pd['pd_stage']=$_POST['stage'];


//$this->db->from('livestock_pd_link');
$this->db->where('livestock_pd_link_id',$livestock_pd_link_id);
$result= $this->db->update('livestock_pd_link',$final_update_livestock_pd);



if(isset($result))
{
echo "running";


echo "<script type='text/javascript'>

  
              
       window.close();
        
   
</script> ";

    

}


}


  function store_updated_livestock_pd($livestock_pd_id=null,$return_to=null)
    {
        ob_start();
        $livestock_pd_id=$this->uri->segment(3);

      //  echo $livestock_pd_id;

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

$main_id=$livestock_pd_id;



 $livestock_pd_data['icon']=$upload_data['file_name'];

 //$result= $this->db->insert('livestock_pd',$livestock_pd_data);



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



 $update_livestock_pd_data = $this->db->get_where('livestock_pd',array('livestock_pd_id'=>$livestock_pd_id))->result();

echo "<br>";

print_r($update_livestock_pd_data);

    $final_update_livestock_pd=array();

$final_update_livestock_pd['livestock_pd_id']=$livestock_pd_id;
$final_update_livestock_pd['name']=$_POST['name'];
$final_update_livestock_pd['tname']=$_POST['tname'];
$final_update_livestock_pd['category']=$_POST['category'];


$final_update_livestock_pd['icon']=$final_icon;
$final_update_livestock_pd['intro']=$update_livestock_pd_data[0]->intro;
$final_update_livestock_pd['soils']=$update_livestock_pd_data[0]->soils;
$final_update_livestock_pd['verities']=$update_livestock_pd_data[0]->verities;
$final_update_livestock_pd['seasonality']=$update_livestock_pd_data[0]->seasonality;
$final_update_livestock_pd['seed_quantity']=$update_livestock_pd_data[0]->seed_quantity;
$final_update_livestock_pd['seed_treatment']=$update_livestock_pd_data[0]->seed_treatment;
$final_update_livestock_pd['sowing']=$update_livestock_pd_data[0]->sowing;
$final_update_livestock_pd['water_management']=$update_livestock_pd_data[0]->water_management;
$final_update_livestock_pd['weed_management']=$update_livestock_pd_data[0]->weed_management;
$final_update_livestock_pd['nutrient_management']=$update_livestock_pd_data[0]->nutrient_management;
$final_update_livestock_pd['harvesting']=$update_livestock_pd_data[0]->harvesting;
$final_update_livestock_pd['economics']=$update_livestock_pd_data[0]->economics;
$final_update_livestock_pd['other_info']=$update_livestock_pd_data[0]->other_info;

echo "<br><br>";
    print_r($final_update_livestock_pd); 

$this->db->where('livestock_pd_id',$livestock_pd_id);
$result= $this->db->update('livestock_pd',$final_update_livestock_pd);
        



 







   
  
        
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

    $this->data['section']=$section;
        
      $this->load->view('insert_slide',$this->data);
    }

    function add_slide_form($main_id=null, $sub_id=null, $sub_category=null, $return_to=null)
    {

ob_start();
    $this->data['main_id']=$main_id;

    $this->data['sub_id']=$sub_id;

    $this->data['sub_category']=$sub_category;

    $this->data['return_to']=$return_to;
        
      $this->load->view('add_slide',$this->data);
    }


    function edit_slide_form($section=null)
    {

    $this->data['section']=$section;
        
      $this->load->view('edit_slide',$this->data);
    }



 function store_pd_symptom_slide($symptom_to_add=null, $selected_link_id=null,$return_to=null)
    {

ob_start();
        print_r($_POST);

     
$text= $_POST['text'];



$this->db->from('livestock_pd_link');
$this->db->select('pd_symptom_id');
$this->db->where('livestock_pd_link_id',$selected_link_id);

$selected_npm_ids=$this->db->get()->result();

$pd_symptom_id=$selected_npm_ids[0]->pd_symptom_id;



 // echo $intro_id;
//echo $intro_text.'--';

            $audio_id=1;
             $video_id=1;
             $img_id=1;


            if($symptom_to_add=='fresh' && $selected_link_id !=null)
        {



// insert slide text in slids database.......code start here



    $livestock_pd_slide_data['main_id'] =$selected_link_id;
    $livestock_pd_slide_data['sub_id'] = $pd_symptom_id;
    $livestock_pd_slide_data['sub_category']='--';
    $livestock_pd_slide_data['text'] = $text;
        
    

    $result_slide_text= $this->db->insert('slides',$livestock_pd_slide_data);

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
elseif($file_type=='video/mp4' || $file_type=='video/avi')
{

   $upload_conf = array(
            'upload_path'   => 'assets/uploaded/video/',
            'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
            'max_size'      => '30000',

            'overwrite' =>  'TRUE'
            ); 

}


elseif($file_type=='audio/mp3')
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



$slide_data['main_id']=$selected_link_id;
$slide_data['sub_id']='--';
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

$main_id=$livestock_pd_id;

$slide_data['main_id']=$selected_link_id;
$slide_data['sub_id']='--';
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

$main_id=$livestock_pd_id;

$slide_data['main_id']=$selected_link_id;
$slide_data['sub_id']='--';
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

if(isset($return_to))
{

$path_slice = explode("/", base64_decode($return_to));

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;

$return_to_path=rtrim($return_to_path,'/');

ob_flush();
header('Location:'.base_url()."index.php/".$return_to_path);

}
else
{
  //  header('Location:'.base_url()."index.php/livestock_pd/insert_pd_symptom/fresh/".$return_to_path);
}

//  header("Location:livestock_pd/add_slide_form/9hu70nsygf705spkif0c/ug3qb1draqlv93plej2p/intro/aHR0cDovLzE5Mi4x");
 // header("Location:".base_url().'index.php/livestock_pd/insert_slide_form/'.$selected_section.'/'.$livestock_pd_id);






}
}


 





 function store_link_livestock_pd_next($livestock_pd_link_id=null,$livestock_id=null,$return_to=null)
    {
    
    ob_start();
    print_r($_POST);
      
      if($livestock_pd_link_id=='fresh')
      {
      /********************************************************************************************
            
      //   insert slide text in slids database.......code start here
            
      ********************************************************************************************/
 

        $livestock_pd_link_data['livestock_id'] =$livestock_id;
        $livestock_pd_link_data['pd_id'] = $_POST['pd_id'][0];


   
    /*##########        this code fetch the category of selected pest         #########*/


     $result_category = $this->db->select('category')->get_where('livestock_pd',array('pd_id'=>$livestock_pd_link_data['pd_id']))->result();   


    $category=$result_category[0]->category;


        $livestock_pd_link_data['category'] = $category;
        $livestock_pd_link_data['pd_stage']= $_POST['stage'];
        $livestock_pd_link_data['pd_symptom_id'] = unique_random_string(20,'slides','sub_id');
        $livestock_pd_link_data['pd_prevention_id'] = unique_random_string(20,'slides','sub_id');
        $livestock_pd_link_data['pd_treatment_id'] = unique_random_string(20,'slides','sub_id');
    
        
echo "<br>-------------------------<br>";
    print_r($livestock_pd_link_data);
        

   $this->db->insert('livestock_pd_link',$livestock_pd_link_data);
     $livestock_pd_stored_link_id = $this->db->insert_id();  


        /********************************************************************************************
              
        //   insert slide text in slids database.......code ends here
              
        ********************************************************************************************/
  
        }



/********************************************************************************************
      
//    if return_to varibale is set which is possible only when user edit or wants to update 
      
********************************************************************************************/

       if(isset($return_to))
       {
        
        $path_slice = explode("/", base64_decode($return_to));

          print_r($path_slice);

          $return_to_path='';

          //$return_to_path=implode('/',$path_slice);

          for($i=3;$i<count($path_slice);$i++)
          {

          $return_to_path = $return_to_path.$path_slice[$i]."/";

          }

          echo "<br><br>".$return_to_path;
          //header('Location:'.base_url()."index.php/".$return_to_path);
      }
   
      
    /********************************************************************************************
            
    //  return to code end here 
            
    ********************************************************************************************/   

echo $livestock_pd_stored_link_id;

ob_flush();

 header('Location:'.base_url()."index.php/livestock_pd/link_livestock_pd");


      }






 function store_pd_npm($selected_livestock_pd_npm_id=null,$livestock_pd_npm_id=null,$return_to=null)
    {
        ob_start();
    
        print_r($_POST);
      
      if($selected_livestock_pd_npm_id=='fresh')
      {
     
      /********************************************************************************************
            
      //   insert slide text in slids database.......code start here
            
      ********************************************************************************************/
      

        $livestock_pd_npm_data['pd_npm_id'] =$livestock_pd_npm_id;

        $attached_npm_id='';
        
        foreach ($_POST['npm_id'] as $npm_id) 
        {
            $attached_npm_id=$attached_npm_id.$npm_id.'+';
           
        }
                 



        $livestock_pd_npm_data['npm_attached'] =$attached_npm_id ;
      
        $livestock_pd_npm_data['control_text'] =$_POST['control_text'];
        
    
print_r($livestock_pd_npm_data);

      $this->db->insert('livestock_pd_npm',$livestock_pd_npm_data);
     $livestock_pd_npm_id = $this->db->insert_id();  


        /********************************************************************************************
              
        //   insert slide text in slids database.......code ends here
              
        ********************************************************************************************/
  
        }



/********************************************************************************************
      
//    if return_to varibale is set which is possible only when user edit or wants to update 
      
********************************************************************************************/

       if(isset($return_to))
       {
        
        $path_slice = explode("/", base64_decode($return_to));

         // print_r($path_slice);

          $return_to_path='';

          //$return_to_path=implode('/',$path_slice);

          for($i=3;$i<count($path_slice);$i++)
          {

          $return_to_path = $return_to_path.$path_slice[$i]."/";

          }

         $return_to_path=rtrim($return_to_path,'/');

         ob_flush();
         header('Location:'.base_url()."index.php/".$return_to_path);
      }
   
      
    /********************************************************************************************
            
    //  return to code end here 
            
    ********************************************************************************************/ 

    $this->db->from('livestock_pd_link');  
    $this->db->select('livestock_id');
    $this->db->where('pd_npm_id',$livestock_pd_npm_data['pd_npm_id']);

   $livestock_pd_link_id_result=$this->db->get()->result();


print_r( $livestock_pd_link_id_result);

$livestock_pd_link_id= $livestock_pd_link_id_result[0]->livestock_id;

//echo base_url()."index.php/livestock_pd/link_livestock_pd_next/fresh/".$livestock_pd_link_id;

ob_flush();
header('Location:'.base_url()."index.php/livestock_pd/link_livestock_pd_next/fresh/".$livestock_pd_link_id);


      }



 function store_update_pd_npm($selected_livestock_pd_npm_id=null,$livestock_pd_npm_id=null,$return_to=null)
    {
        ob_start();
    
        print_r($_POST);
      
      if($selected_livestock_pd_npm_id=='update')
      {
     
      /********************************************************************************************
            
      //   insert slide text in slids database.......code start here
            
      ********************************************************************************************/
      

        $livestock_pd_npm_data['pd_npm_id'] =$livestock_pd_npm_id;

        $attached_npm_id='';
        
        foreach ($_POST['npm_id'] as $npm_id) 
        {
            $attached_npm_id=$attached_npm_id.$npm_id.'+';
           
        }
                 



        $livestock_pd_npm_data['npm_attached'] =$attached_npm_id ;
      
        $livestock_pd_npm_data['control_text'] =$_POST['control_text'];
        
    
print_r($livestock_pd_npm_data);
echo $livestock_pd_npm_id;


$this->db->where('pd_npm_id',$livestock_pd_npm_id);
$result= $this->db->update('livestock_pd_npm',$livestock_pd_npm_data);

    
if(isset($result))
{
echo "running";


echo "<script type='text/javascript'>

  
              
       window.close();
        
   
</script> ";

    

}

        /********************************************************************************************
              
        //   insert slide text in slids database.......code ends here
              
        ********************************************************************************************/
  
        }



/********************************************************************************************
      
//    if return_to varibale is set which is possible only when user edit or wants to update 
      
********************************************************************************************/

       if(isset($return_to))
       {
        
        $path_slice = explode("/", base64_decode($return_to));

         // print_r($path_slice);

          $return_to_path='';

          //$return_to_path=implode('/',$path_slice);

          for($i=3;$i<count($path_slice);$i++)
          {

          $return_to_path = $return_to_path.$path_slice[$i]."/";

          }

         $return_to_path=rtrim($return_to_path,'/');

         ob_flush();
         header('Location:'.base_url()."index.php/".$return_to_path);
      }
   
      
    /********************************************************************************************
            
    //  return to code end here 
            
    ********************************************************************************************/ 

    $this->db->from('livestock_pd_link');  
    $this->db->select('livestock_id');
    $this->db->where('pd_npm_id',$livestock_pd_npm_data['pd_npm_id']);

   $livestock_pd_link_id_result=$this->db->get()->result();


print_r( $livestock_pd_link_id_result);

$livestock_pd_link_id= $livestock_pd_link_id_result[0]->livestock_id;

//echo base_url()."index.php/livestock_pd/link_livestock_pd_next/fresh/".$livestock_pd_link_id;

// header('Location:'.base_url()."index.php/livestock_pd/link_livestock_pd_next/fresh/".$livestock_pd_link_id);


      }







 function store_livestock_pd_slides($pd_section=null,$selected_section=null, $livestock_pd_id=null, $sub_id=null,$slide_id=null)
    {
        ob_start(); 
        print_r($_POST);

        $text= $_POST['text'];


        $audio_id=1;
        $video_id=1;
        $img_id=1;

echo $pd_section=$this->uri->segment(3);
echo $livestock_pd_id=$this->uri->segment(5);
$this->db->from('livestock_pd_link');
$this->db->select('pd_'.trim($pd_section).'_id');
$this->db->where('livestock_pd_link_id',$livestock_pd_id);
$result_symptom_ids=$this->db->get()->result();

print_r($result_symptom_ids);



if($pd_section=='symptom')
{
$sub_id=$result_symptom_ids[0]->pd_symptom_id;
}
elseif($pd_section=='prevention')
{

$sub_id=$result_symptom_ids[0]->pd_prevention_id;

}

elseif($pd_section=='treatment')
{

$sub_id=$result_symptom_ids[0]->pd_treatment_id;

}



        if($livestock_pd_id!=null && $sub_id !=null)
        {


/********************************************************************************************
      
// insert slide text in slids database.......code start here    
      
********************************************************************************************/
        

        $livestock_pd_slide_data['main_id'] =$livestock_pd_id;
        $livestock_pd_slide_data['sub_id'] = $sub_id;
        $livestock_pd_slide_data['sub_category']=$selected_section;
        $livestock_pd_slide_data['text'] = $text;
        
        $result_slide_text= $this->db->insert('slides',$livestock_pd_slide_data);

        $slide_id = $this->db->insert_id();  


/********************************************************************************************
        
//     insert slide text in slids database.......code ends here           
        
*******************************************************************************************/





/********************************************************************************************
      
//     media file upload starts here
      
********************************************************************************************/

   
   
/*##########        loop through files uploaded starts here         #########*/

if(!empty($_FILES['slide_media_files']['name'][0]))
{
//print_r($_FILES['slide_media_files']);
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
    
   
/*##########         Put each errors and upload data to an array        #########*/
           

        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {

   
/*##########        upload config setting         #########*/


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
    elseif($file_type=='video/mp4' || $file_type=='video/avi' || $file_type=='video/mp4')
    {

       $upload_conf = array(
                'upload_path'   => 'assets/uploaded/video/',
                'allowed_types' =>   'gif|jpg|png|BMP|mp4|flv|mp3|avi',
                'max_size'      => '30000',

                'overwrite' =>  'TRUE'
                ); 

    }


elseif($file_type=='audio/mp3' || $file_type=='audio/mpeg')
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

$main_id=$livestock_pd_id;

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

$main_id=$livestock_pd_id;

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

$main_id=$livestock_pd_id;

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

}

//media files upload ends here




        }




if($audio_id!=0 && $video_id!=0 && $img_id!=0 && $result_slide_text!=0)
{
  //  echo "There is no problem everything stored with success";
 
ob_flush();

//echo base_url().'index.php/livestock_pd/insert_pd_symptom/'.$pd_section.'/'.$selected_section.'/'.$livestock_pd_id;
header("Location:".base_url().'index.php/livestock_pd/insert_pd_symptom/'.$pd_section.'/'.$selected_section.'/'.$livestock_pd_id);

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
ob_flush();

header('Location:'.base_url()."index.php/".$return_to_path);




        }


}













}

?>