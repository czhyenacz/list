<div class="clear"></div>
 
<div class="tabsdiv">
	<h3 class="sidetitl "> Recent Recipes </h3>
	<?php 
		$my_query = new WP_Query('post_type=recipes&showposts=4');
		while ($my_query->have_posts()) : $my_query->the_post();
	?>
	
	<div class="fblock">
	<?php
		if ( has_post_thumbnail() ) { ?>
			<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=60&amp;w=80&amp;zc=1" alt=""/>
	<?php } else { ?>
			<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" />
	<?php } ?>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 5); ?></a></h3>
		<p><span class="clock">  Posted on <?php the_time('M - j - Y'); ?></span></p>
		<p><span class="comm"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></span></p>
		<div class="clear"></div>
	</div>
	<?php endwhile; ?>
</div>
			
<div class="tabsdiv">
	<h3 class="sidetitl "> Recent posts </h3>
	<?php 
		$my_query = new WP_Query('showposts=4');
		while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
	?>
	<div class="fblock">
	<?php
		if ( has_post_thumbnail() ) { ?>
			<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=60&amp;w=80&amp;zc=1" alt=""/>
	<?php } else { ?>
			<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" />
	<?php } ?>

	<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 5); ?></a></h3>
	<p><span class="clock">  Posted on <?php the_time('M - j - Y'); ?></span></p>
	<p><span class="comm"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></span></p>
	<div class="clear"></div>
	</div>
	<?php endwhile; ?>
</div>


		
