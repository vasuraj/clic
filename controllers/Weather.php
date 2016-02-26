<?php

class Weather extends CI_Controller
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
     $this->load->library('excel');
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
$this->load->model('model_weather');
 }
	   
	   
	   
	   
	   
	function index()
	{
	//	$this->load->model('model_weather');
	//	$data['info']=$this->model_weather-> get_last_ten_entries();
		
	//	$this->load->view('view_weather_info',$data);
	}

	function  view_forecast($date=NULL,$offset=0)
	{
		if($date!=NULL && $date!='pages')
		{
		$data['info']=$this->model_weather->get_forecast($date);
		
	}
	elseif($date==='pages')
	{
 
$start=$this->uri->segment(4);
$this->load->library('pagination');
$config['uri_segment']=4;
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


$config['base_url'] = base_url().'index.php/weather/view_forecast/pages/';
$config['total_rows'] =$this->model_weather->count_forecast();
$config['per_page'] = 9;

$this->pagination->initialize($config);







$data['info']=$this->model_weather->get_all_forecast_page($config['per_page'], $start);



		
	}
	else
	{
		$data['info']=$this->model_weather->get_forecast();
	}

$this->load->view('view_weather_forecast_info',$data);
	}



function get_forecast_excel($data=null)
{
session_start(); 
//print_r($_SESSION['records']);
$forecast_data=$_SESSION['records'];
// unset($_SESSION['records']);	

//$forecast_data=unserialize($_GET['cluster']);

$forecast_data_size=count($forecast_data);

//echo "arraysize: ".$forecast_data_size."<br>";

//print_r($forecast_data[0]);


  $styleArray = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN,
                  'color' => array('rgb' => '336699'),
              )

          )
      );








	//load our new PHPExcel library
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
//name the worksheet
$this->excel->getActiveSheet()->setTitle('Recorded Data | '.date('d-m-Y'));
//set cell A1 content with some text
$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(3); 
$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 

$this->excel->getActiveSheet()->setCellValue('A1', 'No');
$this->excel->getActiveSheet()->setCellValue('B1', 'Date');
$this->excel->getActiveSheet()->setCellValue('C1', 'Discription');
$this->excel->getActiveSheet()->setCellValue('D1', 'Min-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('E1', 'Max-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('F1', 'Min-Wind (KMPH)');
$this->excel->getActiveSheet()->setCellValue('G1', 'Max-Wind (KMPH)');
$this->excel->getActiveSheet()->setCellValue('H1', 'Remark');


$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);

 
    

for($i=0;$i<$forecast_data_size;$i++)
{

$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getFont()->setSize(8);

$this->excel->getActiveSheet()->setCellValue('A'.($i+2),($i+1));


$originalDate = $forecast_data[$i]->date;
$formatted_date = date("d-m-Y", strtotime($originalDate));

$this->excel->getActiveSheet()->setCellValue('B'.($i+2),$formatted_date);
$this->excel->getActiveSheet()->setCellValue('C'.($i+2),str_replace('_', ' ', $forecast_data[$i]->rainfall_description));
$this->excel->getActiveSheet()->setCellValue('D'.($i+2), $forecast_data[$i]->temp_min_min.'-'.$forecast_data[$i]->temp_min_max);
$this->excel->getActiveSheet()->setCellValue('E'.($i+2), $forecast_data[$i]->temp_max_min.'-'.$forecast_data[$i]->temp_max_max);
$this->excel->getActiveSheet()->setCellValue('F'.($i+2),$forecast_data[$i]->wind_min_min.'-'.$forecast_data[$i]->wind_min_max);
$this->excel->getActiveSheet()->setCellValue('G'.($i+2), $forecast_data[$i]->wind_max_min.'-'.$forecast_data[$i]->wind_max_max);
$this->excel->getActiveSheet()->setCellValue('H'.($i+2), str_replace('_',' ',str_replace('&nbsp;','',strip_tags($forecast_data[$i]->other_info))));
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setWrapText(true);


$this->excel->getActiveSheet()->getStyle('A'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->applyFromArray($styleArray);






$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);




/* // not to enable
echo $forecast_data[$i]->data_entry_date;
echo $forecast_data[$i]->date;
echo $forecast_data[$i]->rainfall_description;
echo $forecast_data[$i]->temp_min_min.'-'.$forecast_data[$i]->temp_min_max;
echo $forecast_data[$i]->temp_max_min.'-'.$forecast_data[$i]->temp_max_max;
echo $forecast_data[$i]->wind_min_min.'-'.$forecast_data[$i]->wind_min_max;
echo $forecast_data[$i]->wind_max_min.'-'.$forecast_data[$i]->wind_max_max;
echo $forecast_data[$i]->other_info;


*/




}






