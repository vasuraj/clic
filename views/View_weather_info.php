

<?php

echo "<table>";
echo '<tr id="weather_forecast_text_header">';
		echo  '<td>Entry Date</td>';
		echo '<td>Date</td>';
		echo '<td>Description</td>';
		echo '<td>Min-Temprature</td>';
		echo '<td>Max-Temprature</td>';

		echo '<td>Min-Wind</td>';
		echo'<td>Max-Wind</td>';
		echo '<td>Remarks</td>';
	echo '</tr>';
if(isset($info))
foreach($info as $infodata)
{
	echo '<tr>';
		echo  '<td>'.$infodata->data_entry_date.'</td>';
		echo '<td>'.$infodata->date.'</td>';
		echo '<td>'.$infodata->rainfall_description.'</td>';
		echo '<td>'.$infodata->temp_min_min.'-'.$infodata->temp_min_max.'</td>';
		echo '<td>'.$infodata->temp_max_min.'-'.$infodata->temp_max_max.'</td>';

		echo '<td>'.$infodata->wind_min_min.'-'.$infodata->wind_min_max.'</td>';



		echo'<td>'. $infodata->wind_max_min.'-'.$infodata->wind_max_max.'</td>';




		echo '<td>'.$infodata->other_info.'</td>';
	echo '</tr>';
}
echo "</table>";

?>