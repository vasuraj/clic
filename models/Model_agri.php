  <?php
class Model_agri extends CI_Model
{
protected $_table_agri='agri';
protected $_table_slides='slides';
protected $_table_image='slide_img';
protected $_table_video='slide_video';
protected $_table_audio='slide_audio';


protected $_primary_key='agri_id';
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

       function get_agri($agri_id=NULL)
    {


    	
        if(isset($agri_id))
        {

          
          return  $query = $this->db->get_where($this->_table_agri,array('agri_id'=>$agri_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_agri)->result();

          //print_r($query);

            return  $query;
        }      
  
    }




       function get_category_agri($agri_category=NULL,$agri_id=null)
    {

//echo $agri_category;
      
       if(isset($agri_id))
        {

          $this->db->order_by('name','asc');
          return  $query = $this->db->get_where($this->_table_agri,
            array('category'=>$agri_category,
            'agri_id'=>$agri_id))->result();
        }


        elseif(isset($agri_category))
        {
$this->db->order_by('name','asc');
          
          return  $query = $this->db->get_where($this->_table_agri,array('category'=>$agri_category))->result();
        }

        else
        {
$this->db->order_by('name','asc');
          
          $query = $this->db->get($this->_table_agri)->result();

          //print_r($query);

            return  $query;
        }      
  
    }

   





  function get_all_agri_page($limit,$start=0)
    {
      
       /*
        if($agri_id != NULL)
        {
             return  $query = $this->db->get_where($this->_table_agri,array('date'=>$agri_id))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->get($this->_table_agri)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }







function get_agri_slides($main_id=null,$sub_id=null,$sub_category=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

return  $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id))->result();
      
         
         
      }


function get_agri_slides_image($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_image,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }


function get_agri_slides_video($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_video,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

function get_agri_slides_audio($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_audio,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

   

function get_agri_slides_count($main_id=null,$sub_id=null)
    {
      

    

 $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id));
      
      
   // $this->db->from('agri');
   // $query = $this->db->get();
    return $rowcount = $query->num_rows();   
         
      }
   

    function agri_save($agri_data=null)
    {
               
          // print_r((expression))
      /*
        $this->agri_id =random_string(20);
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
        $this->db->insert('agri', $this);

        */


    }






function count_agri()
{
    $this->db->from('agri');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


    function delete_agri($agri_id=null)
    {
          $this->db->delete('slides', array('main_id' => $agri_id));
    $this->db->delete('slide_img', array('main_id' => $agri_id));
        $this->db->delete('slide_viedo', array('main_id' => $agri_id));
            $this->db->delete('slide_audio', array('main_id' => $agri_id));
    $this->db->delete('agri', array('agri_id' => $agri_id));


}




	
}

?>