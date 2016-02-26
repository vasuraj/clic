<?php
class Model_Weather extends CI_Model
{
protected $_table_forecast='weather_forecast';
protected $_table_recorded='weather_recorded';
protected $_primary_key='date';
protected $_primary_filter='';
protected $_order_by='';
protected $_rules=array();
protected $_timestamp=FALSE;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

       function get_forecast($date=NULL)
    {
    	
        if($date != NULL)
        {
             return  $query = $this->db->get_where($this->_table_forecast,array('date'=>$date))->result();
        }
        else
        {

          
          $query = $this->db->order_by("date","desc")->get($this->_table_forecast)->result();

          //print_r($query);

            return  $query;
        }      
  
    }






  function get_all_forecast_page($limit,$start=0)
    {
      
       /*
        if($date != NULL)
        {
             return  $query = $this->db->get_where($this->_table_forecast,array('date'=>$date))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->order_by("date","desc")->get($this->_table_forecast)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }

    function get_all_recorded_page($limit,$start=0)
    {
      
       /*
        if($date != NULL)
        {
             return  $query = $this->db->get_where($this->_table_forecast,array('date'=>$date))->result();
        }
        else
        {

      */    //echo $limit;
         // echo $start;

          $this->db->limit($limit, $start);
        
          $query = $this->db->order_by("date","desc")->get($this->_table_recorded)->result();

          //print_r($query);

            return  $query;
      //  }      
  
    }




    



       function get_recorded($date=NULL)
    {
        
        
        if($date != NULL)
        {
               $query = $this->db->get_where($this->_table_recorded,array('date'=>$date))->result();
        
       // print_r($query);

        return $query;

        }
        else
        {

          $query = $this->db->order_by("date","desc")->get($this->_table_recorded)->result();

        //  print_r($query);

            return  $query;
        }      
  }






   function get_recorded_home()
    {
       
       $query=array();
       $this->db->limit(3);

  //$this->db->select('data_entry_date');

   $this->db->order_by("date","desc");
  $this->db->from($this->_table_recorded);

$result_latest_date=$this->db->get()->result();
//print_r($result_latest_date);


if(!empty($result_latest_date))
{
 $this->db->limit(3);
   $this->db->order_by("date","desc");
  $this->db->from($this->_table_recorded);

$query=$this->db->get()->result();

}
        //  print_r($query);

            return  $query;

        
     /*   if($date != NULL)
        {
               $query = $this->db->get_where($this->_table_recorded,array('date'=>$date))->result();
        
       // print_r($query);

        return $query;

        }
        else
        {

          $query = $this->db->order_by("date","desc")->get($this->_table_recorded)->result();

        //  print_r($query);

            return  $query;
        }      
}
  
*/
  }






         function get_latest_forecast($id=NULL)
    {
        
        if($id != NULL)
                {
         //    $count= $query = $this->db->get()->count();
        }
        else
        {
            $this->db->select('data_entry_date');
            $this->db->order_by("data_entry_date","desc");
            $query=$this->db->get($this->_table_forecast,1)->result();
            //print_r($query);
           foreach($query as $query_result)
            {
              $latest_data_entry_date =$query_result->data_entry_date;
            }
         
          //  echo $latest_data_entry_date

       if(isset($latest_data_entry_date))
       {     
        return  $query = $this->db->order_by("date","desc")->get_where($this->_table_forecast,array('data_entry_date'=>$latest_data_entry_date))->result();
        }
            return $query;
        }      
  
    }
    
    /*
    function get_forecast_by()
    {
        $query = $this->db->get('weather_forecast', 10);
        return $query->result();
    }
*/
    function forecast_save($date=null)
    {
               
        $this->entry_date   = time(); // please read the below note
        $this->date = $_POST['date'];
        $this->rainfall_description = $_POST['rainfall_description'];
         $this->temp_min_min = $_POST['temp_min_min'];
         $this->temp_min_max = $_POST['temp_min_max'];
        $this->temp_max_min = $_POST['temp_max_min'];
        $this->temp_max_max = $_POST['temp_max_max'];
        $this->wind_min_min = $_POST['wind_min_min'];
         $this->wind_min_max = $_POST['wind_min_max'];
         $this->wind_max_min = $_POST['wind_max_min'];
        $this->wind_max_max = $_POST['wind_max_max'];
        $this->remark  = $_POST['remark'];
        $this->db->insert('weather_forecast', $this);
    }


       function update_recorded($data=null,$date=null)
    {
       
if($date==null)
{
  $this->db->where('date',$date);
  
    $this->db->insert('data',$data);
  
}

       /* $this->entry_date   = time(); // please read the below note
        $this->date = $_POST['date'];
        $this->rainfall_description = $_POST['rainfall_description'];
         $this->temp_min_min = $_POST['temp_min_min'];
         $this->temp_min_max = $_POST['temp_min_max'];
        $this->temp_max_min = $_POST['temp_max_min'];
        $this->temp_max_max = $_POST['temp_max_max'];
        $this->wind_min_min = $_POST['wind_min_min'];
         $this->wind_min_max = $_POST['wind_min_max'];
         $this->wind_max_min = $_POST['wind_max_min'];
        $this->wind_max_max = $_POST['wind_max_max'];
        $this->remark  = $_POST['remark'];
        $this->db->insert('weather_forecast', $this);

        */
    }


  function insert_recorded()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }


    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

function count_forecast()
{
    $this->db->from('weather_forecast');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}

function count_recorded()
{
    $this->db->from('weather_recorded');
    $query = $this->db->get();
    return $rowcount = $query->num_rows();

}

    function delete_recorded($date=null)
    {
    $this->db->delete('weather_recorded', array('date' => $date));
}

    function delete_forecast($date=null)
    {
    $this->db->delete('weather_forecast', array('date' => $date));
}




	
}

?>