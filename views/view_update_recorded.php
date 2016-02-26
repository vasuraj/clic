<?php
//include 'template/header.php';
?>
<?php
print_r($selected_record);
?>


<div  class="row">
<?php
foreach($selected_record as $record)
echo "<h2>Weather Recorded update/add</h2>";
echo "<h2>date: ".$record->date."</h2>";
echo form_open('email/send');

echo form_input('data_entry_date', $record->data_entry_date,'hidden');
echo "<table>";
echo "<tr><td>Date</td><td>".form_input('date', $record->date)."</td></tr>";
echo "<tr><td>Description</td><td>".form_input('rainfall_description', $record->rainfall_description)."</td></tr>";
echo "<tr><td>Temp_min_min</td><td>". form_input('temp_min_min', $record->temp_min_min);
echo "<tr><td>Temp_min_min</td><td>". form_input('temp_min_max', $record->temp_min_max);
echo "<tr><td>Temp_min_min</td><td>".  form_input('temp_max_min', $record->temp_max_min);
echo "<tr><td>Temp_min_min</td><td>".  form_input('temp_max_max', $record->temp_max_max);

echo "<tr><td>Temp_min_min</td><td>".  form_input('wind_min_min', $record->wind_min_min);
echo "<tr><td>Temp_min_min</td><td>".  form_input('wind_min_max', $record->wind_min_max);
echo "<tr><td> form_input('wind_max_min', $record->wind_max_min);
echo "<tr><td> form_input('wind_max_max', $record->wind_max_max);
echo "<tr><td> form_input('rainfall', $record->rainfall);
echo "<tr><td> form_input('humidity', $record->humidity);
echo "<tr><td> "</tr></table>";
echo "<tr><td> "<input type='submit'>";

echo form_close();
?>
 
</div>




<?php 
//include 'template/footer.php';
?>