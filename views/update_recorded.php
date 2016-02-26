<?php

$selected_date=$this->uri->segment(3);

$recorded_info=$this->model_weather->get_recorded($selected_date);

print_r($recorded_info);


echo form_open('index.php/weather/store_forecast');



echo form_input('name');


echo form_close();


?>