//change the font size
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
//make the font become bold
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(false);
//merge cell A1 until D1
//$this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);


$filename='CLIC Weather Forecast Data_'.date('d-m-Y').'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
             
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format

$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');


}













function get_recorded_excel($data=null)
{

session_start(); 
//print_r($_SESSION['records']);
$recorded_data=$_SESSION['records'];
// unset($_SESSION['records']);
$recorded_data_size=count($recorded_data);

//echo "arraysize: ".$recorded_data_size."<br>";

//print_r($recorded_data[0]);


  $styleArray = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN,
                  'color' => array('rgb' => '336699'),
              )

          )
      );








	//load our new PHPExcel library
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
//name the worksheet
$this->excel->getActiveSheet()->setTitle('Recorded Data | '.date('d-m-Y'));
//set cell A1 content with some text
$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(3); 
$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(8);
$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(7);
$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); 

$this->excel->getActiveSheet()->setCellValue('A1', 'No');
$this->excel->getActiveSheet()->setCellValue('B1', 'Date');
$this->excel->getActiveSheet()->setCellValue('C1', 'Discription');
$this->excel->getActiveSheet()->setCellValue('D1', 'Min-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('E1', 'Max-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('F1', 'Wind Speed (KMPH)');
$this->excel->getActiveSheet()->setCellValue('G1', 'Rainfall (MM)');
$this->excel->getActiveSheet()->setCellValue('H1', 'Humidity  (%)');
$this->excel->getActiveSheet()->setCellValue('I1', 'Remark');

$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('H1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('I1')->getFont()->setSize(8);




$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('I1')->getAlignment()->setWrapText(true);


 
    

for($i=0;$i<$recorded_data_size;$i++)
{

$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getFont()->setSize(8);



$this->excel->getActiveSheet()->setCellValue('A'.($i+2),($i+1));


$originalDate = $recorded_data[$i]->date;
$formatted_date = date("d-m-Y", strtotime($originalDate));

$this->excel->getActiveSheet()->setCellValue('B'.($i+2),$formatted_date);
$this->excel->getActiveSheet()->setCellValue('C'.($i+2),str_replace('_', ' ', $recorded_data[$i]->rainfall_description));
$this->excel->getActiveSheet()->setCellValue('D'.($i+2), $recorded_data[$i]->temp_min);
$this->excel->getActiveSheet()->setCellValue('E'.($i+2), $recorded_data[$i]->temp_max);
$this->excel->getActiveSheet()->setCellValue('F'.($i+2), $recorded_data[$i]->wind_max);
$this->excel->getActiveSheet()->setCellValue('G'.($i+2), $recorded_data[$i]->rainfall);
$this->excel->getActiveSheet()->setCellValue('H'.($i+2), $recorded_data[$i]->humidity1.'-'.$recorded_data[$i]->humidity2);



$this->excel->getActiveSheet()->setCellValue('I'.($i+2), str_replace('_',' ',str_replace('&nbsp;','',strip_tags($recorded_data[$i]->other_info))));




$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getAlignment()->setWrapText(true);


$this->excel->getActiveSheet()->getStyle('A'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('I'.($i+2))->applyFromArray($styleArray);







$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);



$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);







/*
echo $recorded_data[$i]->data_entry_date;
echo $recorded_data[$i]->date;
echo $recorded_data[$i]->rainfall_description;
echo $recorded_data[$i]->temp_min_min.'-'.$recorded_data[$i]->temp_min_max;
echo $recorded_data[$i]->temp_max_min.'-'.$recorded_data[$i]->temp_max_max;
echo $recorded_data[$i]->wind_min_min.'-'.$recorded_data[$i]->wind_min_max;
echo $recorded_data[$i]->wind_max_min.'-'.$recorded_data[$i]->wind_max_max;
echo $recorded_data[$i]->other_info;


*/




}






//change the font size
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
//make the font become bold
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(false);
//merge cell A1 until D1
//$this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('I1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);



$this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);


