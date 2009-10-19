<div class="tweets form">
<?php echo $form->create('Tweet');?>
	<fieldset>
 		<legend><?php __('イマナニシテル？');?></legend>
		<?php echo $form->input('status', array('type' => 'textarea')); ?>
	</fieldset>
<?php echo $form->end('つぶやく');?>
</div>
