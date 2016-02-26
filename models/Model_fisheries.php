  <?php
class Model_fisheries extends CI_Model
{
protected $_table_fisheries='fisheries';
protected $_table_slides='slides';
protected $_table_image='slide_img';
protected $_table_video='slide_video';
protected $_table_audio='slide_audio';


protected $_primary_key='fisheries_id';
protected $_primary_filter='';
protected $_order_by='';
protected $_rules=array();
protected $_timestamp=FALSE;


function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
      return $key;
  }


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

       function get_fisheries($fisheries_id=NULL)
    {


    	
        if(isset($fisheries_id))
        {

          
          return  $query = $this->db->get_where($this->_table_fisheries,array('fisheries_id'=>$fisheries_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_fisheries)->result();

          //print_r($query);

            return  $query;
        }      
  
    }




       function get_category_fisheries($fisheries_category=NULL,$fisheries_id=null)
    {

//echo $fisheries_category;
     // echo "<br><br><br><br><br>".$fisheries_category."<br<br>";


       if(isset($fisheries_id))
        {

          
          $fisheries_info = $this->db->get_where($this->_table_fisheries,
            array('category'=>$fisheries_category,
            'fisheries_id'=>$fisheries_id))->result();

          $fisheries_img=$this->db->get_where('slide_img',
            array('main_id'=>$fisheries_id))->result();


return $fisheries_info['fisheries_image']=$fisheries_img;

//print_r($fisheries_info);

        }

        elseif($fisheries_category!=null)
        {

       $fisheries_info = $this->db->get_where($this->_table_fisheries,array('category'=>$fisheries_category))->result();

      $fisheries_img=$this->db->get_where('slide_img',array('main_id'=>$fisheries_id))->result();


      $fisheries_info['fisheries_image']=$fisheries_img;

// print_r($fisheries_info);

return $fisheries_info;

print_r($fisheries_info);
        }

        else
        {

          
          $query = $this->db->get('fish_type')->result();



          //print_r($query);

            return  $query;
        }      
  
    }

   










       function get_fish_section_id($fish_type_id=null)
    {

//echo $fisheries_category;
      
       if(isset($fish_type_id))
        {

          
        $fish_info = $this->db->get_where('fish_type',
            array('fish_type_id'=>$fish_type_id))->result();

  


  

     return $fish_info[0];

        }      
  
    }

   






   function get_fisheries_multimedia($fisheries_id=null)
    {

//echo $fisheries_category;
      
       if(isset($fisheries_id))
        {

          
    $fisheries_info=array();
//echo "--------------------".$fisheries_id;
          $fisheries_img=$this->db->get_where('slide_img',
            array('main_id'=>$fisheries_id))->result();

           $fisheries_video=$this->db->get_where('slide_video',
            array('main_id'=>$fisheries_id))->result();


   $fisheries_info['fisheries_image']=$fisheries_img;
     $fisheries_info['fisheries_video']=$fisheries_video;
      


     return $fisheries_info;

        }      
  
    }

   



  function get_fisheries_vendor($fisheries_id=null)
    {

//echo $fisheries_category;
      
       if(isset($fisheries_id))
        {

          
    $fisheries_info=array();

          $fisheries_img=$this->db->get_where('fisheries_vendor',
            array('fisheries_id'=>$fisheries_id))->result();


   $fisheries_info[]=$fisheries_img;
     return $fisheries_info;

        }      
  
    }








  function get_all_fisheries_page($limit,$start=0)
    {
      
       /*
        if($fisheries_id != NULL)
        {
             return  $query = $this->db->get_where($this->_table_fisheries,array('date'=>$fisheries_id))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->get($this->_table_fisheries)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }







function get_fisheries_slides($main_id=null,$sub_id=null,$sub_category=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

return  $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id))->result();
      
         
         
      }


function get_fisheries_slides_image($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_image,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }


function get_fisheries_slides_video($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_video,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

function get_fisheries_slides_audio($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_audio,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

   

function get_fisheries_slides_count($main_id=null,$sub_id=null)
    {
      

    

 $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id));
      
      
   // $this->db->from('fisheries');
   // $query = $this->db->get();
    return $rowcount = $query->num_rows();   
         
      }
   

    function fisheries_save($fisheries_data=null)
    {
               
          // print_r((expression))
      /*
        $this->fisheries_id =random_string(20);
        $this->name = $_POST['name'];
        $this->tname = $_POST['tname'];
        $this->intro = random_string(20);;
        $this->soils = random_string(20);
        $this->verities = random_string(20);
        $this->seasonality = random_string(20);
        $this->seed_quantity = random_string(20);
        $this->seed_treatment = random_string(20);
        $this->sowing  = random_string(20);
        $this->water_management  = random_string(20);
        $this->weed_management  = random_string(20);
        $this->nutrient_management  = random_string(20);
        $this->harvesting  = random_string(20);
        $this->economics  = random_string(20);
        $this->other_info  = random_string(20);
        $this->db->insert('fisheries', $this);

        */


    }






function count_fisheries()
{
    $this->db->from('fisheries');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


    function delete_fisheries($fisheries_id=null)
    {
          $this->db->delete('slides', array('main_id' => $fisheries_id));
    $this->db->delete('slide_img', array('main_id' => $fisheries_id));
        $this->db->delete('slide_viedo', array('main_id' => $fisheries_id));
            $this->db->delete('slide_audio', array('main_id' => $fisheries_id));
    $this->db->delete('fisheries', array('fisheries_id' => $fisheries_id));


}




	
}

?>