$filename='CLIC Weather Recorded Data_'.date('d-m-Y').'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
             
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format

$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');



}















function get_forecast_pdf($data=null)
{

$forecast_data=unserialize($_GET['cluster']);

$forecast_data_size=count($forecast_data);

//echo "arraysize: ".$forecast_data_size."<br>";

//print_r($forecast_data[0]);


  $styleArray = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN,
                  'color' => array('rgb' => '336699'),
              )

          )
      );








	//load our new PHPExcel library
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
//name the worksheet
$this->excel->getActiveSheet()->setTitle('Recorded Data | '.date('d-m-Y'));
//set cell A1 content with some text
$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(3); 
$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 

$this->excel->getActiveSheet()->setCellValue('A1', 'No');
$this->excel->getActiveSheet()->setCellValue('B1', 'Date');
$this->excel->getActiveSheet()->setCellValue('C1', 'Discription');
$this->excel->getActiveSheet()->setCellValue('D1', 'Min-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('E1', 'Max-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('F1', 'Min-Wind (KMPH)');
$this->excel->getActiveSheet()->setCellValue('G1', 'Max-Wind (KMPH)');
$this->excel->getActiveSheet()->setCellValue('H1', 'Remark');


$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);

 
    

for($i=0;$i<$forecast_data_size;$i++)
{

$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getFont()->setSize(8);

$this->excel->getActiveSheet()->setCellValue('A'.($i+2),($i+1));


$originalDate = $forecast_data[$i]->date;
$formatted_date = date("d-m-Y", strtotime($originalDate));

$this->excel->getActiveSheet()->setCellValue('B'.($i+2),$formatted_date);
$this->excel->getActiveSheet()->setCellValue('C'.($i+2),str_replace('_', ' ', $forecast_data[$i]->rainfall_description));
$this->excel->getActiveSheet()->setCellValue('D'.($i+2), $forecast_data[$i]->temp_min_min.'-'.$forecast_data[$i]->temp_min_max);
$this->excel->getActiveSheet()->setCellValue('E'.($i+2), $forecast_data[$i]->temp_max_min.'-'.$forecast_data[$i]->temp_max_max);
$this->excel->getActiveSheet()->setCellValue('F'.($i+2),$forecast_data[$i]->wind_min_min.'-'.$forecast_data[$i]->wind_min_max);
$this->excel->getActiveSheet()->setCellValue('G'.($i+2), $forecast_data[$i]->wind_max_min.'-'.$forecast_data[$i]->wind_max_max);
$this->excel->getActiveSheet()->setCellValue('H'.($i+2), str_replace('_',' ',str_replace('&nbsp;','',strip_tags($forecast_data[$i]->other_info))));
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setWrapText(true);


$this->excel->getActiveSheet()->getStyle('A'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->applyFromArray($styleArray);






$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);






/*
echo $forecast_data[$i]->data_entry_date;
echo $forecast_data[$i]->date;
echo $forecast_data[$i]->rainfall_description;
echo $forecast_data[$i]->temp_min_min.'-'.$forecast_data[$i]->temp_min_max;
echo $forecast_data[$i]->temp_max_min.'-'.$forecast_data[$i]->temp_max_max;
echo $forecast_data[$i]->wind_min_min.'-'.$forecast_data[$i]->wind_min_max;
echo $forecast_data[$i]->wind_max_min.'-'.$forecast_data[$i]->wind_max_max;
echo $forecast_data[$i]->other_info;


*/




}






