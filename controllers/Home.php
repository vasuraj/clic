<?php

class Home extends CI_Controller
{

	protected $_table_forecast='weather_forecast';
protected $_table_recorded='weather_recorded';


	 public function __construct()
       {
            parent::__construct();
            $this->load->helper('form');
            // Your own constructor code
            $this->load->model('model_weather');
       }
	
	function index()
	{
		
		$this->load->view('home');

	}

	function success($message_code=NULL)
	{
		$data['msg_id']=$message_code;

		$this->load->view('success',$data);
	}

	function  delete_recorded($date)
	{
		$data['info']=$this->model_weather->delete_recorded($date);
		header('Location: '.base_url());
		//$this->load->view('home');
	}

	function  delete_forecast($date)
	{
		$data['info']=$this->model_weather->delete_forecast($date);
		header('Location: '.base_url());
		//$this->load->view('home');
	}

		function  update_recorded($date=NULL)
	{
		
		$selected_record = $this->db->get_where($this->_table_recorded,array('date'=>$date))->result();
		
		$data['selected_record']=$selected_record;
		//$data['info']=$this->model_weather->update_recorded($date);
		//header('Location: '.base_url());
		//print_r($selected_record);
		//$this->load->view('template/header.php');
		$this->load->view('view_update_recorded',$data);
	}


	}

?>