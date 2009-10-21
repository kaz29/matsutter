<div class="tweets form">
<?php echo $form->create('Tweet');?>
<span class="whatdoing">イマナニシテル？</span><br/>
<?php echo $form->input('status', array('type' => 'textarea', 'rows' => '3', 'cols' => '60', 'label' => false)); ?>
<?php echo $form->end('つぶやく');?>
</div>

<div id="timeline">
<div class="timeline_title">ホーム</div>
<table class="statuslist">
<?php 
if ( !empty($statuses) ):
	foreach ($statuses as $status): ?>
	<tr>
		<td class="friendicon">
			<?php echo $html->image($status['User']['profile_image_url']); ?>
		</td>
		<td>
			<?php echo $html->link($status['User']['screen_name'], "http://twitter.com/{$status['User']['screen_name']}/") ; ?>
		
			<?php echo $status['text']; ?>
		
			<div class="timestamp">
				<?php echo $html->link(
					$time->relativeTime($status['created_at']),
					"http://twitter.com/{$status['User']['screen_name']}/status/{$status['id']}",
					array('class' => 'timestamp', 'target' => '_blank'));
				?>
			</div>
		</td>
	</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>
</div>
