<?php 
	$heading = get_field('heading');
	$text = get_field('text');
	$button_text = get_field('button_text');

 ?>


<div class="block--cta_contact">
	<h2><?php echo $heading; ?></h2>
	<p><?php echo $text; ?></p>
	<p><a href="/contact/" class="btn"><?php echo $button_text; ?></a></p>
</div>



