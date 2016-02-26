  <?php
class Model_agri_pd extends CI_Model
{
protected $_table_agri_pd='agri_pd';
protected $_table_agri_pd_link='agri_pd_link';
protected $_table_slides='slides';
protected $_table_image='slide_img';
protected $_table_video='slide_video';
protected $_table_audio='slide_audio';


protected $_primary_key='agri_pd_id';
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

       function get_agri_pd($agri_pd_id=NULL)
    {


    	
        if(isset($agri_pd_id))
        {

          
          return  $query = $this->db->get_where($this->_table_agri_pd,array('pd_id'=>$agri_pd_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_agri_pd)->result();

          //print_r($query);

            return  $query;
        }      
  
    }




       function get_category_agri_pd($agri_pd_category=NULL,$agri_pd_id=null)
    {

//echo $agri_pd_category;
      
      if(isset($agri_pd_category) && isset($agri_pd_id))
        {

          $this->db->order_by('name','asc');
          return  $query = $this->db->get_where($this->_table_agri_pd,array('category'=>$agri_pd_category,'pd_id'=>$agri_pd_id))->result();
        }


       elseif(isset($agri_pd_category) && !isset($agri_pd_id))
        {

          $this->db->order_by('name','asc');
          return  $query = $this->db->get_where($this->_table_agri_pd,
            array('category'=>$agri_pd_category))->result();
        }

       
        else
        {

          
          $query = $this->db->get($this->_table_agri_pd)->result();

          //print_r($query);

            return  $query;
        }      
  
    }








    

    function get_agri_pd_symptom($agri_pd_symptom_id=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

 return  $query = $this->db->get_where('slides',array('sub_id'=>$agri_pd_symptom_id))->result();
      
         
         
      }



    function get_agri_pd_control($agri_pd_npm_id=null)
    {
      



 return  $query = $this->db->get_where('agri_pd_npm',array('pd_npm_id'=>$agri_pd_npm_id))->result();
      
         
         
      }


    function get_agri_pd_symptom_count($agri_pd_symptom_id=NULL)
    {
      

    

$query = $this->db->get_where('slides',array('sub_id'=>$agri_pd_symptom_id))->result();
      

   // $this->db->from('agri_pd');
   // $query = $this->db->get();
    return $rowcount = sizeof($query);   
         
      }
   

   
   





  function get_all_agri_pd_page($limit,$start=0)
    {
      
       /*
        if($agri_pd_id != NULL)
        {
             return  $query = $this->db->get_where($this->_table_agri_pd,array('date'=>$agri_pd_id))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->get($this->_table_agri_pd)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }



function get_agri_pd_attached($agri_pd_category=NULL,$agri_id=NULL)
{

return  $query = $this->db->get_where($this->_table_agri_pd_link,array('category'=>$agri_pd_category,'agri_id'=>$agri_id))->result();

}



function get_agri_pd_slides($main_id=null,$sub_id=null,$sub_category=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

return  $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id))->result();
      
         
         
      }


function get_agri_pd_slides_image($slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_image,array('slide_id'=>$slide_id ))->result();
      
         
         
      }


function get_agri_pd_slides_video($slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_video,array('slide_id'=>$slide_id ))->result();
      
         
         
      }

function get_agri_pd_slides_audio($slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_audio,array('slide_id'=>$slide_id ))->result();
      
         
         
      }

   

function get_agri_pd_slides_count($main_id=null,$sub_id=null)
    {
      

    

 $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id));
      
      
   // $this->db->from('agri_pd');
   // $query = $this->db->get();
    return $rowcount = $query->num_rows();   
         
      }
   

    function agri_pd_save($agri_pd_data=null)
    {
               
          // print_r((expression))
      /*
        $this->agri_pd_id =random_string(20);
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
        $this->db->insert('agri_pd', $this);

        */


    }






function count_agri_pd()
{
    $this->db->from('agri_pd');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


    function delete_agri_pd_link($agri_pd_link_id=null)
    {
     

     /*     $this->db->delete('slides', array('main_id' => $agri_pd_id));
    $this->db->delete('slide_img', array('main_id' => $agri_pd_id));
        $this->db->delete('slide_viedo', array('main_id' => $agri_pd_id));
            $this->db->delete('slide_audio', array('main_id' => $agri_pd_id));

            */
  
//echo $agri_pd_link_id;

  $this->db->delete('agri_pd_link',array('agri_pd_link_id' => $agri_pd_link_id));


}



    function delete_agri_pd($agri_pd_id=null)
{
     

     /*     $this->db->delete('slides', array('main_id' => $agri_pd_id));
    $this->db->delete('slide_img', array('main_id' => $agri_pd_id));
        $this->db->delete('slide_viedo', array('main_id' => $agri_pd_id));
            $this->db->delete('slide_audio', array('main_id' => $agri_pd_id));

            */
  
//echo $agri_pd_link_id;

            echo $agri_pd_id;

  $this->db->delete('agri_pd',array('pd_id' => $agri_pd_id));


}





	
}

?>