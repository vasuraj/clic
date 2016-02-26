  <?php
class Model_advisory extends CI_Model
{
protected $_table_advisory_main='adv_main';
protected $_table_advisory_sub='adv_sub';

protected $_table_advisory_agri='adv_agri_pest_disease';
protected $_table_advisory_livestock='adv_livestock_disease';
protected $_table_slides='slides';
protected $_table_image='slide_img';
protected $_table_video='slide_video';
protected $_table_audio='slide_audio';


protected $_primary_key='advisory_id';
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

    function get_adv_main($adv_main_id=NULL)
    {

       if(isset($adv_main_id))
        {

          
          return  $query = $this->db->get_where($this->_table_advisory_main,array('adv_main_id'=>$adv_main_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_advisory_main)->result();

          //print_r($query);

            return  $query;
        }      
  
    }



function get_adv_agri($pest_disease_id=NULL)
    {

       if(isset($pest_disease_id))
        {

          echo $pest_disease_id;
          return  $query = $this->db->get_where($this->_table_advisory_agri,array('pest_disease_id'=>$pest_disease_id))->result();
        }
        else
        {
            echo 'nothing to return<br> can not access without the key.' ;
            return  FALSE;
        }      
  
    }






function get_adv_livestock($disease_id=NULL)
    {

       if(isset($disease_id))
        {

          echo $disease_id;
          return  $query = $this->db->get_where($this->_table_advisory_livestock,array('disease_id'=>$disease_id))->result();
        }
        else
        {
            echo 'nothing to return<br> can not access without the key.' ;
            return  FALSE;
        }      
  
    }










       function get_advisory($advisory_id=NULL)
    {


    	
        if(isset($advisory_id))
        {

          
          return  $query = $this->db->get_where($this->_table_advisory_main,array('adv_main_id'=>$advisory_id))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_advisory_main)->result();

          //print_r($query);

            return  $query;
        }      
  
    }




       function get_advisory_date($advisory_date=NULL)
    {

//echo $advisory_category;
      
        if($advisory_date!='')
        {

        
           $query = $this->db->distinct()->select(array('date','adv_main_id','crop'))->get_where($this->_table_advisory_main,array('date'=>$advisory_date))->result();
              
              return $query;
        }
        else
        {

          
          $query = $this->db->distinct()->select(array('date','adv_main_id','crop'))->group_by('date')->order_by('date','desc')->get($this->_table_advisory_main)->result();

       // print_r($query);

            return  $query;
        }      
  
    }


    function get_category_info($advisory_category=NULL)
    {

//echo $advisory_category;
      
        if(isset($advisory_category))
        {

          
          return  $query = $this->db->get_where($this->_table_advisory_main,array('category'=>$advisory_category))->result();
        }
        else
        {

          
          $query = $this->db->get($this->_table_advisory_main)->result();

          //print_r($query);

            return  $query;
        }      
  
    }


       function get_adv_sub($adv_agri_id=NULL)
    {


          return  $query = $this->db->get_where($this->_table_advisory_sub,array('adv_agri_id'=>$adv_agri_id))->result();
    // echo 'this and this';
//print_r($query);
          return  $query;
       
    }
   
   





  function get_all_advisory_page($limit,$start=0)
    {
      
       /*
        if($advisory_id != NULL)
        {
             return  $query = $this->db->get_where($this->_table_advisory,array('date'=>$advisory_id))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->get($this->_table_advisory)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }







function get_advisory_slides($main_id=null,$sub_id=null,$sub_category=null,$limit=1,$start=0)
    {
      


     $this->db->limit($limit, $start);
        

return  $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id))->result();
      
         
         
      }


function get_advisory_slides_image($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_image,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }


function get_advisory_slides_video($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_video,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

function get_advisory_slides_audio($main_id=null,$sub_id=null,$slide_id=null)
    {
      

     
return  $query = $this->db->get_where($this->_table_audio,array('main_id'=>$main_id, 'sub_id'=>$sub_id, 'slide_id'=>$slide_id ))->result();
      
         
         
      }

   

function get_advisory_slides_count($main_id=null,$sub_id=null)
    {
      

    

 $query = $this->db->get_where($this->_table_slides,array('main_id'=>$main_id, 'sub_id'=>$sub_id));
      
      
   // $this->db->from('advisory');
   // $query = $this->db->get();
    return $rowcount = $query->num_rows();   
         
      }
   

    function advisory_save($advisory_data=null)
    {
               
          // print_r((expression))
      /*
        $this->advisory_id =random_string(20);
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
        $this->db->insert('advisory', $this);

        */


    }






function count_advisory()
{
    $this->db->from('advisory');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}


    function delete_advisory_main($advisory_id=null)
    {
         
         echo $advisory_id;
      
    $this->db->from('adv_main');   
    $this->db->where("adv_main_id", $advisory_id);
    $result= $this->db->get()->result();

    $crop_id= $result[0]->crop;
    $vegetable_id= $result[0]->vegetable;
    $fruit_id= $result[0]->fruit;
    $livestock_id= $result[0]->livestock;


  $this->db->delete('adv_main', array('adv_main_id' => $advisory_id));

    $this->db->delete('adv_sub', array('adv_main_id' => $advisory_id));
        

      $this->db->delete('adv_agri_pest_disease', array('adv_agri_id' => $crop_id));
       $this->db->delete('adv_agri_pest_disease', array('adv_agri_id' => $vegetable_id));
        $this->db->delete('adv_agri_pest_disease', array('adv_agri_id' => $fruit_id));
         $this->db->delete('adv_livestock_disease', array('adv_livestock_id' => $livestock_id));



}


 function delete_advisory_sub($adv_auto_id=null,$category=null)
    {
     


     if($category!='livestock')
     {
  
 

      $this->db->from('adv_sub');
      $this->db->select('adv_agri_id');
     $adv_sub_records=$this->db->get()->result();
    
    echo $adv_auto_id;

    $adv_agri_id= $adv_sub_records[0]->adv_agri_id ; 

    echo  $adv_agri_id;

  $this->db->delete('adv_sub', array('agri_auto_id' => $adv_auto_id));

 $this->db->delete('adv_agri_pest_disease', array('adv_agri_id' => $adv_agri_id));
     

}
 


}


}