//change the font size
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
//make the font become bold
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(false);
//merge cell A1 until D1
//$this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);




$rendererLibrary = 'PDF';
$rendererLibraryPath = dirname(FILE) . 'Classes/PHPExcel/Writer/PDF/' . $rendererLibrary;



$filename='CLIC Weather Recorded Data_'.date('d-m-Y').'.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
             
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format

$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');



}



























function get_forecast_csv($data=null)
{

session_start(); 
//print_r($_SESSION['records']);
$forecast_data=$_SESSION['records'];
//// unset($_SESSION['records']);
$forecast_data_size=count($forecast_data);

//echo "arraysize: ".$forecast_data_size."<br>";

//print_r($forecast_data[0]);


  $styleArray = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN,
                  'color' => array('rgb' => '336699'),
              )

          )
      );








	//load our new PHPExcel library
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
//name the worksheet
$this->excel->getActiveSheet()->setTitle('Recorded Data | '.date('d-m-Y'));
//set cell A1 content with some text
$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(3); 
$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); 

$this->excel->getActiveSheet()->setCellValue('A1', 'No');
$this->excel->getActiveSheet()->setCellValue('B1', 'Date');
$this->excel->getActiveSheet()->setCellValue('C1', 'Discription');
$this->excel->getActiveSheet()->setCellValue('D1', 'Min-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('E1', 'Max-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('F1', 'Min-Wind (KMPH)');
$this->excel->getActiveSheet()->setCellValue('G1', 'Max-Wind (KMPH)');
$this->excel->getActiveSheet()->setCellValue('H1', 'Remark');


$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);

 
    

for($i=0;$i<$forecast_data_size;$i++)
{

$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getFont()->setSize(8);

$this->excel->getActiveSheet()->setCellValue('A'.($i+2),($i+1));


$originalDate = $forecast_data[$i]->date;
$formatted_date = date("d-m-Y", strtotime($originalDate));

$this->excel->getActiveSheet()->setCellValue('B'.($i+2),$formatted_date);
$this->excel->getActiveSheet()->setCellValue('C'.($i+2),str_replace('_', ' ', $forecast_data[$i]->rainfall_description));
$this->excel->getActiveSheet()->setCellValue('D'.($i+2), $forecast_data[$i]->temp_min_min.'-'.$forecast_data[$i]->temp_min_max);
$this->excel->getActiveSheet()->setCellValue('E'.($i+2), $forecast_data[$i]->temp_max_min.'-'.$forecast_data[$i]->temp_max_max);
$this->excel->getActiveSheet()->setCellValue('F'.($i+2),$forecast_data[$i]->wind_min_min.'-'.$forecast_data[$i]->wind_min_max);
$this->excel->getActiveSheet()->setCellValue('G'.($i+2), $forecast_data[$i]->wind_max_min.'-'.$forecast_data[$i]->wind_max_max);
$this->excel->getActiveSheet()->setCellValue('H'.($i+2), str_replace('_',' ',str_replace('&nbsp;','',strip_tags($forecast_data[$i]->other_info))));
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setWrapText(true);


$this->excel->getActiveSheet()->getStyle('A'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->applyFromArray($styleArray);






$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);






/*
echo $forecast_data[$i]->data_entry_date;
echo $forecast_data[$i]->date;
echo $forecast_data[$i]->rainfall_description;
echo $forecast_data[$i]->temp_min_min.'-'.$forecast_data[$i]->temp_min_max;
echo $forecast_data[$i]->temp_max_min.'-'.$forecast_data[$i]->temp_max_max;
echo $forecast_data[$i]->wind_min_min.'-'.$forecast_data[$i]->wind_min_max;
echo $forecast_data[$i]->wind_max_min.'-'.$forecast_data[$i]->wind_max_max;
echo $forecast_data[$i]->other_info;


*/




}






