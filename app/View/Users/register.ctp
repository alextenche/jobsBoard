<?php echo $this->Form->create('User'); ?>

<fieldset>
	<legend><?php echo __('create an account'); ?></legend>
	<?php 
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email', array('type' => 'email'));
		echo $this->Form->input('username');
		echo $this->Form->input('password', array('type' => 'password'));
		echo $this->Form->input('confirm_password', array('type' => 'password'));
		echo $this->Form->input('role', array('type' => 'select', 'options' => array('job seeker' => 'job seeker', 'employer' => 'employer'), 'empty' => 'select user type'));
		echo $this->Form->end('register');
	?>
</fieldset>
