  <?php
class Model_soil extends CI_Model
{
protected $_table_soil='soil';
protected $_table_soil_item='soil_section';
protected $_table_slides='slides';
protected $_table_image='slide_img';
protected $_table_video='slide_video';
protected $_table_audio='slide_audio';


protected $_primary_key='soil_id';
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

       function get_soil($soil_id=NULL)
    {


    	
        if(isset($soil_id))
        {

        
          return  $query = $this->db->get_where($this->_table_soil,array('section_id'=>$soil_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_soil)->result();

          //print_r($query);

            return  $query;
        }      
  
    }







       function get_soil_item($soil_section_id=NULL)
    {


      
        if(isset($soil_section_id))
        {
echo $soil_section_id;
          
          return  $query = $this->db->get_where($this->_table_soil_item,array('soil_section_id'=>$soil_section_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_soil_item)->result();

          //print_r($query);

            return  $query;
        }      
  
    }


       function get_soil_item_info($soil_sub_section_id=NULL)
    {


      
        if(isset($soil_sub_section_id))
        {
        
          return  $query = $this->db->get_where($this->_table_soil_item,array('soil_sub_section_id'=>$soil_sub_section_id))->result();
        }
        else
        {
          
          $query = $this->db->get($this->_table_soil_item)->result();

          //print_r($query);

            return  $query;
        }      
  
    }




       function get_category_soil($soil_category=NULL,$soil_id=null)
    {

//echo $soil_category;
      
       if(isset($soil_id))
        {

          $this->db->order_by('name','asc');
          return  $query = $this->db->get_where($this->_table_soil,
            array('category'=>$soil_category,
            'soil_id'=>$soil_id))->result();
        }


        elseif(isset($soil_category))
        {
$this->db->order_by('name','asc');
          
          return  $query = $this->db->get_where($this->_table_soil,array('category'=>$soil_category))->result();
        }

        else
        {
$this->db->order_by('name','asc');
          
          $query = $this->db->get($this->_table_soil)->result();

          //print_r($query);

            return  $query;
        }      
  
    }

   





  function get_all_soil_page($limit,$start=0)
    {
      
       /*
        if($soil_id != NULL)
        {
             return  $query = $this->db->get_where($this->_table_soil,array('date'=>$soil_id))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->get($this->_table_soil)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }







function get_soil_slides($main_id=null,$sub_id=null,$sub_category=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

return  $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id))->result();
      
         
         
      }


function get_soil_slides_image($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_image,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }


function get_soil_slides_video($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_video,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

function get_soil_slides_audio($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_audio,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

   

function get_soil_slides_count($main_id=null,$sub_id=null)
    {
      

    

 $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id));
      
      
   // $this->db->from('soil');
   // $query = $this->db->get();
    return $rowcount = $query->num_rows();   
         
      }
   

    function soil_save($soil_data=null)
    {
               
          // print_r((expression))
      /*
        $this->soil_id =random_string(20);
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
        $this->db->insert('soil', $this);

        */


    }






function count_soil()
{
    $this->db->from('soil');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


    function delete_soil($soil_id=null)
    {
    //       $this->db->delete('slides', array('main_id' => $soil_id));
    // $this->db->delete('slide_img', array('main_id' => $soil_id));
    //     $this->db->delete('slide_viedo', array('main_id' => $soil_id));
    //         $this->db->delete('slide_audio', array('main_id' => $soil_id));
    $this->db->delete('soil', array('section_id' => $soil_id));


}


    function delete_soil_item($soil_item_id=null)
    {
  
    $this->db->delete('soil_section', array('soil_sub_section_id' => $soil_item_id));


}


	
}

?>