//change the font size
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
//make the font become bold
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(false);
//merge cell A1 until D1
//$this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);



$objWriter = new PHPExcel_Writer_CSV($this->excel);
$objWriter->setDelimiter(',');
$objWriter->setEnclosure('');
$objWriter->setLineEnding("\r\n");
$objWriter->setSheetIndex(0);


$filename='CLIC Weather Forecast Data_'.date('d-m-Y').'.csv';

$objWriter->save($filename);


header('Content-Encoding: UTF-8');
   header('Content-type: text/csv; charset=UTF-8');
   header('Content-Disposition: attachment;filename="'.$filename);
   header('Cache-Control: max-age=0');

echo "\xEF\xBB\xBF";
   $objWriter->save('php://output');

}


















function get_recorded_csv($data=null)
{

session_start(); 
//print_r($_SESSION['records']);
$recorded_data=$_SESSION['records'];
// unset($_SESSION['records']);

$recorded_data_size=count($recorded_data);

//echo "arraysize: ".$recorded_data_size."<br>";

//print_r($recorded_data[0]);


  $styleArray = array(
          'borders' => array(
              'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN,
                  'color' => array('rgb' => '336699'),
              )

          )
      );








	//load our new PHPExcel library
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
//name the worksheet
$this->excel->getActiveSheet()->setTitle('Recorded Data | '.date('d-m-Y'));
//set cell A1 content with some text
$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(3); 
$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); 
$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(9); 
$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(8); 
$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(8);
$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(7);
$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); 

$this->excel->getActiveSheet()->setCellValue('A1', 'No');
$this->excel->getActiveSheet()->setCellValue('B1', 'Date');
$this->excel->getActiveSheet()->setCellValue('C1', 'Discription');
$this->excel->getActiveSheet()->setCellValue('D1', 'Min-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('E1', 'Max-Temp (°C)');
$this->excel->getActiveSheet()->setCellValue('F1', 'Wind Speed (KMPH)');
$this->excel->getActiveSheet()->setCellValue('G1', 'Rainfall (MM)');
$this->excel->getActiveSheet()->setCellValue('H1', 'Humidity  (%)');
$this->excel->getActiveSheet()->setCellValue('I1', 'Remark');

$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('H1')->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('I1')->getFont()->setSize(8);




$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true);
$this->excel->getActiveSheet()->getStyle('I1')->getAlignment()->setWrapText(true);


 
    

