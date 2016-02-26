  <?php
class Model_machine extends CI_Model
{
protected $_table_machine='machine';
protected $_table_slides='slides';
protected $_table_image='slide_img';
protected $_table_video='slide_video';
protected $_table_audio='slide_audio';


protected $_primary_key='machine_id';
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

       function get_machine($machine_id=NULL)
    {


    	
        if(isset($machine_id))
        {

          
          return  $query = $this->db->get_where($this->_table_machine,array('machine_id'=>$machine_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_machine)->result();

          //print_r($query);

            return  $query;
        }      
  
    }




       function get_category_machine($machine_category=NULL,$machine_id=null)
    {

//echo $machine_category;
     // echo "<br><br><br><br><br>".$machine_category."<br<br>";
      
       if(isset($machine_id))
        {

          
          $machine_info = $this->db->get_where($this->_table_machine,
            array('category'=>$machine_category,
            'machine_id'=>$machine_id))->result();

          $machine_img=$this->db->get_where('slide_img',
            array('main_id'=>$machine_id))->result();


return $machine_info['machine_image']=$machine_img;

//print_r($machine_info);

        }

        elseif($machine_category!=null)
        {

       $machine_info = $this->db->get_where($this->_table_machine,array('category'=>$machine_category))->result();

      $machine_img=$this->db->get_where('slide_img',array('main_id'=>$machine_id))->result();


      $machine_info['machine_image']=$machine_img;

// print_r($machine_info);

return $machine_info;

print_r($machine_info);
        }

        else
        {

          
          $query = $this->db->get($this->_table_machine)->result();



          //print_r($query);

            return  $query;
        }      
  
    }

   










       function get_machine_inner_info($machine_id=null)
    {

//echo $machine_category;
      
       if(isset($machine_id))
        {

          
        $machine_info = $this->db->get_where($this->_table_machine,
            array(
            'machine_id'=>$machine_id))->result();

          $machine_img=$this->db->get_where('slide_img',
            array('main_id'=>$machine_id))->result();


     $machine_info[0]->machine_img=$machine_img;

     return $machine_info[0];

        }      
  
    }

   






   function get_machine_multimedia($machine_id=null)
    {

//echo $machine_category;
      
       if(isset($machine_id))
        {

          
    $machine_info=array();
//echo "--------------------".$machine_id;
          $machine_img=$this->db->get_where('slide_img',
            array('main_id'=>$machine_id))->result();

           $machine_video=$this->db->get_where('slide_video',
            array('main_id'=>$machine_id))->result();


   $machine_info['machine_image']=$machine_img;
     $machine_info['machine_video']=$machine_video;
      


     return $machine_info;

        }      
  
    }

   



  function get_machine_vendor($machine_id=null)
    {

//echo $machine_category;
      
       if(isset($machine_id))
        {

          
    $machine_info=array();

          $machine_img=$this->db->get_where('machine_vendor',
            array('machine_id'=>$machine_id))->result();


   $machine_info[]=$machine_img;
     return $machine_info;

        }      
  
    }








  function get_all_machine_page($limit,$start=0)
    {
      
       /*
        if($machine_id != NULL)
        {
             return  $query = $this->db->get_where($this->_table_machine,array('date'=>$machine_id))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->get($this->_table_machine)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }







function get_machine_slides($main_id=null,$sub_id=null,$sub_category=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

return  $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id))->result();
      
         
         
      }


function get_machine_slides_image($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_image,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }


function get_machine_slides_video($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_video,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

function get_machine_slides_audio($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_audio,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

   

function get_machine_slides_count($main_id=null,$sub_id=null)
    {
      

    

 $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id));
      
      
   // $this->db->from('machine');
   // $query = $this->db->get();
    return $rowcount = $query->num_rows();   
         
      }
   

    function machine_save($machine_data=null)
    {
               
          // print_r((expression))
      /*
        $this->machine_id =random_string(20);
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
        $this->db->insert('machine', $this);

        */


    }






function count_machine()
{
    $this->db->from('machine');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


    function delete_machine($machine_id=null)
    {
          $this->db->delete('slides', array('main_id' => $machine_id));
    $this->db->delete('slide_img', array('main_id' => $machine_id));
        $this->db->delete('slide_viedo', array('main_id' => $machine_id));
            $this->db->delete('slide_audio', array('main_id' => $machine_id));
    $this->db->delete('machine', array('machine_id' => $machine_id));


}




	
}

?>