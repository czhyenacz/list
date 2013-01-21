<div class="right">

<!-- mini tabs -->	
<?php include (TEMPLATEPATH . '/lib/tabs.php'); ?>	
	
<!-- 125px banners -->	
<?php include (TEMPLATEPATH . '/lib/sponsors.php'); ?>	

<!-- Sidebar widgets -->
<div class="sidebar">
<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
	<?php endif; ?>
</ul>
</div>

</div>