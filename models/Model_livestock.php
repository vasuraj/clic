  <?php
class Model_livestock extends CI_Model
{
protected $_table_livestock='livestock';
protected $_table_slides='slides';
protected $_table_image='slide_img';
protected $_table_video='slide_video';
protected $_table_audio='slide_audio';


protected $_primary_key='livestock_id';
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

       function get_livestock($livestock_id=NULL)
    {


    	
        if(isset($livestock_id))
        {

          
          return  $query = $this->db->get_where($this->_table_livestock,array('livestock_id'=>$livestock_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_livestock)->result();

          //print_r($query);

            return  $query;
        }      
  
    }




       function get_category_livestock($livestock_category=NULL,$livestock_id=null)
    {

//echo $livestock_category;
      
       if(isset($livestock_id))
        {

          
          return  $query = $this->db->get_where($this->_table_livestock,
            array('category'=>$livestock_category,
            'livestock_id'=>$livestock_id))->result();
        }


        elseif(isset($livestock_category))
        {

          
          return  $query = $this->db->get_where($this->_table_livestock,array('category'=>$livestock_category))->result();
        }

        else
        {

          
          $query = $this->db->get($this->_table_livestock)->result();

          //print_r($query);

            return  $query;
        }      
  
    }

   





  function get_all_livestock_page($limit,$start=0)
    {
      
       /*
        if($livestock_id != NULL)
        {
             return  $query = $this->db->get_where($this->_table_livestock,array('date'=>$livestock_id))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->get($this->_table_livestock)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }







function get_livestock_slides($main_id=null,$sub_id=null,$sub_category=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

return  $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id))->result();
      
         
         
      }


function get_livestock_slides_image($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_image,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }


function get_livestock_slides_video($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_video,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

function get_livestock_slides_audio($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_audio,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

   

function get_livestock_slides_count($main_id=null,$sub_id=null)
    {
      

    

 $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id));
      
      
   // $this->db->from('livestock');
   // $query = $this->db->get();
    return $rowcount = $query->num_rows();   
         
      }
   

    function livestock_save($livestock_data=null)
    {
               
          // print_r((expression))
      /*
        $this->livestock_id =random_string(20);
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
        $this->db->insert('livestock', $this);

        */


    }






function count_livestock()
{
    $this->db->from('livestock');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


    function delete_livestock($livestock_id=null)
    {
          $this->db->delete('slides', array('main_id' => $livestock_id));
    $this->db->delete('slide_img', array('main_id' => $livestock_id));
        $this->db->delete('slide_viedo', array('main_id' => $livestock_id));
            $this->db->delete('slide_audio', array('main_id' => $livestock_id));
    $this->db->delete('livestock', array('livestock_id' => $livestock_id));


}




	
}

?>