for($i=0;$i<$recorded_data_size;$i++)
{

$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getFont()->setSize(8);
$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getFont()->setSize(8);



$this->excel->getActiveSheet()->setCellValue('A'.($i+2),($i+1));


$originalDate = $recorded_data[$i]->date;
$formatted_date = date("d-m-Y", strtotime($originalDate));

$this->excel->getActiveSheet()->setCellValue('B'.($i+2),$formatted_date);
$this->excel->getActiveSheet()->setCellValue('C'.($i+2),str_replace('_', ' ', $recorded_data[$i]->rainfall_description));
$this->excel->getActiveSheet()->setCellValue('D'.($i+2), $recorded_data[$i]->temp_min);
$this->excel->getActiveSheet()->setCellValue('E'.($i+2), $recorded_data[$i]->temp_max);
$this->excel->getActiveSheet()->setCellValue('F'.($i+2), $recorded_data[$i]->wind_max);
$this->excel->getActiveSheet()->setCellValue('G'.($i+2), $recorded_data[$i]->rainfall);
$this->excel->getActiveSheet()->setCellValue('H'.($i+2), $recorded_data[$i]->humidity1.'-'.$recorded_data[$i]->humidity2);



$this->excel->getActiveSheet()->setCellValue('I'.($i+2), str_replace('_',' ',str_replace('&nbsp;','',strip_tags($recorded_data[$i]->other_info))));




$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getAlignment()->setWrapText(true);


$this->excel->getActiveSheet()->getStyle('A'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('I'.($i+2))->applyFromArray($styleArray);







$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$this->excel->getActiveSheet()->getStyle('H'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);



$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
$this->excel->getActiveSheet()->getStyle('I'.($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);







/*
echo $recorded_data[$i]->data_entry_date;
echo $recorded_data[$i]->date;
echo $recorded_data[$i]->rainfall_description;
echo $recorded_data[$i]->temp_min_min.'-'.$recorded_data[$i]->temp_min_max;
echo $recorded_data[$i]->temp_max_min.'-'.$recorded_data[$i]->temp_max_max;
echo $recorded_data[$i]->wind_min_min.'-'.$recorded_data[$i]->wind_min_max;
echo $recorded_data[$i]->wind_max_min.'-'.$recorded_data[$i]->wind_max_max;
echo $recorded_data[$i]->other_info;


*/




}






//change the font size
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(8);
//make the font become bold
$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(false);
//merge cell A1 until D1
//$this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)


$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('D1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('F1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('H1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

$this->excel->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$this->excel->getActiveSheet()->getStyle('I1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);



$this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
$this->excel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);



$objWriter = new PHPExcel_Writer_CSV($this->excel);
$objWriter->setDelimiter(',');
$objWriter->setEnclosure('');
$objWriter->setLineEnding("\r\n");
$objWriter->setSheetIndex(0);


$filename='CLIC Weather Recorded Data_'.date('d-m-Y').'.csv';

$objWriter->save($filename);


header('Content-Encoding: UTF-8');
   header('Content-type: text/csv; charset=UTF-8');
   header('Content-Disposition: attachment;filename="'.$filename);
   header('Cache-Control: max-age=0');

echo "\xEF\xBB\xBF";
   $objWriter->save('php://output');

}























function  view_recorded($date=NULL,$offset=0)
	{
		if($date!=NULL && $date!='pages')
		{
		$data['info']=$this->model_weather->get_recorded($date);
		
	}
	elseif($date==='pages')
	{
 
$start=$this->uri->segment(4);
$config['uri_segment']=4;
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



$config['base_url'] = base_url().'index.php/weather/view_recorded/pages/';
$config['total_rows'] =$this->model_weather->count_recorded();
$config['per_page'] = 5;

$this->pagination->initialize($config);







$data['info']=$this->model_weather->get_all_recorded_page($config['per_page'], $start);



		
	}
	else
	{
		$data['info']=$this->model_weather->get_recorded();
	}

$this->load->view('view_weather_recorded_info',$data);
	}




	function  view_latest()
	{
	
		$data['info']=$this->model_weather->get_latest();
		$this->load->view('view_weather_info',$data);
	}

	function  delete_recorded($date=null,$return_to=null)
	{
		
	$data['info']=$this->model_weather->delete_recorded($date);
	


			//$this->load->view($page);
			//header('Location: '.base_url().'index.php/'.$page);

			// header( 'Location: '.base_url() ) ;



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

//echo "<br><br>".$return_to_path;
echo $return_to_path;

if($return_to_path==='')
{


	header('Location:'.base_url().$return_to_path);
}

else
{
	header('Location:'.base_url()."index.php/".$return_to_path);
}


//		header("Location:".base_url().'index.php/home/success/1');
		



		







		}
	}

	function  delete_forecast($date=null,$return_to=null)
	{
		$data['info']=$this->model_weather->delete_forecast($date);
			//print_r($result);
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

//echo "<br><br>".$return_to_path;
echo $return_to_path;

if($return_to_path==='')
{
	header('Location:'.base_url().$return_to_path);
}

else
{
	header('Location:'.base_url()."index.php/".$return_to_path);
}


//		header("Location:".base_url().'index.php/home/success/1');
		



		}
		
	}



	 function insert_recorded()
    {
    	//print_r($this->data);
      $this->load->view('insert_recorded',$this->data);
    }


 function insert_forecast()
    {
    	//print_r($this->data);
      $this->load->view('insert_forecast',$this->data);
   

    }
 

 function edit_rainfall_graph()
    {
    	//print_r($this->data);
      $this->load->view('edit_rainfall_graph',$this->data);
    }



















 function store_graph($date=null)	
    {

  //  print_r($_FILES);



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




//----------------------------------------------



// unset($_FILES['slide_media_files']);

        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {


 //upload config setting..............

$file_type= $file['type'][0];



   $upload_conf = array(
            'upload_path'   => 'assets/img/rainfall_graph',
            'allowed_types' => 'gif|jpg|png|bmp|mp4|flv|mp3',
            'max_size'      => '30000',
            'file_name'		=> 'rainfall_graph.png',
            'overwrite' =>  'TRUE'
            ); 


 
   
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



            }
        }


//------------------------------------------------




 header("Location:".base_url());



    }














     function store_recorded($date=null, $return_to=null)	
    {
    	// print_r($_POST);
    	if($date!=null)
    	{
    		$this->db->where('date',$date);
    		$result= $this->db->update('weather_recorded',$_POST);
    	}
    	else
    	{
    	$result= $this->db->insert('weather_recorded',$_POST);
    }

    if(!isset($return_to))
    {
    	$return_to='';
    }
		
		//print_r($result);
	if($result && isset($return_to))
		{


$path_slice = explode("/", base64_decode($return_to));

//print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;
$return_to_path='';

if($return_to_path==='' || !isset($return_to_path))
{

	// echo base_url().$return_to_path;
	header('Location:'.base_url().$return_to_path);
}

else
{
	//echo base_url()."index.php/".$return_to_path;
	header('Location:'.base_url()."index.php/".$return_to_path);
}



}


if(!$result)
		{

		
  $error= $this->db->_error_message();
//echo $error;

   if (strpos($error,'Duplicate entry') !== false) 
   {
  //  echo 'true';
  //  echo 'duplicate';
    header("Location:".base_url().'index.php/home/success/0');
	}




			
		}

    }



       function store_forecast($date=null,$return_to=null)
    {
    	//print_r($_POST);
    	if($date!=null)
    	{
    		$this->db->where('date',$date);
    		$result= $this->db->update('weather_forecast',$_POST);
    	}
    	else
    	{
    	$result= $this->db->insert('weather_forecast',$_POST);
    }
    if(!isset($return_to))
    {
    	$return_to='';
    }
		
		//print_r($result);
		if($result && isset($return_to))
		{


$path_slice = explode("/", base64_decode($return_to));

//print_r($path_slice);

$return_to_path='';

//$return_to_path=implode('/',$path_slice);

for($i=3;$i<count($path_slice);$i++)
{

$return_to_path = $return_to_path.$path_slice[$i]."/";

}

//echo "<br><br>".$return_to_path;
//echo $return_to_path;

if($return_to_path==='' || !isset($return_to_path))
{

	//echo base_url().$return_to_path;
	header('Location:'.base_url().$return_to_path);
}

else
{
	//echo base_url()."index.php/".$return_to_path;
	header('Location:'.base_url()."index.php/".$return_to_path);
}



}



if(!$result)
		{

		
  $error= $this->db->_error_message();
//echo $error;

   if (strpos($error,'Duplicate entry') !== false) 
   {
  //  echo 'true';
  //  echo 'duplicate';
    header("Location:".base_url().'index.php/home/success/0');
	}




			;
		}

    }


/*
function  update_recorded()
	{
	
		$this->load->view('update_recorded');
	}

*/

}

?>