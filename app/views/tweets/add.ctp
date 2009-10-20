<div class="tweets form">
<?php echo $form->create('Tweet');?>
<span class="whatdoing">イマナニシテル？</span><br/>
<?php echo $form->input('status', array('type' => 'textarea', 'rows' => '3', 'cols' => '60', 'label' => false)); ?>
<?php echo $form->end('つぶやく');?>
</div>
