<h1>Weather Forecast info insert Form</h1>
<?php
$attributes = array('class' => 'email', 'id' => 'myform');

echo form_open('weather/insert_in_forecast', $attributes);
?>

    <?php echo form_fieldset( 'Login Form' ); ?>

        <div class="textfield">
            <?php echo form_label( 'username', 'user_name' ); ?>
            <?php echo form_input( 'user_name' ); ?>
        </div>

        <div class="textfield">
            <?php echo form_label( 'password', 'user_pass' ); ?>
            <?php echo form_password( 'user_pass' ); ?>
        </div>

        <div class="buttons">
            <?php echo form_submit( 'login', 'Login' ); ?>
        </div>

    <?php echo form_fieldset_close(); ?>
<?php echo form_close(); ?>